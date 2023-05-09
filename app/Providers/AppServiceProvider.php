<?php

namespace App\Providers;

use App\Spotlight\Freelance\CommandeF;
use App\Spotlight\Freelance\MessageF;
use App\Spotlight\Freelance\ParametreF;
use App\Spotlight\Freelance\ProfileF;
use App\Spotlight\Freelance\SecuriteF;
use App\Spotlight\Freelance\TransactionF;
use App\Spotlight\User\Commande;
use App\Spotlight\User\Message;
use App\Spotlight\User\Parametre;
use App\Spotlight\User\Profile;
use App\Spotlight\User\Securite;
use App\Spotlight\User\Transaction;
use Illuminate\Support\ServiceProvider;
use LivewireUI\Spotlight\Spotlight;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Spotlight::registerCommandIf(true, Message::class);
        Spotlight::registerCommandIf(true, Profile::class);
        Spotlight::registerCommandIf(true, Transaction::class);
        Spotlight::registerCommandIf(true, Commande::class);
        Spotlight::registerCommandIf(true, Securite::class);
        Spotlight::registerCommandIf(true, Parametre::class);
        Spotlight::registerCommandIf(true, MessageF::class);
        Spotlight::registerCommandIf(true, ProfileF::class);
        Spotlight::registerCommandIf(true, TransactionF::class);
        Spotlight::registerCommandIf(true, CommandeF::class);
        Spotlight::registerCommandIf(true, SecuriteF::class);
        Spotlight::registerCommandIf(true, ParametreF::class);
    }
}