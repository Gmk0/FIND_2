<?php

use App\Http\Controllers\Api\ApiFreelanceGet;
use App\Http\Controllers\Api\ServicesApi;
use App\Http\Controllers\FacebookAuth;
use App\Http\Controllers\GoogleAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ToolsController;
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



Route::controller(home::class)->group(function () {
    Route::get('/', 'home')->name('home');
    // Route::get('/category', 'category')->name('category');
    //Route::get('/category/{category}', 'categoryRresult')->where('category', '(.*)')->name('category_result');

    //Route::view('/categorys', 'user.serviceView')->name('categoryOne');
    Route::view('/registration', 'user.beginner')->name('register.begin');
    Route::view('/registration/info', 'user.register_info')->name('register.etape.1');
    Route::view('/apropos', 'user.about')->name('about');
});

Route::controller(ServiceController::class)->group(function () {

    Route::get('/services', 'services')->name('services');
    Route::get('/categories', 'categories')->name('categories');

    Route::get('/checkout/status', 'checkout')->name('checkoutStatus');
});

//find freelance
Route::get('/find_freelance', \App\Http\Livewire\User\Freelance\FindFreelance::class)->name('find_freelance');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Services
    Route::get('/services/checkout', App\Http\Livewire\User\Services\Checkout::class)->name('checkout');
    Route::get('/categories/{category}/{id}', App\Http\Livewire\User\Services\ServicesViewOne::class)->where('category', '(.*)')->name('ServicesViewOne');

    //registration

    Route::get('/registration/freelance', \App\Http\Livewire\User\Freelance\RegistrationFreelance::class)->name('freelancer.register')->middleware('freelance_exist');


    //projet

    Route::get('/user/create_project', App\Http\Livewire\User\Projet\CreateProject::class)->name('createProject');
    Route::get('/user/list_project', App\Http\Livewire\User\Projet\ListProject::class)->name('listProjet');
    Route::get('/user/list_project/{id}', App\Http\Livewire\User\Projet\PropositionProjet::class)->name('PropostionProjet');
    Route::view('/user/securite', 'user.profile.securite')->name('securiteUser');

    //transation
    Route::get('/user/transaction', App\Http\Livewire\User\Transaction\TransactionUser::class)->name('transactionUser');

    //commande
    Route::get('/user/commandes/{id}', App\Http\Livewire\User\Commande\CommandeOneView::class)->name('commandeOneView');

    Route::get('/user/commandes', App\Http\Livewire\User\Commande\CommandeUser::class)->name('commandeUser');

    //paiement

    Route::get('/user/paiement', App\Http\Livewire\User\Paiement\PaiementUser::class)->name('paiementUser');

    Route::view('/user/assistance', 'user.assistance')->name('assistanceUser');

    Route::get('/user/parametres', App\Http\Livewire\User\Config\Parametre::class)->name('parametreUser');

    //favoris

    Route::get('/user/favoris', App\Http\Livewire\User\Favoris\FavorisService::class)->name('favorisUser');

    //freelance

    Route::get('/find_freelance/profile/{identifiant}', \App\Http\Livewire\User\Freelance\ProfileFreelance::class)->name('profile.freelance');

    //conversation
    Route::get('/user/messages', App\Http\Livewire\User\Conversation\ConversationComponent::class)->name('MessageUser');


    Route::get('/user', App\Http\Livewire\User\Transaction\DashbordUser::class)->name('DashbordUser');
    Route::view('/status_payement', 'status.success')->name('status_payement');

    Route::get('facturaction/{facture}', [ToolsController::class, 'facture'])->where('facture', '(.*)')->name('facturation');
});


Route::get('/categories/{category}', App\Http\Livewire\User\Services\ServiceByCategory::class)->where('category', '(.*)')->name('categoryByName');


//Api

Route::get('/service_api', ServicesApi::class)->name('api.services');
Route::get('/freelance_api', ApiFreelanceGet::class)->name('api.freelance.users');

Route::post('/like', [ToolsController::class, 'like'])->middleware('auth');


Route::controller(GoogleAuth::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

//Facebook controller
Route::controller(FacebookAuth::class)->group(function () {
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

include('freelanceRoute.php');