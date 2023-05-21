<div>
    <div x-data="{isOpen:false}" class="min-h-screen py-8 md:px-8">

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
                        <div class="flex gap-4 md:hidden">
                            <x-button label="Resultat ({{$count}})" @click="isOpen=false" />
                            <x-button @click="isOpen=false" label="Fermer" />

                        </div>
                    </form>
                </div>

            </div>

            <button x-on:click="isOpen=!isOpen"
                class="flex pl-3 no-underline dark:text-white md:hidden hover:text-amber-600" href="#">
                <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                </svg> <span>
                    filtre
                </span>
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
                            <div x-data="{
                                    slide: 0,
                                    maxSlides: {{ count($service->files) }},
                                    showButton: false
                                                                                        }"
                                class="relative w-full h-48 overflow-hidden" @mouseover="showButton = true"
                                @mouseleave="showButton = false">
                                <div wire:ignore class="absolute inset-0 cursor-pointer">
                                    <template x-for="(image, index) in {{ json_encode($service->files) }}" :key="index">
                                        <div x-show="slide === index"
                                            class="absolute top-0 left-0 w-full h-48 transition duration-500 ease-out bg-center bg-cover"
                                            :style="'background-image: url(/storage/service/' + image + ')'">

                                        </div>
                                    </template>
                                </div>
                                <div x-bind:class="{'hidden':!showButton}">
                                    <div class="absolute flex justify-between transform -translate-y-1/2 top-1/2 left-5 right-5"
                                        x-show="showButton">
                                        <a href="#" class="btn btn-outline btn-circle btn-sm"
                                            @click.prevent="slide = (slide - 1 + maxSlides) % maxSlides">❮</a>
                                        <a href="#" class="btn btn-outline btn-circle btn-sm"
                                            @click.prevent="slide = (slide + 1) % maxSlides">❯</a>
                                    </div>
                                </div>


                            </div>


                            @livewire('tools.button-cart',['service'=>$service])
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
