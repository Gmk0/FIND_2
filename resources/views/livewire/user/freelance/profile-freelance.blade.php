<div>


    <div x-data="{ showAll: false,description:@entangle('description') }"
        class="flex flex-col bg-gray-100 dark:bg-gray-900 lg:flex-row">
        <aside class="w-full bg-white shadow-md lg:w-1/4">
            <!-- Identité du freelance -->

            <div class="sticky top-0 p-6">




                @if (!empty($freelance->user->profile_photo_path))

                <img class="w-32 h-32 mx-auto rounded-md"
                    src="{{Storage::disk('local')->url('profiles-photos/'.$freelance->user->profile_photo_path) }}"
                    alt="Photo de profil">
                @else
                <img class="w-32 h-32 mx-auto rounded-md"
                    src="{{Storage::disk('local')->url('profiles-photos/'.$freelance->user->profile_photo_url) }}"
                    alt="Photo de profil">

                @endif
                <h1 class="mt-4 text-lg font-bold text-gray-800 lg:text-lg xl:text-xl 2xl:text-3xl">
                    {{$freelance->prenom}}
                    {{$freelance->nom}}</h1>
                <h2 class="flex gap-2 mt-2 text-lg font-medium text-gray-500 dark:text-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                    </svg>
                    <span class="text-base">{{$freelance->category->name}}</span>
                </h2>
                @if(isset($freelance->localisation['ville']))
                <h2 class="flex gap-1 mt-4 text-base font-medium text-gray-800">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                    <span class="text-base">{{$freelance->localisation['ville']?
                        $freelance->localisation['ville']:''}}</span>
                </h2>
                @endif

                <h2 class="flex gap-2 mt-2 text-lg font-medium text-gray-500 dark:text-gray-200"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                    </svg><span>{{$freelance->level}}</span> </h2>
                <div class="mt-4">
                    <p class="text-gray-500 dark:text-gray-200">Email : {{$freelance->user->email}}</p>

                </div>


                <div class="w-full px-2 mt-8">
                    <x-button wire:click="conversations()" label="Contacter" lg primary />
                </div>
            </div>
        </aside>
        <main class="w-full p-6 rounded lg:w-3/4">

            <div class="hidden lg:flex">
                @include('include.breadcumbUser',['findFreelance'=>'findFreelance'])
            </div>

            <section class="bg-white rounded-md dark:bg-gray-800">
                <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="max-w-3xl mx-auto ">
                        <h2
                            class="text-lg font-bold text-center text-gray-800 xl:text-3xl md:text-xl dark:text-gray-200">
                            General
                            information</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-300">Apropos de Moi</p>

                        <div class="max-w-4xl mb-4 text-base font-thin text-gray-500 break-words dark:text-gray-300">
                            {{$freelance->description}}

                        </div>

                        @empty(!$freelance->certificat)

                        <p class="mt-4 text-gray-700 dark:text-gray-300">Certification</p>

                        <div>
                            @foreach($freelance->certificat as $value)
                            <div class="rounded-lg ">
                                <div class="text-base font-bold text-gray-700 dark:text-gray-500">
                                    Certifier en :{{$value['certificate']}}
                                </div>
                                <div class="text-base font-bold text-gray-700 dark:text-gray-500">
                                    Delivrer par : {{$value['delivrer']}} / {{$value['annee']}}
                                </div>

                            </div>
                            @endforeach

                        </div>

                        @endempty


                    </div>
                    <div class="justify-around hidden max-w-3xl mx-auto ">
                        <div>
                            <p class="mt-4 text-gray-500 dark:text-gray-200">Education</p>


                        </div>
                        <div>
                            <p class="mt-4 text-gray-500 dark:text-gray-200">Certification</p>

                        </div>


                    </div>
            </section>

            <section class="bg-gray-100 dark:bg-gray-900">
                <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="max-w-3xl mx-auto text-center">
                        <h2 class="text-lg font-bold text-gray-800 xl:text-3xl dark:text-gray-200">Mes Compétences</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-200">Voici quelques-unes des compétences que je
                            maîtrise
                            :</p>
                        <div class="grid grid-cols-1 gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-3">

                            @foreach($freelance->competences as $value)
                            <div class="px-4 py-4 bg-green-300 rounded-lg shadow-lg">
                                <div class="text-lg font-bold text-gray-700">{{$value['skill']}}</div>

                            </div>
                            @endforeach
                        </div>
                    </div>
            </section>

            <section class="bg-white">
                <div class="px-2 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="max-w-3xl mx-auto text-center">
                        <h2 class="text-3xl font-bold text-gray-800">Mes Services</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-200">Voici quelques-uns des services que j'ai créés
                            sur
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
                            <div id="service-slider" class="p-4 splide">
                                <div class="splide__track">
                                    <div class="p-6 splide__list">
                                        @forelse($freelance->services as $service)
                                        <div
                                            class="overflow-hidden rounded-lg shadow-lg splide__slide bg-gray-50 dark:bg-gray-900">


                                            <div x-data="{
                                                                                    slide: 0,
                                                                                    maxSlides: {{ count($service->files) }},
                                                                                    showButton: false
                                                                                    }"
                                                class="relative w-full h-48 overflow-hidden"
                                                @mouseover="showButton = true" @mouseleave="showButton = false">
                                                <div class="absolute inset-0 cursor-pointer">
                                                    <template
                                                        x-for="(image, index) in {{ json_encode($service->files) }}"
                                                        :key="index">
                                                        <div x-show="slide === index"
                                                            class="absolute top-0 left-0 w-full h-48 transition duration-500 ease-out bg-center bg-cover"
                                                            :style="'background-image: url(/storage/service/' + image + ')'">

                                                        </div>
                                                    </template>
                                                </div>

                                                <div class="absolute flex justify-between transform -translate-y-1/2 top-1/2 left-5 right-5"
                                                    x-show="showButton">
                                                    <a href="#" class="btn btn-outline btn-circle btn-sm"
                                                        @click.prevent="slide = (slide - 1 + maxSlides) % maxSlides">❮</a>
                                                    <a href="#" class="btn btn-outline btn-circle btn-sm"
                                                        @click.prevent="slide = (slide + 1) % maxSlides">❯</a>
                                                </div>
                                            </div>

                                            <div class="px-4 py-2 mt-2 max-h-[14rem] md:max-h-[14rem] md:mt-2">
                                                <a href="{{route('ServicesViewOne',['id'=>$service->id,'category'=>$service->category->name])}}"
                                                    class="mb-2 text-sm font-semibold md:text-base "
                                                    :class="linkHover ? 'text-amber-600' : 'text-gray-800 dark:text-gray-200'">{{$service->title}}
                                                </a>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-300">

                                                    {{$service->category->name}}</p>
                                                <div class="flex items-center justify-between">


                                                    <div class="flex items-center">
                                                        <svg class="w-4 h-4 mr-1 text-yellow-500 fill-current"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path
                                                                d="M10 14.155L4.284 17.84l.828-5.076L.898 7.865l5.059-.736L10 2l2.043 5.129 5.059.736-3.215 3.9.828 5.076z" />
                                                        </svg>
                                                        <span
                                                            class="font-semibold text-gray-700">{{$service->averageFeedback()}}
                                                            ({{$service->orderCount()}})</span>
                                                    </div>
                                                    <span class="text-sm text-gray-500">Top</span>
                                                </div>
                                                <div class="flex px-4 py-2">
                                                    <p>A partir de <span
                                                            class="text-gray-500 dark:text-gray-100 text-md">${{$service->basic_price}}</span>
                                                    </p>
                                                </div>
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

            <section class="hidden bg-gray-200 dark:bg-gray-900">
                <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="max-w-3xl mx-auto text-center">
                        <h2 class="text-3xl font-bold text-gray-800">Mes Projets</h2>
                        <p class="mt-4 text-gray-500 dark:text-gray-200">Voici quelques-uns des projets sur lesquels
                            j'ai
                            travaillé :</p>
                        <div class="grid grid-cols-1 gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                                <a href="#">
                                    <img class="object-cover w-full h-48" src="https://via.placeholder.com/500x300"
                                        alt="Projet 1">
                                </a>
                                <div class="p-6">
                                    <h3 class="text-lg font-bold text-gray-900"><a href="#">Nom du Projet</a></h3>
                                    <p class="mt-2 text-gray-500">Description du projet</p>
                                </div>
                            </div>
                            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                                <a href="#">
                                    <img class="object-cover w-full h-48" src="https://via.placeholder.com/500x300"
                                        alt="Projet 2">
                                </a>
                                <div class="p-6">
                                    <h3 class="text-lg font-bold text-gray-900"><a href="#">Nom du Projet</a></h3>
                                    <p class="mt-2 text-gray-500">Description du projet</p>
                                </div>
                            </div>
                            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                                <a href="#">
                                    <img class="object-cover w-full h-48" src="https://via.placeholder.com/500x300"
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

            <section class="hidden bg-gray-100 ">
                <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="max-w-3xl mx-auto text-center">
                        <h2 class="text-3xl font-bold text-gray-900">Témoignages</h2>
                        <p class="mt-4 text-gray-500">Voici ce que mes clients satisfaits ont à dire :</p>
                        <div class="hidden grid-cols-1 gap-4 mt-8 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                                <div class="p-6">
                                    <p class="mt-2 text-gray-500">"Prénom a été un développeur incroyable pour
                                        travailler
                                        sur mon projet. Il a été
                                        très réactif à mes demandes et a fourni un travail de qualité dans les délais
                                        impartis."</p>
                                    <p class="mt-4 font-medium text-gray-900">Nom de la personne - Entreprise</p>
                                </div>
                            </div>
                            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                                <div class="p-6">
                                    <p class="mt-2 text-gray-500">"J'ai été très satisfait du travail de Prénom sur mon
                                        projet. Il a été très professionnel et a travaillé dur pour s'assurer que le
                                        résultat final répondait à toutes mes attentes."</p>
                                    <p class="mt-4 font-medium text-gray-900">Nom de la personne - Entreprise</p>
                                </div>
                            </div>
                            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                                <div class="p-6">
                                    <p class="mt-2 text-gray-500">"Je recommande vivement Prénom pour tout travail de
                                        développement web. Il a été un plaisir de travailler avec lui et son travail
                                        parle
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
    @livewire('user.navigation.footer')
</div>