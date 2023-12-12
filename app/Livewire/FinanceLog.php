<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class FinanceLog extends Component
{
    public $teamHistoryLog;

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
        return view('livewire.finance-log');
    }
}
