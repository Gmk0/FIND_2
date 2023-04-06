<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use App\Models\Freelance;


class ServiceController extends Controller
{
    


     public function services(){

        $category =Category::all();

        $servicesBest=Service::where('category_id',1)->limit(20)->get();
        
        $freelance=Freelance::paginate(20);

        $services=Service::orderBy('basic_price','Asc')->paginate(8);

    

       return view('user.services',[
        'categories' => $category,
        'servicesBest'=>$servicesBest,
        'freelances'=>$freelance,
        'services'=>$services,
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
