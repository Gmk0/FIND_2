<div class="flex flex-col bg-gray-100 dark:bg-gray-900 lg:flex-row">
    <aside class="w-full lg:w-1/4  bg-white shadow-md">
        <!-- Identité du freelance -->

        <div x-data="{ showAll: false,description:@entangle('description') }" class="p-6 sticky top-0">
            <img class="w-32 h-32 rounded-full mx-auto" src="https://via.placeholder.com/150" alt="Photo de profil">
            <h1 class="text-3xl font-bold mt-4 text-gray-800">{{$freelance->prenom}} {{$freelance->nom}}</h1>
            <h2 class="text-xl font-medium text-gray-500 dark:text-gray-200 mt-2">Freelance en
                {{$freelance->category->name}}</h2>

            <h2 class="text-xl font-medium text-gray-500 dark:text-gray-200 mt-2">Level : {{$freelance->level}}</h2>
            <div class="mt-4">
                <p class="text-gray-500 dark:text-gray-200">Email : exemple@gmail.com</p>
                <p class="text-gray-500 dark:text-gray-200">Adresse : 123 rue de l'exemple</p>
            </div>
            <div class="mt-2 text-sm dark:text-gray-200 text-gray-500" x-show="!showAll">
                <p x-text="description.length > 50 ? description.substr(0, 50) + '...' : description"></p>
                <button class="text-blue-500" @click="showAll = true">Lire la suite</button>
            </div>
            <div class="mt-2 text-sm p-2 dark:text-gray-200 text-gray-500" x-show="showAll">
                <p x-text="description"></p>
                <button class="text-red-300" @click="showAll = false">Réduire</button>
            </div>

            <div class="w-full mt-8 px-2">
                <x-button label="Contacter" lg primary />
            </div>
        </div>
    </aside>
    <main class="w-full lg:w-3/4 p-6">

        <section class="bg-gray-100">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold text-gray-800">Mes Compétences</h2>
                    <p class="mt-4 dark:text-gray-200 text-gray-500">Voici quelques-unes des compétences que je maîtrise
                        :</p>
                    <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        @php

                        @endphp
                        @foreach($freelance->competences as $value)
                        <div class="bg-white rounded-lg shadow-lg px-6 py-8">
                            <div class="text-2xl font-bold text-gray-800">{{$value['skill']}}</div>
                            <p class="mt-4 dark:text-gray-200 text-gray-500">{{$value['level']}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
        </section>

        <section class="bg-white">
            <div class="max-w-7xl mx-auto py-12 px-2 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold text-gray-800">Mes Services</h2>
                    <p class="mt-4 dark:text-gray-200 text-gray-500">Voici quelques-uns des services que j'ai créés sur
                        la plateforme :</p>
                    <div class="mt-2" x-data="{ slider: null }" x-init="() => { 
                                slider = new Splide('#service-slider', {
                                    type: 'loop',
                                    perPage: 3,
                                    gap: '2rem',
                                    autoplay: true,
                                    pauseOnHover: false,
                                    breakpoints: {
                                        640: {
                                            perPage: 1
                                        },
                                        768: {
                                            perPage: 2
                                        },
                                        1024: {
                                            perPage: 3
                                        }
                                    }
                                });
                            
                                slider.mount();
                            }">
                        <div id="service-slider" class="splide p-4">
                            <div class="splide__track">
                                <div class="splide__list p-6">
                                    @forelse($freelance->services as $service)
                                    <div
                                        class="splide__slide bg-gray-50 dark:bg-gray-900 rounded-lg shadow-lg  overflow-hidden">
                                        <a href="#">
                                            @foreach($service->files as $key=>$value)
                                            <img class="h-48 w-full object-cover" src="{{$value}}" alt="Service 1">
                                            @break
                                            @endforeach
                                        </a>
                                        <div class="p-6 h-48">
                                            <h3 class="text-lg font-bold text-gray-800"><a
                                                    href="{{route('ServicesViewOne',['category'=>$service->category->name,'id'=>$service->id])}}">{{$service->title}}</a>
                                            </h3>
                                            <p class="mt-2 dark:text-gray-200 text-gray-500">Niveau : Top</p>
                                            <p class="mt-2 dark:text-gray-200 text-gray-500">Prix :
                                                {{$service->basic_price}} €</p>

                                        </div>
                                    </div>
                                    @empty
                                    <p>Aucun service disponible pour l'instant.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold text-gray-800">Mes Projets</h2>
                    <p class="mt-4 dark:text-gray-200 text-gray-500">Voici quelques-uns des projets sur lesquels j'ai
                        travaillé :</p>
                    <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <a href="#">
                                <img class="h-48 w-full object-cover" src="https://via.placeholder.com/500x300"
                                    alt="Projet 1">
                            </a>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900"><a href="#">Nom du Projet</a></h3>
                                <p class="mt-2 text-gray-500">Description du projet</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <a href="#">
                                <img class="h-48 w-full object-cover" src="https://via.placeholder.com/500x300"
                                    alt="Projet 2">
                            </a>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900"><a href="#">Nom du Projet</a></h3>
                                <p class="mt-2 text-gray-500">Description du projet</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <a href="#">
                                <img class="h-48 w-full object-cover" src="https://via.placeholder.com/500x300"
                                    alt="Projet 3">
                            </a>
                            <div class="p-6">
                                <h3 class="text-lg font-bold text-gray-900"><a href="#">Nom du Projet</a></h3>
                                <p class="mt-2 text-gray-500">Description du projet</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-100">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold text-gray-900">Témoignages</h2>
                    <p class="mt-4 text-gray-500">Voici ce que mes clients satisfaits ont à dire :</p>
                    <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6">
                                <p class="mt-2 text-gray-500">"Prénom a été un développeur incroyable pour travailler
                                    sur mon projet. Il a été
                                    très réactif à mes demandes et a fourni un travail de qualité dans les délais
                                    impartis."</p>
                                <p class="mt-4 font-medium text-gray-900">Nom de la personne - Entreprise</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6">
                                <p class="mt-2 text-gray-500">"J'ai été très satisfait du travail de Prénom sur mon
                                    projet. Il a été très professionnel et a travaillé dur pour s'assurer que le
                                    résultat final répondait à toutes mes attentes."</p>
                                <p class="mt-4 font-medium text-gray-900">Nom de la personne - Entreprise</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6">
                                <p class="mt-2 text-gray-500">"Je recommande vivement Prénom pour tout travail de
                                    développement web. Il a été un plaisir de travailler avec lui et son travail parle
                                    de lui-même."</p>
                                <p class="mt-4 font-medium text-gray-900">Nom de la personne - Entreprise</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>


    </main>
</div>