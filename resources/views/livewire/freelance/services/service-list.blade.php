<div>

    <div class="flex flex-col min-h-screen px-2 pt-8 md:px-6 ">

        @include('include.breadcumbFreelance',['serviceName'=>'Service'])

        <div class="max-w-3xl ">
            <h2 class="mb-2 text-lg font-semibold tracking-wide text-indigo-600 uppercase lg:text-xl">Mes Service
            </h2>
        </div>

        <div class="flex items-end justify-end mb-6 ">

            <x-button primary label="creer" href="{{route('freelance.service.create')}}" />

        </div>
        <div class="w-full">


            {{ $this->table }}




        </div>

        {{-- The best athlete wants his opponent at his best. --}}
    </div>
    {{-- Be like water. --}}
</div>