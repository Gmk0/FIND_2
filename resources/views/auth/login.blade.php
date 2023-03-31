<x-guest-layout>
    {{--<x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="ml-1 btn btn-primary" href="{{ url('auth/facebook') }}"
                    style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;"
                    id="btn-fblogin">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i> Login with Facebook
                </a>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{ url('auth/google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png"
                        style="margin-left: 3em;">
                </a>
            </div>
        </form>
    </x-jet-authentication-card>--}}

    <div class="container sticky top-0 z-sticky">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 flex-0">
                <!-- Navbar -->
                <nav
                    class="absolute top-0 left-0 right-0 z-30 flex flex-wrap items-center px-4 py-2 mx-6 my-4 shadow-soft-2xl rounded-blur bg-white/80 backdrop-blur-2xl backdrop-saturate-200 lg:flex-nowrap lg:justify-start">
                    <div class="flex items-center justify-between w-full p-0 pl-6 mx-auto flex-wrap-inherit">
                        <a href="{{url('/')}}"
                            class="leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-8 py-2 text-center align-middle font-bold uppercase text-white transition-all"><span
                                class=" to-orange-400">FIND</span>
                        </a>
                        <button navbar-trigger
                            class="px-3 py-1 ml-2 text-lg leading-none transition-all bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer ease-soft-in-out lg:hidden"
                            type="button" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span
                                class="inline-block w-6 h-6 mt-2 align-middle bg-center bg-no-repeat bg-cover bg-none">
                                <span bar1
                                    class="w-5.5 rounded-xs relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                                <span bar2
                                    class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                                <span bar3
                                    class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                            </span>
                        </button>
                        <div navbar-menu
                            class="items-center flex-grow overflow-hidden transition-all duration-500 ease-soft lg-max:max-h-0 basis-full lg:flex lg:basis-auto">
                            <ul class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">
                                <li>
                                    <a class="flex items-center px-4 py-2 mr-2 text-sm font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-slate-700 lg:px-2"
                                        aria-current="page" href="{{url('/')}}">
                                        <i class="mr-1 fa fa-chart-pie opacity-60"></i>
                                        {{__('messages.Home')}}
                                    </a>
                                </li>
                                <li>
                                    <a class="block px-4 py-2 mr-2 text-sm font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-slate-700 lg:px-2"
                                        href="">
                                        <i class="mr-1 fa fa-user opacity-60"></i>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="block px-4 py-2 mr-2 text-sm font-normal transition-all lg-max:opacity-0 duration-250 ease-soft-in-out text-slate-700 lg:px-2"
                                        href="{{url('/register')}}">
                                        <i class="mr-1 fas fa-user-circle opacity-60"></i>
                                        {{__('messages.enregistre')}}
                                    </a>
                                </li>

                            </ul>


                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>
    <main class="mt-0 transition-all duration-200 ease-soft-in-out">


        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
                <div class="container z-10">
                    <div class="flex flex-wrap mt-0 -mx-3">
                        <div>

                        </div>
                        <div
                            class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                            <div
                                class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                                <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                                    <x-validation-errors class="" />

                                    <h3
                                        class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-orange-600 to-orange-400 bg-clip-text">
                                        {{__('messages.Welcomeback')}}</h3>
                                    <p class="mb-0">{{__('messages.descriptionSignin')}}</p>
                                </div>
                                <div class="flex-auto p-6">
                                    <form role="form">
                                        <label
                                            class="mb-2 ml-1 text-xs font-bold text-slate-700">{{__('messages.Email')}}</label>
                                        <div class="mb-3">
                                            <x-jet-input id="email" placeholder="your email"
                                                class="focus:shadow-soft-orange-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                                                type="email" name="email" :value="old('email')" required autofocus />

                                        </div>
                                        <label
                                            class="mb-2 ml-1 text-xs font-bold text-slate-700">{{__('messages.password')}}</label>
                                        <div class="mb-4">
                                            <x-jet-input id="password"
                                                class="focus:shadow-soft-orange-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shado"
                                                type="password" name="password" required
                                                autocomplete="current-password" />

                                        </div>
                                        <div class="min-h-6 mb-0.5 block pl-12">
                                            <input id="rememberMe" name="remember"
                                                class="mt-0.54 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right"
                                                type="checkbox" />
                                            <label
                                                class="mb-2 ml-1 text-sm font-normal cursor-pointer select-none text-slate-700"
                                                for="rememberMe">{{__('messages.Rememberme')}}</label>
                                        </div>
                                        <div class="relative w-full max-w-full px-3 mt-2 text-center shrink-0">
                                            <p
                                                class="z-20 inline px-4 mb-2 text-sm font-semibold leading-normal bg-white text-slate-400">
                                                or </p>
                                        </div>
                                        <div class="flex flex-wrap px-3 -mx-3 sm:px-6 xl:px-12">

                                            <div class="w-4/12 max-w-full px-1 ml-auto flex-0">
                                                <a class="inline-block w-full px-6 py-1 mb-2 text-xs font-bold text-center text-gray-200 uppercase align-middle transition-all bg-transparent border border-gray-200 border-solid rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:bg-transparent hover:opacity-75"
                                                    href="{{ url('auth/facebook') }}">
                                                    <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink32">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g transform="translate(3.000000, 3.000000)"
                                                                fill-rule="nonzero">
                                                                <circle fill="#3C5A9A" cx="29.5091719" cy="29.4927506"
                                                                    r="29.4882047"></circle>
                                                                <path
                                                                    d="M39.0974944,9.05587273 L32.5651312,9.05587273 C28.6886088,9.05587273 24.3768224,10.6862851 24.3768224,16.3054653 C24.395747,18.2634019 24.3768224,20.1385313 24.3768224,22.2488655 L19.8922122,22.2488655 L19.8922122,29.3852113 L24.5156022,29.3852113 L24.5156022,49.9295284 L33.0113092,49.9295284 L33.0113092,29.2496356 L38.6187742,29.2496356 L39.1261316,22.2288395 L32.8649196,22.2288395 C32.8649196,22.2288395 32.8789377,19.1056932 32.8649196,18.1987181 C32.8649196,15.9781412 35.1755132,16.1053059 35.3144932,16.1053059 C36.4140178,16.1053059 38.5518876,16.1085101 39.1006986,16.1053059 L39.1006986,9.05587273 L39.0974944,9.05587273 L39.0974944,9.05587273 Z"
                                                                    fill="#FFFFFF"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>

                                            <div class="w-4/12 max-w-full px-1 mr-auto flex-0">
                                                <a class="inline-block w-full px-6 py-1 mb-2 text-xs font-bold text-center text-gray-200 uppercase align-middle transition-all bg-transparent border border-gray-200 border-solid rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:bg-transparent hover:opacity-75"
                                                    href="{{ url('auth/google') }}">
                                                    <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <g transform="translate(3.000000, 2.000000)"
                                                                fill-rule="nonzero">
                                                                <path
                                                                    d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267"
                                                                    fill="#4285F4"></path>
                                                                <path
                                                                    d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667"
                                                                    fill="#34A853"></path>
                                                                <path
                                                                    d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782"
                                                                    fill="#FBBC05"></path>
                                                                <path
                                                                    d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769"
                                                                    fill="#EB4335"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>

                                        </div>

                                        <div class="text-center">
                                            <button type="submit"
                                                class="inline-block w-full px-6 py-3 mt-6 mb-0 text-xs font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro ease-soft-in tracking-tight-soft gradient hover:scale-102 hover:shadow-soft-xs active:opacity-85">{{__('messages.SignIn')}}</button>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="p-2 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                                    <p class="mx-auto mb-2 text-sm leading-normal">
                                        {{__('messages.DontHaveCount')}}
                                        <a href="{{url('/register')}}"
                                            class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-orange-600 to-orange-400 bg-clip-text">{{__('messages.enregistre')}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
                            <div
                                class="absolute top-0 hidden w-3/5 h-full overflow-hidden -mr-26 -skew-x-10 -right-40 rounded-bl-xl md:block">
                                <div class="absolute inset-x-0 top-0 z-0 h-full -ml-16 bg-cover skew-x-10"
                                    style="background-image: url('./images/logo/ff3.png')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <footer class="py-12">
        <div class="container">
            <div class="flex flex-wrap -mx-3">
                <div class="flex-shrink-0 w-full max-w-full mx-auto mb-6 text-center lg:flex-0 lg:w-8/12">
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Servives
                    </a>
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> A propos
                    </a>
                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Communaute
                    </a>

                    <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Blog </a>


                </div>
                <div class="flex-shrink-0 w-full max-w-full mx-auto mt-2 mb-6 text-center lg:flex-0 lg:w-8/12">
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-dribbble"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-twitter"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-instagram"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-pinterest"></span>
                    </a>
                    <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
                        <span class="text-lg fab fa-github"></span>
                    </a>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
                    <p class="mb-0 text-slate-400">
                        Copyright ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        Find
                    </p>

                </div>

            </div>

            <div class="flex flex-wrap -mx-3">
                <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
                    <div class="flex items-center ">




                    </div>

                </div>

            </div>

        </div>
        </div>
    </footer>
</x-guest-layout>