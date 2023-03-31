<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    //

    public function home(){

        return view('user.home');
    }

    public function category(){
        
        return view('user.category');
    }
    public function categoryRresult(Request $request){
       

       return view('user.categoryR');

    }
    public function categoryOne(Request $request){

        
       return view('user.serviceView');
    } 
}
