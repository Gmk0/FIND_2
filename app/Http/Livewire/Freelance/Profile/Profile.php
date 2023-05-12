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
    public $langueEdit = false;
    public $langue = [
        'langue' => "",
        'level' => "",
    ];
    public $langueSelected = [
        'langue' => "",
        'level' => "",
    ];

    public $competences = [
        'skill' => "",
        'level' => "",
    ];
    public $compentencesEdit = false;
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

    public $compte = [
        'comptes',
        'lien'
    ];
    public $modalCompte = false;
    public $certificateEdit = false;
    public $date;




    protected  $listeners = ['refresh' => '$refresh'];



    public function mount()
    {
        $this->freelanceUpdate = Freelance::Find(auth()->user()->getIdFreelance());


        $this->userUpdate = User::find(auth()->user()->id);
        $this->date = $this->dateAnne();
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


    //Langue

    public function modifierLangue(Int $key)
    {
        try {

            $this->validate([
                'langue.langue' => 'required',
                'langue.level' => 'required',

            ]);
            // dd($this->langue['name']);



            $this->freelanceUpdate->langue[$key]['langue'] = $this->langue['langue'];
            $this->freelanceUpdate->langue[$key]['level'] = $this->langue['level'];
            $this->freelanceUpdate->update();

            if ($this->freelanceUpdate) {


                $this->dispatchBrowserEvent('close');
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
        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }

    public function modalLangue(Int $key)
    {
        $this->langue = [
            'langue' => $this->freelanceUpdate->langue[$key]['langue'],
            'level' => $this->freelanceUpdate->langue[$key]['level'],
        ];

        // dd($this->langue['name']);
    }



    public function addLanguage()
    {



        $this->validate([
            'langueSelected.langue' => 'required',
            'langueSelected.level' => 'required',

        ]);

        //dd($this->selected['name']);

        $data = $this->freelanceUpdate->langue;
        $data[] = $this->langueSelected;
        $this->freelanceUpdate->langue = $data;
        $this->freelanceUpdate->update();

        $this->dispatchBrowserEvent('close');

        $this->reset('langue');

        $this->emitSelf('refresh');
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
    }
    public function addComptes()
    {



        $this->validate([
            'compte.comptes' => 'required',
            'compte.lien' => 'required',

        ]);

        //dd($this->selected['name']);

        $data = $this->freelanceUpdate->comptes;
        $data[] = $this->compte;
        $this->freelanceUpdate->comptes = $data;
        $this->freelanceUpdate->update();

        $this->dispatchBrowserEvent('close');

        $this->reset('compte');

        $this->emitSelf('refresh');
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
    }
    public function addDiplome()
    {



        $this->validate([
            'diplome.universite' => "required",
            'diplome.diplome' => "required",
            'diplome.annee' => "required",

        ]);

        //dd($this->selected['name']);

        $data = $this->freelanceUpdate->diplome;
        $data[] = $this->diplome;
        $this->freelanceUpdate->diplome = $data;
        $this->freelanceUpdate->update();

        $this->dispatchBrowserEvent('close');

        $this->reset('diplome');

        $this->emitSelf('refresh');
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
    }

    public function addCertificate()
    {



        $this->validate([
            'compte.compte' => 'required',
            'compte.lien' => 'required',

        ]);

        //dd($this->selected['name']);

        $data = $this->freelanceUpdate->comptes;
        $data[] = $this->compte;
        $this->freelanceUpdate->comptes = $data;
        $this->freelanceUpdate->update();

        $this->dispatchBrowserEvent('close');

        $this->reset('langue');

        $this->emitSelf('refresh');
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
    }

    public function remove($key, string $langue)
    {


        switch ($langue) {
            case 'Langue':


                $data = $this->freelanceUpdate->langue->toArray();



                unset($data[$key]);
                $data = array_values($data);
                $this->freelanceUpdate->langue = $data;
                $this->freelanceUpdate->update();
                $this->emitSelf('refresh');

                $this->notification()->success(
                    $title = "Supprimmer",
                    $description = "",
                );


                //unset($this->selectedLanguages[$key]);
                //$this->selectedLanguages = array_values($this->selectedLanguages);

                break;
            case 'universite':

                $data = $this->freelanceUpdate->diplome->toArray();

                unset($data[$key]);
                $data = array_values($data);
                $this->freelanceUpdate->diplome = $data;
                $this->freelanceUpdate->update();
                $this->emitSelf('refresh');

                $this->notification()->success(
                    $title = "Supprimmer",
                    $description = "",
                );
                break;
            case 'certificate':

                $data = $this->freelanceUpdate->certificate->toArray();

                unset($data[$key]);
                $data = array_values($data);
                $this->freelanceUpdate->certificate = $data;
                $this->freelanceUpdate->update();
                $this->emitSelf('refresh');

                $this->notification()->success(
                    $title = "Supprimmer",
                    $description = "",
                );


            case 'skill':

                $data = $this->freelanceUpdate->competences->toArray();

                unset($data[$key]);
                $data = array_values($data);
                $this->freelanceUpdate->competences = $data;
                $this->freelanceUpdate->update();
                $this->emitSelf('refresh');

                $this->notification()->success(
                    $title = "Supprimmer",
                    $description = "",
                );
                break;
            case 'Comptes':

                $data = $this->freelanceUpdate->comptes->toArray();

                unset($data[$key]);
                $data = array_values($data);
                $this->freelanceUpdate->Comptes = $data;
                $this->freelanceUpdate->update();
                $this->emitSelf('refresh');

                $this->notification()->success(
                    $title = "Supprimmer",
                    $description = "",
                );
                break;
        }
    }

    //Diplome
    public function modifierDiplome(Int $key)
    {

        $this->validate([
            'diplome.diplome' => 'required|string',
            'diplome.universite' => 'required|string',
            'diplome.annee' => 'required|numeric',

        ]);
        // dd($this->langue['name']);


        $this->freelanceUpdate->diplome[$key]['diplome'] = $this->diplome['diplome'];
        $this->freelanceUpdate->diplome[$key]['universite'] = $this->diplome['universite'];

        $this->freelanceUpdate->diplome[$key]['annee'] = $this->diplome['annee'];
        $this->freelanceUpdate->update();

        if ($this->freelanceUpdate) {

            $this->diplomeEdit = false;

            $this->dispatchBrowserEvent('close');
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



    //Certificate

    public function modifierCertificate(Int $key)
    {

        $this->validate([
            'certificate.certificate' => 'required|string',
            'certificate.delivrer' => 'required|string',
            'certificate.annee' => 'required|numeric',

        ]);
        // dd($this->langue['name']);


        $this->freelanceUpdate->certificat[$key]['certificate'] = $this->certificate['certificate'];
        $this->freelanceUpdate->certificat[$key]['delivrer'] = $this->certificate['delivrer'];

        $this->freelanceUpdate->certificat[$key]['annee'] = $this->certificate['annee'];
        $this->freelanceUpdate->update();


        if ($this->freelanceUpdate) {

            $this->dispatchBrowserEvent('close');
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

    public function modalCertificate($key)
    {
        $this->certificate['certificate'] = $this->freelanceUpdate->certificat[$key]['certificate'];
        $this->certificate['delivrer'] = $this->freelanceUpdate->certificat[$key]['delivrer'];

        $this->certificate['annee'] = $this->freelanceUpdate->certificat[$key]['annee'];
    }

    //Compentencess
    public function modaleCompentences($key)
    {

        $this->competences = [
            'skill' => $this->freelanceUpdate->competences[$key]['skill'],
            'level' => $this->freelanceUpdate->competences[$key]['level'],
        ];
    }
    public function modifierCompentences(Int $key)
    {

        $this->validate([
            'competences.skill' => 'required|string',
            'competences.level' => 'required|string',


        ]);
        // dd($this->langue['name']);


        $this->freelanceUpdate->competences[$key]['skill'] = $this->competences['skill'];
        $this->freelanceUpdate->competences[$key]['level'] = $this->competences['level'];


        $this->freelanceUpdate->update();
        $this->reset('competences');

        if ($this->freelanceUpdate) {




            $this->dispatchBrowserEvent('close');
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

    public function addCompetences()
    {



        if (!empty($this->competences['skill']) && !empty($this->competences['level'])) {
            $data = $this->freelanceUpdate->competences;
            $data[] = $this->competences;
            $this->freelanceUpdate->competences = $data;
            $this->freelanceUpdate->update();

            $this->dispatchBrowserEvent('close');

            $this->reset('competences');

            $this->emitSelf('refresh');
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
        } else {
            $this->notification()->error(
                $title = "Erreur",
                $description = "Veuillez remplir tout les champs",
            );
        }

        //dd($this->selected['name']);


    }

    public function  modifierCompte(int $key)
    {

        $this->validate([
            'compte.comptes' => 'required',
            'compte.lien' => 'required',
        ]);

        try {

            $this->freelanceUpdate->comptes[$key]['comptes'] = $this->compte['comptes'];
            $this->freelanceUpdate->comptes[$key]['lien'] = $this->compte['lien'];

            $this->freelanceUpdate->update();
            $this->reset('compte');

            if ($this->freelanceUpdate) {


                $this->dispatchBrowserEvent('close');
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
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function modalComptes(int $key)
    {
        $this->compte = [
            'comptes' => $this->freelanceUpdate->comptes[$key]['comptes'],
            'lien' => $this->freelanceUpdate->comptes[$key]['lien'],
        ];

        $this->modalCompte = true;
    }

    public function resetAll()
    {

        $this->reset('selectedLangue');
        $this->reset('comptes');
        $this->reset('competences');
        $this->reset('certificate');

        $this->reset('diplome');
    }

    public function dateAnne()
    {

        $date = [];

        for ($i = 2001; $i < 2023; $i++) {
            # code...
            $date[] = $i;
        };
        return $date;
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
