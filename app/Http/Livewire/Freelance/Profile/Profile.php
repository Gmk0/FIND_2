<?php

namespace App\Http\Livewire\Freelance\Profile;

use App\Models\Freelance;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class Profile extends Component
{
    use Actions;
    public $freelance = [];
    public $user = [];
    public $freelanceArray;
    public $freelanceUpdate;
    public $userUpdate;
    public $selected = ['name' => "", "level" => ""];
    public $langue = [
        'langue' => "",
        'level' => "",
    ];

    public $compentences = [
        'skill' => "",
        'level' => "",
    ];
    public $diplome = [
        'universite' => "",
        'diplome' => "",
        'annee' => "",
    ];
    public $diplomeEdit = false;

    public $certificate = [
        'certificate' => "",
        'delivrer' => "",
        'annee' => "",
    ];




    protected  $listeners = ['refresh' => '$refresh'];



    public function mount()
    {
        $this->freelanceUpdate = Freelance::Find(auth()->user()->getIdFreelance());

        $this->userUpdate = User::find(auth()->user()->id);
        //dd($this->freelanceUpdate->localisation['avenue']);
    }

    public function updateFirts()
    {

        $this->validate([
            'user.name' => 'required|string',
            'user.phone' => 'required|numeric',
            'freelance.nom' => 'required|string',
            'freelance.prenom' => 'required|string',
            'freelance.taux_journalier' => 'required|numeric',
            'freelance.experience' => 'required',
        ]);



        $this->freelanceUpdate->nom = $this->freelance['nom'];
        $this->freelanceUpdate->prenom = $this->freelance['prenom'];
        $this->freelanceUpdate->taux_journalier = $this->freelance['taux_journalier'];
        $this->freelanceUpdate->experience = $this->freelance['experience'];
        $this->freelanceUpdate->update();

        $this->userUpdate->name = $this->user['name'];
        $this->userUpdate->phone = $this->user['phone'];

        $this->userUpdate->update();

        if ($this->userUpdate && $this->freelanceUpdate) {

            $this->notification()->success(
                $title = "Modifier",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        } else {
            $this->notification()->error(
                $title = "Erreur",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        }

        $this->emitSelf('refresh');
    }


    public function updateLocalisation()
    {

        $this->validate([
            'freelance.localisation.avenue' => 'required|string',
            'freelance.localisation.ville' => 'required|string',
            'freelance.localisation.commune' => 'required|string',
            'freelance.site' => 'required',
        ]);



        //dd($this->freelanceUpdate->localisation['avenue']);

        $this->freelanceUpdate->localisation['avenue'] = $this->freelance['localisation']['avenue'];
        $this->freelanceUpdate->localisation['ville'] = $this->freelance['localisation']['ville'];
        $this->freelanceUpdate->localisation['commune'] = $this->freelance['localisation']['commune'];
        $this->freelanceUpdate->site = $this->freelance['site'];
        $this->freelanceUpdate->update();

        /* $this->freelanceUpdate->update([
            'localisation->avenue' => $this->freelance['localisation']['avenue'],
            'localisation->ville' => $this->freelance['localisation']['ville'],
            'localisation->commune' => $this->freelance['localisation']['commune'],
            'site' => $this->freelance['site'],
        ]);  */

        if ($this->freelanceUpdate) {

            $this->notification()->success(
                $title = "Modifier",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        } else {
            $this->notification()->error(
                $title = "Erreur",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        }

        $this->emitSelf('refresh');
    }


    public function modifierLangue(Int $key)
    {
        $this->validate([
            'freelance.langue.' . $key . '.name' => 'required|string',
            'freelance.langue.' . $key . '.level' => 'required|string',

        ]);
        // dd($this->freelance['langue'][$key]['name']);


        $this->freelanceUpdate->langue[$key]['name'] = $this->freelance['langue'][$key]['name'];
        $this->freelanceUpdate->langue[$key]['level'] = $this->freelance['langue'][$key]['level'];
        $this->freelanceUpdate->update();

        if ($this->freelanceUpdate) {

            $this->notification()->success(
                $title = "Modifier",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        } else {
            $this->notification()->error(
                $title = "Erreur",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        }

        $this->emitSelf('refresh');


        // dd($key);
    }

    public function modalLangue(Int $key)
    {
        $this->validate([
            'freelance.langue.' . $key . '.name' => 'required|string',
            'freelance.langue.' . $key . '.level' => 'required|string',

        ]);


        // dd($this->freelance['langue'][$key]['name']);


        $this->freelanceUpdate->langue[$key]['name'] = $this->freelance['langue'][$key]['name'];
        $this->freelanceUpdate->langue[$key]['level'] = $this->freelance['langue'][$key]['level'];
    }



    public function addLanguage()
    {



        $this->validate([
            'selected.name' => 'required',
            'selected.level' => 'required',

        ]);

        //dd($this->selected['name']);

        $data = $this->freelanceUpdate->langue;
        $data[] = $this->selected;
        $this->freelanceUpdate->langue = $data;
        $this->freelanceUpdate->update();

        $this->selected = null;
        if ($this->freelanceUpdate) {

            $this->notification()->success(
                $title = "Modifier",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        } else {
            $this->notification()->error(
                $title = "Erreur",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        }

        $this->emitSelf('refresh');
    }

    public function modifierDiplome(Int $key)
    {

        $this->validate([
            'diplome.diplome' => 'required|string',
            'diplome.universite' => 'required|string',
            'diplome.annee' => 'required|numeric',

        ]);
        // dd($this->freelance['langue'][$key]['name']);


        $this->freelanceUpdate->diplome[$key]['diplome'] = $this->diplome['diplome'];
        $this->freelanceUpdate->diplome[$key]['universite'] = $this->diplome['universite'];

        $this->freelanceUpdate->diplome[$key]['annee'] = $this->diplome['annee'];
        $this->freelanceUpdate->update();

        if ($this->freelanceUpdate) {

            $this->diplomeEdit = false;
            $this->notification()->success(
                $title = "Modifier",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        } else {
            $this->notification()->error(
                $title = "Erreur",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        }

        $this->emitSelf('refresh');
    }

    public function modalDiplome($key)
    {

        $this->diplome['diplome'] = $this->freelanceUpdate->diplome[$key]['diplome'];
        $this->diplome['universite'] = $this->freelanceUpdate->diplome[$key]['universite'];

        $this->diplome['annee'] = $this->freelanceUpdate->diplome[$key]['annee'];


        $this->diplomeEdit = true;
    }


    public function modifierCertificate(Int $key)
    {

        $this->validate([
            'certificate.certificate' => 'required|string',
            'certificate.delivrer' => 'required|string',
            'certificate.annee' => 'required|numeric',

        ]);
        // dd($this->freelance['langue'][$key]['name']);


        $this->freelanceUpdate->certificat[$key]['certificate'] = $this->certificate['certificate'];
        $this->freelanceUpdate->certificat[$key]['delivrer'] = $this->certificate['delivrer'];

        $this->freelanceUpdate->certificat[$key]['annee'] = $this->certificate['annee'];
        $this->freelanceUpdate->update();

        if ($this->freelanceUpdate) {

            $this->notification()->success(
                $title = "Modifier",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        } else {
            $this->notification()->error(
                $title = "Erreur",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        }

        $this->emitSelf('refresh');
    }
    public function modifierCompentences(Int $key)
    {

        $this->validate([
            'competences.skill' => 'required|string',
            'competences.level' => 'required|string',


        ]);
        // dd($this->freelance['langue'][$key]['name']);


        $this->freelanceUpdate->competences[$key]['skill'] = $this->competences['skill'];
        $this->freelanceUpdate->competences[$key]['level'] = $this->competences['level'];


        $this->freelanceUpdate->update();

        if ($this->freelanceUpdate) {

            $this->notification()->success(
                $title = "Modifier",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        } else {
            $this->notification()->error(
                $title = "Erreur",
                $description = "Vos Modifications ont ete envoyer avec success",
            );
        }

        $this->emitSelf('refresh');
    }



    public function render()
    {
        $this->user = User::find(auth()->user()->id)->toArray();
        $this->freelance = Freelance::find(auth()->user()->getIdFreelance())->toArray();
        // dd($this->freelance);
        $this->freelanceArray = Freelance::find(auth()->user()->getIdFreelance());
        // dd($this->freelance);
        return view('livewire.freelance.profile.profile')->extends('layouts.freelanceTest2')->section('content');
    }
}