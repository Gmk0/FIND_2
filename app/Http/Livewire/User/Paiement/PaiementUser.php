<?php

namespace App\Http\Livewire\User\Paiement;

use App\Models\PaimentMethod;
use App\Notifications\ServicePaid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

use WireUi\Traits\Actions;

class PaiementUser extends Component
{
    use Actions;

    public $modalMobile = false;
    public $modalVirement = false;
    public $modalCarte = false;
    public $mobile;
    public $operateur;
    public $methodePaiment = null;
    public $editModal = false;
    public  $idMobile;
    public $pays;
    protected $listeners = ['refresh' => '$refresh'];

    public function openModalMobile()
    {

        $this->modalMobile = true;
    }

    public function mount()
    {
        $this->methodePaiment
            = PaimentMethod::where('user_id', auth()->id())->first();

        $response = Http::get('https://restcountries.com/v3.1/all?fields=name,idd');
        $this->pays = $response->json();
    }

    public function removeMobile(int $id)
    {


        $data = $this->methodePaiment->mobile;

        unset($data[$id]);

        $data = $data->toArray();

        $NewData = array_values($data);




        $this->methodePaiment->mobile = $NewData;
        $this->methodePaiment->update();

        $this->notification()->success(
            $title = "le methode de paiment a ete effacer",

        );
        $this->emitSelf('refresh');
    }

    public function editMobile($id)
    {
        $this->idMobile = $id;
        $this->mobile = $this->methodePaiment->mobile[$id]['mobile'];

        $this->operateur
            = $this->methodePaiment->mobile[$id]['operateur'];

        $this->openModalMobile();

        $this->editModal = true;
    }

    public function editMobileNumber()
    {
        $this->validate([
            'mobile' => 'required',
            'operateur' => 'required',
        ]);

        $id = $this->idMobile;


        $this->methodePaiment->mobile[$id]['mobile'] = $this->mobile;

        $this->methodePaiment->mobile[$id]['operateur'] = $this->operateur;

        $this->methodePaiment->update();

        $this->editModal = false;

        $this->modalMobile = false;
        $this->clear();

        $this->notification()->success(
            $title = "le methode de paiment a ete moficier avec success",

        );
        $this->emitSelf('refresh');
    }
    public function addMobile()
    {

        $this->validate([
            'mobile' => 'required',
            'operateur' => 'required',
        ]);

        $donne = [
            'operateur' => $this->operateur,
            'mobile' => $this->mobile,
        ];

        $data = PaimentMethod::where('user_id', auth()->id())->first();


        if ($data != null) {

            $NewDonnee = $data->mobile;
            $NewDonnee[] = $donne;
            $data->mobile = $NewDonnee;
            $data->update();
        } else {

            $NewData = new PaimentMethod();
            $NewData->mobile =  [$donne];
            $NewData->save();
        }

        $this->modalMobile = false;

        $this->notification()->success(
            $title = "le methode de paiment a ete enregistrer",

        );

        $this->clear();
        $this->emitSelf('refresh');
    }


    public function sendNotification()
    {




        try {
            $user = Auth::user();


            $notification = new ServicePaid();
            $data = $user->notify($notification);
        } catch (Exception $e) {

            dd($e->getMessage());
        }
    }


    public function openModalVirement()
    {

        $this->modalVirement = true;
    }

    public function openMmdalCarte()
    {

        $this->modalCarte = true;
    }

    public function clear()
    {
        $this->mobile = null;
        $this->operateur = null;

        $this->editModal = false;
    }
    public function render()
    {
        return view('livewire.user.paiement.paiement-user')->extends('layouts.userProfile')->section('content');
    }
}