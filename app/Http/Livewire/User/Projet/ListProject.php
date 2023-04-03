<?php

namespace App\Http\Livewire\User\Projet;

use Livewire\Component;
use App\Models\Project;
 use Livewire\WithPagination;

class ListProject extends Component
{
  use WithPagination;
    protected $paginationTheme = 'tailwind';  

    public function render()
    {
        return view('livewire.user.projet.list-project',[
            'projets'=>Project::where('user_id',auth()->user()->id)->paginate(10),
            ])->extends('layouts.userProfile')->section('content');
    }
}
