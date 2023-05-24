<div class="w-full bg-base-200  ">

    <div class="text-white border-t dark:bg-gray-900 border-gray-800 md:hidden">

        <!-- Footer Middle -->
        <div class="container flex flex-col p-4 mx-auto overflow-hidden lg:flex-row">
            <div class="w-full p-2 mx-auto">
                <!-- Accordions -->
                <div class="w-full overflow-hidden tab2">
                    <input class="absolute hidden opacity-0" id="tab-multi-one" type="checkbox" name="tabs">
                    <div class="relative label">
                        <label class="block px-3 py-2 text-lg font-medium text-gray-50 dark:text-gray-200"
                            for="tab-multi-one">
                            Services
                        </label>
                        <div class="absolute inset-0 flex items-center justify-end w-full pointer-events-none flex-end">

                            <svg class="w-8 icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M8.293 10.293a1 1 0 0 1 1.414 0L12 12.586l2.293-2.293a1 1 0 0 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z" />
                            </svg>
                        </div>
                    </div>
                    <div class="overflow-hidden leading-normal tab-content">
                        <ul class="flex flex-col w-full p-0 space-y-2 text-left list-none list-inside text-gray-50">

                            @foreach($categories as $category)
                            <li><a href="{{route('categoryByName',[$category->name])}}"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-200">{{$category->name}}</a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="w-full overflow-hidden tab2">
                    <input class="absolute hidden opacity-0" id="tab-multi-two" type="checkbox" name="tabs">
                    <div class="relative label">
                        <label class="block px-3 py-2 text-lg font-medium text-white cursor-pointer text-gray-50"
                            for="tab-multi-two">
                            A propos
                        </label>
                        <div class="absolute inset-0 flex items-center justify-end w-full pointer-events-none flex-end">
                            <svg class="w-8 icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M8.293 10.293a1 1 0 0 1 1.414 0L12 12.586l2.293-2.293a1 1 0 0 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z" />
                            </svg>
                        </div>
                    </div>
                    <div class="overflow-hidden leading-normal tab-content">
                        <ul class="flex flex-col w-full p-0 text-left list-none text-gray-50">
                            <li><a href="{{route('policy.show')}}"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800 dark:hover:text-gray-100">Privacy
                                    Policy</a></li>
                            <li><a href="{{url('/contact')}}"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800 dark:hover:text-gray-100 ">Contact</a>
                            </li>

                            <li><a href="{{route('terms.show')}}"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800 dark:hover:text-gray-100">Terms
                                    of
                                    Service</a></li>
                        </ul>
                    </div>
                </div>

                <div class="w-full overflow-hidden tab2">
                    <input class="absolute hidden opacity-0" id="tab-multi-three" type="checkbox" name="tabs">
                    <div class="relative label">
                        <label class="block px-3 py-2 text-lg font-medium cursor-pointer text-gray-50 "
                            for="tab-multi-three">
                            Guides
                        </label>
                        <div class="absolute inset-0 flex items-center justify-end w-full pointer-events-none flex-end">
                            <svg class="w-8 icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M8.293 10.293a1 1 0 0 1 1.414 0L12 12.586l2.293-2.293a1 1 0 0 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z" />
                            </svg>
                        </div>
                    </div>
                    <div class="overflow-hidden leading-normal tab-content">
                        <ul class="flex flex-col w-full p-0 font-thin text-left list-none text-gray-50">


                            <li><a href="{{route('faq')}}"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800 dark:hover:text-gray-100">FAQ</a>
                            </li>
                            <li><a href="{{route('faq')}}"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800 dark:hover:text-gray-100">Tutorial</a>
                            </li>
                            <li><a href="{{route('faq')}}"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800 dark:hover:text-gray-100">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="w-full overflow-hidden tab2">
                    <input class="absolute hidden opacity-0" id="tab-multi-four" type="checkbox" name="tabs">
                    <div class="relative label">
                        <label class="block px-3 py-2 text-lg font-medium cursor-pointer text-gray-50"
                            for="tab-multi-four">
                            Freelance
                        </label>
                        <div class="absolute inset-0 flex items-center justify-end w-full pointer-events-none flex-end">
                            <svg class="w-8 icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M8.293 10.293a1 1 0 0 1 1.414 0L12 12.586l2.293-2.293a1 1 0 0 1 1.414 1.414l-3 3a1 1 0 0 1-1.414 0l-3-3a1 1 0 0 1 0-1.414z" />
                            </svg>
                        </div>
                    </div>
                    <div class="overflow-hidden leading-normal tab-content">
                        <ul class="flex flex-col w-full p-0 font-thin text-left list-none text-gray-50">
                            <li><a href="{{url('/find_freelance')}}"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800 dark:hover:text-gray-100">Freelance</a>
                            </li>
                            <li><a href="{{url('/user/create_project')}}"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800 dark:hover:text-gray-100">Freelance</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="flex flex-col items-center justify-center p-6 mt-4 text-gray-600 md:flex-row">

            <div
                class="flex flex-col flex-wrap gap-6 mt-6 border-t border-gray-600 sm:mt-0 sm:flex-row sm:items-center">


                <div class="flex gap-6 p-2">
                    <a href="#" target="blank" class="px-2 hover:text-primary">
                        <span class="text-lg fab fa-dribbble"></span>
                    </a>
                    <a href="https://twitter.com/find_freelance_?s=11&t=qv6NIovEcQsLxmQv9mo_Zw" target="blank"
                        aria-label="twitter" class="px-2 hover:text-primary">
                        <span class="text-lg fab fa-twitter"></span>
                    </a>
                    <a href="https://instagram.com/find_freelance?igshid=YmMyMTA2M2Y=" target="blank"
                        aria-label="medium" class="px-2 hover:text-primary">
                        <span class="text-lg fab fa-instagram"></span>
                    </a>


                    <a href="#" target="blank" aria-label="twitter" class="px-2 hover:text-primary">
                        <span class="text-lg fab fa-pinterest"></span>
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=100087893680900&mibextid=LQQJ4d" target="blank"
                        aria-label="medium" class="px-2 hover:text-primary">
                        <span class="text-lg fab fa-facebook"></span>
                    </a>


                </div>
                <div class="flex gap-6 mx-auto ">

                    <a href="" class="px-3 py-2 hover:text-primary">

                        <span class="text-sm fab fa-dollar">USD</span>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-between mt-2 border-t border-gray-800">
                <img src="/images/logo/find_02.png" alt="logo find" class="h-8" />
                <div class="flex flex-col items-center justify-center p-3 mt-2 text-gray-600 md:flex-row">Copyright ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    Find
                </div>
            </div>



        </div>
    </div>

    <!-- FOOTER 2 DESKTOP -->

    <div class="hidden md:flex">
        <footer class="p-10 footer bg-base-200 text-base-content">
            <div>

                <img src="/images/logo/find_02.png" alt="logo find" class="h-8" />
                <p>FIND Ltd.<br />Providing reliable tech since 2020</p>
            </div>
            <div>
                <span class="footer-title">Categories</span>
                <div class="grid grid-cols-2 gap-4">

                    @foreach($categories as $category)
                    <a href="{{route('categoryByName',[$category->name])}}"
                        class="link link-hover">{{$category->name}}</a>
                    @endforeach



                </div>

            </div>
            <div>
                <span class="footer-title">Company</span>
                <a href="{{url('/apropos')}}" class="link link-hover">Apropos de nous </a>
                <a href="{{url('/contact')}}" class="link link-hover">Contact</a>
                <a href="{{url('/faq')}}" class="link link-hover">FaQ</a>

            </div>
            <div>
                <span class="footer-title">Legal</span>
                <a href="{{url('/terms-of-services')}}" class="link link-hover">Terms of use</a>
                <a href="{{url('/policy')}}" class="link link-hover">Privacy policy</a>

                <a class='link link-hover' href="#" onclick="Livewire.emit('openModal', 'cookie-consent-edit')">
                    {{ __('Cookie policy') }}
                </a>
            </div>
        </footer>

    </div>



    <!-- Footer Middle -->


    <!-- Footer Bottom -->

</div>