@extends('layouts.freelanceTest')

@section('content')


<div class="flex flex-col max-w-3xl p-6 space-y-4 sm:p-10 dark:bg-gray-900 dark:text-gray-100">
    <h2 class="text-xl font-semibold">Your cart</h2>
    <ul class="flex flex-col divide-y divide-gray-700">
        <li class="flex flex-col py-6 sm:flex-row sm:justify-between">
            <div class="flex w-full space-x-2 sm:space-x-4">
                <img class="flex-shrink-0 object-cover w-20 h-20 rounded outline-none dark:border-transparent sm:w-32 sm:h-32 dark:bg-gray-500"
                    src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?ixlib=rb-1.2.1&amp;ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;auto=format&amp;fit=crop&amp;w=1350&amp;q=80"
                    alt="Polaroid camera">
                <div class="flex flex-col justify-between w-full pb-4">
                    <div class="flex justify-between w-full pb-2 space-x-2">
                        <div class="space-y-1">
                            <h3 class="text-lg font-semibold leading-snug sm:pr-8">Polaroid camera</h3>
                            <p class="text-sm dark:text-gray-400">Classic</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-semibold">59.99€</p>
                            <p class="text-sm line-through dark:text-gray-600">75.50€</p>
                        </div>
                    </div>
                    <div class="flex text-sm divide-x">
                        <button type="button" class="flex items-center px-2 py-1 pl-0 space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
                                <path
                                    d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z">
                                </path>
                                <rect width="32" height="200" x="168" y="216"></rect>
                                <rect width="32" height="200" x="240" y="216"></rect>
                                <rect width="32" height="200" x="312" y="216"></rect>
                                <path
                                    d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z">
                                </path>
                            </svg>
                            <span>Remove</span>
                        </button>
                        <button type="button" class="flex items-center px-2 py-1 space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
                                <path
                                    d="M453.122,79.012a128,128,0,0,0-181.087.068l-15.511,15.7L241.142,79.114l-.1-.1a128,128,0,0,0-181.02,0l-6.91,6.91a128,128,0,0,0,0,181.019L235.485,449.314l20.595,21.578.491-.492.533.533L276.4,450.574,460.032,266.94a128.147,128.147,0,0,0,0-181.019ZM437.4,244.313,256.571,425.146,75.738,244.313a96,96,0,0,1,0-135.764l6.911-6.91a96,96,0,0,1,135.713-.051l38.093,38.787,38.274-38.736a96,96,0,0,1,135.765,0l6.91,6.909A96.11,96.11,0,0,1,437.4,244.313Z">
                                </path>
                            </svg>
                            <span>Add to favorites</span>
                        </button>
                    </div>
                </div>
            </div>
        </li>
        <li class="flex flex-col py-6 sm:flex-row sm:justify-between">
            <div class="flex w-full space-x-2 sm:space-x-4">
                <img class="flex-shrink-0 object-cover w-20 h-20 rounded outline-none dark:border-transparent sm:w-32 sm:h-32 dark:bg-gray-500"
                    src="https://images.unsplash.com/photo-1504274066651-8d31a536b11a?ixlib=rb-1.2.1&amp;ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;auto=format&amp;fit=crop&amp;w=675&amp;q=80"
                    alt="Replica headphones">
                <div class="flex flex-col justify-between w-full pb-4">
                    <div class="flex justify-between w-full pb-2 space-x-2">
                        <div class="space-y-1">
                            <h3 class="text-lg font-semibold leading-snug sm:pr-8">Replica headphones</h3>
                            <p class="text-sm dark:text-gray-400">White</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-semibold">99.95€</p>
                            <p class="text-sm line-through dark:text-gray-600">150€</p>
                        </div>
                    </div>
                    <div class="flex text-sm divide-x">
                        <button type="button" class="flex items-center px-2 py-1 pl-0 space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
                                <path
                                    d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z">
                                </path>
                                <rect width="32" height="200" x="168" y="216"></rect>
                                <rect width="32" height="200" x="240" y="216"></rect>
                                <rect width="32" height="200" x="312" y="216"></rect>
                                <path
                                    d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z">
                                </path>
                            </svg>
                            <span>Remove</span>
                        </button>
                        <button type="button" class="flex items-center px-2 py-1 space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
                                <path
                                    d="M453.122,79.012a128,128,0,0,0-181.087.068l-15.511,15.7L241.142,79.114l-.1-.1a128,128,0,0,0-181.02,0l-6.91,6.91a128,128,0,0,0,0,181.019L235.485,449.314l20.595,21.578.491-.492.533.533L276.4,450.574,460.032,266.94a128.147,128.147,0,0,0,0-181.019ZM437.4,244.313,256.571,425.146,75.738,244.313a96,96,0,0,1,0-135.764l6.911-6.91a96,96,0,0,1,135.713-.051l38.093,38.787,38.274-38.736a96,96,0,0,1,135.765,0l6.91,6.909A96.11,96.11,0,0,1,437.4,244.313Z">
                                </path>
                            </svg>
                            <span>Add to favorites</span>
                        </button>
                    </div>
                </div>
            </div>
        </li>
        <li class="flex flex-col py-6 sm:flex-row sm:justify-between">
            <div class="flex w-full space-x-2 sm:space-x-4">
                <img class="flex-shrink-0 object-cover w-20 h-20 rounded outline-none dark:border-transparent sm:w-32 sm:h-32 dark:bg-gray-500"
                    src="https://images.unsplash.com/phodark:to-1594549181132-9045fed330ce?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=675&amp;q=80"
                    alt="Set of travel chargers">
                <div class="flex flex-col justify-between w-full pb-4">
                    <div class="flex justify-between w-full pb-2 space-x-2">
                        <div class="space-y-1">
                            <h3 class="text-lg font-semibold leading-snug sm:pr-8">Set of travel chargers</h3>
                            <p class="text-sm dark:text-gray-400">Black</p>
                        </div>
                        <div class="text-right">
                            <p class="text-lg font-semibold">8.99€</p>
                            <p class="text-sm line-through dark:text-gray-600">15.99€</p>
                        </div>
                    </div>
                    <div class="flex text-sm divide-x">
                        <button type="button" class="flex items-center px-2 py-1 pl-0 space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
                                <path
                                    d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z">
                                </path>
                                <rect width="32" height="200" x="168" y="216"></rect>
                                <rect width="32" height="200" x="240" y="216"></rect>
                                <rect width="32" height="200" x="312" y="216"></rect>
                                <path
                                    d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z">
                                </path>
                            </svg>
                            <span>Remove</span>
                        </button>
                        <button type="button" class="flex items-center px-2 py-1 space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
                                <path
                                    d="M453.122,79.012a128,128,0,0,0-181.087.068l-15.511,15.7L241.142,79.114l-.1-.1a128,128,0,0,0-181.02,0l-6.91,6.91a128,128,0,0,0,0,181.019L235.485,449.314l20.595,21.578.491-.492.533.533L276.4,450.574,460.032,266.94a128.147,128.147,0,0,0,0-181.019ZM437.4,244.313,256.571,425.146,75.738,244.313a96,96,0,0,1,0-135.764l6.911-6.91a96,96,0,0,1,135.713-.051l38.093,38.787,38.274-38.736a96,96,0,0,1,135.765,0l6.91,6.909A96.11,96.11,0,0,1,437.4,244.313Z">
                                </path>
                            </svg>
                            <span>Add to favorites</span>
                        </button>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="space-y-1 text-right">
        <p>Total amount:
            <span class="font-semibold">357 €</span>
        </p>
        <p class="text-sm dark:text-gray-400">Not including taxes and shipping costs</p>
    </div>
    <div class="flex justify-end space-x-4">
        <button type="button" class="px-6 py-2 border rounded-md dark:border-violet-400">Back
            <span class="sr-only sm:not-sr-only">to shop</span>
        </button>
        <button type="button"
            class="px-6 py-2 border rounded-md dark:bg-violet-400 dark:text-gray-900 dark:border-violet-400">
            <span class="sr-only sm:not-sr-only">Continue to</span>Checkout
        </button>
    </div>

    <div class="relative">
        <input type="text" id="floating_filled"
            class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " />
        <label for="floating_filled"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Floating
            filled</label>
    </div>
    <div class="relative">
        <input type="text" id="floating_outlined"
            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " />
        <label for="floating_outlined"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Floating
            outlined</label>
    </div>
    <div class="relative z-0">
        <input type="text" id="floating_standard"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " />
        <label for="floating_standard"
            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Floating
            standard</label>
    </div>
</div>

@endsection