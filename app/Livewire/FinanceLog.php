<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;
use Livewire\WithPagination;

class FinanceLog extends Component
{
    use WithPagination;

    public $teamHistoryLog;

 

    public function render()
    {
        $currentTeamId = Auth::user()->currentTeam->id;
        $user = User::find(Auth::id());
        return view('livewire.finance-log', [
            'teamHistory' => Activity::
            where('properties->team_id', $currentTeamId)
            ->latest('created_at')
            ->paginate(10),
        ]);
    }
}
