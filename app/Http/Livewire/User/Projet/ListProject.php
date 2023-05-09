<?php

namespace App\Http\Livewire\User\Projet;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class ListProject extends Component
{
    use WithPagination;
    use Actions;
    protected $paginationTheme = 'tailwind';

    public $deleteProjet;
    public $idProjet;
    public $modalEdit;

    protected $listeners = ['refresh' => '$refresh'];

    public $Projet;
    public $editProjet = [
        'title' => "",
        'description' => "",
        'bid_amount' => null,
        'begin_project' => null,
        'end_project' => null,
    ];

    public function openModal($id)
    {
        $this->idProjet = $id;

        $this->deleteProjet = true;
    }

    public function openModalEdit($id)
    {
        $this->idProjet = $id;

        $this->Projet = Project::find($id);
        if ($this->Projet != null) {

            $this->editProjet = [
                'title' => $this->Projet->title,
                'description' => $this->Projet->description,
                'bid_amount' => intval($this->Projet->bid_amount),
                'begin_project' => $this->Projet->begin_project,
                'end_project' => $this->Projet->end_project,
            ];

            $this->modalEdit = true;
        }
    }

    public function cancelEdit()
    {
        $this->modalEdit = false;
        $this->editProjet = [
            'title' => "",
            'description' => "",
            'bid_amount' => null,
            'begin_project' => null,
            'end_project' => null,
        ];
    }

    public function modifier()
    {
        $this->validate([
            'editProjet.title' => 'required',
            'editProjet.description' =>
            'required',
            'editProjet.bid_amount' =>
            'required',
            'editProjet.begin_project' =>
            'required',
            'editProjet.end_project' =>
            'required',
        ]);

        try {
            $this->Projet->title = $this->editProjet['title'];
            $this->Projet->description = $this->editProjet['description'];
            $this->Projet->bid_amount =  $this->editProjet['bid_amount'];
            $this->Projet->begin_project = $this->editProjet['begin_project'];
            $this->Projet->end_project = $this->editProjet['end_project'];

            $this->Projet->update();

            $this->notification()->success(
                $title = "Mission modifier"
            );

            $this->emitSelf('refresh');

            $this->modalEdit = false;
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('error', [
                'message' => "  Erreur survenue lors de la modification de la mission si le problem persiste veuilez contacter le service   Client",
            ]);
        }
    }


    public function delete()
    {
        try {
            $Projet = Project::find($this->idProjet)->delete();
            $this->deleteProjet = false;
            $this->notification()->success(
                $title = "Mission supprimer"
            );
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('error', [
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.user.projet.list-project', [
            'projets' => Project::where('user_id', auth()->user()->id)->paginate(10),
        ])->extends('layouts.userProfile')->section('content');
    }
}