@extends('layouts.user')
@section('content')
<div>
    <section class="flex flex-col min-h-screen pt-8 mb-6">

        <div class="flex flex-col p-2 mx-6 mt-4 bg-white rounded-lg md:min-h-64 dark:bg-gray-800">
            <div class="mb-4">
                <h3 class="mb-4 font-serif text-xl leading-snug text-center dark:text-gray-400 text-slate-800">
                    Découvrez une communauté de freelances talentueux prêts à donner vie à vos projets.
                    Trouvez le service parfait pour vous, choisissez parmi une large sélection de compétences et laissez
                    notre
                    communauté de professionnels vous aider à réaliser vos rêves.
                </h3>
            </div>
            <div wire:ignore class="">
                <div class="flex flex-wrap gap-2" x-data="{ splide: null }" x-init="() => {
                     splide = new Splide('.splide', {
                         type: 'loop',
                         perPage: 3,
                         perMove: 1,
                         autoplay: true,
                         interval: 3000,
                         gap: '1rem',
                         breakpoints: {
                        640: {
                        perPage: 2,
                        },
                        768: {
                        perPage: 4,
                        },
                        1024: {
                        perPage: 5,
                        },
                        },
                     }).mount();
                 }">
                    <div class="w-full splide">
                        <div class="splide__track">
                            <div class="splide__list">
                                @foreach ($categories as $category)
                                <div class="splide__slide">
                                    <a href="{{ route('categoryByName', [$category->name]) }}"
                                        class="flex flex-col items-center px-4 py-2.5 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                                        <h4
                                            class="mt-3 mb-1 md:text-[12px] text-[10px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                                            {{ $category->name }}
                                        </h4>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div wire:ignore class="p-4 mx-6 mt-4 bg-white rounded-lg dark:bg-gray-900 justify-beetwen">

            <div class="flex justify-between mb-4">
                <h1 class="text-base font-semibold text-gray-800 md:text-2xl dark:text-gray-300 "> Les Service populaire
                    en
                    Photographie </h1>
                <div class="flex items-end justify-end ">

                    <x-button sm label="plus"></x-button>
                </div>

            </div>
            <div class="py-4 mx-auto mb-4 rounded-lg splide splide-1">


                <div class="p-2 splide__track">
                    <div class="max-w-5xl mx-auto splide__list">
                        @forelse ($servicesBest as $servicesBest)
                        <div class="mx-auto md:mx-0 splide__slide ">
                            <div
                                class="flex flex-col mb-2 overflow-hidden bg-white rounded-lg shadow-md w-72 dark:bg-gray-800 md:mb-0">


                                <div x-data="{
                                        slide: 0,
                                        maxSlides: {{ count($servicesBest->files) }},
                                        showButton: false
                                        }" class="relative w-full h-48 overflow-hidden" @mouseover="showButton = true"
                                    @mouseleave="showButton = false">
                                    <div class="absolute inset-0 cursor-pointer">
                                        <template x-for="(image, index) in {{ json_encode($servicesBest->files) }}"
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



                                <div x-data="{linkHover: false}" style="" @mouseover="linkHover = true"
                                    @mouseleave="linkHover = false" class="px-4 py-2 mt-2 md:mt-2 max-h-[10rem]">
                                    <a href="{{route('ServicesViewOne',['service_numero'=>$servicesBest->service_numero,'category'=>$servicesBest->category->name])}}"
                                        class="mb-2 text-sm font-semibold md:text-base "
                                        :class="linkHover ? 'text-amber-600' : 'text-gray-800 dark:text-gray-200'">{{$servicesBest->title}}
                                    </a>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-200">
                                        {{$servicesBest->freelance->user->name}} • {{$servicesBest->category->name}}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1 text-yellow-500 fill-current"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 14.155L4.284 17.84l.828-5.076L.898 7.865l5.059-.736L10 2l2.043 5.129 5.059.736-3.215 3.9.828 5.076z" />
                                            </svg>
                                            <span
                                                class="font-semibold text-gray-700 dark:text-gray-200">{{$servicesBest->averageFeedback()}}
                                                ({{$servicesBest->orderCount()}})</span>
                                        </div>
                                        <span class="text-sm text-gray-500 dark:text-gray-200">basic</span>
                                    </div>



                                </div>
                                <div class="flex justify-between border-t border-gray-300">


                                    <p class="px-4 py-4">
                                        <span class="text-gray-500 dark:text-gray-200 text-md"> a partir de
                                            ${{$servicesBest->basic_price}}</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                        @empty

                        @endforelse

                    </div>
                </div>

                <div class="splide__arrows">
                    <button class="bg-gray-900 shadow splide__arrow splide__arrow--prev">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </button>
                    <button class="bg-gray-900 shadow splide__arrow splide__arrow--next">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-white">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>





        <div class="p-4 mx-6 mt-4 bg-gray-100 rounded-lg dark:bg-gray-900 justify-beetwen">


            <div class="flex justify-between mb-4">
                <h1 class="text-sm font-semibold text-gray-800 md:text-xl dark:text-gray-300 "> Freelance populaire
                </h1>
                <div class="flex items-end justify-end ">

                    <x-button sm label="plus"></x-button>
                </div>

            </div>

            <div wire:ignore class="slide-container swiper">
                <div class="slide-content">
                    <div class="card-wrapper swiper-wrapper">

                        @foreach ($freelances as $freelance)
                        <div class="card swiper-slide">

                            <div class=" dark:bg-gray-800 dark:rounded-md image-content">
                                <span
                                    class="overlay after:dark:bg-gray-800 before:dark:bg-gray-800 dark:rounded-lg dark:bg-gray-800"></span>


                                <div class="card-image ">
                                    @if (!empty($freelance->user->profile_photo_path))
                                    <img src="{{Storage::disk('local')->url('profiles-photos/'.$freelance->user->profile_photo_path) }}"
                                        alt=""
                                        class="border-2 {{$freelance->isOnline() ? 'border-green-600':'border-gray-600'}}  card-img">

                                    @else
                                    <img class="border-2 {{$freelance->isOnline() ? 'border-green-600':'border-gray-600'}}  card-img"
                                        src="{{$freelance->user->profile_photo_url }}" alt="">
                                    @endif




                                </div>




                            </div>


                            <div class="p-4 ">
                                <div class="flex justify-between">
                                    <h2 class="name">{{$freelance->user->name}}</h2>


                                </div>

                                <div class="flex flex-col mt-2">
                                    <span class="mb-2 text-sm text-gray-500 dark:text-gray-200">
                                        {{$freelance->category->name}} • {{$freelance->level}}</span>

                                    <ul class="text-base">
                                        @forelse ($freelance->competences as $key => $value)
                                        <li class="text-gray-900 badge badge-success">#{{$value['skill']}}</li>
                                        @empty

                                        @endforelse

                                    </ul>
                                </div>

                                <p class="description">


                                </p>
                                <div class="flex justify-between">
                                    <div class="mt-4">
                                        <x-button href="{{route('profile.freelance',[$freelance->identifiant])}}"
                                            primary outline label="profil" />

                                    </div>
                                    <div class="mt-4">
                                        <x-button wire:click="conversations({{$freelance->id}})" flat primary
                                            label="contacter" />

                                    </div>


                                </div>

                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>

                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>


        <div class="flex flex-col p-2 mx-6 mt-4 bg-white rounded-lg md:mx-6 justify-beetwen">

            <div class="mb-4">
                <h1 class="text-xl font-bold text-gray-800 dark:text-gray-300">Services que vous pourriez aimer</h1>
            </div>



            <div class="grid max-w-5xl grid-cols-1 gap-4 p-4 mx-2 md:grid-cols-4 md:gap-4">
                @forelse ($services as $service)


                <div wire:ignore x-data="{linkHover: false}" @mouseover="linkHover = true"
                    @mouseleave="linkHover = false"
                    class="overflow-hidden bg-white rounded-lg shadow-md dark:text-gray-200 dark:bg-gray-900">
                    <div class="flex flex-row lg:flex-col">



                        <div x-data="{slide: 0,maxSlides: {{ count($service->files) }},showButton: false}"
                            class="relative h-48 overflow-hidden w-[50%] lg:w-full" @mouseover="showButton = true"
                            @mouseleave="showButton = false">
                            <div class="absolute inset-0 cursor-pointer">
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

                @endforelse




            </div>

        </div>






        <div
            class="flex flex-col items-center justify-center p-6 mx-6 mt-4 bg-white rounded-lg shadow-lg min-h-64 lg:flex-row lg:justify-start">
            <img src="/images/services/projet.jpg" alt="Illustration de projet"
                class="hidden w-1/2 h-64 mb-4 rounded-md lg:mr-6 md:block lg:mb-0">
            <div class="text-center lg:text-left">
                <h2 class="mb-2 text-xl font-semibold text-gray-800">Vous ne trouvez pas ce que vous cherchez ?</h2>
                <p class="mb-4 dark:text-gray-300">Si vous avez besoin d'un service particulier, n'hésitez pas à
                    soumettre
                    votre projet et
                    notre communauté de freelances
                    talentueux sera ravie de vous aider..</p>
                <a href="{{route('createProject')}}"
                    class="px-4 py-2 font-semibold text-white bg-blue-500 rounded hover:bg-blue-600">Soumettre un
                    projet</a>
            </div>
        </div>









    </section>

</div>

@push('script')

<script src="/js/swipper.min.js">
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('.splide-1', {
        type : 'loop',
        drag : 'free',
        focus : 'center',
        perPage: 3,
        autoplay: true,
        pagination: true,
          breakpoints: {
            640: {
              perPage: 1,
            },
            768: {
              perPage: 2,
            },
            1024: {
              perPage: 4,
            },
          },
        }).mount();
      });

    document.addEventListener('DOMContentLoaded', function () {
        new Splide('.splide-2', {

        type:'loop',
        drag : 'free',
        focus : 'center',
        perPage: 4,
        autoplay: true,
        pagination: false,
        fixedWidth : '24rem',


          breakpoints: {
            640: {
              perPage: 2,
            },
            768: {
              perPage: 4,
            },
            1024: {
              perPage: 5,
            },
          },
          classes: {
        arrow: 'splide__arrow splide__arrow--page',
        prev: 'splide__arrow--prev',
        next: 'splide__arrow--next'
        },
        }).mount();
      });

      Livewire.hook('afterDomUpdate', function() {
        swiper.destroy();
        swiper = new Swiper('.swiper-container', {
        // Options de Swiper
        });
        });
</script>


@endpush
{{-- Stop



@endsection