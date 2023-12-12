<?php

namespace App\Livewire;
// app/Http/Livewire/FinanceCrud.php

use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\Finance;

class FinanceComponent extends Component
{
    public $finances;
    public $financeId;
    public $financeTitle;
    public $financeAmount;
    public $selectedFinance; // Add this property

    protected $rules = [
        'financeTitle' => 'required|string|max:255',
        'financeAmount' => 'required|numeric',
    ];
    public function getTeamFinance()
    {
        $user = Auth::user();
    
        if ($user && $user->currentTeam) {
            $this->finances = Finance::with('items') 
                ->where('teams_id', $user->currentTeam->id)
                ->latest('created_at')

                ->get();
        } else {
            $this->finances = collect();
        }
    }
    
    public function mount()
    {
        $this->getTeamFinance();
    }

    public function showFinanceModal($financeId)
    {
        $this->selectedFinance = Finance::find($financeId);
        $this->emit('openFinanceModal'); // Emit an event to open the modal
    }
    public function render()
    {
        $this->getTeamFinance();

        return view('livewire.finance-component');
    }
}
