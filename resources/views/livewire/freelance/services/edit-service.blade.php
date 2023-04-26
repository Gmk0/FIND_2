<div class="min-h-screen">
    <div>
        @include('include.breadcumbUser',['transation'=>'transation'])
    </div>
    <div class="px-2 py-4 mx-auto max-w-7xl lg:px-8">


        <div class="max-w-3xl mb-8">
            <h2 class="mb-8 text-lg font-semibold tracking-wide text-indigo-600 uppercase lg:text-xl">Creation Service
            </h2>
        </div>


        <div class="my-3 overflow-auto md:mx-12">

            <div class="p-4 mb-4 rounded-md dark:text-gray-100 dark:bg-gray-800 ">


                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">

                    <x-input wire:model.defer="serviceEdit.title" label="titre" />

                    <x-inputs.currency label="prix" icon="currency-dollar" thousands="." decimal="," precision="2"
                        wire:model.defer="serviceEdit.basic_price" />
                    <x-input type="number" wire:model.defer="serviceEdit.basic_delivery_time" label="delivery_time" />
                    <x-input wire:model.defer="serviceEdit.basic_revision" label="revision" />
                    <x-checkbox wire:model.defer="serviceEdit.is_publish" label="publier" />
                    <div>
                        <x-button label="Modifier" wire:click="modifierFirst"></x-button>
                    </div>
                </div>


                <div>

                    {{ $this->form }}

                    <div class="flex items-end">

                        <x-button wire:click="submit" label="Modifier"></x-button>

                    </div>
                </div>



                <div>

                    <div x-data="{ image: @entangle('images') }" class="flex flex-col items-start justify-start py-4">



                        <div class="flex items-start justify-between mt-4 space-x-2">
                            @foreach ($service->files as $key=>$value)
                            <img src="{{ url('/storage/service/' . $value) }}" alt="Product Name"
                                class="w-16 h-full border cursor-pointer xl:w-16 2xl:w-24 hover:opacity-80">

                            <x-button icon="trash" wire:click="effacerImage({{$key}})"></x-button>
                            @endforeach

                        </div>
                    </div>

                    <x-input wire:model="images" type="file"></x-input>


                </div>


                <div>
                    <x-button spinner="images" wire:click="saveImage()" label='Modifier' type="submit"></x-button>
                </div>


            </div>







        </div>
    </div>
</div>
