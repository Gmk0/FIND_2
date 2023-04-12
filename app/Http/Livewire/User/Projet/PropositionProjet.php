<?php

namespace App\Http\Livewire\User\Projet;

use Livewire\Component;

use App\Models\ProjectResponse;
use App\Events\ProjectResponse as Response;
use WireUi\Traits\Actions;

class PropositionProjet extends Component
{
    use Actions;
    public $proposition;
    public $proposition_id;


    public function mount($id)
    {
        $this->proposition_id = $id;
    }

    public function accepter($id)
    {

        // $Response = ProjectResponse::find($id)->update(['status' => 'approved']);
        $Response = ProjectResponse::find($id);
        $Response->status = 'approved';
        $Response->update();

        $this->notification()->success(
            $title = "Proposition",
            $description = "Vous avez approuver la proposition",
        );
    }

    public function refuser($id)
    {

        $Response = ProjectResponse::findOrfail($id);
        $Response->status = 'rejected';
        $Response->update();

        $this->notification()->success(
            $title = "Proposition",
            $description = "Vous avez rejeter la proposition",
        );
        broadcast(new Response($Response));
    }

    public function render()
    {
        $this->proposition = ProjectResponse::where('project_id', $this->proposition_id)->get();
        return view('livewire.user.projet.proposition-projet')->extends('layouts.userProfile')->section('content');
    }
}
