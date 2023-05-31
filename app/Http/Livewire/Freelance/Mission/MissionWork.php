<?php

namespace App\Http\Livewire\Freelance\Mission;

use App\Events\ProgressOrderEvent;
use App\Models\FeedbackService;
use Livewire\Component;
use App\Models\Project;
use App\Models\ProjectResponse;
use WireUi\Traits\Actions;

class MissionWork extends Component

{
    use Actions;
    public ProjectResponse $projetResponse;
    public Project $projet;
    public $progress;
    public $jour;
    public $description;
    public $publier;
    public $projetUpdate;


    public $status;
    protected $listeners = ['refresh' => '$refresh'];



    public function mount()
    {



        $this->publier = $this->projet->feedbackProjet->is_publish ? $this->projet->feedbackProjet->is_publish : 0;


        $this->status = $this->projet->feedbackProjet?->etat;

        $this->jour = $this->projet->feedbackProjet?->delai_livraison_estimee;
        $this->progress = $this->projet->progress;
    }



    public function toogle()
    {


        $id = $this->projet->id;

        $data = FeedbackService::where('projet_id', $id)->first();
        $data->is_publish = $this->publier;
        $data->update();

        if ($data) {

            $this->notification()->success(
                $title = "Feedback modifier",

            );
        }
    }


    public function modLivre()
    {

        $this->validate([
            'progress' => 'required',
            'status' => 'required',
            'jour' => 'required',
        ]);


        if ($this->projet->progress > $this->progress) {



            $this->notification()->error(
                $title = "Gestion commande",
                $description = "La progression ne doit etre inferieur a l'ancienne progression qui etait de " . $this->projet->progress . "%",
            );

            $this->emitSelf('refresh');
        } else {

            try {

                $id = $this->projet->id;

                $data = FeedbackService::where('project_id', $id)->first();

                //dd($data);

                $data->etat = $this->status;
                $data->delai_livraison_estimee = $this->jour;
                $data->update();



                $this->projet->progress = $this->progress;

                $this->projet->update();
                $data->notifyUserProjet();


                // broadcast(new ($data));


                broadcast(new ProgressOrderEvent($data));



                if ($data) {

                    $this->notification()->success(
                        $title = "Gestion commande",
                        $description = "Vos Modifications ont ete envoyer avec success",
                    );
                }
                // $this->reset('progress', 'jour', 'status');

                $this->emitSelf('refresh');
            } catch (\Exception $e) {
                // dd($e->getMessage());

                $this->dispatchBrowserEvent('error', [
                    'message' => "Une erreur est survenue si le probleme persiste veuillez contacter le support technique"
                ]);
            }
        }



        //$this->emit('feedbackUpdated', $this->progress, $this->status, $this->jour);
    }


    public function render()
    {
        $this->projet;



        return view('livewire.freelance.mission.mission-work', ['projetView' => Project::where('id', $this->projetResponse->project_id)->first()]);
    }
}
