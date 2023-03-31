<div class="w-full bg-gray-800 ">

    <div class="text-white border-t border-gray-800 md:hidden">

        <!-- Footer Middle -->
        <div class="container flex flex-col p-4 mx-auto overflow-hidden lg:flex-row">
            <div class="w-full p-2 mx-auto">
                <!-- Accordions -->
                <div class="w-full overflow-hidden tab">
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
                            <li><a wire:click="getCategory({{$category->id}}) href=" #"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800">{{$category->name}}</a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="w-full overflow-hidden tab">
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
                            <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800">Privacy
                                    Policy</a></li>
                            <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800">Return
                                    Policy</a></li>
                            <li><a href="#"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800">Shipping</a>
                            </li>
                            <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800">Terms
                                    of
                                    Service</a></li>
                        </ul>
                    </div>
                </div>

                <div class="w-full overflow-hidden tab">
                    <input class="absolute hidden opacity-0" id="tab-multi-three" type="checkbox" name="tabs">
                    <div class="relative label">
                        <label class="block px-3 py-2 text-lg font-medium cursor-pointer text-gray-50 "
                            for="tab-multi-three">
                            Communaute
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
                            <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800">Developer
                                    API</a></li>
                            <li><a href="#"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800">Documentation</a>
                            </li>
                            <li><a href="#"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800">Guides</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="w-full overflow-hidden tab">
                    <input class="absolute hidden opacity-0" id="tab-multi-four" type="checkbox" name="tabs">
                    <div class="relative label">
                        <label class="block px-3 py-2 text-lg font-medium cursor-pointer text-gray-50"
                            for="tab-multi-four">
                            Explore
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
                            <li><a href="#"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800">Pricing</a>
                            </li>
                            <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800">Product
                                    Series</a></li>
                            <li><a href="#"
                                    class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800">Support</a>
                            </li>
                            <li><a href="#" class="inline-block py-2 pl-3 pr-5 text-white hover:text-gray-800">FAQ</a>
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
                <img src="/images/find_02.png" alt="logo find" class="h-8" />
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
    <div class="hidden p-6 text-gray-100 dark:bg-gray-800 md:block">
        <div class="container grid grid-cols-2 mx-auto gap-x-3 gap-y-8 sm:grid-cols-3 md:grid-cols-4">
            <div class="flex flex-col space-y-4">
                <h2 class="font-medium">Category</h2>
                <div class="flex flex-col space-y-2 text-sm dark:text-gray-400">

                    <a rel="noopener noreferrer" href="#">IntelliSense</a>
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <h2 class="font-medium">Core Concepts</h2>
                <div class="flex flex-col space-y-2 text-sm dark:text-gray-400">
                    <a rel="noopener noreferrer" href="#">Utility-First</a>
                    <a rel="noopener noreferrer" href="#">Responsive Design</a>
                    <a rel="noopener noreferrer" href="#">Hover, Focus, &amp; Other States</a>
                    <a rel="noopener noreferrer" href="#">Dark Mode</a>
                    <a rel="noopener noreferrer" href="#">Adding Base Styles</a>
                    <a rel="noopener noreferrer" href="#">Extracting Components</a>
                    <a rel="noopener noreferrer" href="#">Adding New Utilities</a>
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <h2 class="font-medium">Customization</h2>
                <div class="flex flex-col space-y-2 text-sm dark:text-gray-400">
                    <a rel="noopener noreferrer" href="#">Configuration</a>
                    <a rel="noopener noreferrer" href="#">Theme Configuration</a>
                    <a rel="noopener noreferrer" href="#">Breakpoints</a>
                    <a rel="noopener noreferrer" href="#">Customizing Colors</a>
                    <a rel="noopener noreferrer" href="#">Customizing Spacing</a>
                    <a rel="noopener noreferrer" href="#">Configuring Variants</a>
                    <a rel="noopener noreferrer" href="#">Plugins</a>
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <h2 class="font-medium">Community</h2>
                <div class="flex flex-col space-y-2 text-sm dark:text-gray-400">
                    <a rel="noopener noreferrer" href="#">GitHub</a>
                    <a rel="noopener noreferrer" href="#">Discord</a>
                    <a rel="noopener noreferrer" href="#">Twitter</a>
                    <a rel="noopener noreferrer" href="#">YouTube</a>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center px-6 pt-12 text-sm">
            <span class="dark:text-gray-400">© Copyright 1986. All Rights Reserved.</span>
        </div>
    </div>

    <!-- Footer Middle -->


    <!-- Footer Bottom -->

</div>