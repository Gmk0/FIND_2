<div class="min-h-screen pt-24 border-t border-gray-100 bg-gray-50 dark:bg-gray-900">
    {{-- Success is as dangerous as failure. --}}

    <div x-data="project()" x-on:success.window="step = 1" class="container flex px-2 py-3 ">

        <div class="hidden w-6/12 md:block">

            <h1>Lala</h1>
        </div>
        <div class="flex flex-col md:w-6/12 ">
            <div x-cloak x-show.transition="step==1" class="flex flex-col w-full gap-4 px-2 ">
                <div>
                    <div>
                        <h1 class="mb-4 text-xl text-gray-800 dark:text-gray-100">Donner un titre a votre projet

                            (Facultatif)</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-200">
                            Ex: Devellopement Site web.
                        </p>
                    </div>

                    <div class="p-2" x-data="{ message: '' }">
                        <x-textarea x-model="message" placeholder="Tapez votre texte ici..."
                            x-on:keyup="validateTextarea" wire:model.defer="project.title">
                        </x-textarea>

                        <div class="text-sm text-right text-gray-500">
                            <span x-text="message.length"></span>/600
                        </div>

                    </div>
                    <script>
                        function validateTextarea() {
                                                const message = this.message;
                                                if (message.length < 100) {

                                                } else {

                                                }
                                                    }
                    </script>

                </div>

                <div>
                    <div>
                        <h1 class="mb-4 text-xl text-gray-800 dark:text-gray-200">Que cherchez-vous à faire ?</h1>
                        <p class="mb-2 text-sm text-gray-600 dark:text-gray-200">
                            Cela vous aidera à envoyer votre demande au bon talent. Les détails sont utiles ici.
                        </p>
                    </div>

                    <div class="p-2" x-data="{ message: '' }">

                        <x-textarea x-model="message" placeholder="Tapez votre texte ici..."
                            x-on:keyup="validateTextarea" wire:model.defer="project.description">
                        </x-textarea>
                        <div class="mt-4 text-sm italic text-gray-700 dark:text-gray-100" x-show="message.length < 150">
                            La
                            description doit contenir au moins 150 caractères</div>
                        <div class="text-sm text-right text-gray-500">
                            <span x-text="message.length"></span>/6000
                        </div>

                    </div>
                    <script>
                        function validateTextarea() {
                                const message = this.message;
                                if (message.length < 250) {

                                } else {

                                }
                                }
                    </script>

                </div>
                <div>
                    <div>

                        {{$this->form}}
                    </div>

                </div>
                <div class="my-4">
                    <div>
                        <h1 class="mb-4 text-xl text-gray-800 dark:text-gray-200">
                            Categorie

                        </h1>
                        <p class="text-grey text-md dark:text-gray-200">
                            Quel Categorie correspond le plus mieux
                    </div>
                    <div class="flex flex-col gap-4">
                        <x-select wire:model.defer="category" placeholder="Compentences"
                            :async-data="route('api.services')" option-label="name" option-value="id" />


                    </div>


                </div>



            </div>
            <div x-cloak x-show.transition="step==2" class="flex flex-col w-full gap-4 px-2 ">

                <div>
                    <div>
                        <h1 class="mb-4 text-xl text-gray-800 dark:text-gray-200">Date

                            (Facultatif)</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-200">

                        </p>
                    </div>

                    <div class="grid gap-6 p-2 md:grid-cols-2">
                        <x-datetime-picker label=" Date Debut" wire:model.defer='dateD' parse-format="YYYY-MM-DD HH:mm:ss"
                             placeholder="Date Debut" />

                        <x-datetime-picker label=" Date Fin" without wire:model.defer='dateF' parse-format="YYYY-MM-DD HH:mm:ss"
                            placeholder="Date Fin" />



                    </div>


                </div>
                <div>
                    <div class="p-2">
                        <h1 class="mb-4 text-xl text-gray-800 dark:text-gray-200">Parlez-nous un peu de vous

                        </h1>
                        <p class="text-sm text-gray-600 dark:text-gray-200">
                            Budjet
                        </p>
                    </div>

                    <div class="grid gap-6 p-2 md:grid-cols-2">


                        <x-inputs.currency label="Budjet" placeholder="Budjet" icon="currency-dollar" thousands="."
                            decimal="," precision="4" wire:model.defer="currency" />




                    </div>


                </div>
                <div>
                    <x-errors />
                </div>
            </div>



            <div class="flex justify-between p-3 mt-auto">
                <div class="w-1/2">
                    <x-button md x-show="step > 1" x-cloak amber label="retour" x-on:click="returnStep()" />
                </div>
                <div class="w-1/2 text-right">
                    <x-button x-show="!show" md amber label="continuer" x-on:click="setStep()" />

                    <x-button x-cloak label="Envoyer" spinner="register" wire:click="register()" positive
                        x-show="show" />
                </div>
            </div>


        </div>



    </div>


</div>

@push('script')
<script>
    window.addEventListener('success', event=> {
    Swal.fire({
   // position: 'top-end',
    icon:'success',
    //toast: true,
    title:"operation reussie",
    text:event.detail.message,
    showConfirmButton: true,
    footer: '<a class="text-green-600" href="">liste des proposition</a>',
    //timer:5000

    })

    });

    function  project(){
        return {
            step:1,
            show:false,
            setStep(){
            this.step=2,
            this.show=true,
            window.scrollTo({ top: 0, behavior: 'smooth' })
            },
            returnStep(){
            this.step=1,
            this.show=false,
            window.scrollTo({ top: 0, behavior: 'smooth' })
            },
        }
    }
</script>

@endpush
