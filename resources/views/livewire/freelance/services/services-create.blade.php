<div class="min-h-screen">

    <div class="px-2 py-4 mx-auto max-w-7xl lg:px-8">

        @include('include.breadcumbFreelance',['serviceName'=>'service','serviceCreate'=>'Creation'])


        <div class="max-w-3xl ">
            <h2 class="mb-2 text-lg font-semibold tracking-wide text-indigo-600 uppercase lg:text-xl">Creation Service
            </h2>
        </div>


        <div class="my-3 overflow-auto md:mx-12">

            <form wire:submit.prevent="submit" class="p-2 mb-4 rounded-md dark:text-gray-100 dark:bg-gray-800 ">

                {{ $this->form }}


            </form>







        </div>
    </div>
</div>