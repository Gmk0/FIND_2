<?php

namespace App\Http\Livewire\User\Projet;

use Livewire\Component;

use App\Models\ProjectResponse;
use App\Events\ProjectResponse as Response;
use App\Models\Project;
use WireUi\Traits\Actions;

class PropositionProjet extends Component
{
    use Actions;
    public Project $projet;
    public $proposition;
    public $proposition_id;

    protected $listeners = ['refresh' => '$refresh'];



    public function accepter($id)
    {

        try {



            // $Response = ProjectResponse::find($id)->update(['status' => 'approved']);
            $Response = ProjectResponse::find($id);
            $Response->status = 'accepter';

            $Response->update();
            $Response->notifyFreelance();
            $projet = Project::findOrFail($Response->project_id)->update(['status' => 'active', 'visible' => 0]);




            $this->notification()->success(
                $title = "Proposition",
                $description = "Vous avez approuver la proposition",
            );

            event(new Response($Response));

            $this->emitSelf('refresh');
        } catch (\Exception $e) {
        }
    }

    public function refuser($id)
    {

        $Response = ProjectResponse::findOrfail($id);
        $Response->status = 'rejected';
        $Response->update();
        $Response->notifyFreelance();

        $this->notification()->success(
            $title = "Proposition",
            $description = "Vous avez rejeter la proposition",
        );


        event(new Response($Response));
    }

    public function render()
    {
        $this->proposition = ProjectResponse::where('project_id', $this->projet->id)->get();
        return view('livewire.user.projet.proposition-projet')->layout('layouts.user-profile2');
    }
}
