<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Finance;
use Illuminate\Support\Facades\Auth;

class FinancePost extends Component
{
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

    protected $rules = [
        'finance_title' => 'required|string',
        'finance_amount' => 'required|numeric',
        'finance_description' => 'nullable|string',
        'finance_purchase_date' => 'required|date',
        'transaction_type' => 'required|string',
        'supplier_address' => 'nullable|string',
        'supplier_name' => 'nullable|string',
        'supplier_phone' => 'nullable|string',
        'finance_tax_amount' => 'nullable|numeric',
        'finance_tax_rate' => 'nullable|numeric',
        'document_type' => 'nullable|string',
        'image_path' => 'nullable|string',
        'category_id' => 'nullable|numeric',
        'file_id' => 'nullable|numeric',
    ];

    public function render()
    {
        return view('livewire.finance-post');
    }

    public function createFinanceRecord()
    {
        // Set teams_id to the current user's team ID
        $this->teams_id = Auth::user()->currentTeam->id;

        $this->validate();

        Finance::create([
            'user_id' => Auth::id(),
            'teams_id' => $this->teams_id,
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

        session()->flash('message', 'Finance record created successfully.');
    }
}
