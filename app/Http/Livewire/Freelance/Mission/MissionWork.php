<?php

namespace App\Http\Livewire\Freelance\Mission;

use Livewire\Component;
use App\Models\Project;

class MissionWork extends Component
{
    public $projet;


    public function mount($id)
    {
        $this->projet = Project::find($id);
    }


    public function render()
    {
        return view('livewire.freelance.mission.mission-work')->extends('layouts.freelanceTest')->section('content');
    }
}
