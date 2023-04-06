<?php

use App\Http\Controllers\Admin\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;








Route::group(['prefix' => "freelance"], function () {

    Route::middleware([
        'freelance', 'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::view('/dashboard', 'freelancer.dashboard')->name('freelance.dashboard');
        Route::view('/', 'freelancer.dashboard');
        Route::get('/profil', \App\Http\Livewire\Freelancer\Profil\ProfileFreelance::class)->name('freelance.profile');

        Route::get('/conversations', \App\Http\Livewire\Freelancer\Conversations\Body::class)->name('freelance.conversation');

        Route::get('/commande', \App\Http\Livewire\Freelancer\Transaction\Order::class)->name('freelance.commande');

        Route::get('/transaction', \App\Http\Livewire\Freelancer\Transaction\Transaction::class)->name('freelance.transaction');

        Route::group(['prefix' => "service"], function () {
            Route::get('/', \App\Http\Livewire\Freelancer\Service\ListService::class)->name('service.list');
            Route::get('/create', \App\Http\Livewire\Freelancer\Service\CreateService::class)->name('service.create');
            Route::get('/edit/{id}', \App\Http\Livewire\Freelancer\Service\CreateService::class)->name('service.edit');
        });
    });
});
