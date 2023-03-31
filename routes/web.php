<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::controller(home::class)->group(function(){
    Route::get('/', 'home')->name('home');
   // Route::get('/category', 'category')->name('category');
    //Route::get('/category/{category}', 'categoryRresult')->where('category', '(.*)')->name('category_result');

     Route::view('/categorys', 'user.serviceView')->name('categoryOne');
    
   
});

Route::controller(ServiceController::class)->group(function(){

       Route::get('/services', 'services')->name('services');
       Route::get('/categories', 'categories')->name('categories');
       
});

 



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Services
   



});

 Route::get('/categories/{category}/{id}', App\Http\Livewire\User\Services\ServicesViewOne::class)->where('category', '(.*)')->name('ServicesViewOne');     

Route::get('/categories/{category}', App\Http\Livewire\User\Services\ServiceByCategory::class)->where('category', '(.*)')->name('categoryByName');     
