<div>
    <div class="min-h-screen pt-20 bg-gray-50 md:px-8 dark:bg-gray-900"
        x-data="{ isOpen:false,isLoading: true,showFilters: false,showSearch: false }"
        x-init="setTimeout(() => { isLoading = false }, 3000)">

        <div class="px-2">
            @include('include.breadcumb',['category'=>'cagegory','categoryName'=>$service->category->name,'ServiceId'=>$service->id])
        </div>

        <div>

            <div x-show="isLoading">

                <div class="flex flex-row flex-1 h-screen p-8 overflow-y-hidden">
                    <div
                        class="order-first hidden w-full h-screen p-2 px-2 mx-2 overflow-y-auto bg-gray-300 rounded-md md:w-2/3 animate-pulse custom-scrollbar md:flex ">
                        <div>

                        </div>
                    </div>
                    <div
                        class="flex-col flex-1 h-screen p-4 mx-4 mb-4 overflow-y-auto text-xs bg-gray-200 border-r border-indigo-300 rounded-md md:flex md:order-2 md:mb-0 md:w-1/3 animate-pulse custom-scrollbar">


                    </div>
                </div>
            </div>

        </div>

        <div x-show="!isLoading" x-cloak class="container px-4 py-8 mx-auto">


            <div class="flex flex-col md:flex-row md:space-x-8">

                <div class="flex-col mx-2 mb-4 md:flex md:order-2 md:mb-0 md:w-1/3">
                    <div style="top:8rem;" class="sticky flex flex-col gap-2 pt-2px-2 ">
                        <div class="flex-wrap hidden gap-2 ">
                            <x-button label="Basic" />
                            <x-button label="Extra" />
                            <x-button label="Premium" />
                        </div>
                        {{-- <div class="p-2 bg-white rounded-lg shadow-lg dark:bg-gray-800">

                            <div class="p-3 sm:col-span-8 lg:col-span-7">
                                <h2 class="text-2xl font-bold text-gray-800 truncate sm:pr-12">{{$service->title}}</h2>

                                <section aria-labelledby="information-heading" class="mt-2">
                                    <h3 id="information-heading" class="sr-only">Product information</h3>

                                    <p class="text-2xl text-gray-900 dark:text-gray-200">${{$service->basic_price}}</p>

                                    <!-- Reviews -->
                                    <div class="mt-6">
                                        <h4 class="sr-only">Reviews</h4>
                                        <div class="flex items-center">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-1 text-yellow-500 fill-current"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 14.155L4.284 17.84l.828-5.076L.898 7.865l5.059-.736L10 2l2.043 5.129 5.059.736-3.215 3.9.828 5.076z" />
                                                </svg>
                                                <span
                                                    class="font-semibold text-gray-700">{{$service->averageFeedback()}}
                                                </span>
                                            </div>

                                            <p class="sr-only">{{$service->averageFeedback()}} out of 5 stars</p>
                                            <a href="#"
                                                class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">{{$service->orderCount()}}
                                                reviews</a>
                                        </div>
                                    </div>
                                </section>

                                <section aria-labelledby="options-heading" class="mt-5">
                                    <h3 id="options-heading" class="sr-only">Service options</h3>

                                    <form>
                                        <!-- Colors -->
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900">Support</h4>

                                            {!! $service->basic_support !!}

                                        </div>

                                        <!-- Sizes -->


                                        <button wire:click='add_cart()' type="button"
                                            class="flex items-center justify-center w-full px-8 py-3 mt-6 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Ajouter</button>
                                    </form>
                                </section>
                            </div>

                        </div>--}}

                        <div class="p-2 bg-white shadow-lg dark:bg-gray-800">
                            <div class="p-3 sm:col-span-8 lg:col-span-7">
                                <h2 class="text-2xl font-bold text-gray-800 truncate dark:text-gray-300 sm:pr-12">
                                    {{$service->title}}</h2>

                                <section aria-labelledby="information-heading" class="px-4 mt-1">
                                    <h3 id="information-heading" class="sr-only">Product information</h3>
                                    <div class="my-3">
                                        <h4 class="sr-only">Reviews</h4>
                                        <div class="flex items-center">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-1 text-yellow-500 fill-current"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 14.155L4.284 17.84l.828-5.076L.898 7.865l5.059-.736L10 2l2.043 5.129 5.059.736-3.215 3.9.828 5.076z" />
                                                </svg>

                                                <span
                                                    class="text-sm font-semibold text-gray-700 dark:text-gray-100">({{$service->averageFeedback()}})
                                                </span>
                                            </div>

                                            <p class="sr-only">3 out of 5 stars</p>
                                            <a href="#"
                                                class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">{{$service->orderCount()}}
                                                reviews</a>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <span class="py-2 text-gray-400">a partir de </span>
                                        <p class="text-2xl font-bold text-red-500">${{$service->basic_price}}</p>
                                    </div>

                                    <!-- Reviews -->
                                </section>

                                <section aria-labelledby="options-heading" class="px-4 mt-1">
                                    <h3 id="options-heading" class="sr-only">Service options</h3>

                                    <div>
                                        <!-- Colors -->
                                        <div class="md:hidden">
                                            <h4 class="mb-2 text-lg font-medium text-gray-900 dark:text-gray-200">
                                                Support</h4>
                                            {!! $service->basic_support !!}
                                        </div>

                                        <!-- Sizes -->

                                        <div class="flex">
                                            <button wire:click="add_cart()" type="button"
                                                class="flex items-center justify-center w-full gap-1 px-8 py-3 mt-4 text-base font-medium text-white bg-indigo-600 border border-transparent hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                </svg>
                                                Ajouter
                                                au Panier</button>
                                        </div>

                                        <div class="flex justify-between mt-3">
                                            <div x-data="{ like: @json($service->isFavorite()) }"
                                                class="flex items-center">
                                                <button class="flex gap-1 mr-2" x-on:click="like=!like"
                                                    @click="$wire.toogleFavorite({{$service->id}})">


                                                    <span x-cloak x-show="!like" class="">
                                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>

                                                    </span>
                                                    <span x-cloak x-show="like">
                                                        <svg class="w-5 h-5 text-red-500"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                        </svg>
                                                    </span>
                                                    <span x-show="!like" class="text-sm"> a jouter aux favoris</span>
                                                    <span x-show="like" class="text-sm"> retirer de favoris</span>

                                                </button>



                                            </div>
                                            <div>
                                                <ul class="flex gap-2 text-sm text-gray-300">
                                                    <li class="flex gap-1 cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z" />
                                                        </svg>
                                                        <span class="text-sm">Share</span>
                                                    </li>
                                                    <li class="flex gap-1 cursor-pointer">
                                                        <ion-icon class="w-5 h-5 text-blue-600" name="logo-twitter">
                                                        </ion-icon>
                                                        <span class="text-sm">tweet</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="flex gap-1 space-x-0 font-mono text-sm text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-4 h-4 text-red-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                                </svg>

                                                <strong class="text-red-500">14</strong> Personnes ont recherché ce
                                                service
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <div class="sticky hidden gap-1 p-6 bg-white rounded-lg md:flex dark:bg-gray-800">
                            <div>
                                <x-button wire:ignore positive x-on:click="isOpen=true" wire:click="contacter"
                                    label="Contacter le Seller" success />

                            </div>


                            <div class="flex gap-1">
                                <div class="w-10 h-10 mr-4 overflow-hidden ">

                                    @if (!empty($service->freelance->user->profile_photo_path))
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{$service->freelance->user->profile_photo_path}}" alt="">
                                    @else
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{$service->freelance->user->profile_photo_url }}" alt="">
                                    @endif

                                </div>
                                <div>
                                    <div class="font-bold dark:text-gray-200 ">{{$service->freelance->user->name}}</div>
                                    <div class="text-sm text-gray-500">{{$service->freelance->user->is_online ?
                                        'online':'pas disponible'}}
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>



                </div>
                <div x-data="{step:1, showExemple:false}" class="w-full md:w-2/3">
                    <div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">


                        <div x-data="{ image: @entangle('images') }" class="flex flex-col items-center justify-center">


                            <img x-bind:src="'/storage/service/' + image"
                                class="object-cover w-full mr-4 rounded-md h-72" alt="Product Name">

                            <div class="flex justify-between mt-4 space-x-2 items-cetnter">
                                @foreach ($service->files as $key=>$value)
                                <img @click="image = '{{$value}}'" src="{{ url('/storage/service/' . $value) }}"
                                    alt="Product Name"
                                    class="w-16 h-full border cursor-pointer xl:w-16 2xl:w-24 hover:opacity-80">
                                @endforeach

                            </div>
                        </div>



                        <div>
                            <p class="mt-4 text-lg font-bold text-gray-800 md:text-2xl dark:text-gray-200">
                                {{$service->title}}</p>

                        </div>







                        <div class="w-full tabs">
                            <a @click="step = 1" :class="step == 1 ? 'tab-active':''"
                                class="tab md:tab-lg tab-bordered">information</a>
                            <a @click="step = 2" :class="step == 2 ? 'tab-active':''"
                                class="tab md:tab-lg tab-bordered ">Exemple </a>
                            <a @click="step = 3" :class="step == 3 ? 'tab-active':''"
                                class="tab md:tab-lg tab-bordered">Review</a>
                        </div>



                        <div x-show.transition="step==1" class="py-5 min-h-64">
                            <div class="mb-4 text-sm text-gray-800 md:text-base dark:text-gray-200">


                                {!! $service->description !!}

                            </div>


                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <p class="font-bold text-gray-500 dark:text-gray-200">Support :</p>
                                    <div class="text-gray-800">
                                        {!! $service->basic_support !!}

                                    </div>


                                </div>

                                <div>
                                    <p class="font-bold text-gray-500 dark:text-gray-200">Révision :</p>
                                    <p class="text-gray-700 dark:text-gray-300">{{$service->basic_revision}}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <p class="font-bold text-gray-500 dark:text-gray-200">Prix :</p>
                                    <p class="text-gray-700 dark:text-gray-300">à partir de {{$service->basic_price}}$
                                    </p>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-500 dark:text-gray-200">Délai :</p>
                                    <p class="text-gray-700 dark:text-gray-300">{{$service->basic_delivery_time}} jours
                                    </p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">

                                @if($service->category->name=="Photographie")
                                <div>
                                    <p class="font-bold text-gray-500 dark:text-gray-200">Format :</p>
                                    <p class="text-gray-700 dark:text-gray-300">Jpg , jepg</p>
                                </div>
                                @endif
                                <div>
                                    <p class="font-bold text-gray-500 dark:text-gray-200">Source :</p>
                                    <p class="text-gray-700 dark:text-gray-300">Fichier source inclus</p>
                                </div>
                            </div>
                        </div>



                        <div x-show.transition="step==2" class="py-5 min-h-72">

                        </div>


                        <div x-show.transition="step==3" class="py-5 min-h-72">


                            @if(!empty($commentaires))
                            @foreach ($commentaires as $commentaire)
                            <div class="p-4 mb-4 bg-gray-100 rounded-lg dark:bg-gray-600">
                                <p class="text-sm text-gray-700 md:text-base dark:text-gray-300">
                                    {{$commentaire->commentaires}}.</p>
                                <div class="flex items-center">
                                    @if (!empty($commentaire->order->user->profile_photo_path))
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{$commentaire->order->user->profile_photo_path}}" alt="">
                                    @else
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{$commentaire->order->user->profile_photo_url }}" alt="">
                                    @endif

                                    <p class="font-bold text-gray-800">{{$commentaire->order->user->name}}</p>
                                </div>
                            </div>
                            @endforeach


                            @else
                            <div class="p-4 mb-4 bg-gray-100 rounded-lg dark:bg-gray-700">
                                <p class="text-sm text-gray-700 md:text-base dark:text-gray-300">
                                    Pas de commentaires .</p>

                            </div>

                            @endif






                        </div>


                        <div class="">
                            <p class="mb-4 text-lg font-bold text-gray-800 dark:text-gray-200">À propos du freelance
                            </p>
                            <div class="flex items-center mb-8">



                                <img class="w-8 h-8 rounded-full"
                                    src="{{$service->freelance->user->profile_photo_url }}" alt="">


                                <div>
                                    <p class="font-bold text-gray-800 dark:text-gray-300">
                                        {{$service->freelance->user->name}}</p>
                                    <p class="block text-gray-700 truncate dark:text-gray-300">
                                        {{$service->freelance->category->name}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <div x-show="!isLoading ">
            <div class="px-4">
                <p class="text-lg font-bold text-gray-800 dark:text-gray-200">Du meme Categorie</p>
            </div>


            <div class="grid gap-4 px-4 py-4 mx-auto md:grid-cols-4">

                @forelse ($servicesOther as $serviceOther)

                <div x-data="{linkHover: false}" style="" @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    class="overflow-hidden bg-white rounded-lg shadow-md dark:text-gray-200 dark:bg-gray-800"
                    style="width: 300px;">
                    <div class="flex flex-row md:flex-col">




                        <div x-data="{
                                                                slide: 0,
                                                                maxSlides: {{ count($serviceOther->files) }},
                                                                showButton: false
                                                                }" class="relative w-full h-48 overflow-hidden"
                            @mouseover="showButton = true" @mouseleave="showButton = false">
                            <div class="absolute inset-0 cursor-pointer">
                                <template x-for="(image, index) in {{ json_encode($serviceOther->files) }}"
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
                            <a href="{{route('ServicesViewOne',['id'=>$serviceOther->id,'category'=>$serviceOther->category->name])}}"
                                class="mb-2 text-sm font-semibold md:text-base "
                                :class="linkHover ? 'text-amber-600' : 'text-gray-800 dark:text-gray-200'">{{$serviceOther->title}}
                            </a>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-300">
                                {{$serviceOther->freelance->user->name}} •
                                {{$serviceOther->category->name}}</p>
                            <div class="flex items-center justify-between">


                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-yellow-500 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 14.155L4.284 17.84l.828-5.076L.898 7.865l5.059-.736L10 2l2.043 5.129 5.059.736-3.215 3.9.828 5.076z" />
                                    </svg>
                                    <span class="font-semibold text-gray-700">{{$serviceOther->averageFeedback()}}
                                        ({{$serviceOther->orderCount()}})</span>
                                </div>
                                <span class="text-sm text-gray-500">Top</span>
                            </div>
                            <div class="flex px-4 py-2">
                                <p>A partir de <span
                                        class="text-gray-500 dark:text-gray-100 text-md">${{$serviceOther->basic_price}}</span>
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
                @empty

                @endforelse



            </div>
        </div>



        <div x-show="!navOpen"
            class="fixed bottom-0 left-0 z-40 items-center hidden p-2 m-4 bg-white shadow-lg md:flex rounded-xl dark:bg-gray-800">
            <div class="w-10 h-10 mr-4 overflow-hidden rounded-full md:w-12 md:h-12">

                @if (!empty($service->freelance->user->profile_photo_path))
                <img class="w-8 h-8 rounded-full" src="{{$service->freelance->user->profile_photo_path}}" alt="">
                @else
                <img class="w-8 h-8 rounded-full" src="{{$service->freelance->user->profile_photo_url }}" alt="">
                @endif

            </div>
            <div>
                <div class="font-bold dark:text-gray-200 ">{{$service->freelance->user->name}}</div>
                <div class="text-sm text-gray-500">{{$service->freelance->user->is_online ? 'online':'pas disponible'}}
                </div>
            </div>

        </div>


        {{-- <div x-cloak x-show="isOpen"
            class="fixed inset-0 right-0 z-30 flex flex-col w-9/12 bg-gray-100 md:w-1/3 custom-scrollbar"
            @click.away="isOpen = false">
            <div class="flex items-center justify-between p-4 bg-white border-b border-gray-200">
                <h2 class="text-lg font-semibold">Panier</h2>
                <button @click="isOpen = false" class="text-gray-500 hover:text-gray-600 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            @if(Session::has('cart'))
            <div class="flex-1 overflow-y-auto">


                @foreach ($products as $item)

                <div class="flex items-center p-4 space-x-4">

                    <img class="object-cover w-16 h-16 rounded-lg"
                        src="{{Storage::disk('local')->url('public/service/'.$item['image']) }}" alt="Service 1">
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800">{{$item['title']}}</h3>
                        <p class="text-gray-500 dark:text-gray-700">{{$item['basic_price']}} $</p>

                        <p class="text-gray-500 dark:text-gray-700">{{$item['quantity']}}</p>
                    </div>
                    <button wire:click="remove({{$item['id']}})"
                        class="text-gray-500 hover:text-gray-600 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            viewBox="0 0 24 24" stroke="currentColor">

                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                @endforeach
                <div wire:loading wire:target='add_cart' class="">

                    <h1 class="px-2">Chargement....</h1>

                </div>
            </div>
            <div class="flex items-center justify-between p-4 bg-white border-t border-gray-200">
                <p class="text-xl font-semibold text-gray-600 dark:text-gray-300">Total :
                    {{Session('cart')->totalPrice}}
                </p>
                <a href="" class="px-4 py-2 font-semibold text-white bg-indigo-500 rounded hover:bg-indigo-600">
                    Payer
                </a>
            </div>

            @else
            <div class="">
                <div wire:loading wire:target='add_cart' class="">

                    <h1 class="px-2">Chargement....</h1>

                </div>
                <h1>Votre Carte est vide</h1>

            </div>
            @endif
        </div>--}}



    </div>
</div>

@push('script')



@endpush