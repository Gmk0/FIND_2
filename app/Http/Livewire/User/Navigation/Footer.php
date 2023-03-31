<?php

namespace App\Http\Livewire\User\Navigation;

use Livewire\Component;
use App\Models\Category;

class Footer extends Component
{
    public $categories;

    public function getCategory($id){

         if(session('category')!= null){

                session()->put('category',$id);

            }else{
                session()->forget('category');
                 session()->put('category',$id);
            }
            

    
            return redirect()->route('result.search');
    

    }

    public function mount()
    {
            $this->categories=Category::all();
            
    }
    public function render()
    {
        return view('livewire.user.navigation.footer');
    }
}
