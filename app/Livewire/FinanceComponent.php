<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\ImportedFile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Finance;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;

class FinanceComponent extends Component
{
    public $finances;
    public $categories;
    public $user_id;
    public $teams_id;
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
    public $file_id;
    public $teamHistoryLog;
    public $messages;

    protected $rules = [
        'finance_title' => 'required|string',
        'finance_amount' => 'required|numeric',
        'finance_description' => 'nullable|string',
        'finance_purchase_date' => 'required|date',
        'transaction_type' => 'required|string',
        'supplier_address' => 'nullable|string',
        'supplier_name' => 'nullable|string',
        'supplier_phone' => 'nullable|numeric',
        'finance_tax_amount' => 'nullable|numeric',
        'finance_tax_rate' => 'nullable|numeric',
        'document_type' => 'nullable|string',
        'image_path' => 'nullable|string',
        'category_id' => 'nullable|numeric',
        'file_id' => 'nullable|string',
    ];

        public function resetFields()
    {
        $this->finance_title = '';
        $this->finance_amount = '';
        $this->finance_description = '';
        $this->finance_purchase_date = '';
        $this->transaction_type = '';
        $this->supplier_address = '';
        $this->supplier_name = '';
        $this->supplier_phone = '';
        $this->finance_tax_amount = '';
        $this->document_type = '';
        $this->image_path = '';
        $this->category_id = '';
        $this->file_id = '';

    }


    public function removeItem($id)
    {
        $this->finance->items->forget($id);
    }

        public function getTeamFinance()
    {
        $user = Auth::user();

        if ($user && $user->currentTeam) {
            $this->finances = Finance::with(['items' => function ($query) {
                    $query->take(5); 
                }])
                ->where('teams_id', $user->currentTeam->id)
                ->latest('created_at') // This line has been modified
                ->get();
        } else {
            $this->finances = collect();
        }
    }

    public function getFinance($id){
        try {
            $finance= Finance::findOrFail($id);
            if( !$finance) {
                session()->flash('error','Post not found');
            } else {
                $this->finance_title = $finance->finance_title;
                $this->document_type = $finance->document_type;
                $this->finance_amount = $finance->finance_amount;
                $this->finance_description = $finance->finance_description;
                $this->finance_purchase_date = $finance->finance_purchase_date;
                $this->supplier_address = $finance->supplier_address;
                $this->supplier_name = $finance->supplier_name;
                $this->supplier_phone = $finance->supplier_phone;
                $this->finance_tax_amount = $finance->finance_tax_amount;
                $this->finance_tax_rate = $finance->finance_tax_rate;
                $this->document_type = $finance->document_type;
                $this->image_path = $finance->image_path;
                $this->category_id = $finance->category_id;
                $this->file_id = $finance->file_id;
                
            }
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
    public function Delete($id)
    {
        try{
            Finance::find($id)->delete();
            session()->flash('success',"Post Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }
    
    public function updatePost($id)
    {
        try {
            Finance::find($id)->update([
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
                'image_path' => $this->image_path,
                'category_id' => $this->category_id,
                'file_id' => $this->file_id,
            ]);
            Log::info('Post updated successfully.');
            session()->flash('success','Post Updated Successfully!!');
            $this->resetFields();
        } catch (\Exception $ex) {
            Log::error('Error updating post: ' . $ex->getMessage());

            session()->flash('success','Something goes wrong!!');
        }
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
    }
    
    public function redirectToAdd()
        {
            return redirect()->route('add');
        }

        public function mount()
        {
            $currentTeamId = Auth::user()->currentTeam->id;
            $user = User::find(Auth::id());
            $this->teamHistoryLog = Activity::
                where('properties->team_id', $currentTeamId)
                ->latest('created_at')
                ->get();
        }

        public function render()
        {
            $user = Auth::user();
            $importedFiles = ImportedFile::where('teams_id', $user->currentTeam->id)->orderBy('created_at', 'desc')->get();
        
            $this->getTeamFinance();
            $this->getCategory();
            $this->messages = Message::where('teams_id', $user->currentTeam->id)
                ->orderBy('created_at', 'desc')
                ->get();
        
            return view('livewire.finance-component', compact('importedFiles'));
        }
        
    public function deleteMessage($id)
    {
        try {
            $message = Message::find($id);
            $message->replies()->delete();
            $message->delete();
    
            session()->flash('success', "Post Deleted Successfully!!");
        } catch (\Exception $e) {
            session()->flash('error', "Something went wrong!!");
        }
    }


    public function deleteFile($fileId)
    {
        $importedFile = ImportedFile::findOrFail($fileId);
    
        activity()
            ->causedBy(Auth::user())
            ->performedOn($importedFile)
            ->withProperties([
                'action'  => 'Deleted',
                'team_id' => Auth::user()->currentTeam->id,
                'title'   => $importedFile->file_name,
            ])
            ->log('Deleted a File');
    
        $importedFile->delete();

        session()->flash('message', 'File deleted successfully!');
    }
    

    public function downloadFile($fileId)
    {
        $importedFile = ImportedFile::findOrFail($fileId);
    
        $tempFilePath = tempnam(sys_get_temp_dir(), 'download');
    
        file_put_contents($tempFilePath, $importedFile->file_path);
    
        return response()->download($tempFilePath, $importedFile->file_name)->deleteFileAfterSend(true);
        
    }
    


}
