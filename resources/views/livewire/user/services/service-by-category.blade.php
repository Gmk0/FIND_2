<div>
    <div x-data="{isOpen:false}" class="min-h-screen pt-20 md:px-8">

        <div class="px-2">
            @include('include.breadcumb',['category'=>'cagegory','categoryName'=>$categoryName])
        </div>


        <div class="container px-4 ">
            <h2 class="mb-4 text-lg font-bold text-gray-600 md:text-2xl dark:text-gray-400">Recherche de
                Services
                "{{$categoryName}}" ({{$count}}) </h2>

        </div>
        <div>
            <div x-bind:class="isOpen ? 'fixed inset-0  top-0  bottom-0  dark:bg-gray-800 bg-white z-50 p-4 transition-all duration-200 w-full' : 'w-full hidden md:flex mt-0'"
                class="">
                <div class="container px-4 mx-auto">

                    <form class="mb-8">
                        <div class="grid -mx-2 md:grid-cols-4">
                            <div class="w-full px-2 mb-4">


                                <x-select placeholder="sous category" wire:model.debounce.500ms="sous_category">

                                    @forelse($subCategorie as $subCategory)
                                    <x-select.option label="{{$subCategory->name}}" value="{{$subCategory->name}}" />
                                    @empty
                                    <x-select.option label="empty" value="" />
                                    @endforelse


                                </x-select>
                            </div>


                            <div class="w-full px-2 mb-4">
                                <x-select placeholder="Delai de livraison" wire:model.debounce.500ms="delivery_time"
                                    :options="[
                                        '1-5'=>'1-5 jours',
                                        '5-10'=>'5-10 jours',
                                        '10-50'=>'10+ jours',
                                    ]" />
                            </div>
                            <div class="w-full px-2 mb-4">
                                <x-select placeholder="Niveau du Freelance" wire:model.debounce.500ms="freelance_niveau"
                                    :options="['basic'=>'basic',
                                    'premium'=>'premium',
                                    'extra'=>'extra']" />
                            </div>
                            <div class="flex w-full gap-2 px-2 mb-4">
                                <x-select placeholder="Prix" wire:model.debounce.500ms="price_range" :options="[
                                '1'=>'10-50',
                                '2'=>'50-100',
                                '3'=>'100+',

                                ]" />
                                <x-select wire:model.debounce.500ms="orderBy" placeholder="trier par">
                                    <x-select.option label="Prix" value="basic_price" />
                                    <x-select.option label="Delai" value="basic_delivery_time" />
                                    <x-select.option label="Niveau" value="basic_delivery_time" />
                                </x-select>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="flex gap-4 md:hidden">
                    <x-button label="Resultat ({{$count}})" @click="isOpen=false" />
                    <x-button @click="isOpen=false" label="Fermer" />

                </div>
            </div>

            <button x-on:click="isOpen=!isOpen"
                class="inline-block pl-3 no-underline dark:text-white md:hidden hover:text-amber-600" href="#">
                <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                </svg>
            </button>

        </div>



        <div class="py-2 dark:text-gray-100">
            <div class="container p-6 mx-auto space-y-8">

                <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                    @forelse ($services as $service)
                    <div x-data="{linkHover: false}" style="" @mouseover="linkHover = true"
                        @mouseleave="linkHover = false"
                        class="overflow-hidden bg-white rounded-lg shadow-md dark:text-gray-200 dark:bg-gray-800">
                        <div class="flex flex-row md:flex-col">
                            @foreach ($service->files as $key=>$value)

                            <div class="w-48 h-auto bg-center bg-cover md:w-full md:h-48"
                                style="background-image: url('{{$value}}');">
                            </div>
                            @break
                            @endforeach


                            <div class="max-h-[14rem] flex flex-col justify-between p-2 dark:text-gray-200 md:p-6">
                                <div>
                                    <a href="{{route('ServicesViewOne',['id'=>$service->id,'category'=>$service->category->name])}}"
                                        class="mb-2 text-sm font-semibold md:text-base "
                                        :class="linkHover ? 'text-amber-600' : 'text-gray-800 dark:text-gray-200'">{{$service->title}}
                                    </a>
                                    <div class="flex items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 text-yellow-500"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M10 13.165l-4.53 2.73 1.088-5.997L.976 6.305l6.018-.873L10 0l2.006 5.432 6.018.873-4.582 3.593 1.088 5.997L10 13.165z" />
                                        </svg>
                                        <p class="text-sm text-gray-700 dark:text-gray-200">
                                            {{$service->averageFeedback()}} ({{$service->orderCount()}})</p>
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
                                            {{$service->freelance->user->name}}</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between dark:text-gray-200">
                                    <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                        {{$service->basic_price}} $</h4>
                                    <div x-data="{like:false}" class="flex items-center">
                                        <button class="mr-2" @click="like=!like">
                                            <template x-if="!like">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </template>
                                            <template x-if="like">
                                                <svg class="w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </template>


                                        </button>

                                    </div>
                                </div>
                                <div class="flex items-center justify-between pt-2 dark:text-gray-200">
                                    <x-button wire:click="add_cart({{$service->id}})" spinner="" flat primary sm
                                        label="ajouter" />
                                </div>
                            </div>
                        </div>


                    </div>
                    @empty
                    <div class="px-6">
                        <div>
                            <h3>Pas de services trouveeer</h3>
                        </div>

                    </div>
                    @endforelse



                </div>


            </div>

            <div>
                {{$services->links()}}
            </div>
        </div>

        {{-- In work, do what you enjoy. --}}
    </div>{{-- In work, do what you enjoy. --}}
</div>