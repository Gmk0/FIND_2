<?php

namespace App\Http\Livewire\User\Freelance;

use Livewire\Component;
use App\Models\Freelance;

use App\Models\SubCategory;


use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Filament\Forms;
use Filament\Forms\Components\{FileUpload};
use Illuminate\Support\Facades\Storage;


class RegistrationFreelance extends Component implements Forms\Contracts\HasForms
{

    use Forms\Concerns\InteractsWithForms;
    use WithFileUploads;



    public $user;

    public $modal = false;
    public $userAuth;
    public $step = 1;
    public $totalStep = 5;
    public $freelancer = [
        'site' => "",
        'experience' => "",
    ];
    public $photo;
    public $category = null;
    public $localisation = ['avenue' => "", 'commune' => '', 'ville' => ""];
    public $selectedDiplome = [];
    public $selectedLanguages = [];
    public $selectedCertificat = [];
    public $selectedSkill = array();
    public $newCertificate = ['certificate' => '', 'delivrer' => '', 'annee' => ''];
    public $newLanguage = ['language' => '', 'level' => ''];
    public $newSkill = ['skill' => '', 'level' => ''];
    public $newDiplome = ['diplome' => '', 'universite' => '', 'annee' => ''];
    public $SousCategorie = [];
    public $query;
    public $currency;
    public $suggestions = [];
    public $date = [];
    public $comptes = [];
    public $show = false;
    public $code;
    public $succees = false;


    protected $queryString = [
        'step' => "expect"
    ];

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('photo')
                ->image()
                ->maxSize(2048)
                ->required(),
        ];
    }

    public function mount()
    {

        /* $response = Http::get('https://restcountries.com/v3.1/all');
        $countries = $response->json();
        $this->languages = collect($countries)->pluck('languages')->collapse()->unique()->sort();
        */
        $this->form->fill();
        $id = Auth::user()->id;
        $this->user = User::find($id);
        $this->userAuth = $this->user->toArray();
        $this->date = $this->dateAnne();
        $this->step = 1;
    }

    public function addLanguage()
    {
        if (!empty($this->newLanguage['language']) && !empty($this->newLanguage['level'])) {
            // Add the new language to the selectedLanguages list
            $this->selectedLanguages[] = ['name' => $this->newLanguage['language'], 'level' => $this->newLanguage['level']];


            $this->newLanguage = ['language' => '', 'level' => ''];

            // Emit an event to inform that a new language has been added
            $this->emit('languageAdded');
        }
    }
    public function addSkill()
    {

        if (!empty($this->newSkill['skill']) && !empty($this->newSkill['level'])) {
            // Add the new language to the selectedLanguages list
            array_push($this->selectedSkill, ['skill' => $this->newSkill['skill'], 'level' => $this->newSkill['level']]);


            $this->newSkill = ['skill' => '', 'level' => ''];
        }

        // Emit an event to inform that a new language has been added

    }
    public function addCertificate()
    {


        if (!empty($this->newCertificate['certificate']) && !empty($this->newCertificate['delivrer']) && !empty($this->newCertificate['annee'])) {
            // Add the new certificate to the selectedcertificate list
            $this->selectedCertificat[] = ['certificate' => $this->newCertificate['certificate'], 'delivrer' => $this->newCertificate['delivrer'], 'annee' => $this->newCertificate['annee']];

            $this->newCertificate = ['certificate' => '', 'delivrer' => '', 'annee' => ''];
        }
        // Emit an event to inform that a new language has been added


    }

    public function addDiplome()
    {

        if (!empty($this->newDiplome['diplome']) && !empty($this->newDiplome['universite']) && !empty($this->newDiplome['annee'])) {

            // Add the new diplome to the selectedDiplome list
            $this->selectedDiplome[] = ['diplome' => $this->newDiplome['diplome'], 'universite' => $this->newDiplome['universite'], 'annee' => $this->newDiplome['annee']];

            $this->newDiplome = ['diplome' => '', 'universite' => '', 'annee' => ''];

            // Emit an event to inform that a new language has been added
        }
    }

    public function removeLanguage($index, $select)
    {
        switch ($select) {
            case 'langue':
                unset($this->selectedLanguages[$index]);
                $this->selectedLanguages = array_values($this->selectedLanguages);
                break;
            case 'universite':
                unset($this->selectedDiplome[$index]);
                $this->selectedDiplome = array_values($this->selectedDiplome);
                break;
            case 'certificate':
                unset($this->selectedCertificat[$index]);
                $this->selectedCertificat = array_values($this->selectedCertificat);

                break;
            case 'skill':
                unset($this->selectedSkill[$index]);
                $this->selectedSkill = array_values($this->selectedSkill);
                break;
        }
    }


    public function validateData()
    {
        switch ($this->step) {
            case 1:
                $this->validate([
                    'currency' => "required",
                    "localisation" => "required",
                    'category' => 'required',
                    "SousCategorie" => 'required',


                ]);

                $this->addSkill();
                $this->dispatchBrowserEvent('stepChanged');

                break;
            case 2:
                $this->validate([
                    'freelancer.name' => "required",
                    "freelancer.prenom" => "required",
                    "freelancer.description" => "required|min:150",
                ]);
                $this->form->validate();
                $this->addLanguage();
                $this->dispatchBrowserEvent('stepChanged');

                break;

            case 3:


                $this->addCertificate();
                $this->addDiplome();

                $this->dispatchBrowserEvent('stepChanged');
                break;
            case 4:




                $this->dispatchBrowserEvent('stepChanged');
                break;
        }
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


    public function increaseStep()
    {
        $this->validateData();
        $this->resetErrorBag();
        $this->step++;

        if ($this->step >   $this->totalStep) {
            $this->step = $this->totalstep;
        }

        //Wont reach here if the Validation Fails.
        $this->dispatchBrowserEvent('stepChanged');
    }
    public function decreaseStep()
    {
        $this->step--;
        $this->resetErrorBag();

        if ($this->step < 1) {
            $this->step = 1;
        }
        $this->dispatchBrowserEvent('stepChanged');
    }



    public function updatedSousCategorie($value)
    {
        if (count($this->SousCategorie) > 3) {
            $this->SousCategorie = array_slice($this->SousCategorie, 0, 1);
            $this->addError('sousCategory', 'Vous ne pouvez choisir que 5 compétences maximum.');
        }
    }


    public function sendEmail()
    {

        $this->validate([
            'userAuth.email' => 'required|email',
        ]);

        $code = rand(100000, 999999);

        DB::table('email_verification')->insert([
            'email' => $this->userAuth['email'],
            'code' => $code,
            'created_at' => now(),
        ]);

        Mail::to($this->userAuth['email'])->send(new EmailVerification($code));

        $this->show = true;
    }
    public function verifyCode()
    {
        $this->validate([
            'code' => 'required|digits:6',
        ]);

        $verification = DB::table('email_verification')
            ->where('email', $this->userAuth['email'])
            ->where('code', $this->code)
            ->where('created_at', '>=', now()->subMinutes(10))
            ->first();

        if ($verification) {
            // Mettez à jour votre base de données ou effectuez d'autres opérations si la validation réussit.
            DB::table('users')->where('email', $this->userAuth['email'])->update(['email_verified_at' => now()]);
            DB::table('email_verification')->where('email', $this->userAuth['email'])->delete();

            // Réinitialiser les champs de formulaire pour permettre à l'utilisateur de soumettre un autre code.
            $this->reset(['code']);
            $this->show = false;
            Notification::make()
                ->title('mail verifier')
                ->success()
                ->send();
        } else {
            $this->addError('codeV', 'Invalid code. Please try again.');
        }
    }

    public function register()
    {
        try {

            $this->validate([
                "userAuth.email" => "required",
                "userAuth.phone" => "required",
            ]);

            if (empty($this->selectedLanguages) || empty($this->selectedSkill)  || empty($this->SousCategorie)) {
                $this->modal = true;
            } else {

                $this->addImage($this->photo);

                $data = [
                    'nom' => $this->freelancer['name'],
                    'prenom' => $this->freelancer['prenom'],
                    'identifiant' => $this->identifiant(),
                    'description' => $this->freelancer['description'],
                    'langue' => $this->selectedLanguages,

                    'diplome' => $this->selectedDiplome,
                    'certificat' => $this->selectedCertificat,
                    'site' => $this->freelancer['site'],
                    'experience' => $this->freelancer['experience'],
                    'competences' => $this->selectedSkill,
                    'taux_journalier' => $this->currency,
                    'comptes' => $this->comptes,
                    'Sub_categorie' => $this->SousCategorie,
                    'localisation' => $this->localisation,
                    'category_id' => $this->category,
                    'level' => "basic"

                ];



                //dd($data);


                $result = Freelance::create($data);


                // dd($data);
                if ($result) {

                    $this->succees = true;
                    $this->step = 1;
                    $this->resetAll();
                    Notification::make()->title('Bienvenue Dans la partie freelancer')
                        ->success()
                        ->send();
                }
            };
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    function addImage($files)
    {
        $fileNames = [];

        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();

            $file->storeAs('profiles-photos', $fileName);
            $fileNames[] = $fileName;
        }

        $this->user->profile_photo_path = $fileNames[0];
        $this->user->update();
    }



    public function render()
    {
        return view('livewire.user.freelance.registration-freelance', [
            "SousCategory" => SubCategory::where("category_id", $this->category)->get(),
            'sousCategories' => $this->SousCategorie,
            'diplome' => $this->selectedDiplome,
            'compentences' => $this->selectedSkill,
            'langue' => $this->selectedLanguages,
            "mail" => $this->userAuth['email_verified_at']

        ]);
    }

    public function resetAll()
    {
        $this->photo = null;
        $this->category = null;
        $this->localisation = [];
        $this->selectedDiplome = [];
        $this->selectedLanguages = [];
        $this->selectedCertificat = [];
        $this->selectedSkill = array();

        $this->SousCategorie = [];

        $this->currency = null;
        $this->suggestions = [];

        $this->comptes = [];
    }

    public function identifiant()
    {
        // Générer une chaîne aléatoire unique de 16 caractères
        $randomString = uniqid();

        // Extraire les 8 premiers caractères de la chaîne aléatoire pour obtenir l'ID unique de 8 caractères
        $uniqueId = substr($randomString, 0, 5);

        // Compteur pour incrémenter la fin de l'ID unique
        $counter = DB::table('freelances')->count() + 1;

        // Concaténer le compteur à la fin de l'ID unique
        return  $finalId = 'FD' . $uniqueId . $counter;
    }
}
