<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ServiceController extends Controller
{
    


     public function services(){

        $category =Category::all();

    

       return view('user.services',[
        'categories' => $category
        ]);
    } 

    public function categories(){
        $category =Category::all();

    
        return view('user.category',[
        'categories' => $category
        ]);

    }

    public function categoryByName(Request $request){

        $category=$request->route('category');

       
          return view('user.servicesByCategory',[
            'category'=>$category
            ]);
    }
}
