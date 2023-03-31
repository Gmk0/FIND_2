<div>
    <div x-data={isOpen:false} class="min-h-screen pt-20 md:px-8 bg-gray-50 dark:bg-gray-900">

        <div class="px-2">
            @include('include.breadcumb',['category'=>'cagegory','categoryName'=>$service->category->name,'ServiceName'=>$service->category->id])
        </div>

        <div class="container px-4 py-8 mx-auto">


            <div class="flex flex-col md:flex-row md:space-x-8">

                <div class="flex-col mx-4 mb-4 md:flex md:order-2 md:mb-0 md:w-1/3">
                    <div class="sticky pt-2px-2 flex flex-col gap-2  top-6">
                        <div class="flex gap-2 flex-wrap hidden">
                            <x-button label="Basic" />
                            <x-button label="Extra" />
                            <x-button label="Premium" />
                        </div>
                        <div class="border-amber-600 bg-white p-2 dark:bg-gray-800 rounded-lg border  shadow-lg">


                            <div class="p-4 mb-4 rounded-lg">
                                <p class="mb-2 px-auto font-bold text-gray-800 dark:text-gray-50 text-center">DETAILS
                                </p>
                                <p class="mb-2 font-bold text-gray-800 dark:text-gray-50 ">Support</p>
                                <p class="mb-2 text-gray-800 dark:text-gray-50">Service</p>

                                <p class="mb-2 text-gray-800 dark:text-gray-50">Format : AI, EPS, SVG, PDF, PNG, JPG</p>

                                <p class="mb-2 font-thin text-xl dark:text-gray-50  text-gray-800">Prix :
                                    {{$service->basic_price}} $</p>

                                <x-button wire:ignore x-on:click="isOpen=true" class="w-full" label="AJOUTER" primary>
                                </x-button>

                            </div>


                        </div>
                        <div
                            class="sticky p-6 hidden md:flex bg-white dark:bg-gray-800 rounded-lg border border-amber-600">
                            <x-button wire:ignore x-on:click="isOpen=true" label="Contacter le Seller" success />
                        </div>

                    </div>



                </div>
                <div class="w-full md:w-2/3">
                    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">


                        <div x-data="{ image: @entangle('images') }" class="flex flex-col items-center justify-center">
                            <img :src="image" class="object-cover mr-4 rounded-md w-full h-80" alt="Product Name">


                            <div class="flex items-cetnter justify-between space-x-2 mt-4">
                                @foreach ($service->files as $key=>$value)
                                <img @click="image = '{{$value}}'" src="{{$value}}" alt="Product Name"
                                    class="w-16 xl:w-16 2xl:w-24 h-full border cursor-pointer hover:opacity-80">
                                @endforeach

                            </div>
                        </div>


                        <div>
                            <p class="mt-4 text-lg md:text-2xl font-bold text-gray-800 dark:text-gray-50">
                                {{$service->title}}</p>

                        </div>



                        <p class="mb-4 text-gray-800 text-sm md:text-base dark:text-gray-200">{{$service->description}}
                        </p>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <p class="font-bold dark:text-gray-50 text-gray-800">Support :</p>
                                <ul class="text-gray-700 dark:text-gray-100">
                                    {{$service->basic_support}}
                                </ul>

                            </div>

                            <div>
                                <p class="font-bold text-gray-800 dark:text-gray-50">Révision :</p>
                                <p class="text-gray-700 dark:text-gray-100">{{$service->basic_revision}}</p>
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
                                <p class="text-gray-700 dark:text-gray-100">à partir de {{$service->basic_price}}$</p>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800 dark:text-gray-50">Délai :</p>
                                <p class="text-gray-700 dark:text-gray-100">{{$service->basic_delivery_time}} jours</p>
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
                            <p class="mb-4 text-lg md:text-xl font-bold text-gray-800 dark:text-gray-50">Avis des
                                clients</p>

                            <div class="p-4 mb-4 bg-gray-100 dark:bg-gray-600 rounded-lg">
                                <p class="text-gray-700 text-sm md:text-base dark:text-gray-100">
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
                                <p class="text-gray-700 text-sm md:text-base dark:text-gray-100">
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


                                    @if (!empty($service->freelance->user->profile_photo_path))
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{$service->freelance->user->profile_photo_path}}" alt="">
                                    @else
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{$service->freelance->user->profile_photo_url }}" alt="">
                                    @endif

                                    <div>
                                        <p class="font-bold text-gray-800 dark:text-gray-100">
                                            {{$service->freelance->user->name}}</p>
                                        <p class="block text-gray-700 truncate dark:text-gray-100">
                                            {{$service->freelance->category->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>


        <div class="grid md:grid-cols-4 gap-4 px-4 py-4 mx-auto">

            @forelse ($servicesOther as $serviceOther)

            <div x-data="{linkHover: false}" style="" @mouseover="linkHover = true" @mouseleave="linkHover = false"
                class="overflow-hidden bg-white rounded-lg shadow-md dark:text-gray-200 dark:bg-gray-800">
                <div class="flex flex-row md:flex-col">
                    @foreach ($serviceOther->files as $key=>$value)
                    <div class="w-44 h-auto bg-center bg-cover md:w-full md:h-44"
                        style="background-image: url('{{$value}}');"></div>
                    @break
                    @endforeach


                    <div class="flex flex-col justify-between p-4 dark:text-gray-200 md:p-6">
                        <div>
                            <a href="{{route('categoryOne',['id'=>'1','category'=>'programmation'])}}"
                                class="mb-2 text-lg font-semibold  "
                                :class="linkHover ? 'text-amber-600' : 'text-gray-800 dark:text-gray-200'">{{$serviceOther->title}}
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
                                <p class="text-sm text-gray-700 dark:text-gray-200">
                                    {{$serviceOther->freelance->user->name}}</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between dark:text-gray-200">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                ${{$serviceOther->basic_price}}</h4>
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
            @empty

            @endforelse



        </div>

        <div
            class="fixed bottom-0  z-50 left-0 bg-white rounded-xl dark:bg-gray-800  shadow-lg  p-2 m-4 flex items-center">
            <div class="w-10 h-10 md:w-12  md:h-12 mr-4 rounded-full overflow-hidden">

                @if (!empty($service->freelance->user->profile_photo_path))
                <img class="w-8 h-8 rounded-full" src="{{$service->freelance->user->profile_photo_path}}" alt="">
                @else
                <img class="w-8 h-8 rounded-full" src="{{$service->freelance->user->profile_photo_url }}" alt="">
                @endif

            </div>
            <div>
                <div class="font-bold dark:text-gray-50 ">{{$service->freelance->user->name}}</div>
                <div class="text-sm text-gray-500">online</div>
            </div>

        </div>




    </div>
</div>