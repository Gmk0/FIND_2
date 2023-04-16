<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class Home extends Controller
{
    //

    public function home()
    {

        $category = Category::all();

        return view('user.home', ['category' => $category]);
    }

    public function category()
    {

        return view('user.category');
    }
    public function categoryRresult(Request $request)
    {


        return view('user.categoryR');
    }
    public function categoryOne(Request $request)
    {


        return view('user.serviceView');
    }
}