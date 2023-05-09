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
    public $projet;
    public $content;
    public $amount;
    public $modal = false;
    public $response = null;
    public $delai;
    protected $listeners = ['refresh' => '$refresh'];

    public function mount($id)
    {
        //dd(auth()->user()->getIdFreelance());
        $this->projet = Project::find($id);
        $this->response = ProjectResponse::where('project_id', $id)->where('freelance_id', auth()->user()->getIdFreelance())->first();
        //dd($this->response);
    }


    public function openModal()
    {
        $this->modal = true;
    }

    public function sendResponse()
    {


        $this->validate([
            'content' => 'required',

        ]);


        $data = ProjectResponse::create([
            'project_id' => $this->projet->id,
            'freelance_id' => auth()->user()->getIdFreelance(),
            'content' => $this->content,
            'bid_amount' => $this->amount ? $this->amount : $this->projet->bid_amount,
        ]);

        $Project = Project::where('id', $data->project_id)->first();


        $this->reset('content', 'amount');

        $this->modal = false;

        if ($data) {


            $this->notification()->success(
                $title = "Proposition",
                $description = "Votre proposition a ete envoyer avec success vous recevrez des notifications sur l'etat de votre proposition",
            );

            event(new ProjectResponseFreelance($data));

            $this->emitSelf('refresh');
        }
    }


    public function render()
    {
        return view('livewire.freelance.mission.mission-view-one')->extends('layouts.freelanceTest2')->section('content');
    }
}