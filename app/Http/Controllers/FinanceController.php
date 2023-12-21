<?php
// app/Http/Controllers/FinanceController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    public function store(Request $request)
    {
        $teams_id = Auth::user()->currentTeam->id;

        $request->validate([
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
            'document_type' => 'required|numeric',
            'image_path' => 'nullable|string',
            'category_id' => 'required|numeric',
            'file_id' => 'nullable|numeric',
        ]);

        $finance = Finance::create([
            'user_id' => Auth::id(),
            'teams_id' => $teams_id,
            'finance_title' => $request->input('finance_title'),
            'finance_amount' => $request->input('finance_amount'),
            'finance_description' => $request->input('finance_description'),
            'finance_purchase_date' => $request->input('finance_purchase_date'),
            'transaction_type' => $request->input('transaction_type'),
            'supplier_address' => $request->input('supplier_address'),
            'supplier_name' => $request->input('supplier_name'),
            'supplier_phone' => $request->input('supplier_phone'),
            'finance_tax_amount' => $request->input('finance_tax_amount'),
            'finance_tax_rate' => $request->input('finance_tax_rate'),
            'document_type' => $request->input('document_type'),
            'image_path' => $request->input('image_path'),
            'category_id' => $request->input('category_id'),
            'file_id' => $request->input('file_id'),
            
        ]);
        $teamId = Auth::user()->currentTeam->id;

        activity()
            ->causedBy( $teamId)
            ->performedOn($finance)
            ->withProperties([
                'action' => 'created' ,
                'team_id' => $teams_id,
                'attributes' => $request->except('_token'),

            ])
            ->log('Finance record created');

        return redirect()->route('add')->with('message', 'Finance record created successfully.');
    }
    public function destroy(Request $request)
    {
        $id = $request->input('id'); 
    
        $finance = Finance::findOrFail($id);
    
        $finance->delete();
    
        $teamId = Auth::user()->currentTeam->id;
    
        activity()
            ->causedBy($teamId)
            ->performedOn($finance)
            ->withProperties([
                'action' => 'deleted',
                'team_id' => $teamId,
            ])
            ->log('Finance record deleted');
    
        return redirect()->route('livewire.dashboard')->with('message', 'Finance record deleted successfully.');
    }
    
}
