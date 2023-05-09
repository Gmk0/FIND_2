<?php

namespace App\Http\Livewire\User\Projet;


use App\Models\Project;
use App\Models\SubCategory;
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\{FileUpload};
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class CreateProject extends  Component implements Forms\Contracts\HasForms
{
    use WithFileUploads;

    public $project;
    public $files = [];
    public $category;
    public $currency;
    public $dateD;
    public $dateF;
    public $sous_category;

    use Forms\Concerns\InteractsWithForms;
    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('files')

                ->multiple()
                ->required(), // ...
        ];
    }

    public function mount()
    {
        $this->form->fill();
    }


    public function register()
    {
        $this->validate([
            'project.description' => 'required',
            'project.title' => 'required',
            'dateF' => 'required',
            'dateD' => 'required',
            'currency' => 'required',
            'category' => 'required'
        ]);



        $files = $this->addImage($this->files) ? $this->addImage($this->files) : null;

        $data = [
            'title' => $this->project['title'],
            //'user_id'=>Auth::user()->id,
            'category_id' => $this->category,
            // 'sub_category'=>$this->sous_category,
            'description' => $this->project['title'],
            'bid_amount' => $this->currency,
            'files' => $files,
            'begin_project' => $this->dateD,
            'end_project' => $this->dateF,
        ];

        //dd($data);

        $results = Project::create($data);

        $this->resetAll();

        if ($results) {

            $this->dispatchBrowserEvent('success', [
                'message' => "Votre Projet a ete soumis avec succees vous pouvez suivre l'evolution et les proposition dans"
            ]);


            $this->resetAll();
        }
    }

    function resetAll()
    {
        $this->project = [];
        $this->files = null;
        $this->category = null;
        $this->currency = null;
        $this->dateD = null;
        $this->dateF = null;
    }

    public function addImage($files)
    {
        $fileNames = [];

        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();

            $file->storeAs('Project', $fileName);
            $fileNames[] = $fileName;
        }
        return $fileNames;
    }
    public function render()
    {
        return view('livewire.user.projet.create-project')->extends('layouts.user')->section('content');
    }
}