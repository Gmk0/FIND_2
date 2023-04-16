@extends('layouts.user')

@section('content')

<section
    class="relative z-40 grid min-h-screen grid-cols-1 gap-8 px-4 pt-20 overflow-hidden text-neutral-50 2xl:px-60 lg:grid-cols-12 bg-skin-fill dark:bg-gray-800">
    <div
        class="[mask-image:linear-gradient(to_bottom,white_20%,transparent_75%)] absolute bottom-[-100px] md:w-[800px] md:h-[800px] lg:top-[120px] lg:right-[-100px] xl:right-0 w-[500px] h-[500px] 2xl:w-[1026px] 2xl:h-[1026px]">
        <svg viewBox="0 0 1026 1026" fill="none" aria-hidden="true"
            class="absolute inset-0 w-full h-full animate-spin-slow">
            <path d="M1025 513c0 282.77-229.23 512-512 512S1 795.77 1 513 230.23 1 513 1s512 229.23 512 512Z"
                stroke="#D4D4D4" stroke-opacity="0.7"></path>
            <path d="M513 1025C230.23 1025 1 795.77 1 513" stroke="url(#:R65m:-gradient-1)" stroke-linecap="round">
            </path>
            <defs>
                <linearGradient id=":R65m:-gradient-1" x1="1" y1="513" x2="1" y2="1025" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#f8fafc"></stop>
                    <stop offset="1" stop-color="#f8fafc" stop-opacity="0"></stop>
                </linearGradient>
            </defs>
        </svg>
        <svg viewBox="0 0 1026 1026" fill="none" aria-hidden="true"
            class="absolute inset-0 w-full h-full animate-spin-slow">
            <path
                d="M913 513c0 220.914-179.086 400-400 400S113 733.914 113 513s179.086-400 400-400 400 179.086 400 400Z"
                stroke="#D4D4D4" stroke-opacity="0.7"></path>
            <path d="M913 513c0 220.914-179.086 400-400 400" stroke="url(#:R65m:-gradient-2)" stroke-linecap="round">
            </path>
            <defs>
                <linearGradient id=":R65m:-gradient-2" x1="913" y1="513" x2="913" y2="913"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#f8fafc"></stop>
                    <stop offset="1" stop-color="#f8fafc" stop-opacity="0"></stop>
                </linearGradient>
            </defs>
        </svg>
    </div>

    <div class="z-20 col-span-6 px-4 py-16 mt-8 mb-8 xl:place-self-center xl:mt-0 lg:mb-0">
        <h1 class="text-3xl font-bold text-center md:text-3xl xl:text-5xl lg:text-left">
            Votre satisfaction dans nos services Freelance <br />

        </h1>
        <p class="max-w-lg mx-auto my-8 text-center lg:mx-0 lg:text-left opacity-70">

        </p>
        <div class="flex flex-col items-center lg:flex-row">
            <button
                class="w-full px-4 py-3 mb-4 font-bold rounded-lg lg:w-max bg-neutral-50 hover:cursor-pointer text-cyan-600 lg:mr-8 lg:mb-0">
                Commencer
            </button>
        </div>
    </div>
    <div class="relative z-50 hidden col-span-6 md:flex">
        <picture>
            <source srcset="/images/hero/hero_women.webp" type="image/webp" />
            <source srcset="/images/hero/hero_women.png" type="image/png" />
            <img class="z-50 w-full h-full" src="/images/hero/women.png" alt="" />
        </picture>
    </div>
</section>



<section x-show="isLoading" x-cloak id="features" class=" dark:bg-gray-900">

    <div data-aos="" class="z-10 px-8 py-8 mx-auto overflow-hidden max-w-7xl md:px-6">
        <div class="flex ">
            <div data-aos="fade-up" data-aos-duration="800" class="w-full lg:w-5/12">
                <h1
                    class="text-slate-800 mb-4  dark:text-white text-2xl font-bold leading-snug lg:text-[40px] xl:text-[42px]">

                    {{__('Atteignez vos objectifs plus rapidement avec')}}

                    <span class="text-amber-600">FIND</span>
                </h1>

                <div class="grid grid-cols-1 gap-2 mx-auto md:mx-0 md:grid-cols-2">

                    <a href="{{url('find-freelancer')}}"
                        class="w-10/12 rounded-md mx-auto bg-amber-600 px-8 py-2.5 font-semibold text-white shadow-md shadow-amber-500/20 hover:bg-amber-700 duration-200 sm:w-auto">Trouver
                        un freelancer</a>

                    <a href="{{url('register.begin')}}"
                        class="mt-4 md:mt-0 mx-auto box-border w-10/12   rounded-md border border-amber-500/20 px-8 py-2.5 font-semibold text-amber-600 shadow-md shadow-amber-500/10 hover:bg-gray-100 duration-200   ">Dévenir

                        freelancer</a>

                </div>


                <!-- brand -->
                <div class="mt-4 mb-2 text-center">
                    <h1 class="text-xl text-gray-500">Nos partenaires</h1>

                </div>
                <div class="grid grid-cols-2 gap-6 mt-6 px-auto md:gap-2 md:grid-cols-3 ">
                    <img src="/images/brand/brand (1).png" alt="brand"
                        class="w-32 h-16 px-5 py-3 duration-200 border rounded-lg shadow-md cursor-pointer bg-gray-50 border-blue-300/20 shadow-blue-500/5 hover:scale-95 sm:w-36">
                    <img src="/images/brand/influeworld.png" alt="brand"
                        class="w-32 h-16 px-5 py-3 duration-200 border rounded-lg shadow-md cursor-pointer bg-gray-50 border-blue-300/20 shadow-blue-500/5 hover:scale-95 sm:w-36">
                    <img src="/images/brand/influnet2.jpg" alt="brand"
                        class="w-32 h-16 px-5 py-3 bg-white border rounded-lg shadow-md cursor-pointer duration border-blue-300/20 shadow-blue-500/5 hover:scale-95 sm:w-36">
                    <img src="/images/brand/udemy.PNG" alt="brand"
                        class="w-32 h-16 px-5 py-3 duration-200 border rounded-lg shadow-md cursor-pointer bg-gray-50 border-blue-300/20 shadow-blue-500/5 hover:scale-95 sm:w-36">
                    <img src="/images/brand/microsoft.svg" alt="brand"
                        class="w-32 h-16 px-5 py-3 duration-200 border rounded-lg shadow-md cursor-pointer bg-gray-50 border-blue-300/20 shadow-blue-500/5 hover:scale-95 sm:w-36">
                    <img src="/images/brand/airbnb.svg" alt="brand"
                        class="w-32 h-16 px-5 py-3 duration-200 border rounded-lg shadow-md cursor-pointer bg-gray-50 md:h-none border-blue-300/20 shadow-blue-500/5 hover:scale-95 sm:w-36">
                </div>
            </div>

            <div class="hidden px-4 lg:block lg:w-1/12"></div>

            <div data-aos="fade-left" data-aos-duration="800" class="hidden w-full px-4 lg:block md:w-6/12">
                <div class="lg:ml-auto lg:text-right">
                    <div class="relative z-10 inline-block pt-11 lg:pt-0">
                        <img src="images/hero/women.jpeg" alt="hero section img" class="w-3/4 rounded-full lg:ml-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section x-show="isLoading" x-cloak id="talkAbout" class="bg-gray-100 dark:bg-gray-900">

    <div class="container p-4 m-4 mx-auto md:p-6 max-w-7xl">
        <div class="mb-10 text-center">
            <span class="font-medium text-amber-600">Presentation</span>
            <h1 class="text-2xl font-bold text-slate-700 dark:text-gray-200 ">Ils en Parlent mieux Que nous</h1>

        </div>

        <div class="mx-3 my-auto swiper mySwiper ">
            <div class="pb-8 swiper-wrapper ">
                @for ($i = 0; $i < 3; $i++) <div class="swiper-slide !bg-transparent px-2 md:px-0">
                    <div
                        class="px-2 bg-white border border-gray-100 dark:border-gray-300 rounded-3xl dark:bg-gray-800 dark:shadow-none md:mx-auto lg:w-11/12 xl:w-8/12">
                        <div class="grid md:grid-cols-2">


                            <div class="w-2/3 h-auto m-2 aspect-w-8 aspect-h-9 rounded-2xl">

                                <iframe class="rounded-sm w-11/2 h-9/12 aspect-video hover:aspect-square"
                                    src="https://www.youtube.com/embed/r9jwGansp1E" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                            <div class="p-6 mx-auto space-y-6 text-center sm:p-8">
                                <div class="w-24 mx-auto">
                                    <img src="images/clients/client-4.png" alt="company logo" height="400" width="142"
                                        loading="lazy" />
                                </div>
                                <p class="dark:text-gray-200">
                                    <span class="font-serif "></span> Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Quaerat repellat perspiciatis excepturi est. Non ipsum iusto
                                    aliquam consequatur repellat provident, omnis ut, sapiente voluptates
                                    veritatis cum deleniti repudiandae ad doloribus.
                                    <span class="font-serif">"</span>
                                </p>
                                <h6 class="text-lg font-semibold leading-none dark:text-gray-200">John Doe</h6>
                            </div>
                        </div>
                    </div>
            </div>
            @endfor




        </div>

        <div class="swiper-pagination"></div>
    </div>




    <!-- single-blog -->

    </div>


    </div>

</section>


<section x-show="isLoading" x-cloak id="monde2" class="min-h-screen bg-white dark:bg-gray-800">

    <div class="py-16">
        <div class="px-6 m-auto text-gray-600 xl:container md:px-12 xl:px-16">
            <div
                class="flex-row-reverse justify-center space-y-6 bg-gray-100 rounded-lg dark:bg-gray-800 lg:p-16 md:flex md:gap-6 md:space-y-0 lg:items-center">
                <div data-aos="flip-left" data-aos-duration="800" class="md:5/12 lg:w-1/2">
                    <img src="/images/services/presentation3.png" alt="image"
                        class="rounded-lg dark:bg-gray-800 bg-skin-fill" loading="lazy" width="" height="" />
                </div>
                <div class="md:7/12 lg:w-1/2">
                    <h2 class="text-2xl font-bold text-gray-900 md:text-4xl dark:text-white">
                        Trouvez dès aujourd'hui la personne idéale pour votre projet !
                    </h2>
                    <p class="my-4 text-gray-600 dark:text-gray-300">


                    </p>
                    <div class="space-y-4 divide-y divide-gray-100 dark:divide-gray-800">
                        <div class="flex gap-4 mt-4 md:items-center">
                            <div class="flex w-12 h-12 gap-4 rounded-full dark:bg-teal-900/20">
                                <ion-icon class="text-[20px] text-amber-600 duration-200 hover:text-dark w-12 h-12 ml-2"
                                    name="checkbox-outline">
                                </ion-icon>
                            </div>
                            <div class="w-5/6">
                                <h4 class="text-lg font-semibold text-gray-700 dark:text-indigo-300">Des services de
                                    haute qualité
                                    pour
                                    un prix équitable</h3>
                                    <p class="text-gray-500 dark:text-gray-50">Mettez la main sur d'excellents services
                                        a bon prix . Une
                                        taxation en fonction de la demande de service</p>
                            </div>
                        </div>
                        <div class="flex gap-4 pt-2 md:items-center">
                            <div class="flex w-12 h-12 gap-4 rounded-full dark:bg-teal-900/20">
                                <ion-icon class="text-[20px] text-amber-600 duration-200 hover:text-dark w-12 h-12 ml-2"
                                    name="document-text-outline">
                                </ion-icon>
                            </div>
                            <div class="w-5/6">
                                <h4 class="text-lg font-semibold text-gray-700 dark:text-teal-300">Des services
                                    efficacement fait</h3>
                                    <p class="text-gray-500 dark:text-gray-50">Decouvrez les freelancers qui convient
                                        afin de travailler
                                        avec vous</p>
                            </div>
                        </div>
                        <div class="flex gap-4 mt-4 md:items-center">
                            <div class="flex w-12 h-12 gap-4 rounded-full dark:bg-teal-900/20">
                                <ion-icon class="text-[20px] text-amber-600 duration-200 hover:text-dark w-12 h-12 ml-2"
                                    name="cash-outline"></ion-icon>
                            </div>
                            <div class="w-5/6">
                                <h4 class="text-lg font-semibold text-gray-700 dark:text-indigo-300">Des Paiement
                                    protégés</h3>
                                    <p class="text-gray-500 dark:text-gray-50">Assurez-vous de connaître le coût total
                                        dès le départ.
                                        Votre rémunération ne sera versée que lorsque vous aurez confirmé
                                        que le travail est satisfaisant.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 pt-2 md:items-center">
                            <div class="flex w-12 h-12 gap-4 rounded-full dark:bg-teal-900/20">
                                <ion-icon class="text-[20px] text-amber-600 duration-200 hover:text-dark w-12 h-12 ml-2"
                                    name="call-outline"></ion-icon>
                            </div>
                            <div class="w-5/6">
                                <h4 class="text-lg font-semibold text-gray-700 dark:text-teal-300">Une Assistance 24h/24
                                    et 7j/7</h3>
                                    <p class="text-gray-500 dark:text-gray-50">Des Questions ? notre equipe d'assistance
                                        est disponible
                                        24h/24 pour vous aider à tout moment et en tout lieu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





</section>

<section x-show="isLoading" x-cloakid="Services" class="min-h-screen bg-gray-100 dark:bg-gray-900">

    <div class="px-8 py-6 mx-auto max-w-7xl md:px-6">
        <!-- heading text -->
        <div class="mb-10 text-center">
            <span class="font-medium text-amber-600">{{__('messages.OurServices')}}</span>
            <h1 class="text-2xl font-bold text-slate-700 dark:text-gray-200 sm:text-xl">Découvrez les Services</h1>

        </div>

        <!-- box wrapper -->
        <div class="grid grid-cols-2 gap-4 md:gap-6 md:grid-cols-4 xl:gap-8">

            @forelse ($category as $category)

            <a href="{{route('categoryByName',[$category->name])}}"
                class="flex flex-col items-center px-2 py-4 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="{{Storage::disk('local')->url('public/'.$category->illustration) }}"
                    class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px]   font-semibold text-slate-600 duration-200 group-hover:text-white">
                    {{$category->name}}</h4>

            </a>
            @empty




            <div
                class="flex flex-col items-center px-2 py-4 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/develloper.png" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px]   font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Programation</h4>

            </div>

            <div
                class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/designer.png" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Graphisme & Designer</h4>

            </div>

            <div
                class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-blue-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/photo.png" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px]  font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Photographie</h4>

            </div>

            <div
                class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/marketing.png" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                    marketing Digital</h4>

            </div>

            <div
                class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/deco.png" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Decoration</h4>

            </div>

            <div
                class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/business.svg" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px]  font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Bussiness</h4>

            </div>
            <div
                class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/redaction.svg" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Redaction & Traduction</h4>

            </div>
            <div
                class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/loisir.svg" class="w-20 h-20 rounded-md hover:bg-white" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px]  font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Loisirs</h4>

            </div>
            @endforelse
        </div>
    </div>

</section>

<section x-show="isLoading" x-cloak id="confiance" class="bg-white">
    <div class="px-4 py-4 mx-auto sm:mx-2 md:px-auto">
        <div class="container text-gray-600 dark:text-gray-300 ">
            <div class="mb-10 text-center">
                <span class="font-medium text-amber-600">{{__('Comentaire')}}</span>
                <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Ils avaient confiance en nous</h1>

            </div>
            <div class="container flex flex-col mx-auto my-10 overflow-hidden shadow-sm md:my-24 md:flex-row"
                x-data="{ testimonialActive: 2 }" x-cloak>
                <div
                    class="relative flex flex-col justify-center w-full py-2 bg-indigo-700 md:py-24 md:w-1/2 item-center">

                    <div class="absolute top-0 left-0 z-10 w-16 h-16 grid-indigo md:w-40 md:h-40 md:ml-20 md:mt-24">
                    </div>

                    <div
                        class="relative z-20 px-6 py-2 mb-0 text-2xl font-semibold leading-tight tracking-tight text-indigo-100 md:text-5xl md:py-6 md:px-1 md:w-64 md:mx-auto">
                        <span class="md:block">What Our</span>
                        <span class="md-block">Customers</span>
                        <span class="block">Are Saying!</span>
                    </div>

                    <div class="absolute bottom-0 right-0 hidden mb-4 mr-4 md:block">
                        <button
                            class="w-12 h-10 font-bold text-gray-500 bg-gray-100 border-r rounded-l-full focus:outline-none hover:text-indigo-500"
                            x-on:click="testimonialActive = testimonialActive === 1 ? 3 : testimonialActive - 1">
                            &#8592;
                        </button><button
                            class="w-12 h-10 font-bold text-gray-500 bg-gray-100 rounded-r-full focus:outline-none hover:text-indigo-500"
                            x-on:click="testimonialActive = testimonialActive >= 3 ? 1 : testimonialActive + 1">
                            &#8594;
                        </button>
                    </div>
                </div>

                <div class="bg-gray-100 md:w-1/2">
                    <div class="relative flex flex-col h-full">

                        <div class="absolute top-0 left-0 mt-3 ml-4 md:mt-5 md:ml-12">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-12 h-12 text-indigo-200 fill-current md:w-16 md:h-16" viewBox="0 0 24 24">
                                <path
                                    d="M6.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L9.758 4.03c0 0-.218.052-.597.144C8.97 4.222 8.737 4.278 8.472 4.345c-.271.05-.56.187-.882.312C7.272 4.799 6.904 4.895 6.562 5.123c-.344.218-.741.4-1.091.692C5.132 6.116 4.723 6.377 4.421 6.76c-.33.358-.656.734-.909 1.162C3.219 8.33 3.02 8.778 2.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C2.535 17.474 4.338 19 6.5 19c2.485 0 4.5-2.015 4.5-4.5S8.985 10 6.5 10zM17.5 10c-.223 0-.437.034-.65.065.069-.232.14-.468.254-.68.114-.308.292-.575.469-.844.148-.291.409-.488.601-.737.201-.242.475-.403.692-.604.213-.21.492-.315.714-.463.232-.133.434-.28.65-.35.208-.086.39-.16.539-.222.302-.125.474-.197.474-.197L20.758 4.03c0 0-.218.052-.597.144-.191.048-.424.104-.689.171-.271.05-.56.187-.882.312-.317.143-.686.238-1.028.467-.344.218-.741.4-1.091.692-.339.301-.748.562-1.05.944-.33.358-.656.734-.909 1.162C14.219 8.33 14.02 8.778 13.81 9.221c-.19.443-.343.896-.468 1.336-.237.882-.343 1.72-.384 2.437-.034.718-.014 1.315.028 1.747.015.204.043.402.063.539.017.109.025.168.025.168l.026-.006C13.535 17.474 15.338 19 17.5 19c2.485 0 4.5-2.015 4.5-4.5S19.985 10 17.5 10z" />
                            </svg>
                        </div>

                        <div class="relative z-10 h-full">
                            <div x-show.immediate="testimonialActive === 1">
                                <p class="px-6 py-6 text-xl italic font-normal text-gray-600 serif md:px-16 md:py-10 md:text-2xl"
                                    x-show.transition="testimonialActive == 1">
                                    Leverage agile frameworks to provide a robust synopsis for high level overviews.
                                    Iterative
                                    approaches to corporate strategy foster collaborative thinking to further the
                                    overall value
                                    proposition. Organically grow the holistic world view of disruptive innovation via
                                    workplace
                                    diversity and empowerment.
                                </p>
                            </div>

                            <div x-show.immediate="testimonialActive === 2">
                                <p class="px-6 py-6 text-xl italic font-normal text-gray-600 serif md:px-16 md:py-10 md:text-2xl"
                                    x-show.transition="testimonialActive == 2">
                                    Bring to the table win-win survival strategies to ensure proactive domination. At
                                    the end of the
                                    day, going forward, a new normal that has evolved from generation X is on the runway
                                    heading
                                    towards a streamlined cloud solution. User generated content in real-time will have
                                    multiple
                                    touchpoints for offshoring.
                                </p>
                            </div>

                            <div x-show.immediate="testimonialActive === 3">
                                <p class="px-6 py-6 text-xl italic font-normal text-gray-600 serif md:px-16 md:py-10 md:text-2xl"
                                    x-show.transition="testimonialActive == 3">
                                    Capitalize on low hanging fruit to identify a ballpark value added activity to beta
                                    test.
                                    Override the digital divide with additional clickthroughs from DevOps.
                                    Nanotechnology immersion
                                    along the information highway will close the loop on focusing solely on the bottom
                                    line.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center justify-center my-4">
                            <button @click.prevent="testimonialActive = 1"
                                class="inline-block mx-2 font-bold text-center rounded-full shadow-xs focus:outline-none focus:shadow-outline"
                                :class="{'h-12 w-12 opacity-25 bg-indigo-300 text-gray-600': testimonialActive != 1, 'h-16 w-16 opacity-100 bg-indigo-600 text-white': testimonialActive == 1 }">JD</button>
                            <button @click.prevent="testimonialActive = 2"
                                class="inline-block w-16 h-16 mx-2 font-bold text-center bg-indigo-600 rounded-full shadow-xs focus:outline-none focus:shadow-outline"
                                :class="{'h-12 w-12 opacity-25 bg-indigo-300 text-gray-600': testimonialActive != 2, 'h-16 w-16 opacity-100 bg-indigo-600 text-white': testimonialActive == 2 }">WD</button>
                            <button @click.prevent="testimonialActive = 3"
                                class="inline-block w-12 h-12 mx-2 font-bold text-center bg-indigo-600 rounded-full shadow-xs focus:outline-none focus:shadow-outline"
                                :class="{'h-12 w-12 opacity-25 bg-indigo-300 text-gray-600': testimonialActive != 3, 'h-16 w-16 opacity-100 bg-indigo-600 text-white': testimonialActive == 3 }">JW</button>
                        </div>

                        <div class="flex justify-center px-6 pt-2 pb-6 md:py-6">
                            <div class="text-center" x-show="testimonialActive == 1">
                                <h2 class="text-sm font-bold leading-tight text-gray-700 md:text-base">John Doe</h2>
                                <small class="text-xs text-gray-500 truncate md:text-sm">CEO, ABC Inc.</small>
                            </div>

                            <div class="text-center" x-show="testimonialActive == 2">
                                <h2 class="text-sm font-bold leading-tight text-gray-700 md:text-base">Winter Doe</h2>
                                <small class="text-xs text-gray-500 truncate md:text-sm">CTO, XYZ Corp.</small>
                            </div>

                            <div class="text-center" x-show="testimonialActive == 3">
                                <h2 class="text-sm font-bold leading-tight text-gray-700 md:text-base">John Wick</h2>
                                <small class="text-xs text-gray-500 truncate md:text-sm">Product Manager, Fake
                                    Corp.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

<section x-show="isLoading" x-cloak id="getStarted" class="min-h-screen bg-gray-900">



    <div class="py-16 ">
        <div class="container px-6 m-auto space-y-8 text-gray-500 md:px-12 lg:px-20">
            <div
                class="justify-center gap-6 p-3 mx-auto text-center rounded-lg md:flex md:text-left lg:items-center lg:gap-16">
                <div class="mb-6 space-y-6 md:mb-0 md:w-6/12 lg:w-6/12">
                    <h1 class="text-3xl font-bold text-white md:text-4xl dark:text-white">Vous êtes un freelance à la
                        recherche
                        de
                        nouvelles opportunités ?
                    </h1>
                    <p class="font-serif text-md text-gray-50 dark:text-gray-300">
                        FIND permet aux freelances de proposer leurs compétences aux entreprises et autres personnes
                        intéressées
                        par
                        les offres
                        disponibles sur le site. En outre, la plateforme met en œuvre des tactiques de marketing pour
                        augmenter le
                        nombre
                        d'achats de services.
                    </p>
                    <div class="flex flex-wrap gap-6">
                        <a href="{{url('/register')}}"
                            class="relative flex items-center justify-center w-[6/12] h-12 px-8 mx-auto duration-300 bg-white rounded-full before:absolute before:inset-0 before:transition hover:scale-105 active:duration-75 active:scale-95 sm:w-max">
                            <span class="relative text-base font-semibold text-amber-600">{{__('Rejoignez
                                Nous')}}</span>
                        </a>

                    </div>
                </div>
                <div data-aos="fade-up" data-aos-duration="800"
                    class="grid grid-cols-5 grid-rows-4 gap-4 md:w-5/12 lg:w-6/12">
                    <div class="col-span-2 row-span-4">
                        <img src="images/services/getStarded.png" class="w-full bg-white rounded-full" width="640"
                            height="960" alt="shoes" loading="lazy" />
                    </div>
                    <div class="col-span-2 row-span-2">
                        <img src="images/services/work1.png"
                            class="object-cover object-top w-full h-full bg-skin-fill rounded-xl" width="640"
                            height="640" alt="shoe" loading="lazy" />
                    </div>
                    <div class="col-span-3 row-span-3">
                        <img src="images/services/work2.png"
                            class="object-cover object-top w-full h-full mb-3 md:mb-0 rounded-xl" width="640"
                            height="427" alt="shoes" loading="lazy" />
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section x-show="isLoading" x-cloak id="presentation" class="bg-gray-100 md:min-h-screen ">
    <div class="px-8 py-6 mx-auto max-w-7xl md:px-4">

        <!-- heading text -->
        <div class="mb-10 text-center">
            <span class="font-medium text-amber-600">{{__('Decouverte')}}</span>
            <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">FIND </h1>

        </div>
        <div class="flex flex-col ">

            <div data-aos="fade-in" data-aos-duration="500"
                class="grid gap-4 mb-4 sm:grid-cols-2 md:grid-cols-3 xl:gap-8">
                <div
                    class="flex flex-col items-center w-full px-8 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 dark:bg-gray-800 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                    <ion-icon name="people-outline"
                        class="text-[55px] text-amber-600 duration-200  group-hover:text-white">
                    </ion-icon>
                    <h4
                        class="mt-3 mb-1 text-[20px] font-semibold text-slate-600 dark:text-white duration-200 group-hover:text-white">
                        +200 Freelance</h4>

                </div>

                <div
                    class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl dark:bg-gray-800 border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                    <ion-icon name="bag-check-outline"
                        class="text-[55px] text-amber-600 duration-200 group-hover:text-white">
                    </ion-icon>
                    <h4
                        class="mt-3 mb-1 text-[20px]  font-semibold dark:text-white text-slate-600 duration-200 group-hover:text-white">
                        500
                        Marchés
                    </h4>

                </div>
                <div
                    class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 dark:bg-gray-800 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                    <ion-icon name="albums-outline"
                        class="text-[55px] text-amber-600 duration-200 group-hover:text-white">
                    </ion-icon>
                    <h4
                        class="mt-3 mb-1 text-[20px]  font-semibold text-slate-600 duration-200 group-hover:text-white dark:text-white">
                        10
                        services
                    </h4>

                </div>
            </div>



            <div
                class="p-2 bg-white border border-gray-100 dark:border-gray-700 rounded-3xl dark:bg-gray-800 dark:shadow-none md:mx-auto lg:w-10/12 xl:w-8/12">
                <div class="grid px-2 py-4 md:py-6 md:grid-cols-5 ">

                    <div class="space-y-6 py-auto justify md:col-span-2 sm:p-8">
                        <div class="px-6">
                            <h1 class="mt-4 text-xl font-semibold text-center text-gray-800 dark:text-white">Comment
                                S'inscrire
                                comme
                                <span class="text-amber-800 dark:text-white">Freelance ?</span>
                            </h1>
                        </div>
                        <p class="mt-2 text-lg leading-none text-center text-gray-700 text-md dark:text-white">
                            <span class="font-serif">"</span>
                            Apprenez à utiliser la Plateforme FIND à l'aide de ces tutoriels.
                            <span class="font-serif">"</span>
                        </p>

                    </div>
                    <div class="order-2 w-full h-64 mx-2 my-4 aspect-w-16 aspect-h-9 md:col-span-3 rounded-2xl">
                        <iframe class="w-full h-full aspect-video" src="https://www.youtube.com/embed/8560CAdA0Ys"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>

                </div>
            </div>

        </div>


    </div>

</section>


<section x-show="isLoading" x-cloak id="faqs" class="bg-white md:min-h-screen dark:bg-gray-800 dark:text-white">

    <div class="px-8 py-6 mx-auto max-w-7xl md:px-6">

        <div class="mb-10 text-center">
            <span class="font-medium text-amber-600">{{__('FAQs')}}</span>
            <h1 class="text-2xl font-bold dark:text-gray-50 text-slate-700 sm:text-3xl">FAQs </h1>

        </div>

        <div class="grid sm:grid-cols-2">
            <div data-aos="fade-right" data-aos-duration="1000" class="w-full px-4">
                <img src="/images//services/faq.png" alt="hero section img" class="rounded-full lg:ml-auto">
            </div>
            <div class="w-full lg:w-11/12">

                <div class="px-1 py-2 text-gray-800" x-data="{
                              faqs: [
                                  {
                                      question: 'Qu’est ce que Find ?',
                                      answer: 'Find est une plate-forme destinée à mettre en relation les entreprises et les particuliers demandèrent des services avec des travailleurs indépendants dans différents domaines tels que : Design et graphisme, photographie et tant d’autres . Find propose à ses travailleurs indépendants la possibilité de vendre leurs services aux entreprises et à toute personne désireuse d’un service se trouvant sur la plate-forme',
                                      isOpen: true,
                                  },
                                  {
                                      question: 'Que veut dire le terme Freelance ?',
                                      answer: 'Le mot freelance est une nomenclature anglaise désignant une personne qui travaille pour elle-même sans contrat permanent avec un employeur, et qui est essentiellement son propre patron.',
                                      isOpen: false,
                                  },
                                  {
                                      question: 'La plate-forme est-elle gratuite ?',
                                      answer: 'Oui la plate-forme est gratuite pour ceux qui veulent acheter un service. Pour les Freelance ( vendeurs) , ils doivent souscrire à un pack d’abonnement',
                                      isOpen: false,
                                  },

                                  {
                                      question: 'Comment se fait le paiement pour celui qui commande le service ?',
                                      answer: 'Pour celui qui commande un service, il aura la possibilité de payer par Mobile money local ( M-pesa, Airtel money, Orange money soit par visa et Mastercard.',
                                      isOpen: false,
                                  },
                                  {
                                      question: 'Pourquoi payer avant la livraison du service ?',
                                      answer: 'Il est essentiel d’effectuer un paiement avant la prestation du service pour certifier votre dévouement, ce qui garantit que le freelance ne travaillera pas en vain. De plus, le freelance ne recevra votre argent qu’après réception de votre commande, ce qui garantit la sécurité des deux parties.',
                                      isOpen: false,
                                  },
                              ]
                          }">

                    <div class="mt-6 text-lg leading-loose">
                        <template x-for="(faq, index) in faqs" :key="faq.question">
                            <div>
                                <button
                                    class="flex items-center justify-between w-full py-3 mt-4 font-bold text-gray-800 dark:text-white"
                                    :class="index !== faqs.length - 1 && 'border-b border-gray-400'"
                                    @click="faqs = faqs.map(f => ({ ...f, isOpen: f.question !== faq.question ? false : !f.isOpen}))">
                                    <!-- Specs has it that only one component can be open at a time and also you should be able to toggle the open state of the active component too -->
                                    <div class="text-left" x-text="faq.question"></div>

                                    <svg x-show="!faq.isOpen" class="fill-current" viewBox="0 0 24 24" width="24"
                                        height="24">
                                        <path class="heroicon-ui"
                                            d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm1-9h2a1 1 0 010 2h-2v2a1 1 0 01-2 0v-2H9a1 1 0 010-2h2V9a1 1 0 012 0v2z" />
                                    </svg>
                                    <svg x-show="faq.isOpen" class="fill-current" viewBox="0 0 24 24" width="24"
                                        height="24">
                                        <path class="heroicon-ui"
                                            d="M12 22a10 10 0 110-20 10 10 0 010 20zm0-2a8 8 0 100-16 8 8 0 000 16zm4-8a1 1 0 01-1 1H9a1 1 0 010-2h6a1 1 0 011 1z" />
                                    </svg>
                                </button>

                                <div class="mt-2 text-sm text-gray-800 dark:text-white " x-text="faq.answer" x-collapse
                                    x-show="faq.isOpen">
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

        </div>
    </div>


</section>
@endsection




@push('script')



<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        centeredSlides: true,
        keyboard: {
          enabled: true,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
          dynamicBullets: true,
        },
        Navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      })
</script>

<script>
    var swiper2 = new Swiper('.mySwiper2', {
    slidesPerView: 1,
        spaceBetween: 30,
        centeredSlides: true,

        pagination: {
          el: '.swiper-pagination',
          clickable: true,
          dynamicBullets: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
</script>

@endpush