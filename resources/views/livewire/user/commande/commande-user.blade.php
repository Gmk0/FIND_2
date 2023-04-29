<div>
    {{-- Success is as dangerous as failure. --}}


    <div class="min-h-screen">
        <div>
            @include('include.breadcumbUser',['commande'=>'commande'])
        </div>

        <div class="px-4  mx-auto max-w-7xl lg:px-8">
            <div class="max-w-3xl mb-8">
                <h2 class="mb-8 text-xl font-semibold tracking-wide text-indigo-600 uppercase">Mes Commandes</h2>
            </div>





            <!-- component -->
            {{$this->table}}
        </div>
    </div>
</div>
