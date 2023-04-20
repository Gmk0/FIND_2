<div class="p-2">
    <div
        class="flex flex-col min-h-screen gap-6 p-6 mx-auto bg-gray-100 md:max-w-7xl md:container px-auto dark:bg-gray-900">
        <!-- start::Stats -->
        <div class="grid grid-cols-1 gap-4 px-auto md:grid-cols-2 lg:grid-cols-4">
            <a href="{{route('commandeUser')}}"
                class="px-4 py-6 bg-white rounded-lg shadow-xl cursor-pointer hover:scale-50 lg:px-6 lg:py-6">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-indigo-600">Total Depense</span>
                    <span
                        class="px-2 py-1 text-xs text-gray-500 transition duration-200 bg-gray-200 rounded-lg cursor-default hover:bg-gray-500 dark:text-gray-900 hover:text-gray-200">Today</span>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div>
                        <svg class="w-12 h-12 p-1 text-indigo-600 bg-indigo-400 border border-indigo-600 rounded-full 2xl:w-16 2xl:h-16 2xl:p-3 bg-opacity-20"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-end">
                            <span class="text-xl font-bold text-gray-800 2xl:text-3xl">{{$amount}}</span>
                            <div class="flex items-center mb-1 ml-2">
                                @if ($percentTransaction > 0)
                                <svg class="w-12 h-12 p-1 text-green-600 bg-green-400 border border-green-600 rounded-full 2xl:w-16 2xl:h-16 2xl:p-3 bg-opacity-20"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                                <span class="font-bold text-sm text-gray-500 ml-0.5">{{$percentTransaction}}</span>
                                @elseif ($percentTransaction < 0) <svg class="w-5 h-5 text-red-600" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                                    </svg>
                                    <span class="font-bold text-sm text-gray-500 ml-0.5">{{$percentTransaction}}</span>
                                    @else
                                    <svg class="hidden w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.6 3.6a9 9 0 1 1-12.8 0 9 9 0 0 1 12.8 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                        </path>
                                    </svg>
                                    <span
                                        class="font-bold text-sm hidden text-gray-500 ml-0.5">{{$percentTransaction}}</span>
                                    @endif

                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{route('commandeUser')}}" class="px-6 py-6 bg-white rounded-lg shadow-xl cursor-pointer">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-green-600">Commande</span>
                    <span
                        class="px-2 py-1 text-xs text-gray-500 transition duration-200 bg-gray-200 rounded-lg cursor-default dark:text-gray-900 hover:bg-gray-500 hover:text-gray-200">7
                        days</span>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div>
                        <svg class="w-12 h-12 p-1 text-green-600 bg-green-400 border border-green-600 rounded-full 2xl:w-16 2xl:h-16 2xl:p-3 bg-opacity-20"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-end">
                            <span class="text-2xl font-bold text-gray-800 2xl:text-4xl">{{$orderCount}}</span>
                            <div class="flex items-center mb-1 ml-2">
                                @if ($orderEvolution > 0)
                                <svg class="w-12 h-12 p-1 text-green-600 bg-green-400 border border-green-600 rounded-full 2xl:w-16 2xl:h-16 2xl:p-3 bg-opacity-20"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                                <span class="font-bold text-sm text-gray-500 ml-0.5">{{$orderEvolution}}</span>
                                @elseif ($orderEvolution < 0) <svg class="w-5 h-5 text-red-600" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6">
                                    </path>
                                    </svg>
                                    <span class="font-bold text-sm text-gray-500 ml-0.5">{{$orderEvolution}}</span>
                                    @else
                                    <svg class="hidden w-5 h-5 text-gray-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.6 3.6a9 9 0 1 1-12.8 0 9 9 0 0 1 12.8 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                        </path>
                                    </svg>
                                    <span
                                        class="font-bold text-sm hidden text-gray-500 ml-0.5">{{$orderEvolution}}</span>
                                    @endif

                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{route('MessageUser')}}" class="px-6 py-6 bg-white rounded-lg shadow-xl cursor-pointer">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-blue-600">Conversation</span>
                    <span
                        class="px-2 py-1 text-xs text-gray-500 transition duration-200 bg-gray-200 rounded-lg cursor-default dark:text-gray-900 hover:bg-gray-500 hover:text-gray-200">7
                        days</span>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div>
                        <svg class="w-12 h-12 p-1 text-blue-600 bg-blue-400 border border-blue-600 rounded-full 2xl:w-16 2xl:h-16 2xl:p-3 bg-opacity-20"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="flex-col hidden">
                        <div class="flex items-end ">
                            <span class="text-2xl font-bold text-gray-800 2xl:text-4xl">{{$conversations}}</span>
                            <div class="flex items-center mb-1 ml-2">
                                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                                <span class="font-bold text-sm text-gray-500 ml-0.5">7%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a class="px-6 py-6 bg-white rounded-lg shadow-xl cursor-pointer">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-gray-800">Project en attente</span>
                    <span
                        class="px-2 py-1 text-xs text-gray-500 transition duration-200 bg-gray-200 rounded-lg cursor-default dark:text-gray-900 hover:bg-gray-500 hover:text-gray-200">30
                        days</span>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div>
                        <svg class="w-12 h-12 p-1 text-yellow-600 bg-yellow-400 border border-yellow-600 rounded-full 2xl:w-16 2xl:h-16 2xl:p-3 bg-opacity-20"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-end">
                            <span class="text-2xl font-bold text-gray-800 2xl:text-4xl">{{$projet->count()}}</span>
                            <div class="flex items-center hidden mb-1 ml-2">
                                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                                </svg>
                                <span class="font-bold text-sm text-gray-500 ml-0.5">-1%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- end::Stats -->

        <!-- start::Charts -->

        <!-- end::Charts -->

        <!-- start::Stats  -->

        <!-- end::Stats -->

        <!-- start::Activities -->

        <!-- end::Activities -->

        <!-- start::Table -->
        <div class="px-8 py-6 overflow-auto bg-white rounded-lg custom-scrollbar">
            <h4 class="text-xl font-semibold text-gray-800">Recent transactions</h4>
            <table class="w-full my-8 overflow-auto whitespace-nowrap">
                <thead class="font-bold text-gray-100 bg-blue-400">

                    <td class="py-2 pl-2 text-gray-800">
                        Order ID
                    </td>
                    <td class="hidden py-2 pl-2 text-gray-800 md:flex">
                        Services
                    </td>
                    <td class="py-2 pl-2 text-gray-800">
                        Price
                    </td>
                    <td class="py-2 pl-2 text-gray-800">
                        status
                    </td>
                    <td class="py-2 pl-2 text-gray-800">
                        view
                    </td>

                </thead>
                <tbody class="text-sm">
                    @forelse ($order as $order )
                    <tr
                        class="transition duration-200 bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-900 hover:bg-opacity-20">

                        <td class="py-3 pl-2">
                            {{$order->order_numero}}
                        </td>
                        <td class="hidden py-3 pl-2 capitalize truncate md:flex">
                            {{$order->service->title}}
                        </td>
                        <td class="py-3 pl-2">
                            {{$order->total_amount}}
                        </td>
                        <td class="py-3 pl-2">

                            @if($order->status =="pending")
                            <span class="bg-red-300 px-1.5 py-0.5 rounded-lg ">en Attente</span>
                            @elseif ($order->status =="completed")
                            <span class="bg-green-500 px-1.5 py-0.5 rounded-lg text-gray-100">Payé</span>
                            @else
                            <span class="bg-red-500 px-1.5 py-0.5 rounded-lg text-gray-100">Rejeter</span>
                            @endif
                        </td>
                        <td class="py-3 pl-2">
                            <x-button href="{{route('commandeOneView',[$order->id])}}" sm primary icon="eye"></x-button>
                        </td>

                    </tr>
                    @empty

                    <h1>Pas de Trnsactions pour l'instant</h1>

                    @endforelse


                </tbody>
            </table>
        </div>


        <!-- end::Table -->
    </div>

</div>