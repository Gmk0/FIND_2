<div x-data="{ isOpen:false,isLoading: true }" x-init="setTimeout(() => { isLoading = false }, 2000) "
    class="min-h-screen">
    <div>
        @include('include.breadcumbUser',['transation'=>'transation'])
    </div>
    <div class="max-w-7xl mx-auto py-4 px-6 lg:px-8">


        <div class="max-w-3xl  mb-8">
            <h2 class="text-xl text-indigo-600 mb-8 font-semibold tracking-wide uppercase">Mes transactions</h2>
        </div>

        <div x-show="isLoading">

            <div class="flex flex-col gap-4 p-8 overflow-y-hidden">
                <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-3">
                    <div class="h-48 bg-gray-300 rounded-md animate-pulse"></div>
                    <div class="h-48 bg-gray-300 rounded-md animate-pulse"></div>
                    <div class="h-48 bg-gray-300 rounded-md animate-pulse"></div>
                </div>

                <div
                    class="flex-1 w-full min-h-screen p-4 mb-2 overflow-y-auto text-xs bg-gray-200 border-r border-indigo-300 rounded-md animate-pulse custom-scrollbar">



                </div>
            </div>
        </div>


        <!-- Example transaction item -->

        <div x-show="!isLoading" x-cloak class="pt-4">


            {{ $this->table }}






        </div>

    </div>
</div>