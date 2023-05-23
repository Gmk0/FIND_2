<x-user-profile2>

    <section class="min-h-screen ">

        <div>
            @include('include.breadcumbUser',['assistance'=>'assistance'])
        </div>

        <section class="py-8 ">
            <div class="container px-4 mx-auto">
                <h2 class="mb-8 text-3xl font-semibold">Besoin d'assistance ?</h2>
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full h-48 px-4 mb-8 lg:w-1/3">
                        <div class="p-6 bg-white rounded-lg shadow-lg">
                            <h3 class="mb-4 text-xl font-semibold text-gray-800">Contactez-nous</h3>
                            <p class="mb-4 text-gray-700 dark:text-gray-300">Vous avez une question ou un problème ?
                                N'hésitez pas à nous
                                contacter
                                !</p>

                            <a href="https://wa.me/+243844720350" target="_blank" rel="noopener noreferrer"
                                class="flex items-center justify-center w-12 h-12 bg-green-500 rounded-full hover:bg-green-600">
                                <ion-icon name="logo-whatsapp"></ion-icon>
                            </a>
                        </div>
                    </div>
                    <div class="w-full h-48 px-4 mb-8 lg:w-1/3">
                        <div class="p-6 bg-white rounded-lg shadow-lg">
                            <h3 class="mb-4 text-xl font-semibold text-gray-800">FAQ</h3>
                            <p class="mb-4 text-gray-700 dark:text-gray-300">Consultez notre Foire Aux Questions pour
                                trouver rapidement des
                                réponses à vos questions.</p>
                            <a href="{{route('faq')}}"
                                class="inline-block px-4 py-2 text-white transition duration-200 bg-blue-500 rounded hover:bg-blue-600">FAQ</a>
                        </div>
                    </div>
                    <div class="w-full h-48 px-4 mb-8 lg:w-1/3">
                        <div class="p-6 bg-white rounded-lg shadow-lg">
                            <h3 class="mb-4 text-xl font-semibold text-gray-800">Support en ligne</h3>
                            <p class="mb-4 text-gray-700 dark:text-gray-300">Vous avez besoin d'une assistance en temps
                                réel
                                ? Utilisez notre
                                support en ligne pour discuter avec un agent.</p>
                            <a href="#"
                                class="inline-block px-4 py-2 text-white transition duration-200 bg-blue-500 rounded hover:bg-blue-600">Support
                                en ligne</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </section>

</x-user-profile2>