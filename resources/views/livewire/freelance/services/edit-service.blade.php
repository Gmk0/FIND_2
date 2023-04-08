<div class="min-h-screen">
    <div>
        @include('include.breadcumbUser',['transation'=>'transation'])
    </div>
    <div class="px-6 py-4 mx-auto max-w-7xl lg:px-8">


        <div class="max-w-3xl mb-8">
            <h2 class="mb-8 text-lg font-semibold tracking-wide text-indigo-600 uppercase lg:text-xl">Creation Service
            </h2>
        </div>


        <div class="my-3 overflow-auto md:mx-12">

            <form wire:submit.prevent="submit" class="p-4 mb-4 rounded-md dark:text-gray-100 dark:bg-gray-800 ">

                {{ $this->form }}


            </form>







        </div>
    </div>
</div>