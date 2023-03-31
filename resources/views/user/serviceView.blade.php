@extends('layouts.user')

@section('content')

<div>
    <div x-data={isOpen:false} class="min-h-screen pt-20 md:px-8 bg-gray-50 dark:bg-gray-900">

        <div class="px-2">
            @include('include.breadcumb',['category'=>'cagegory','categoryName'=>'Programmation','ServiceName'=>'title'])
        </div>

        <div class="container px-4 py-8 mx-auto">


            <div class="flex flex-col md:flex-row md:space-x-8">

                <div class="flex-col mx-4 mb-4 md:flex md:order-2 md:mb-0 md:w-1/3">
                    <div class="sticky pt-2px-2 flex flex-col gap-2  top-6">
                        <div class="flex gap-2 flex-wrap">
                            <x-button label="Basic" />
                            <x-button label="Extra" />
                            <x-button label="Premium" />
                        </div>
                        <div class="border-amber-600 bg-white p-2 dark:bg-gray-800 rounded-lg border  shadow-lg">

                            <p class="mb-2 px-auto font-bold text-gray-800 dark:text-gray-50">Prix</p>
                            <div class="p-4 mb-4 rounded-lg">
                                <p class="mb-2 font-bold text-gray-800 dark:text-gray-50 ">Support</p>
                                <p class="mb-2 text-gray-800 dark:text-gray-50">Service</p>

                                <p class="mb-2 text-gray-800 dark:text-gray-50">Format : AI, EPS, SVG, PDF, PNG, JPG</p>

                                <p class="mb-2 font-bold dark:text-gray-50 text-gray-800">Prix : 300 $</p>
                                <x-button wire:ignore x-on:click="isOpen=true" label="AJOUTER" primary>
                                </x-button>
                            </div>
                        </div>
                        <div class="sticky p-6 bg-white dark:bg-gray-800 rounded-lg border border-amber-600">
                            <x-button wire:ignore x-on:click="isOpen=true" label="AJOUTER" primary />
                        </div>

                    </div>



                </div>
                <div class="w-full md:w-2/3">
                    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">


                        <div x-data="{ image: '/images/hero/blog_1.jpeg' }"
                            class="flex flex-col items-center justify-center">
                            <img :src="image" class="object-cover mr-4 rounded-md w-full h-80" alt="Product Name">

                            <div class="flex items-cetnter justify-between space-x-2 mt-4">
                                <img @click="image = '/images/hero/blog_1.jpeg'" src="/images/hero/blog_1.jpeg"
                                    alt="Product Name"
                                    class="w-20 xl:w-16 2xl:w-24 h-full border cursor-pointer hover:opacity-80">
                                <img @click="image = '/images/hero/hero.jpg'" src="/images/hero/hero.jpg"
                                    alt="Product Name"
                                    class="w-20 xl:w-16 2xl:w-24 h-full border cursor-pointer hover:opacity-80">
                                <img @click="image = '/images/hero/blog_1.jpeg'" src="/images/hero/blog_1.jpeg"
                                    alt="Product Name"
                                    class="w-20 xl:w-16 2xl:w-24 h-full border cursor-pointer hover:opacity-80">
                                <img @click="image = '/images/hero/blog_1.jpeg'" src="/images/hero/blog_1.jpeg"
                                    alt="Product Name"
                                    class="w-20 xl:w-16 2xl:w-24 h-full border cursor-pointer hover:opacity-80">
                            </div>
                        </div>


                        <div>
                            <p class="mt-4 text-2xl font-bold text-gray-800 dark:text-gray-50">title</p>

                        </div>



                        <p class="mb-4 text-gray-800 dark:text-gray-200">Lorem, ipsum dolor sit amet consectetur
                            adipisicing elit. Rem sit
                            vel eligendi a perspiciatis voluptate ab culpa at tempore, exercitationem reiciendis magni
                            incidunt harum quos voluptatem nemo corrupti animi quo?</p>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="font-bold dark:text-gray-50 text-gray-800">Support :</p>
                                <ul class="text-gray-700 dark:text-gray-100">
                                    <li>All</li>
                                    <li>All</li>
                                    <li>All</li>
                                    <li>All</li>
                                    <li>All</li>
                                </ul>

                            </div>

                            <div>
                                <p class="font-bold text-gray-800 dark:text-gray-50">Révision :</p>
                                <p class="text-gray-700 dark:text-gray-100">0</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="font-bold text-gray-800 dark:text-gray-50">Exemples réalisés :</p>
                                <p class="text-gray-700 dark:text-gray-100">12</p>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800">Commentaires :</p>
                            </div>
                            <p class="text-gray-700 dark:text-gray-100">0</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="font-bold text-gray-800 dark:text-gray-50">Prix :</p>
                                <p class="text-gray-700 dark:text-gray-100">à partir de 250$</p>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800">Délai :</p>
                                <p class="text-gray-700 dark:text-gray-100">3 jours</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="font-bold text-gray-800 dark:text-gray-50">Format :</p>
                                <p class="text-gray-700 dark:text-gray-100">Jpg , jepg</p>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 dark:text-gray-50">Source :</p>
                                <p class="text-gray-700 dark:text-gray-100">Fichier source inclus</p>
                            </div>
                        </div>
                        <div>
                            <p class="mb-4 text-xl font-bold text-gray-800 dark:text-gray-50">Avis des clients</p>

                            <div class="p-4 mb-4 bg-gray-100 dark:bg-gray-600 rounded-lg">
                                <p class="text-gray-700 dark:text-gray-100">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, voluptatum soluta
                                    odit beatae vel, aut, obcaecati nam porro animi similique delectus fuga repellat
                                    maiores reiciendis dolores cum assumenda doloremque id.</p>
                                <div class="flex items-center">
                                    <img class="object-cover w-8 h-8 mr-2 rounded-full"
                                        src="chemin/vers/photo_client.jpg" alt="Photo du client">
                                    <p class="font-bold text-gray-800">Banza</p>
                                </div>
                            </div>
                            <div class="p-4 mb-4 bg-gray-100 dark:bg-gray-600 rounded-lg">
                                <p class="text-gray-700 dark:text-gray-100">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maxime, voluptatum soluta
                                    odit beatae vel, aut, obcaecati nam porro animi similique delectus fuga repellat
                                    maiores reiciendis dolores cum assumenda doloremque id.</p>
                                <div class="flex items-center">
                                    <img class="object-cover w-8 h-8 mr-2 rounded-full"
                                        src="chemin/vers/photo_client.jpg" alt="Photo du client">
                                    <p class="font-bold text-gray-800">Banza</p>
                                </div>
                            </div>




                            <div class="">
                                <p class="mb-4 text-xl font-bold text-gray-800">À propos du freelance</p>
                                <div class="flex items-center mb-8">


                                    <img class="w-8 h-8 rounded-full" src="" alt="">

                                    <div>
                                        <p class="font-bold text-gray-800 dark:text-gray-100">
                                            gmk</p>
                                        <p class="block text-gray-700 truncate dark:text-gray-100">
                                            GRAPHISME</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>


        <div class="grid grid-cols-4  px-4 py-4 mx-auto">

            <div x-data="{linkHover: false}" style="" @mouseover="linkHover = true" @mouseleave="linkHover = false"
                class="overflow-hidden bg-white rounded-lg shadow-md dark:text-gray-200 dark:bg-gray-800">
                <div class="flex flex-row md:flex-col">
                    <div class="w-48 h-auto bg-center bg-cover md:w-full md:h-48"
                        style="background-image: url('https://source.unsplash.com/200x200/?fashion?1');"></div>
                    <div class="flex flex-col justify-between p-4 dark:text-gray-200 md:p-6">
                        <div>
                            <a href="{{route('categoryOne',['id'=>'1','category'=>'programmation'])}}"
                                class="mb-2 text-lg font-semibold  "
                                :class="linkHover ? 'text-amber-600' : 'text-gray-800 dark:text-gray-200'">Nom du
                                Service
                            </a>
                            <div class="flex items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 text-yellow-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M10 13.165l-4.53 2.73 1.088-5.997L.976 6.305l6.018-.873L10 0l2.006 5.432 6.018.873-4.582 3.593 1.088 5.997L10 13.165z" />
                                </svg>
                                <p class="text-sm text-gray-700 dark:text-gray-200">4.5 (25)</p>
                            </div>
                            <div class="flex items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 text-gray-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p class="text-sm text-gray-700 dark:text-gray-200">Nom du Freelance</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between dark:text-gray-200">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">$99</h4>
                            <div class="flex items-center">
                                <button class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M15.707 4.293a1 1 0 010 1.414L6.414 15H3a1 1 0 110-2h2.586l9.293-9.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>

                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-2 dark:text-gray-200">
                            <x-button sm label="ajouter" />
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <div class="fixed bottom-0 left-0 bg-white rounded-xl dark:bg-gray-800  shadow-lg  p-2 m-4 flex items-center">
            <div class="w-12 h-12 mr-4 rounded-full overflow-hidden">
                <img src="https://placehold.it/200x200" alt="Photo du freelance" class="w-full h-full object-cover">
            </div>
            <div>
                <div class="font-bold dark:text-gray-50 ">Nom du freelance</div>
                <div class="text-sm text-gray-500">online</div>
            </div>

        </div>




    </div>
</div>


@endsection