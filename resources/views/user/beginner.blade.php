@extends('layouts.user')

@section('content')

<section class="min-h-screen pt-20 bg-white dark:bg-gray-800">

    <div class="py-8">

        <div class="px-6 m-auto text-gray-900 xl:container md:px-12 xl:px-16">
            <div
                class="md:bg-gray-100 dark:bg-gray-900 lg:p-16 rounded-[4rem] space-y-6 md:flex md:gap-6 justify-center md:space-y-0 lg:items-center">
                <div class="md:5/12 lg:w-1/2">
                    <img src="/images/hero/find_freelance_presentation.jpg" alt="image" loading="lazy"
                        class="rounded-lg" width="" height="" />
                </div>
                <div class="md:7/12 lg:w-1/2">
                    <h2 class="hidden text-3xl font-bold text-gray-900 md:text-4xl dark:text-gray-50">
                        FIND
                    </h2>
                    <p class="my-8 font-serif text-lg text-gray-800 dark:text-gray-50">
                        Nous sommes à la recherche de personnes talentueuses comme vous pour offrir leurs compétences
                        dans l'une ou plusieurs de
                        nos 20 catégories et travailler sur des projets captivants de clients du monde entier.
                    </p>

                    <a href="{{route('register.etape.1')}}"
                        class="relative flex items-center justify-center w-full h-12 px-8 border rounded-full dark:border-amber-600 before:absolute before:inset-0 before:rounded-full before:bg-sky-100 before:bg-gradient-to-b before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 dark:before:border-gray-700 dark:before:bg-gray-800 sm:w-max">
                        <span class="relative text-base font-semibold text-sky-600 dark:text-gray-50">S'Inscrire
                            Maintenant</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="px-6 m-auto mt-6 text-gray-600 xl:container md:px-12 xl:px-16">
            <div class="flex items-center justify-center">

                <h2 class="text-2xl font-bold text-gray-900 md:text-4xl dark:text-gray-50">
                    Comment ça marche ?
                </h2>
            </div>
            <div class="grid gap-4 mt-5 md:grid-cols-3">
                <div>
                    <img src="/images/icon/presentation.gif" class="rounded-md w-28" alt="">
                    <div>
                        <h1 class="mb-2 text-lg font-semibold dark:text-gray-50 "><span>1.</span>Creer votre Service
                        </h1>
                        <p class="text-gray-800 dark:text-gray-50">
                            Inscrivez-vous gratuitement, créez votre service, et proposez votre travail à notre public
                            international.
                        </p>
                    </div>
                </div>
                <div>
                    <img src="/images/icon/bubble-chat.gif" class="rounded-md w-28" alt="">
                    <div>
                        <h1 class="mb-2 text-lg font-semibold dark:text-gray-50"><span>2.</span>Démarrez le travail
                        </h1>
                        <p class="text-gray-800 dark:text-gray-50">
                            Recevez une notification lorsque vous obtenez une nouvelle commande sur FIND et discutez
                            des détails avec les clients.
                        </p>
                    </div>
                </div>
                <div>
                    <img src="/images/icon/save-money.gif" class="rounded-md w-28" alt="">
                    <div>
                        <h1 class="mb-2 text-lg font-semibold dark:text-gray-50"><span>3.</span> Soyez payé</h1>
                        <p class="text-gray-800 dark:text-gray-50">
                            Recevez votre paiement à chaque fois que vous finaliserez une commande.
                        </p>
                    </div>
                </div>



            </div>
        </div>
    </div>




</section>
@endsection

@push('script')

@endpush
