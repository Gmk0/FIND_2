<div class="p-2">
    <div
        class="flex flex-col min-h-screen gap-6 p-6 px-2 mx-auto bg-gray-100 md:max-w-7xl md:container md:px-auto dark:bg-gray-900">
        <!-- start::Stats -->
        <div class="grid grid-cols-1 gap-4 px-auto md:grid-cols-2 lg:grid-cols-4">
            <div class="px-4 py-6 bg-white rounded-lg shadow-xl lg:px-6 lg:py-6">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-indigo-600">Total Revenue</span>
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
            </div>
            <div class="px-6 py-6 bg-white rounded-lg shadow-xl">
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
            </div>
            <div class="px-6 py-6 bg-white rounded-lg shadow-xl">
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
                    <div class="flex flex-col">
                        <div class="flex items-end">
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
            </div>
            <div class="px-6 py-6 bg-white rounded-lg shadow-xl">
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
                            <span class="text-2xl font-bold text-gray-800 2xl:text-4xl">0</span>
                            <div class="flex items-center mb-1 ml-2">
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
            </div>
        </div>
        <!-- end::Stats -->

        <!-- start::Charts -->

        <!-- end::Charts -->

        <!-- start::Stats  -->

        <!-- end::Stats -->

        <!-- start::Activities -->
        <div class="flex flex-col gap-4 my-16 space-y-4 lg:flex-row lg:space-y-0 lg:space-x-4">
            <!-- start::Schedule -->
            <div class="w-full space-y-1 bg-white rounded-lg shadow-xl lg:w-2/3">
                <h4 class="m-6 text-xl font-semibold text-gray-800 capitalize">Schedule</h4>
                <!-- start::Task in calendar -->
                <!-- Vue pour afficher les éléments du calendrier ou de l'agenda -->
                @forelse ($schedules as $schedule)
                <div class="flex">
                    <div class="flex flex-col items-center justify-center w-32 px-2 text-gray-100 bg-blue-500">
                        <span class="text-sm font-semibold lg:text-base">{{$schedule->created_at->formatLocalized('%e
                            %B')}}</span>
                        <span class="text-xs text-gray-200 lg:text-sm">{{ $schedule->created_at->format('h:i A')
                            }}</span>
                    </div>
                    <div class="flex justify-between w-full p-4 transition duration-200 bg-gray-100 hover:bg-gray-200">
                        <div class="flex flex-col justify-center">
                            <span class="xl:text-lg">Commande à terminer</span>
                            <span class="flex items-start">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-xs lg:text-sm">
                                    {{ $schedule->service->title }}
                                </span>
                            </span>
                        </div>

                        <div class="flex items-center">
                            <!-- Calculer et afficher le temps restant en heures -->
                            <span class="p-2 text-xs text-center bg-gray-300 rounded-lg lg:text-sm">
                                {{ $schedule->service->basic_delivery_time -
                                Carbon\Carbon::now()->diffInHours(Carbon\Carbon::parse($schedule->created_at)->addDays($schedule->service->basic_delivery_time))
                                }}
                                heures
                            </span>
                        </div>

                    </div>
                </div>
                @empty
                <!-- Code à afficher si la liste des éléments du calendrier ou de l'agenda est vide -->
                @endforelse



                <!-- end::Task in calendar -->

                <!-- end::Task in calendar -->
            </div>
            <!-- end::Schedule -->

            <!-- start::Activity -->
            <div class="w-full px-4 overflow-y-hidden bg-white rounded-lg shadow-xl lg:w-1/3">
                <h4 class="p-6 text-xl font-semibold text-gray-800 capitalize">Activites</h4>
                <div class="relative h-full px-8 pt-2">
                    <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>

                    <!-- start::Timeline item -->
                    @forelse ($notifications as $notification)
                    <div class="flex items-center w-full my-6 -ml-1.5">
                        <div class="w-1/12">
                            <div class="w-3.5 h-3.5 bg-primary rounded-full"></div>
                        </div>
                        <div class="w-11/12">

                            <p class="text-sm text-gray-700 dark:text-gray-300">{{$notification->data['message']}}.</p>





                            <p class="text-xs text-gray-500 dark:text-gray-300 ">
                                {{$notification->created_at->DiffForHumans()}}</p>
                        </div>
                    </div>
                    @empty

                    @endforelse

                    <!-- end::Timeline item -->

                    <!-- start::Timeline item -->

                    <!-- end::Timeline item -->
                </div>
            </div>
            <!-- end::Activity -->
        </div>
        <!-- end::Activities -->

        <!-- start::Table -->
        {{-- <div class="px-8 py-6 overflow-x-scroll bg-white rounded-lg custom-scrollbar">
            <h4 class="text-xl font-semibold text-gray-800">Recent transactions</h4>
            <table class="w-full my-8 whitespace-nowrap">
                <thead class="font-bold text-gray-100 bg-secondary">
                    <td>
                    </td>
                    <td class="py-2 pl-2 text-gray-800">
                        Order ID
                    </td>
                    <td class="py-2 pl-2 text-gray-800">
                        Customer Name
                    </td>
                    <td class="py-2 pl-2 text-gray-800">
                        Price
                    </td>
                    <td class="py-2 pl-2 text-gray-800">
                        Status
                    </td>
                    <td class="py-2 pl-2 text-gray-800">
                        Date
                    </td>
                    <td class="py-2 pl-2">
                        View Details
                    </td>
                </thead>
                <tbody class="text-sm">
                    @forelse ($order as $order )
                    <tr class="transition duration-200 bg-gray-100 hover:bg-primary hover:bg-opacity-20">
                        <td class="py-3 pl-2">
                            <input type="checkbox" class="ml-2 rounded focus:ring-0 checked:bg-red-500">
                        </td>
                        <td class="py-3 pl-2">
                            {{$order->order_numero}}
                        </td>
                        <td class="py-3 pl-2 capitalize">
                            {{$order->user->name}}
                        </td>
                        <td class="py-3 pl-2">
                            {{$order->total_amount}}
                        </td>
                        <td class="py-3 pl-2">
                            <span class="bg-green-500 px-1.5 py-0.5 rounded-lg text-gray-100">{{$order->status}}</span>
                        </td>
                        <td class="py-3 pl-2">
                            Sep 30, 2021
                        </td>
                        <td class="py-3 pl-2">
                            <a href="#"
                                class="px-2 py-1 mr-2 text-gray-100 rounded-lg bg-primary hover:bg-opacity-90">View
                                {{$order->total_amount}}</a>
                        </td>
                    </tr>
                    @empty

                    <h1>Pas de Trnsactions pour l'instant</h1>

                    @endforelse


                </tbody>
            </table>
        </div>--}}
        <!-- end::Table -->
    </div>

</div>
{{-- The best athlete wants his opponent at his best. --}}