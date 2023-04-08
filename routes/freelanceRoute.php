<?php

use App\Http\Controllers\Admin\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;








Route::group(['prefix' => "freelance"], function () {

    Route::middleware([
        'freelance', 'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::view('/dashboard', 'freelance.dashboard')->name('freelance.dashboard');

        Route::group(['prefix' => "service"], function () {
            Route::get('/', \App\Http\Livewire\Freelance\Services\ServiceList::class)->name('freelance.service.list');
            Route::get('/create', \App\Http\Livewire\Freelance\Services\ServicesCreate::class)->name('freelance.service.create');
            Route::get('/edit/{id}', \App\Http\Livewire\Freelance\Services\EditService::class)->name('freelance.service.edit');
        });
        Route::group(['prefix' => "commande"], function () {
            Route::get('/', \App\Http\Livewire\Freelance\Commande\ListCommande::class)->name('freelance.commande.list');
            Route::get('/view/{id}', \App\Http\Livewire\Freelance\Commande\ViewCommande::class)->name('freelance.Order.view');

            // Route::get('/view/{CMD}', \App\Http\Livewire\Freelance\Services\ServicesCreate::class)->name('freelance.service.create');
            // Route::get('/edit/{id}', \App\Http\Livewire\Freelance\Services\EditService::class)->name('freelance.service.edit');
        });
        Route::group(['prefix' => "transaction"], function () {
            Route::get('/', \App\Http\Livewire\Freelance\Transaction\TransactionFreelance::class)->name('freelance.transaction.list');
            // Route::get('/create', \App\Http\Livewire\Freelance\Services\ServicesCreate::class)->name('freelance.service.create');
            //Route::get('/edit/{id}', \App\Http\Livewire\Freelance\Services\EditService::class)->name('freelance.service.edit');
        });

        Route::group(['prefix' => "messages"], function () {
            Route::get('/', \App\Http\Livewire\Freelance\Conversations\ConversationComponent::class)->name('freelance.messages');
            // Route::get('/create', \App\Http\Livewire\Freelance\Services\ServicesCreate::class)->name('freelance.service.create');
            //Route::get('/edit/{id}', \App\Http\Livewire\Freelance\Services\EditService::class)->name('freelance.service.edit');
        });
        /* Route::view('/', 'freelancer.dashboard');
        Route::get('/profil', \App\Http\Livewire\Freelancer\Profil\ProfileFreelance::class)->name('freelance.profile');

        Route::get('/conversations', \App\Http\Livewire\Freelancer\Conversations\Body::class)->name('freelance.conversation');

        Route::get('/commande', \App\Http\Livewire\Freelancer\Transaction\Order::class)->name('freelance.commande');

        Route::get('/transaction', \App\Http\Livewire\Freelancer\Transaction\Transaction::class)->name('freelance.transaction');

        Route::group(['prefix' => "service"], function () {
            Route::get('/', \App\Http\Livewire\Freelancer\Service\ListService::class)->name('service.list');
            Route::get('/create', \App\Http\Livewire\Freelancer\Service\CreateService::class)->name('service.create');
            Route::get('/edit/{id}', \App\Http\Livewire\Freelancer\Service\CreateService::class)->name('service.edit');
        }); */
    });
});
