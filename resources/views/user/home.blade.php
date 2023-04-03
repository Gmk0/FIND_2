@extends('layouts.user')

@section('content')

<section
    class="z-40 min-h-screen relative text-neutral-50 pt-20 px-4 overflow-hidden 2xl:px-60  grid grid-cols-1 gap-8 lg:grid-cols-12 relative bg-skin-fill dark:bg-gray-900">
    <div
        class="[mask-image:linear-gradient(to_bottom,white_20%,transparent_75%)] absolute bottom-[-100px] md:w-[800px] md:h-[800px] lg:top-[120px] lg:right-[-100px] xl:right-0 w-[500px] h-[500px] 2xl:w-[1026px] 2xl:h-[1026px]">
        <svg viewBox="0 0 1026 1026" fill="none" aria-hidden="true"
            class="absolute inset-0 h-full w-full animate-spin-slow">
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
            class="absolute inset-0 h-full w-full animate-spin-slow">
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

    <div class="col-span-6 xl:place-self-center mb-8 mt-8 xl:mt-0 lg:mb-0 z-50">
        <h1 class="text-2xl md:text-3xl xl:text-5xl font-bold text-center lg:text-left">
            Votre satisfaction dans nos services Freelance <br />

        </h1>
        <p class="my-8 max-w-lg mx-auto lg:mx-0 text-center lg:text-left opacity-70">
            .
        </p>
        <div class="flex flex-col lg:flex-row items-center">
            <button
                class="w-full lg:w-max px-4 py-3 bg-neutral-50 hover:cursor-pointer text-cyan-600 font-bold rounded-lg lg:mr-8 mb-4 lg:mb-0">
                Get started for free
            </button>
        </div>
    </div>
    <div class="col-span-6 relative hidden md:flex z-50">
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

                <div class="grid gap-2 grid-cols-1 mx-auto md:mx-0 md:grid-cols-2">

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
                        class="w-32 h-16 px-5 py-3 duration-200 bg-gray-50 border rounded-lg shadow-md cursor-pointer border-blue-300/20 shadow-blue-500/5 hover:scale-95 sm:w-36">
                    <img src="/images/brand/influeworld.png" alt="brand"
                        class="w-32 h-16 px-5 py-3 duration-200 bg-gray-50 border rounded-lg shadow-md cursor-pointer border-blue-300/20 shadow-blue-500/5 hover:scale-95 sm:w-36">
                    <img src="/images/brand/influnet2.jpg" alt="brand"
                        class="w-32 h-16 px-5 py-3 bg-white border rounded-lg shadow-md cursor-pointer duration border-blue-300/20 shadow-blue-500/5 hover:scale-95 sm:w-36">
                    <img src="/images/brand/udemy.PNG" alt="brand"
                        class="w-32 h-16 px-5 py-3 duration-200 bg-gray-50 border rounded-lg shadow-md cursor-pointer border-blue-300/20 shadow-blue-500/5 hover:scale-95 sm:w-36">
                    <img src="/images/brand/microsoft.svg" alt="brand"
                        class="w-32 h-16 px-5 py-3 duration-200 bg-gray-50 border rounded-lg shadow-md cursor-pointer border-blue-300/20 shadow-blue-500/5 hover:scale-95 sm:w-36">
                    <img src="/images/brand/airbnb.svg" alt="brand"
                        class="w-32 h-16 px-5 py-3 duration-200 bg-gray-50 border rounded-lg shadow-md cursor-pointer md:h-none border-blue-300/20 shadow-blue-500/5 hover:scale-95 sm:w-36">
                </div>
            </div>

            <div class="hidden px-4 lg:block lg:w-1/12"></div>

            <div data-aos="fade-left" data-aos-duration="800" class="hidden w-full px-4 lg:block md:w-6/12">
                <div class="lg:ml-auto lg:text-right">
                    <div class="relative z-10 inline-block pt-11 lg:pt-0">
                        <img src="images/hero/women.jpeg" alt="hero section img" class="rounded-full w-3/4 lg:ml-auto">
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

        <div class="mx-3 my-6 swiper mySwiper ">
            <div class="pb-8 swiper-wrapper ">
                @for ($i = 0; $i < 1; $i++) <div class="swiper-slide !bg-transparent px-2 md:px-0">
                    <div
                        class="px-2 bg-white border border-gray-100 dark:border-gray-300 rounded-3xl dark:bg-gray-800 dark:shadow-none md:mx-auto lg:w-11/12 xl:w-8/12">
                        <div class="grid md:grid-cols-5">


                            <div class="w-full m-2 h-50 aspect-w-8 aspect-h-9 md:col-span-2 rounded-2xl">

                                <iframe class="rounded-sm w-11/2 h-9/12 aspect-video hover:aspect-square"
                                    src="https://www.youtube.com/embed/r9jwGansp1E" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                            <div class="p-6 mx-auto space-y-6 text-center md:col-span-3 sm:p-8">
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


<section x-show="isLoading" x-cloak id="monde2" class="min-h-screen bg-white dark:bg-gray-900">

    <div class="py-16">
        <div class="px-6 m-auto text-gray-600 xl:container md:px-12 xl:px-16">
            <div
                class="flex-row-reverse justify-center space-y-6 rounded-lg bg-gray-100 dark:bg-gray-800 lg:p-16 md:flex md:gap-6 md:space-y-0 lg:items-center">
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

<section x-show="isLoading" x-cloakid="Services" class="min-h-screen bg-gray-100 dark:bg-gray-800">

    <div class="px-8 py-6 mx-auto max-w-7xl md:px-6">
        <!-- heading text -->
        <div class="mb-10 text-center">
            <span class="font-medium text-amber-600">{{__('messages.OurServices')}}</span>
            <h1 class="text-2xl font-bold text-slate-700 dark:text-gray-200 sm:text-xl">Découvrez les Services</h1>

        </div>

        <!-- box wrapper -->
        <div class="grid grid-cols-2 gap-4 md:gap-6 md:grid-cols-4 xl:gap-8">
            <div
                class="flex flex-col items-center px-2 py-4 duration-200 bg-gray-50 border shadow-lg cursor-pointer group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/develloper.png" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px]   font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Programation</h4>

            </div>

            <div
                class="flex flex-col items-center px-5 py-8 duration-200 bg-gray-50 border shadow-lg cursor-pointer group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/designer.png" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Graphisme & Designer</h4>

            </div>

            <div
                class="flex flex-col items-center px-5 py-8 duration-200 bg-gray-50 border shadow-lg cursor-pointer group rounded-xl border-blue-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/photo.png" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px]  font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Photographie</h4>

            </div>

            <div
                class="flex flex-col items-center px-5 py-8 duration-200 bg-gray-50 border shadow-lg cursor-pointer group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/marketing.png" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                    marketing Digital</h4>

            </div>

            <div
                class="flex flex-col items-center px-5 py-8 duration-200 bg-gray-50 border shadow-lg cursor-pointer group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/deco.png" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Decoration</h4>

            </div>

            <div
                class="flex flex-col items-center px-5 py-8 duration-200 bg-gray-50 border shadow-lg cursor-pointer group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/business.svg" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px]  font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Bussiness</h4>

            </div>
            <div
                class="flex flex-col items-center px-5 py-8 duration-200 bg-gray-50 border shadow-lg cursor-pointer group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/redaction.svg" class="w-20 h-20 rounded-md" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Redaction & Traduction</h4>

            </div>
            <div
                class="flex flex-col items-center px-5 py-8 duration-200 bg-gray-50 border shadow-lg cursor-pointer group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                <img src="/images/services/loisir.svg" class="w-20 h-20 rounded-md hover:bg-white" alt="">
                <h4
                    class="mt-3 mb-1 md:text-[20px] text-[16px]  font-semibold text-slate-600 duration-200 group-hover:text-white">
                    Loisirs</h4>

            </div>
        </div>
    </div>

</section>

<section x-show="isLoading" x-cloak id="confiance" class="bg-white md:min-h-screen">
    <div class="px-4 py-4 mx-auto sm:mx-2 max-w-7xl md:px-6">
        <div class="container text-gray-600 dark:text-gray-300 ">
            <div class="mb-10 text-center">
                <span class="font-medium text-amber-600">{{__('Comentaire')}}</span>
                <h1 class="text-2xl font-bold text-slate-700 sm:text-3xl">Ils avaient confiance en nous</h1>

            </div>
            <div data-aos="fade-in" data-aos-duration="800" class="m-4 swiper mySwiper">

                <div class="pb-8 sm:pb-4 swiper-wrapper">


                    <div class="swiper-slide !bg-transparent md:px-0">
                        <div
                            class="p-3 mx-auto space-y-6 text-center bg-gray-100 border rounded-lg dark:border-gray-100 dark:bg-gray-800 lg:w-10/12 xl:w-8/12">
                            <img class="mx-auto !h-16 !w-16 rounded-full" src="images/avatars/first_user.webp"
                                alt="user avatar" height="220" width="220" loading="lazy" />
                            <p class="font-mono text-lg font-semibold leading-none dark:text-gray-100 ">
                                <span class="font-serif text-md">"</span> Nous Avons utilisé FIND pour notre SEO, notre
                                logo, Notre
                                site
                                web et son Contenu, ainsi que pour nos vidéos Quasiment
                                pour tout! c'était comme travailler avec quelqu'un qui se trouve a cote de vous et non a
                                l'autre bout
                                du
                                monde. <span class="font-serif">"</span>
                            </p>
                            <div>
                                <h6 class="text-lg font-semibold leading-none">John Doe</h6>
                                <span class="text-xs text-gray-500">Product Designer</span>
                            </div>
                            <img class="mx-auto !w-28" src="images/clients/client-8.png" alt="company logo" height="400"
                                width="142" loading="lazy" />
                        </div>
                    </div>
                    <div class="swiper-slide !bg-transparent">
                        <div
                            class="p-3 mx-auto space-y-6 text-center bg-gray-100 border dark:border-gray-100 dark:bg-gray-800 rounded-lg lg:w-[500px] xl:w-8/12">
                            <img class="mx-auto !h-16 !w-16 rounded-full" src="images/avatars/second_user.webp"
                                alt="user avatar" height="220" width="220" loading="lazy" />
                            <p class="font-mono text-lg font-semibold leading-none dark:text-gray-100">
                                <span class="font-serfi">"</span> Si Vous voulez créer un business de grande envergure,
                                vous aurez
                                besoin
                                d'aide. Et c'est ce que FIND fait. <span class="font-serif">"</span>
                            </p>
                            <div>
                                <h6 class="text-lg font-semibold leading-none">Georges Mubemba</h6>
                                <span class="text-xs text-gray-500">Développeur</span>
                            </div>
                            <img class="mx-auto !w-28" src="images/clients/client-8.png" alt="company logo" height="400"
                                width="142" loading="lazy" />
                        </div>
                    </div>

                    <div class="swiper-slide !bg-transparent">
                        <div
                            class="p-3 mx-auto space-y-6 text-center bg-gray-100 border rounded-lg dark:border-gray-100 dark:bg-gray-800 lg:w-10/12 xl:w-8/12">
                            <img class="mx-auto !h-16 !w-16 rounded-full" src="images/avatars/third_user.webp"
                                alt="user avatar" height="220" width="220" loading="lazy" />
                            <p class="font-mono text-lg font-semibold leading-none dark:text-gray-100">
                                <span class="font-serif">"</span> Nous avons utilise FIND pour le développement web de
                                notre Site, la
                                conception graphique et le développement web
                                Backend. Travailler Avec FIND Facilite mon travail tous les jours un peu plus <span
                                    class="font-serif">"</span>
                            </p>
                            <div>
                                <h6 class="text-lg font-semibold leading-none">John Doe</h6>
                                <span class="text-xs text-gray-500">Product Designer</span>
                            </div>
                            <img class="mx-auto !w-28" src="images/clients/client-4.png" alt="company logo" height="400"
                                width="142" loading="lazy" />
                        </div>
                    </div>
                </div>



                <div class="swiper-pagination"></div>


            </div>
        </div>
    </div>
</section>

<section x-show="isLoading" x-cloak id="getStarted" class="min-h-screen bg-gray-800">



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

<section x-show="isLoading" x-cloak id="presentation" class="bg-gray-100 md:min-h-screen dark:bg-dark">
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
                    class="flex flex-col items-center w-full px-8 py-8 duration-200 bg-gray-50 border shadow-lg cursor-pointer dark:bg-gray-800 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
                    <ion-icon name="people-outline"
                        class="text-[55px] text-amber-600 duration-200  group-hover:text-white">
                    </ion-icon>
                    <h4
                        class="mt-3 mb-1 text-[20px] font-semibold text-slate-600 dark:text-white duration-200 group-hover:text-white">
                        +200 Freelance</h4>

                </div>

                <div
                    class="flex flex-col items-center px-5 py-8 duration-200 bg-gray-50 border shadow-lg cursor-pointer group rounded-xl dark:bg-gray-800 border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
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
                    class="flex flex-col items-center px-5 py-8 duration-200 bg-gray-50 border shadow-lg cursor-pointer dark:bg-gray-800 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
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