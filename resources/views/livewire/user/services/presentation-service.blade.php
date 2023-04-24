<div>




    <section class="flex flex-col min-h-screen pt-20 mb-6">

        <div class="flex flex-col p-2 mx-6 mt-4 bg-white rounded-lg md:h-64 dark:bg-gray-800">
            <div class="mb-4">
                <h3 class="mb-4 font-serif text-xl leading-snug text-center dark:text-gray-400 text-slate-800">
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

        <div class="p-4 mx-6 mt-4 bg-white rounded-lg dark:bg-gray-900 justify-beetwen">

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
                                <div x-data="{ swiper: null }"
                                    x-init="swiper = new Swiper($refs.container, { slidesPerView: 'auto', spaceBetween: 10, pagination: { el: '.swiper-pagination', clickable: true } })"
                                    x-ref="container"
                                    class="w-auto h-auto bg-center bg-cover swiper-container2 md:w-full md:h-48">
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
                                <div class="px-4 py-2 mt-2 md:mt-2 max-h-[10rem]">
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
                                            <span class="font-semibold text-gray-700 dark:text-gray-200">4.9
                                                (142)</span>
                                        </div>
                                        <span class="text-sm text-gray-500 dark:text-gray-200">Top</span>
                                    </div>



                                </div>
                                <div class="flex justify-between border-t border-gray-300">
                                    <div class="flex gap-1 py-2">

                                        <x-dropdown>

                                        </x-dropdown>


                                    </div>

                                    <p class="px-4 py-2">
                                        <span
                                            class="text-gray-500 dark:text-gray-200 text-md">${{$servicesBest->basic_price}}</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                        @empty

                        @endforelse

                    </div>
                </div>

                <div class="splide__arrows splide__arrows--ltr">
                    <button class="text-gray-800 bg-transparent splide__arrow splide__arrow--prev" type="button"
                        aria-label="Previous slide" aria-controls="splide01-track">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                    <button class="splide__arrow splide__arrow--next" type="button" aria-label="Next slide"
                        aria-controls="splide01-track">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
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

            <div class="slide-container swiper">
                <div class="slide-content">
                    <div class="card-wrapper swiper-wrapper">

                        @foreach ($freelances as $freelance)
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>

                                <div class="card-image">
                                    <img src="{{$freelance->user->profile_photo_url}}" alt="" class="card-img">
                                </div>
                            </div>

                            <div class="card-content">
                                <h2 class="name">{{$freelance->getName()}}</h2>
                                <div class="flex flex-col">
                                    <span>{{$freelance->category->name}}</span>

                                    <ul>
                                        @forelse ($freelance->competences as $key => $value)
                                        <li>{{$value['skill']}}</li>
                                        @empty

                                        @endforelse

                                    </ul>
                                </div>

                                <p class="description">


                                </p>
                                <button class="button">View More</button>
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



            <div class="grid grid-cols-1 gap-4 p-4 mx-2 md:grid-cols-4 md:gap-4">
                @forelse ($services as $service)


                <div x-data="{linkHover: false}" style="" @mouseover="linkHover = true" @mouseleave="linkHover = false"
                    class="overflow-hidden bg-white rounded-lg shadow-md dark:text-gray-200 dark:bg-gray-900">
                    <div class="flex flex-row md:flex-col">
                        @foreach ($service->files as $key=>$value)

                        <div class="h-auto bg-center bg-cover w-44 md:w-full md:h-48"
                            style="background-image: url('{{Storage::disk('local')->url('public/service/'.$value) }}');">
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
                                    <p class="text-sm text-gray-700 dark:text-gray-200">{{$service->averageFeedback()}}
                                        ({{$service->orderCount()}})
                                    </p>
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



                                @auth
                                <div x-data="{ like: @json($service->isFavorite()) }" class="flex items-center">
                                    <button class="mr-2" x-on:click="like=!like"
                                        @click="$wire.toogleFavorite({{$service->id}})">


                                        <span x-cloak x-show="!like" class="">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </span>
                                        <span x-cloak x-show="like">
                                            <svg class="w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                            </svg>
                                        </span>


                                    </button>



                                </div>
                                @endauth
                            </div>
                            <div class="flex items-center justify-between pt-2 dark:text-gray-200">
                                <x-button wire:click="add_cart({{$service->id}})" sm label="ajouter" />
                            </div>
                        </div>
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
        pagination: false,



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
</script>


@endpush
{{-- Stop trying to control. --}}