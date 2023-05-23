<?php

namespace App\Http\Livewire\Freelance\Mission;

use App\Models\Project;
use Livewire\Component;

class MissionList extends Component
{

    public function mount()
    {
    }

    public function render()
    {
        $category = auth()->user()->freelance->category_id;
        return view('livewire.freelance.mission.mission-list', [
            'projets' => Project::where('status', 'en attente')->paginate(10),
        ])->extends('layouts.freelanceTest2')->section('content');
    }
}
