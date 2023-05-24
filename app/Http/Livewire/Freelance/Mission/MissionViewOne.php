<?php

namespace App\Http\Livewire\Freelance\Mission;

use App\Events\ProjectResponseFreelance;
use App\Models\Project;
use Livewire\Component;
use App\Models\ProjectResponse;
use WireUi\Traits\Actions;

class MissionViewOne extends Component
{
    use Actions;
    public Project $projet;

    public $content;
    public $amount;
    public $modal = false;
    public $modalEdit = false;
    public $response = null;
    public $delai;
    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        //dd(auth()->user()->getIdFreelance());

        $this->response = ProjectResponse::where('project_id', $this->projet->id)->where('freelance_id', auth()->user()->getIdFreelance())->first();
        //dd($this->response);
    }


    public function openModal()
    {
        $this->modal = true;
    }

    public function sendResponse()
    {

        try {

            $this->validate([
                'content' => 'required',

            ]);

            if (empty($this->response)) {



                $data = ProjectResponse::create([
                    'project_id' => $this->projet->id,
                    'freelance_id' => auth()->user()->getIdFreelance(),
                    'content' => $this->content,
                    'bid_amount' => $this->amount ? $this->amount : $this->projet->bid_amount,
                ]);

                //$data->notifyUser();


            }

            $this->reset('content', 'amount');

            $this->modal = false;



            if ($data) {


                $this->notification()->success(
                    $title = "Proposition",
                    $description = "Votre proposition a ete envoyer avec success vous recevrez des notifications sur l'etat de votre proposition",
                );
            }

            $this->emitSelf('refresh');
        } catch (\Exception $e) {

            $this->dispatchBrowserEvent('error', [
                'message' => $e->getMessage()
            ]);
        }
    }

    public function modalEdit()
    {

        $this->content = $this->response->content;
        $this->amount = $this->response->bid_amount;

        $this->dispatchBrowserEvent('open');

        $this->modalEdit = true;
        $this->modal = true;
    }


    public function editResponse()
    {

        try {

            $this->validate([
                'content' => 'required',

            ]);

            if (!empty($this->response)) {


                $this->response->content = $this->content;
                $this->response->content = $this->amount ? $this->amount : $this->projet->bid_amount;

                $$this->response->update();
                $data->notifyUser();
            }

            $this->reset('content', 'amount');

            $this->modal = false;




            $this->notification()->success(
                $title = "Proposition",
                $description = "Votre proposition a ete envoyer avec success vous recevrez des notifications sur l'etat de votre proposition",
            );
            $this->emitSelf('refresh');
        } catch (\Exception $e) {

            $this->dispatchBrowserEvent('error', [
                'message' => $e->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.freelance.mission.mission-view-one')->extends('layouts.freelanceTest2')->section('content');
    }
}
