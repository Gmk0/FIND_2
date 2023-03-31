@extends('layouts.user')
@section('content')


<section class="flex flex-col min-h-screen pt-20 mb-6">

    <div class="flex flex-col min-h-64 p-2 mx-6 mt-4 bg-white rounded-lg">

        <div class="mb-4">
            <h3 class="font-thin text-xl text-slate-800 mb-4 text-center  dark:text-white  leading-snug  ">
                Découvrez une communauté de freelances talentueux prêts à
                donner vie
                à vos
                projets. Trouvez le service parfait pour vous, choisissez parmi une large sélection de compétences et
                laissez
                notre communauté de professionnels vous aider à réaliser vos rêves.
            </h3>
        </div>
        <div class="splide-3">
            <div class="flex flex-wrap gap2">
                @foreach ($categories as $categpry )
                <a href="{{route('categoryByName',[$categpry->name])}}"
                    class="flex flex-col items-center px-4 py-2.5 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">

                    <h4
                        class="mt-3 mb-1 md:text-[12px] text-[10px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                        {{$categpry->name}}</h4>

                </a>
                @endforeach


                <!-- Ajouter les éléments de votre Splide ici -->
            </div>
        </div>


    </div>

    <div class="p-4 mx-2 mt-4 bg-white dark:bg-gray-600 rounded-lg justify-beetwen">

        <div class="mb-4 flex justify-between">
            <h1 class="text-lg md:text-2xl font-semibold text-gray-800 dark:text-gray-50
                            "> Les Service populaire en Photographie </h1>
            <div class="flex items-end justify-end ">

                <x-button label="voir plus"></x-button>
            </div>

        </div>
        <div class="splide splide-1 bg-white  mx-2 py-4 rounded-lg mb-4">
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
            <div class="splide__track ">
                <div class="splide__list gap-4 px-auto">
                    @for ($i = 0; $i < 4; $i++) <div class="card-splide mx-auto md:mx-0 splide__slide ">
                        <div
                            class="mb-2 overflow-hidden bg-white dark:bg-gray-800 rounded-lg flex flex-col shadow-md md:mb-0 w-64">
                            <div class="swiper-container2 w-48 h-auto bg-center bg-cover md:w-full md:h-48">
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
                            <div class="px-4 py-2 mt-2 md:mt-2" style="max-height: 12rem;">
                                <h3 class="mb-2 text-lg font-bold">Service Title</h3>
                                <p class="mb-2 text-sm text-gray-500">Seller Name • Service Category</p>
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
                                    <p>A partir de <span class="text-gray-500 text-md">$20.00+</span></p>
                                </div>
                                <div class="flex px-4 py-2">
                                    <x-button label="Ajouter" />
                                </div>
                            </div>
                        </div>

                </div>
                @endfor

            </div>
        </div>
    </div>
    </div>


    <div class="p-4 bg-white  mx-2 mt-4  dark:bg-gray-600 rounded-lg justify-beetwen">


        <div class="mb-4 flex justify-between">
            <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-50
                        "> Les Freelance populaire </h1>
            <div class="flex items-end justify-end ">

                <x-button primary label="voir plus"></x-button>
            </div>

        </div>
        <div class="splide splide-2  py-4 rounded-lg mb-4">
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
            <div class="splide__track">
                <div class="splide__list gap-4">
                    @for ($i = 0; $i < 4; $i++) <div class="card-splide splide__slide ">
                        <div
                            class="mb-2 overflow-hidden bg-white dark:bg-gray-800 rounded-lg flex flex-col shadow-md md:mb-0 w-64">
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
                                <h3 class="mb-2 text-lg font-bold">Nom du Freelance</h3>
                                <p class="mb-2 text-sm text-gray-500">Catégorie • Niveau</p>
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
                @endfor

            </div>

        </div>
        <ul class="splide__pagination"></ul>
    </div>
    </div>


    <div class="flex flex-col p-2  mt-4 bg-white  mx-2 rounded-lg justify-beetwen">

        <div class="mb-4">
            <h1 class="text-xl font-bold text-skin-fill">Services que vous pourriez aimer</h1>
        </div>



        <div class="grid md:grid-cols-4  md:gap-6">
            @for ($i = 0; $i < 8; $i++) <div
                class="mb-2 overflow-hidden bg-white dark:bg-gray-800 rounded-lg flex flex-col shadow-md md:mb-0 w-50 md:w-64">
                <div class="swiper-container2 w-48 h-auto bg-center bg-cover md:w-full md:h-48">
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
                <div class="px-4 py-2 mt-2 max-h-[12rem] md:max-h-[12rem] md:mt-2">
                    <h3 class="mb-2 text-lg font-bold dark:text-white">Service Title</h3>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-100">Seller Name • Service Category</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1 text-yellow-500 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 14.155L4.284 17.84l.828-5.076L.898 7.865l5.059-.736L10 2l2.043 5.129 5.059.736-3.215 3.9.828 5.076z" />
                            </svg>
                            <span class="font-semibold text-gray-700">4.9 (142)</span>
                        </div>
                        <span class="text-sm text-gray-500">Top</span>
                    </div>
                    <div class="flex px-4 py-2">
                        <p>A partir de <span class="text-gray-500 text-md">$20.00+</span></p>
                    </div>
                </div>
        </div>

        @endfor




    </div>

    </div>

    </div>
    <div class="flex flex-row h-64 p-2 mx-6 mt-4 bg-gray-200 rounded-lg justify-beetwen">

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
    fixedWidth : '20rem',
    fixedHeight: '28rem',
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
    fixedHeight: '28rem',
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
    }).mount();
  });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    new Splide('.splide-3', {
     type : 'loop',
    drag : 'free',
    focus : 'center',
    perPage: 4,
    autoplay: true,
    pagination: false,
   
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
    }).mount();
  });
</script>
<script>
    var mySwiper = new Swiper('.swiper-container', {
    loop: true,
        pagination: {
    el: '.swiper-pagination',
    clickable: true,
        },
    navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
        },
});

var mySwiper2 = new Swiper('.swiper-container2', {
loop: true,
pagination: {
el: '.swiper-pagination',
clickable: true,
},
navigation: {
nextEl: '.swiper-button-next',
prevEl: '.swiper-button-prev',
},
});
</script>

@endpush