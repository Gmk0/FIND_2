<?php

namespace App\Http\Livewire\User\Services;

use App\Models\service;
use Livewire\Component;

class ServicesViewOne extends Component
{

    public $service;
    public $images;
    public $servicesOther=null;
    public function mount($id){

        $this->service=Service::find($id);
        $this->images= $this->images();

       
        $this->servicesOther=$this->GetOther();
      

    }


    public function GetOther(){
        $subCategorie=$this->service->Sub_categorie;
        $sousCategorie= reset($subCategorie ); 

       
    $services=Service::where('Sub_categorie', 'like', '%'. $sousCategorie .'%')
    ->limit(4)->get();

    return $services;
    }

        public function images(){

        $files = $this->service->files;
        foreach($files as $key=>$file){
            $images=$file;
            break;
        }
        return $images;
    }

    public function render()
    {
        return view('livewire.user.services.services-view-one')
        ->extends('layouts.user')->section('content');
    }
}
