<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Finance;
use App\Models\Category;
use App\Models\ImportedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;


class ExcelReader extends Component
{
    use WithFileUploads;

    public $finance_title;
    public $finance_amount;
    public $finance_description;
    public $finance_purchase_date;
    public $transaction_type;
    public $supplier_address;
    public $supplier_name;
    public $supplier_phone;
    public $finance_tax_amount;
    public $finance_tax_rate;
    public $document_type;
    public $image_path;
    public $category_id;
    public $categories;
    public $file;
    public $excelData = [];

    public $editMode = false; // Flag to indicate whether in edit mode
    public $editIndex;

    public function render()
    {
        $this->getCategory();

        $perPage = 10; // Adjust the number of items per page as needed
        $currentPage = max(1, request()->get('page', 1));

        $startIndex = ($currentPage - 1) * $perPage;
        $pagedData = array_slice($this->excelData, $startIndex, $perPage);

        return view('livewire.excel-reader', [
            'teamFinance' => $pagedData,
        ]);
    }
    public function handleFileUpload()
    {
        try{
        $this->validate([
            'file' => 'required|file|mimes:xls,xlsx,csv',
        ]);

        $file = $this->file->getRealPath();
        $data = Excel::toArray([], $file)[0];

        $headers = $data[0];
        $formattedData = array_map(function ($row) use ($headers) {
            $row = array_map(function ($value, $header) {
                if ($header == 'date' && is_numeric($value)) {
                    $value = Date::excelToDateTimeObject($value)->format('Y-m-d');
                }
                return $value;
            }, $row, $headers);

            return array_combine($headers, $row);
        }, array_slice($data, 1));

        $this->excelData = $this->processAndStoreData($formattedData);
    } catch (\Exception $ex) {
        session()->flash('error','Something goes wrong while uploading, Try Again');
    }
    
    }

    private function processAndStoreData($excelData)
    {
        try{
        $user = Auth::user();
        $databaseColumns = [
            'user_id', 'teams_id', 'finance_title', 'finance_amount', 'finance_description',
            'finance_purchase_date', 'transaction_type', 'supplier_address', 'finance_tax_amount', 'finance_tax_rate', 'document_type', 'category_id',
        ];

        $processedData = [];

        foreach ($excelData as $row) {
            $typedFinanceData = [
                'user_id' => $user->id,
                'teams_id' => $user->currentTeam->id,
                'finance_title' => $this->finance_title,
                'finance_amount' => $this->finance_amount,
                'finance_description' => $this->finance_description,
                'finance_purchase_date' => $this->finance_purchase_date,
                'transaction_type' => $this->transaction_type,
                'supplier_address' => $this->supplier_address,
                'supplier_name' => $this->supplier_name,
                'supplier_phone' => $this->supplier_phone,
                'finance_tax_amount' => $this->finance_tax_amount,
                'finance_tax_rate' => $this->finance_tax_rate,
                'document_type' => $this->document_type,
                'category_id' => $this->category_id,
            ];

            foreach ($row as $excelColumnName => $value) {
                $bestMatch = $this->findBestMatch($excelColumnName, $databaseColumns);
                $similarityThreshold = 0.7;

                $validCategoryColumns = ['category', 'category_id', 'categories', 'finance_category', 'item category', 'product_category'];
                $validTransactionType = ['transaction type', 'type', 'Finance type', 'types'];

                if (in_array(Str::lower($excelColumnName), $validCategoryColumns) && $bestMatch['similarity'] >= $similarityThreshold) {
                    $category = Category::findSimilar($value, $user->id);

                    if ($category) {
                        $typedFinanceData['category_id'] = $category->id;
                    } else {
                        $othersCategory = Category::firstOrCreate([
                            'category_name' => 'Others',
                            'user_id' => $user->id,
                        ]);
                        $typedFinanceData['category_id'] = $othersCategory->id;
                    }
                    $typedFinanceData['category_id'] = (int) $typedFinanceData['category_id'];
                } elseif (in_array(Str::lower($excelColumnName), $validTransactionType) && $bestMatch['similarity'] >= $similarityThreshold) {
                    $validTransactionTypeValues = ['income', 'expense'];

                    if (in_array(strtolower($value), $validTransactionTypeValues)) {
                        $typedFinanceData['transaction_type'] = in_array(strtolower($value), $validTransactionTypeValues) ? (strtolower($value) === 'income' ? 0 : 1) : 0;
                    }
                    
                } elseif ($bestMatch['similarity'] >= $similarityThreshold) {
                    $typedFinanceData[$bestMatch['column']] = $value;
                } else {
                    if (Str::lower($excelColumnName) === 'finance_purchase_date') {
                        if (is_numeric($value)) {
                            try {
                                $dateObject = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
                                $formattedDate = $dateObject->format('Y-m-d');
                                $typedFinanceData['finance_purchase_date'] = $formattedDate;
                            } catch (\Exception $e) {
                                $typedFinanceData['finance_purchase_date'] = now()->format('Y-m-d');
                            }
                        } else {
                            $typedFinanceData['finance_purchase_date'] = $value;
                        }
                    } else {
                        $bestMatch = $this->findBestMatch($excelColumnName, $databaseColumns);
                    }

                }
            }

            $processedData[] = $typedFinanceData;
        }

        activity()
            ->causedBy(Auth::user())
            ->log('imported finance data');
        
        return $processedData;
    } catch (\Exception $ex) {
        session()->flash('error','Something goes wrong, Try Again');
    }
    }

    private function findBestMatch($needle, $haystack)
    {
        $bestMatch = ['column' => null, 'similarity' => 0];

        $customMappings = [
            'name' => 'finance_title',
            'Name' => 'finance_title',
            'price' => 'finance_amount',
            'Price' => 'finance_amount',
        ];

        if (isset($customMappings[Str::lower($needle)])) {
            $bestMatch['column'] = $customMappings[Str::lower($needle)];
            $bestMatch['similarity'] = 80;
            return $bestMatch;
        }

        foreach ($haystack as $column) {
            $similarity = similar_text(Str::lower($needle), Str::lower($column));

            if ($similarity > $bestMatch['similarity']) {
                $bestMatch['column'] = $column;
                $bestMatch['similarity'] = $similarity;
            }
        }
        return $bestMatch;
    }

    public function getCategory()
    {
        $user = Auth::user();
        if ($user && $user->currentTeam) {
            $this->categories = Category::
                where(function ($query) use ($user) {
                    $query->where('teams_id', $user->currentTeam->id)
                        ->orWhereNull('teams_id');
                })
                ->latest('created_at')
                ->get();
        } else {
            $this->categories = Category::whereNull('teams_id')->latest('created_at')->get();
        }

        $this->categories = $this->categories ?? [];
    }


    public function removeItem($index)
    {
        if (isset($this->excelData[$index])) {
            array_splice($this->excelData, $index, 1);
            $this->excelData = array_values($this->excelData);
        }
        
    }

        public function editItem($index)
    {
        try{
        if (isset($this->excelData[$index])) {
            $this->editMode = true;
            $this->editIndex = $index;

            $finance = $this->excelData[$index];
            $this->finance_title = $finance['finance_title'];
            $this->finance_amount = $finance['finance_amount'];
            $this->finance_description = $finance['finance_description'];
            $this->finance_purchase_date = $finance['finance_purchase_date'];
            $this->transaction_type = $finance['transaction_type'];
            $this->supplier_address = $finance['supplier_address'];
            $this->finance_tax_amount = $finance['finance_tax_amount'];
            $this->document_type = $finance['document_type'];
            $this->category_id = $finance['category_id'];

        }
    } catch (\Exception $ex) {
        session()->flash('error','Unable to edit, Try Again');
    }
    }
        public function updateItem()
    {
        try{
        if (isset($this->excelData[$this->editIndex])) {
            $this->excelData[$this->editIndex] = [
                'finance_title' => $this->finance_title,
                'finance_amount' => $this->finance_amount,
                'finance_description' => $this->finance_description,
                'finance_purchase_date' => $this->finance_purchase_date,
                'transaction_type' => $this->transaction_type,
                'supplier_address' => $this->supplier_address,
                'supplier_name' => $this->supplier_name,
                'supplier_phone' => $this->supplier_phone,
                'finance_tax_amount' => $this->finance_tax_amount,
                'finance_tax_rate' => $this->finance_tax_rate,
                'document_type' => $this->document_type,
                'category_id' => $this->category_id,
            ];
            $this->resetForm();
        }
    } catch (\Exception $ex) {
        session()->flash('error','Unable to Update, Try Again');
    }
    }

    private function resetForm()
    {
        $this->editMode = false;
        $this->editIndex = null;
        $this->finance_title = null;
        $this->finance_amount = null;
        $this->finance_description = null;
        $this->finance_purchase_date = null;
        $this->transaction_type = null;
        $this->supplier_address = null;
        $this->finance_tax_amount = null;
        $this->document_type = null;
        $this->category_id = null;
    }


    public function submitFinanceData()
    {
    try {

    $user = Auth::user();

    $importedFile = ImportedFile::create([
        'user_id' => $user->id,
        'teams_id' => $user->currentTeam->id,
        'file_name' => optional($this->file)->getClientOriginalName(),
        'file_path' => optional($this->file)->store('public/finance_images'),
        'date_start' => now(),
        'date_end' => null,
    ]);

    foreach ($this->excelData as $financeData) {
        $financeData['file_id'] = $importedFile->id;
        $financeData['finance_purchase_date'] = $financeData['finance_purchase_date'] ?? now()->format('Y-m-d');
        $financeData['transaction_type'] = in_array($financeData['transaction_type'], [0, 1]) ? $financeData['transaction_type'] : null;
        $financeData['category_id'] = $financeData['category_id'] ?? 17; 

        $financeData = [
            'user_id' => $user->id,
            'teams_id' => $user->currentTeam->id,
            'finance_title' => $financeData['finance_title'],
            'finance_amount' => $financeData['finance_amount'],
            'finance_description' => $financeData['finance_description'],
            'finance_purchase_date' => $financeData['finance_purchase_date'],
            'transaction_type' => $financeData['transaction_type'],
            'supplier_address' => $financeData['supplier_address'],
            'supplier_name' => $financeData['supplier_name'],
            'supplier_phone' => $financeData['supplier_phone'],
            'finance_tax_amount' => $financeData['finance_tax_amount'],
            'finance_tax_rate' => $financeData['finance_tax_rate'],
            'document_type' => $financeData['document_type'],
            'category_id' => $financeData['category_id'],
            'file_id' => $financeData['file_id'],
        ];
        $financeDataInstance = Finance::create($financeData);
    }
        activity()
        ->causedBy($user)
        ->performedOn($importedFile)
        ->withProperties([
            'action'  => 'Uploaded',
            'team_id' => $user->currentTeam->id,
            'title'   => $importedFile->file_name,
            ])
        ->log('Uploaded a File');

        $this->resetForm();
        $this->file = null;
        session()->flash('message', 'Finance data submitted successfully!');
        return redirect('/add');  

        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong, Try Again');
        }
    }




}
