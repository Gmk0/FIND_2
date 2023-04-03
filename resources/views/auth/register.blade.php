<x-guest-layout>


    <nav
        class="absolute top-0 z-30 flex flex-wrap items-center justify-between w-full px-4 py-2 mt-6 mb-4 shadow-none lg:flex-nowrap lg:justify-start">
        <div class="container flex items-center justify-between py-0 flex-wrap-inherit">
            <a href="{{url('/')}}"
                class="leading-pro hover:scale-102 hover:shadow-soft-xs active:opacity-85 ease-soft-in text-xs tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-3.5xl mb-0 mr-1 inline-block cursor-pointer border-0 bg-transparent px-8 py-2 text-center align-middle font-bold uppercase text-white transition-all"><span
                    class=" to-orange-400">FIND</span>
            </a>
            <button navbar-trigger
                class="px-3 py-1 ml-2 text-lg leading-none transition-all bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer ease-soft-in-out lg:hidden"
                type="button" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="inline-block w-6 h-6 mt-2 align-middle bg-center bg-no-repeat bg-cover bg-none">
                    <span bar1
                        class="w-5.5 rounded-xs duration-350 relative my-0 mx-auto block h-px bg-white transition-all"></span>
                    <span bar2
                        class="w-5.5 rounded-xs mt-1.75 duration-350 relative my-0 mx-auto block h-px bg-white transition-all"></span>
                    <span bar3
                        class="w-5.5 rounded-xs mt-1.75 duration-350 relative my-0 mx-auto block h-px bg-white transition-all"></span>
                </span>
            </button>
            <div navbar-menu
                class="items-center flex-grow transition-all ease-soft duration-350 lg-max:bg-white lg-max:max-h-0 lg-max:overflow-hidden basis-full rounded-xl lg:flex lg:basis-auto">
                <ul class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">
                    <li>
                        <a class="flex items-center px-4 py-2 mr-2 text-sm font-normal text-white transition-all duration-250 lg-max:opacity-0 lg-max:text-slate-700 ease-soft-in-out lg:px-2 lg:hover:text-white/75"
                            aria-current="page" href="{{url('/')}}">
                            <i class="mr-1 text-white lg-max:text-slate-700 fa fa-chart-pie opacity-60"></i>
                            {{__('messages.Accueil')}}
                        </a>
                    </li>
                    <li>
                        <a class="block px-4 py-2 mr-2 text-sm font-normal text-white transition-all duration-250 lg-max:opacity-0 lg-max:text-slate-700 ease-soft-in-out lg:px-2 lg:hover:text-white/75"
                            href="{{url('/user/profile')}}">
                            <i class="mr-1 text-white lg-max:text-slate-700 fa fa-user opacity-60"></i>
                            {{__('messages.profile')}}
                        </a>
                    </li>

                    <li>
                        <a class="block px-4 py-2 mr-2 text-sm font-normal text-white transition-all duration-250 lg-max:opacity-0 lg-max:text-slate-700 ease-soft-in-out lg:px-2 lg:hover:text-white/75"
                            href="{{url('/login')}}">
                            <i class="mr-1 text-white lg-max:text-slate-700 fas fa-key opacity-60"></i>
                            {{__('messages.SignIn')}}
                        </a>
                    </li>
                </ul>
                <!-- online builder btn  -->
                <!-- <li class="flex items-center">
                <a
                  class="leading-pro ease-soft-in border-white/75 text-xs tracking-tight-soft rounded-3.5xl hover:border-white/75 hover:scale-102 active:hover:border-white/75 active:hover:scale-102 active:opacity-85 active:shadow-soft-xs active:border-white/75 bg-white/10 hover:bg-white/10 active:hover:bg-white/10 mr-2 mb-0 inline-block cursor-pointer border border-solid py-2 px-8 text-center align-middle font-bold uppercase text-white shadow-none transition-all hover:text-white hover:opacity-75 hover:shadow-none active:scale-100 active:bg-white active:text-black active:hover:text-white active:hover:opacity-75 active:hover:shadow-none"
                  target="_blank"
                  href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053"
                  >Online Builder</a
                >
              </li> -->

            </div>
        </div>
    </nav>

    <main class="mt-0 transition-all duration-200 dark:bg-gray-900 ease-soft-in-out">
        <section class="min-h-screen mb-32">
            <div class="relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-center bg-cover min-h-50-screen rounded-xl"
                style="background-image: url('./images/logo/ff3.png')">
                <span
                    class="absolute top-0 left-0 w-full h-full bg-center bg-cover opacity-50 gradient2 from-gray-900 to-slate-800"></span>
                <div class="container z-10">
                    <div class="flex flex-wrap justify-center -mx-3">
                        <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
                            <h1 class="mt-12 mb-2 text-white">{{__('messages.Welcome')}}</h1>
                            <p class="text-white">{{__('messages.messageTitle')}}
                                <span>{{__('messages.enregistre')}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
                    <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                        <div
                            class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                            <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                                <h5>{{__('messages.Registerwith')}}</h5>
                            </div>
                            <div class="flex flex-wrap px-3 -mx-3 sm:px-6 xl:px-12">
                                <div class="w-3/12 max-w-full px-1 ml-auto flex-0">
                                    <a class="inline-block w-full px-6 py-3 mb-4 text-xs font-bold text-center text-gray-200 uppercase align-middle transition-all bg-transparent border border-gray-200 border-solid rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:bg-transparent hover:opacity-75"
                                        href="{{ url('auth/facebook') }}">
                                        <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink32">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(3.000000, 3.000000)" fill-rule="nonzero">
                                                    <circle fill="#3C5A9A" cx="29.5091719" cy="29.4927506"
                                                        r="29.4882047">
                                                    </circle>
                                                    <path
                                                        d="M39.0974944,9.05587273 L32.5651312,9.05587273 C28.6886088,9.05587273 24.3768224,10.6862851 24.3768224,16.3054653 C24.395747,18.2634019 24.3768224,20.1385313 24.3768224,22.2488655 L19.8922122,22.2488655 L19.8922122,29.3852113 L24.5156022,29.3852113 L24.5156022,49.9295284 L33.0113092,49.9295284 L33.0113092,29.2496356 L38.6187742,29.2496356 L39.1261316,22.2288395 L32.8649196,22.2288395 C32.8649196,22.2288395 32.8789377,19.1056932 32.8649196,18.1987181 C32.8649196,15.9781412 35.1755132,16.1053059 35.3144932,16.1053059 C36.4140178,16.1053059 38.5518876,16.1085101 39.1006986,16.1053059 L39.1006986,9.05587273 L39.0974944,9.05587273 L39.0974944,9.05587273 Z"
                                                        fill="#FFFFFF"></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>

                                <div class="w-3/12 max-w-full px-1 mr-auto flex-0">
                                    <a class="inline-block w-full px-6 py-3 mb-4 text-xs font-bold text-center text-gray-200 uppercase align-middle transition-all bg-transparent border border-gray-200 border-solid rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro ease-soft-in tracking-tight-soft bg-150 bg-x-25 hover:bg-transparent hover:opacity-75"
                                        href="{{ url('auth/google') }}">
                                        <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
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
                                <div class="relative w-full max-w-full px-3 mt-2 text-center shrink-0">
                                    <p
                                        class="z-20 inline px-4 mb-2 text-sm font-semibold leading-normal bg-white text-slate-400">
                                        or</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap px-4">
                                <x-validation-errors class="mb-2" />
                            </div>
                            <div class="flex-auto p-6">

                                <form role="form text-left" method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="mb-4">

                                        <x-jet-input id="name" placeholder="{{__('profiles.Name')}}"
                                            class="text-sm focus:shadow-soft-orange-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            type="text" name="name" :value="old('name')" required autofocus
                                            autocomplete="name" />

                                    </div>
                                    <div class="mb-4">
                                        <x-jet-input id="name" placeholder="{{__('profiles.Email')}}"
                                            class="text-sm focus:shadow-soft-orange-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            type="text" name="email" :value="old('email')" required
                                            autocomplete="email" />
                                    </div>
                                    <div class="mb-4">
                                        <x-jet-input id="phone" placeholder=""
                                            class="text-sm  focus:shadow-soft-orange-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            type="text" name="phone" :value="old('phone')" />
                                    </div>
                                    <div class="mb-4">
                                        <x-jet-input id="password" placeholder="{{__('profiles.password')}}"
                                            class="text-sm focus:shadow-soft-orange-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            type="password" name="password" required autocomplete="new-password" />
                                    </div>
                                    <div class="mb-4">
                                        <x-jet-input id="password_confirmation"
                                            placeholder="{{__('profiles.passwordConfirm')}}"
                                            class="text-sm focus:shadow-soft-orange-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            type="password" name="password_confirmation" required
                                            autocomplete="new-password" />
                                    </div>

                                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mt-4">
                                        <x-jet-label for="terms">
                                            <div class="flex items-center">
                                                <x-jet-checkbox name="terms" id="terms" required />

                                                <div class="ml-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank"
                                                        href="'.route('terms.show').'"
                                                        class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Terms
                                                        of
                                                        Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank"
                                                        href="'.route('policy.show').'"
                                                        class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Privacy
                                                        Policy').'</a>',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </x-jet-label>
                                    </div>
                                    @endif
                                    <div class="text-center">
                                        <button type="submit"
                                            class="inline-block w-full px-6 py-3 mt-6 mb-2 text-xs font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 gradient hover:border-slate-700 hover:bg-slate-700 hover:text-white">
                                            {{__('messages.enregistre')}}</button>
                                    </div>
                                    <p class="mt-4 mb-0 text-sm leading-normal">{{__('messages.AlreadyMessages')}}<a
                                            href="{{url('/login')}}"
                                            class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-orange-600 to-orange-400 bg-clip-text">{{__('messages.SignIn')}}</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <footer class="py-8">
            <div class="container">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex-shrink-0 w-full max-w-full mx-auto mb-6 text-center lg:flex-0 lg:w-8/12">
                        <a href="#" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12">
                            Company
                        </a>
                        <a href="#" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> About
                            Us
                        </a>
                        <a href="#" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Team
                        </a>
                        <a href="#" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12">
                            Services
                        </a>
                        <a href="#" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Blog
                        </a>




                    </div>
                    <div class="flex-shrink-0 w-full max-w-full mx-auto mt-2 mb-6 text-center lg:flex-0 lg:w-8/12">
                        <a href="#" target="_blank" class="mr-6 text-slate-400">
                            <span class="text-lg fab fa-dribbble"></span>
                        </a>
                        <a href="#" target="_blank" class="mr-6 text-slate-400">
                            <span class="text-lg fab fa-twitter"></span>
                        </a>
                        <a href="#" target="_blank" class="mr-6 text-slate-400">
                            <span class="text-lg fab fa-instagram"></span>
                        </a>
                        <a href="#" target="_blank" class="mr-6 text-slate-400">
                            <span class="text-lg fab fa-pinterest"></span>
                        </a>
                        <a href="#" target="_blank" class="mr-6 text-slate-400">
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
                            FindDesign.
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
        </footer>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    </main>
    {{--<x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" required />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Terms of
                                Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Privacy
                                Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="ml-1 btn btn-primary" href="{{ url('auth/facebook') }}"
                    style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;"
                    id="btn-fblogin">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i> Continue with Facebook
                </a>
            </div>
        </form>
    </x-jet-authentication-card>--}}
</x-guest-layout>