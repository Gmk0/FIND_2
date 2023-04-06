<?php

namespace App\Http\Livewire\User\Freelance;

use Livewire\Component;
use App\Models\Freelance;

class ProfileFreelance extends Component
{
    public $freelance = null;
    public $description='';

    public function mount($identifiant){
        
        $freelance=Freelance::where('identifiant',$identifiant)->first();

        
        if($freelance->exists()){
            $this->description= $freelance->description;   
            $this->freelance=$freelance;
        }else{
            
        };

        

        
    }
    public function render()
    {
        return view('livewire.user.freelance.profile-freelance');
    }
}
