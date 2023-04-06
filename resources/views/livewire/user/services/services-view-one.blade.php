<div>
    <div class="min-h-screen pt-20 md:px-8 bg-gray-100 dark:bg-gray-900"
        x-data="{ isOpen:false,isLoading: true,showFilters: false,showSearch: false }"
        x-init="setTimeout(() => { isLoading = false }, 3000)">

        <div class="px-2">
            @include('include.breadcumb',['category'=>'cagegory','categoryName'=>$service->category->name,'ServiceId'=>$service->id])
        </div>

        <div>

            <div x-show="isLoading">

                <div class="flex flex-row flex-1 h-screen p-8 overflow-y-hidden">
                    <div
                        class="order-first hidden w-full md:w-2/3 h-screen p-2 px-2 mx-2 overflow-y-auto bg-gray-300 rounded-md animate-pulse custom-scrollbar md:flex ">
                        <div>

                        </div>
                    </div>
                    <div
                        class="flex-1 h-screen p-4 overflow-y-auto text-xs flex-col mx-4 mb-4 md:flex md:order-2 md:mb-0 md:w-1/3 bg-gray-200 border-r border-indigo-300 rounded-md animate-pulse custom-scrollbar">


                    </div>
                </div>
            </div>

        </div>

        <div x-show="!isLoading" class="container px-4 py-8 mx-auto">


            <div class="flex flex-col md:flex-row md:space-x-8">

                <div class="flex-col mx-4 mb-4 md:flex md:order-2 md:mb-0 md:w-1/3">
                    <div style="top:8rem;" class="sticky pt-2px-2 flex flex-col gap-2  ">
                        <div class=" gap-2 flex-wrap hidden">
                            <x-button label="Basic" />
                            <x-button label="Extra" />
                            <x-button label="Premium" />
                        </div>
                        <div class="border-blue-400 bg-white p-2 dark:bg-gray-800 rounded-lg border  shadow-lg">


                            <div class="p-4 mb-4 rounded-lg">
                                <p class="mb-2 px-auto font-bold text-gray-800 dark:text-gray-50 text-center">DETAILS
                                </p>
                                <p class="mb-2 font-bold text-gray-800 dark:text-gray-50 ">Support</p>
                                <p class="mb-2 text-gray-800 dark:text-gray-50">Service</p>

                                <p class="mb-2 text-gray-800 dark:text-gray-50">Format : AI, EPS, SVG, PDF, PNG, JPG</p>

                                <p class="mb-2 font-thin text-xl dark:text-gray-50  text-gray-800">Prix :
                                    {{$service->basic_price}} $</p>

                                <x-button wire:click="add_cart()" x-on:click="isOpen=true" class="w-full"
                                    label="AJOUTER" primary>
                                </x-button>

                            </div>


                        </div>
                        <div
                            class="sticky p-6 hidden md:flex bg-white dark:bg-gray-800 rounded-lg border border-blue-400">
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

        <div x-show="!isLoading">

            <p class="font-bold text-gray-800 text-lg dark:text-gray-50">Du meme Categorie</p>
            <div class="grid md:grid-cols-5 gap-4 px-4 py-4 mx-auto">

                @forelse ($servicesOther as $serviceOther)

                <div x-data="{linkHover: false}" style="" @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    class="overflow-hidden bg-white rounded-lg shadow-md dark:text-gray-200 dark:bg-gray-800"
                    style="width: 300px;">
                    <div class="flex flex-row md:flex-col">
                        @foreach ($serviceOther->files as $key=>$value)
                        <div class="w-48 h-auto bg-center bg-cover md:w-full md:h-48"
                            style="background-image: url('{{$value}}');">
                        </div>
                        @break
                        @endforeach


                        <div class="px-4 py-2 mt-2 max-h-[14rem] md:max-h-[14rem] md:mt-2">
                            <a href="{{route('ServicesViewOne',['id'=>$serviceOther->id,'category'=>$serviceOther->category->name])}}"
                                class="mb-2 text-sm md:text-base font-semibold  "
                                :class="linkHover ? 'text-amber-600' : 'text-gray-800 dark:text-gray-200'">{{$serviceOther->title}}
                            </a>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-100">
                                {{$serviceOther->freelance->user->name}} •
                                {{$serviceOther->category->name}}</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-yellow-500 fill-current"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 14.155L4.284 17.84l.828-5.076L.898 7.865l5.059-.736L10 2l2.043 5.129 5.059.736-3.215 3.9.828 5.076z" />
                                    </svg>
                                    <span class="font-semibold text-gray-700">4.9 (142)</span>
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
                <p class="font-semibold text-xl text-gray-600 dark:text-gray-100">Total :
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