<div x-show="isSearch" x-cloak @click.away="isSearch = false"
    class="z-50 flex gap-4 p-2 pt-8 mx-8 dark:bg-gray-800 bg-skin-fill">

    <div class="w-full md:w-3/4">
        <div class="relative">
            <x-input wire:model.debounce.100ms="search" class="w-3/4 py-3 rounded-full focus:border-amber-600"
                type="text" autocomplete="text" placeholder="Serach">
                <x-slot name="append">
                    <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                        <x-button class="h-full rounded-r-md" icon="search" amber squared />
                    </div>
                </x-slot>
            </x-input>

            @if($search != null)
            <div
                class="absolute w-full mt-1 overflow-y-auto bg-white border divide-y rounded-lg shadow z-60 custom-scrollbar max-h-72">
                @forelse($results as $index => $result)
                {{-- <a class="block p-2 hover:bg-indigo-50" href="#">Tailwind</a>--}}
                <a href="{{route('ServicesViewOne',['id'=>$result->id,'category'=>$result->category->name])}}" wire:key="{{
                    $index }}"
                    class="block p-2 text-sm cursor-pointer md:text-base hover:bg-amber-700 hover:text-white">{{
                    $result->title
                    }}
                    - {{
                    $result->category->name }}</a>
                @empty
                <a class="block p-2 hover:bg-indigo-50" href="#">Pas de resultat</a>
                @endforelse


            </div>
            @endif
            <!-- end search result -->
        </div>
    </div>
    <div class="hidden w-1/3 md:flex">
        <x-button href="{{route('createProject')}}" label="Deposer un Projet" />
    </div>

</div>