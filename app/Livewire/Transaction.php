<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Finance;
use App\Models\Item;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Spatie\Activitylog\Models\Activity;
use Livewire\WithPagination;

class Transaction extends Component
{
    //Add Items
    use WithPagination;
    use WithFileUploads;

    public $items = [];
    public $name;

    #[Rule('numeric', message: 'should be numeric')]
    public $qty = 0;

    #[Rule('numeric', message: 'should be numeric')]
    public $unitPrice = 0;

    #[Rule('numeric', message: 'should be numeric')]
    public $totalAmount = 0;

    //Add Finance
    public $finance_title;

    #[Rule('numeric', message: 'should be numeric')]
    public $finance_amount;
    public $finance_description;
    public $finance_purchase_date;
    public $transaction_type;
    public $supplier_address;
    public $supplier_name;
    #[Rule('numeric', message: 'should be numeric')]
    public $supplier_phone;
    #[Rule('numeric', message: 'should be numeric')]
    public $finance_tax_amount;
    #[Rule('numeric', message: 'should be numeric')]
    public $finance_tax_rate;
    public $document_type;
    public $image_path;
    public $category_id;
    public $categories;

    //Finances List
    public $finances;
    public $finan;

    //Image
    public $image;
    //Mindee
    public $file;
    public $result;
    public $extractedData; 

    public $deleteID;

    public $search = '';
    public $filters = [];
    public $filter = "";
    public $transacType = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function updatingFilter($value)
    {
        $this->filter = $value;
    }
    
    public function updateFilter($categoryId)
    {
        if (isset($this->filters[$categoryId])) {
            unset($this->filters[$categoryId]);
        } else {
            $this->filters[$categoryId] = true;
        }
    }
    
    public function updateTransactionType($typeId = null)
    {
        $this->transacType = $typeId;
    }
    
    public function render()
    {
        $this->getCategory();
    
        $user = Auth::user();
    
        $query = Finance::where('finance_title', 'like', '%' . $this->search . '%')
            ->with('items')
            ->where('teams_id', $user->currentTeam->id);
    
        if (!empty($this->filters)) {
            $query->whereIn('category_id', array_keys($this->filters));
        }
    
        if ($this->transacType !== null) {
            $query->where('transaction_type', $this->transacType);
        }
    
        $finances = $query->latest('created_at')->paginate(10);
    
        return view('livewire.transaction', [
            'teamFinance' => $finances,
        ]);
    }
    

  public function predict()
    {
    
        $api_key = 'f0e5b4e57d5656133d84d6ab62f0fddf';
        $account = 'mindee';
        $version = '1';
        $endpoint = 'financial_document';

        $url = "https://api.mindee.net/v1/products/{$account}/{$endpoint}/v{$version}/predict";

        $response = Http::withHeaders([
            'Authorization' => "Token {$api_key}",
        ])->attach('document', file_get_contents($this->file->getRealPath()), 'document.pdf', [
            'Content-Type' => $this->file->getClientMimeType(),
        ])->post($url);

        $this->result = $response->json();

        if ($response->successful()) {
            $this->extractedData = $this->mapExtractedData($this->result);
            $this->document_type = $this->extractedData['document']['type'];
            $this->supplier_name = $this->extractedData['document']['supplier_name'];
            $this->supplier_phone = $this->extractedData['document']['supplier_phone_number'] ?? 'N/A';
            $this->supplier_address = $this->extractedData['document']['supplier_address'] ?? 'N/A';
            $this->finance_purchase_date = $this->extractedData['document']['purchase_date'];
            $this->finance_amount = $this->extractedData['document']['total_amount'];
            $this->finance_tax_rate = $this->extractedData['document']['total_net'] ?? 'N/A';
            $this->finance_tax_amount = $this->extractedData['document']['total_tax'] ?? 'N/A';
            foreach ($this->extractedData['document']['line_items'] as $item) {
                $this->items[] = [
                    'name' => $item['description'] ?? 'N/A',
                    'qty' => $item['quantity'] ?? 0,
                    'unitPrice' => $item['unit_price'] ?? 0,
                    'totalAmount' => $item['total_amount'] ?? 0,
                ];
            }

        } else {
            $this->result = [
                'api_request' => [
                    'error' => [
                        'code' => $response->status(),
                        'details' => 'HTTP Error',
                        'message' => 'Unexpected error occurred',
                    ],
                    'resources' => [],
                    'status' => 'failure',
                    'status_code' => $response->status(),
                    'url' => $url,
                ],
            ];
        }
    }

    public function mapExtractedData($result)
    {
        return [
            'document' => [
                'type' => data_get($result, 'document.inference.prediction.document_type.value', 'N/A'),
                'supplier_name' => data_get($result, 'document.inference.prediction.supplier_name.value', 'N/A'),
                'supplier_phone_number' => data_get($result, 'document.inference.prediction.supplier_phone_number.value', 'N/A'),
                'supplier_address' => data_get($result, 'document.inference.prediction.supplier_address.value', 'N/A'),
                'category' => data_get($result, 'document.inference.prediction.category.value', 'N/A'),
                'purchase_date' => data_get($result, 'document.inference.prediction.due_date.value', 'N/A'),
                'total_amount' => data_get($result, 'document.inference.prediction.total_amount.value', 'N/A'),
                'total_net' => data_get($result, 'document.inference.prediction.total_net.value') ?? 0,
                'total_tax' => data_get($result, 'document.inference.prediction.total_tax.value') ?? 0,
                'line_items' => data_get($result, 'document.inference.prediction.line_items', []),
            ],
        ];
    }

    public function mapCategory($mindeeCategory)
    {
        return Category::firstOrCreate(['category_name' => $mindeeCategory])->id;
    }
    //End of Mindee

    public function addItem()
    {
        $this->validate([
            'name'        => 'required',
            'qty'         => 'required|numeric',
            'unitPrice'   => 'required|numeric',
            'totalAmount' => 'required|numeric',
        ]);

        $this->items[] = [
            'name'        => $this->name,
            'qty'         => $this->qty,
            'unitPrice'   => $this->unitPrice,
            'totalAmount' => $this->totalAmount,
        ];

        $this->name = $this->qty = $this->unitPrice = $this->totalAmount = '';
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
    }
    
    public function deleteAddContent()
    {
        $this->items = [];
        $this->name = null;
        $this->qty = null;
        $this->unitPrice = null;
        $this->totalAmount = null;
    
        $this->finance_title = null;
        $this->finance_amount = null;
        $this->finance_description = null;
        $this->finance_purchase_date = null;
        $this->transaction_type = null;
        $this->supplier_address = null;
        $this->supplier_name = null;
        $this->supplier_phone = null;
        $this->finance_tax_amount = null;
        $this->finance_tax_rate = null;
        $this->document_type = null;
        $this->image_path = null;
        $this->category_id = null;
        $this->file = null;
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
    
        
    public function submitForm()
    {
        $user = Auth::user();
        
        $this->validate([
            'finance_title'         => 'required',
            'finance_amount'        => 'required|numeric',
            'finance_purchase_date' => 'required|date',
            'transaction_type'      => 'required',
            'category_id'           => 'required',
            'file'                  => 'nullable|image|max:2048',
        ], [
            'finance_title.required'         => 'The finance title is required.',
            'finance_amount.required'        => 'The finance amount is required.',
            'finance_purchase_date.required' => 'The purchase date is required.',
            'finance_purchase_date.date'     => 'Invalid date format for purchase date.',
            'transaction_type.required'      => 'The transaction type is required.',
            'category_id.required'           => 'The category is required.',
        ]);
        $filePath = optional($this->file)->store('public/finance_images');

        $finance = Finance::create([
            'user_id'               => Auth::id(),
            'teams_id'              => $user->currentTeam->id, 
            'finance_title'         => $this->finance_title,
            'finance_amount'        => $this->finance_amount,
            'finance_description'   => $this->finance_description,
            'finance_purchase_date' => $this->finance_purchase_date,
            'transaction_type'      => $this->transaction_type,
            'supplier_address'      => $this->supplier_address,
            'supplier_name'         => $this->supplier_name,
            'supplier_phone'        => $this->supplier_phone,
            'finance_tax_amount'    => $this->finance_tax_amount,
            'finance_tax_rate'      => $this->finance_tax_rate,
            'document_type'         => $this->document_type,
            'image_path'            => $filePath,
            'category_id'           => $this->category_id,
        ]);

        foreach ($this->items as $item) {
            Item::create([
                'finance_id'           => $finance->id,
                'teams_id'             => $user->currentTeam->id, 
                'item_name'            => $item['name'],
                'item_quantity'        => $item['qty'],
                'user_id'              => Auth::id(),
                'item_unit_price'      => $item['unitPrice'],
                'item_total_amount'    => $item['totalAmount'],
            ]);
        }

        $teamId = Auth::user()->currentTeam->id;
        $teams_id = Auth::user()->currentTeam->id;

        activity()
            ->causedBy($user)

            ->performedOn($finance)
            ->withProperties([
                'action' => 'created' ,
                'team_id' => $teamId,
                'title'  => $this->finance_title,

            ])
            ->log('Finance record created');

        Log::info('Submitted Items:', $this->items);
        $this->deleteAddContent();
    }

    
    public function deleteFinance($id)
    {
        try{
            Finance::find($id)->delete();
            session()->flash('success',"Post Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }

    
    public function fetchFinance($id)
    {
        try {
            $user = Auth::user();
        
            if ($user && $user->currentTeam) {
                $finance = Finance::with('items') 
                    ->where('teams_id', $user->currentTeam->id)
                    ->where('id', $id)
                    ->latest('created_at') 
                    ->first();
    
                if (!$finance) {
                    session()->flash('error', 'Finance not found');
                } else {
 
                    $this->finance_title = $finance->finance_title;
                    $this->finance_amount = $finance->finance_amount;
                    $this->finance_description = $finance->finance_description;
                    $this->finance_purchase_date = $finance->finance_purchase_date;
                    $this->transaction_type = $finance->transaction_type;
                    $this->supplier_address = $finance->supplier_address;
                    $this->supplier_name = $finance->supplier_name;
                    $this->supplier_phone = $finance->supplier_phone;
                    $this->finance_tax_amount = $finance->finance_tax_amount;
                    $this->finance_tax_rate = $finance->finance_tax_rate;
                    $this->document_type = $finance->document_type;
                    $this->image_path = str_replace('public/', 'storage/', $finance->image_path);
                    $this->category_id = $finance->category_id;
                    $this->items = [];

                    foreach ($finance->items as $item) {
                        $this->items[] = [
                            'id' => $item['id'] ?? 'N/A',
                            'name' => $item['item_name'] ?? 'N/A',
                            'qty' => $item['item_quantity'] ?? 0,
                            'unitPrice' => $item['item_unit_price'] ?? 0,
                            'totalAmount' => $item['item_total_amount'] ?? 0,
                        ];
                    }
                }
            } else {
                session()->flash('error', 'User or current team not available');
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Something went wrong!!');
        }
    }
    
    public function updateFinance($id)
    {
        $user = Auth::user();
    
        $this->validate([
            'finance_title'         => 'required',
            'finance_amount'        => 'required|numeric',
            'finance_purchase_date' => 'required|date',
            'transaction_type'      => 'required',
            'category_id'           => 'required',
            'file'                  => 'nullable|image|max:2048',
        ], [
            'finance_title.required'         => 'The finance title is required.',
            'finance_amount.required'        => 'The finance amount is required.',
            'finance_purchase_date.required' => 'The purchase date is required.',
            'finance_purchase_date.date'     => 'Invalid date format for purchase date.',
            'transaction_type.required'      => 'The transaction type is required.',
            'category_id.required'           => 'The category is required.',
        ]);
    
        $this->finan = Finance::findOrFail($id);
    
        $filePath = optional($this->file)->store('public/finance_images');
    
        $this->finan->update([
            'finance_title'         => $this->finance_title,
            'finance_amount'        => $this->finance_amount,
            'finance_description'   => $this->finance_description,
            'finance_purchase_date' => $this->finance_purchase_date,
            'transaction_type'      => $this->transaction_type,
            'supplier_address'      => $this->supplier_address,
            'supplier_name'         => $this->supplier_name,
            'supplier_phone'        => $this->supplier_phone,
            'finance_tax_amount'    => $this->finance_tax_amount,
            'finance_tax_rate'      => $this->finance_tax_rate,
            'document_type'         => $this->document_type,
            'image_path'            => $filePath,
            'category_id'           => $this->category_id,
        ]);
    
        $this->finan = Finance::findOrFail($id);

        // Update finance attributes
        $filePath = optional($this->file)->store('public/finance_images');
        $this->finan->update([
            'finance_title'         => $this->finance_title,
            'finance_amount'        => $this->finance_amount,
            'finance_description'   => $this->finance_description,
            'finance_purchase_date' => $this->finance_purchase_date,
            'transaction_type'      => $this->transaction_type,
            'supplier_address'      => $this->supplier_address,
            'supplier_name'         => $this->supplier_name,
            'supplier_phone'        => $this->supplier_phone,
            'finance_tax_amount'    => $this->finance_tax_amount,
            'finance_tax_rate'      => $this->finance_tax_rate,
            'document_type'         => $this->document_type,
            'image_path'            => $filePath,
            'category_id'           => $this->category_id,
        ]);

        $newItemIds = [];

        foreach ($this->items as $item) {
            $itemId = $item['id'] ?? null;
            
            if ($itemId) {
                Item::where('id', $itemId)->update([
                    'item_name'         => $item['name'],
                    'item_quantity'     => $item['qty'],
                    'item_unit_price'   => $item['unitPrice'],
                    'item_total_amount' => $item['totalAmount'],
                ]);
            } else {
                $newItem = Item::create([
                    'finance_id'        => $id,
                    'teams_id'          => $user->currentTeam->id,
                    'item_name'         => $item['name'],
                    'item_quantity'     => $item['qty'],
                    'user_id'           => Auth::id(),
                    'item_unit_price'   => $item['unitPrice'],
                    'item_total_amount' => $item['totalAmount'],
                ]);

                $newItemIds[] = $newItem->id;
            }
        }

        foreach ($this->items as &$item) {
            $item['id'] = $item['id'] ?? array_shift($newItemIds);
        }

        Item::where('finance_id', $id)->whereNotIn('id', array_filter(array_column($this->items, 'id')))->delete();

    
        activity()
            ->causedBy($user)
            ->performedOn($this->finan)
            ->withProperties([
                'action'  => 'updated',
                'team_id' => $user->currentTeam->id,
                'title'   => $this->finance_title,
            ])
            ->log('Finance record updated');
    }
    

}
