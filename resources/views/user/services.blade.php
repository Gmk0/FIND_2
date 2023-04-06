@extends('layouts.user')
@section('content')


<section class="flex flex-col min-h-screen pt-20 mb-6">

    <div class="flex flex-col h-64 p-2 mx-6 mt-4 bg-white dark:bg-gray-800 rounded-lg">
        <div class="mb-4">
            <h3 class="font-serif text-xl text-slate-800 mb-4 text-center leading-snug">
                Découvrez une communauté de freelances talentueux prêts à donner vie à vos projets.
                Trouvez le service parfait pour vous, choisissez parmi une large sélection de compétences et laissez
                notre
                communauté de professionnels vous aider à réaliser vos rêves.
            </h3>
        </div>
        <div class="">
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
                <div class="splide w-full">
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

    <div class="p-4  mt-4 mx-6  bg-white dark:bg-gray-900 rounded-lg justify-beetwen">

        <div class="mb-4 flex justify-between">
            <h1 class="text-lg md:text-2xl font-semibold text-gray-800 dark:text-gray-50
                            "> Les Service populaire en Photographie </h1>
            <div class="flex items-end justify-end ">

                <x-button label="voir plus"></x-button>
            </div>

        </div>
        <div class="splide splide-1 bg-white  mx-2 py-4 rounded-lg mb-4">

            <div class="splide__track p-2">
                <div class="splide__list  px-auto">
                    @forelse ($servicesBest as $servicesBest)
                    <div class="card-splide mx-auto md:mx-0 splide__slide ">
                        <div
                            class="mb-2 overflow-hidden bg-white dark:bg-gray-900 rounded-lg flex flex-col shadow-md md:mb-0 w-64">
                            <div x-data="{ swiper: null }"
                                x-init="swiper = new Swiper($refs.container, { slidesPerView: 'auto', spaceBetween: 10, pagination: { el: '.swiper-pagination', clickable: true } })"
                                x-ref="container"
                                class="swiper-container2 w-48 h-auto bg-center bg-cover md:w-full md:h-48">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="https://source.unsplash.com/200x200/?fashion?1" alt=""
                                            class="object-cover w-full h-full">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://source.unsplash.com/200x200/?fashion?2" alt=""
                                            class="object-cover w-full h-full">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="https://source.unsplash.com/200x200/?fashion?3" alt=""
                                            class="object-cover w-full h-full">
                                    </div>
                                    <div class="swiper-pagination"></div>

                                </div>

                            </div>
                            <div class="px-4 py-2 mt-2 md:mt-2 max-h-[14rem]">
                                <h3 class="mb-2 text-lg font-bold text-gray-800">{{$servicesBest->title}}</h3>
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
                                        <span class="font-semibold text-gray-700 dark:text-gray-200">4.9 (142)</span>
                                    </div>
                                    <span class="text-sm text-gray-500 dark:text-gray-200">Top</span>
                                </div>
                                <div class="flex px-2">
                                    <p class="px-4 py-2"> <span
                                            class="text-gray-500 dark:text-gray-200 text-md">${{$servicesBest->basic_price}}</span>
                                    </p>
                                    <div class="flex px-4 py-2">
                                        <x-button label="Ajouter" />
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    @empty

                    @endforelse

                </div>
            </div>
        </div>
    </div>


    <div class="p-4 bg-white mx-6 mt-4  dark:bg-gray-800 rounded-lg justify-beetwen">


        <div class="mb-4 flex justify-between">
            <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-50
                        "> Les Freelance populaire </h1>
            <div class="flex items-end justify-end ">

                <x-button primary label="voir plus"></x-button>
            </div>

        </div>
        <div class="splide splide-2  py-4 rounded-lg mb-4">

            <div class="splide__track">
                <div class="splide__list gap-4">
                    @forelse ($freelances as $freelance)
                    <div class="card-splide splide__slide ">
                        <div
                            class="mb-2 overflow-hidden bg-white dark:bg-gray-900 rounded-lg flex flex-col shadow-md md:mb-0 w-64">
                            <div class="relative h-48">
                                <img src="https://source.unsplash.com/200x200/?fashion?1" alt=""
                                    class="object-cover w-full h-full">
                                <div class="absolute top-2 right-2">
                                    <span
                                        class="inline-flex items-center px-2 py-1 text-xs font-bold text-white bg-green-500 rounded-full">En
                                        ligne</span>
                                </div>
                                <div class="absolute bottom-2 right-2">
                                    <button
                                        class="inline-flex items-center px-2 py-1 text-xs font-bold text-gray-500 hover:text-gray-700 focus:outline-none">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Like
                                    </button>
                                </div>
                            </div>
                            <div class="px-4 py-2 mt-2 md:mt-2" style="max-height: 12rem;">
                                <h3 class="mb-2 text-lg font-bold">{{$freelance->user->name}}</h3>
                                <p class="mb-2 text-sm text-gray-500">{{$freelance->category->name}} •
                                    {{$freelance->level}}</p>
                                <div class="flex flex-wrap justify-between mb-4">
                                    <span class="inline-block px-2 py-2 rounded-full bg-green-300">#Javascript</span>
                                    <span class="inline-block">#Javascript</span>
                                    <span class="inline-block">#Javascript</span>
                                </div>


                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <x-button label="contacter" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @empty
                    @endforelse

                </div>

            </div>
            <ul class="splide__pagination"></ul>
        </div>
    </div>


    <div class="flex flex-col p-2  mt-4 bg-white  md:mx-6 rounded-lg justify-beetwen">

        <div class="mb-4">
            <h1 class="text-xl font-bold text-skin-fill">Services que vous pourriez aimer</h1>
        </div>



        <div class="grid grid-cols- md:grid-cols-4 mx-2 p-4 gap-4 md:gap-6">
            @forelse ($services as $service)


            <div x-data="{linkHover: false}" style="" @mouseover="linkHover = true" @mouseleave="linkHover = false"
                class="overflow-hidden bg-white rounded-lg shadow-md dark:text-gray-200 dark:bg-gray-800">
                <div class="flex flex-row md:flex-col">
                    @foreach ($service->files as $key=>$value)

                    <div class="w-44 h-auto bg-center bg-cover md:w-full md:h-48"
                        style="background-image: url('{{$value}}');">
                    </div>
                    @break
                    @endforeach


                    <div class="max-h-[14rem] flex flex-col justify-between p-2 dark:text-gray-200 md:p-6">
                        <div>
                            <a href="{{route('ServicesViewOne',['id'=>$service->id,'category'=>$service->category->name])}}"
                                class="mb-2 text-sm md:text-base font-semibold  "
                                :class="linkHover ? 'text-amber-600' : 'text-gray-800 dark:text-gray-200'">{{$service->title}}
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
                                    {{$service->freelance->user->name}}</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between dark:text-gray-200">
                            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{$service->basic_price}} $</h4>
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

    </div>



    <div
        class="flex mx-6 mt-4 flex-col min-h-64 lg:flex-row items-center justify-center lg:justify-start bg-white rounded-lg shadow-lg p-6">
        <img src="/images/services/projet.jpg" alt="Illustration de projet"
            class="w-1/2 h-64 lg:mr-6 hidden md:block rounded-md mb-4 lg:mb-0">
        <div class="text-center lg:text-left">
            <h2 class="text-xl font-semibold mb-2">Vous ne trouvez pas ce que vous cherchez ?</h2>
            <p class="mb-4">Si vous avez besoin d'un service particulier, n'hésitez pas à soumettre votre projet et
                notre communauté de freelances
                talentueux sera ravie de vous aider..</p>
            <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Soumettre un
                projet</a>
        </div>
    </div>








</section>

@endsection

@push('script')

<script src="/js/swipper.min.js">
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    new Splide('.splide-1', {
    type : 'loop',
    drag : 'free',
    focus : 'center',
    perPage: 4,
    autoplay: true,
    pagination: false,
    fixedWidth : '24rem',
    
 
      breakpoints: {
        640: {
          perPage: 1,
        },
        768: {
          perPage: 5,
        },
        1024: {
          perPage: 5,
        },
      },
    }).mount();
  });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    new Splide('.splide-2', {
     type : 'loop',
    drag : 'free',
    focus : 'center',
    perPage: 4,
    autoplay: true,
    pagination: false,
    fixedWidth : '20rem',
   
    gap: '1rem',
      breakpoints: {
        640: {
          perPage: 1,
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
</script>




@endpush