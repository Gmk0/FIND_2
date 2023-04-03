<?php

use App\Http\Controllers\Api\ServicesApi;
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

     //Route::view('/categorys', 'user.serviceView')->name('categoryOne');
    Route::view('/registration','user.beginner')->name('register.begin');
    Route::view('/registration/info','user.register_info')->name('register.etape.1');
     
   
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
    Route::get('/services/checkout',App\Http\Livewire\User\Services\Checkout::class)->name('checkout');
    Route::get('/categories/{category}/{id}', App\Http\Livewire\User\Services\ServicesViewOne::class)->where('category', '(.*)')->name('ServicesViewOne');     

    //registration
   
    Route::get('/registration/freelance',\App\Http\Livewire\User\Freelance\RegistrationFreelance::class)->name('freelancer.register')->middleware('freelance_exist');


});


Route::get('/categories/{category}', App\Http\Livewire\User\Services\ServiceByCategory::class)->where('category', '(.*)')->name('categoryByName');     


//Api

Route::get('/service_api', ServicesApi::class)->name('api.services');