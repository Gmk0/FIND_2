{{-- Success is as dangerous as failure. --}}


<div class="min-h-screen">
    <div>
        @include('include.breadcumbUser',['transation'=>'transation'])
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div class="max-w-3xl  mb-8">
            <h2 class="text-xl text-indigo-600 mb-8 font-semibold tracking-wide uppercase">Méthodes de paiement
                enregistrées</h2>

            <p class="mt-4  md:text-xl  text-gray-500 dark:text-gray-100 lg:mx-auto">
                Vous pouvez ajouter ou supprimer des méthodes de paiement à tout moment dans votre profil
                utilisateur.
            </p>
        </div>


        <div class="mt-10">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-800">Carte de crédit</h3>
                            <span class="bg-green-300 text-red-800 py-1 px-2 rounded-full text-xs">Désactivé</span>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm text-gray-500 dark:text-gray-100">Nom du titulaire de la carte</p>
                            <p class="mt-2 text-xl font-semibold text-gray-800">**** **** **** 1234</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-800">PayPal</h3>
                            <span class="bg-red-200 text-red-800 py-1 px-2 rounded-full text-xs">Désactivé</span>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm text-gray-500 dark:text-gray-100">Adresse e-mail associée</p>
                            <p class="mt-2 text-xl font-semibold text-gray-800">vide</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-800">Virement bancaire</h3>
                            <span class="bg-green-300 text-green-800 py-1 px-2 rounded-full text-xs">desactiver</span>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm text-gray-500 dark:text-gray-100">Informations de compte bancaire</p>
                            <p class="mt-2 text-xl font-semibold text-gray-800">Nom de la banque:vide
                            </p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <div class="mt-10">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg leading-6 font-medium text-gray-800">Mobile</h3>
                            <span class="bg-green-400 text-green-800 py-1 px-2 rounded-full text-xs">desactiver</span>
                        </div>
                        <div class="mt-4">

                            <p class="mt-2 text-xl font-semibold text-gray-800">+243----------</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-16">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white shadow rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-800">Ajouter une méthode de paiement</h3>
                        <div class="mt-4 space-y-6">
                            <div class="flex items-center">
                                <input id="credit_card" name="payment_method" type="radio"
                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="credit_card"
                                    class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-100">
                                    Carte de crédit
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="paypal" name="payment_method" type="radio"
                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="paypal"
                                    class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-100">
                                    PayPal
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="bank_transfer" name="payment_method" type="radio"
                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="bank_transfer"
                                    class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-100">
                                    Virement bancaire
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="mobile_payment" name="payment_method" type="radio"
                                    class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="mobile_payment"
                                    class="ml-3 block text-sm font-medium text-gray-700 dark:text-gray-100">
                                    Paiement mobile
                                </label>
                            </div>

                            <x-button label="Ajouter" />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> {{-- Be like water. --}}