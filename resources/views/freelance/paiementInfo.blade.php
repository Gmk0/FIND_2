<x-freelance-profile>
    <div class="min-h-screen">

        <div class="container mx-auto p-4">
            <h1 class="mb-4 text-2xl font-bold">Transactions du Freelance</h1>

            <div class="mb-4">
                <h2 class="mb-2 text-lg font-semibold">Montant total disponible pour le retrait :</h2>
                <p class="text-2xl font-bold text-green-600">$2500</p>
            </div>

            <div class="mb-4">
                <h2 class="mb-2 text-lg font-semibold">Modalités de retrait :</h2>
                <p class="mb-4">Taux de pourcentage pour le retrait : 5%</p>
                <p class="mb-4">Veuillez noter les règles suivantes pour effectuer un retrait :</p>
                <ul class="mb-4 list-disc pl-6">
                    <li>Le montant minimum pour effectuer un retrait est de 10$.</li>
                    <li>Le retrait sera effectué selon la méthode de paiement sélectionnée.</li>
                    <li>Les frais de transaction peuvent s'appliquer selon la méthode de paiement choisie.</li>
                    <li>Les retraits peuvent prendre jusqu'à 5 jours ouvrables pour être traités.</li>
                </ul>
                <p>Voici les étapes pour effectuer un retrait :</p>
                <ol class="list-decimal pl-6">
                    <li>Assurez-vous d'avoir suffisamment de fonds disponibles pour le retrait.</li>
                    <li>Sélectionnez la méthode de retrait préférée dans le menu déroulant ci-dessous.</li>
                    <li>Entrez le montant que vous souhaitez retirer dans le champ prévu à cet effet.</li>
                    <li>Cliquez sur le bouton "Demander le retrait" pour soumettre votre demande.</li>
                    <li>Votre demande de retrait sera traitée dans les 5 jours ouvrables suivants.</li>
                </ol>

                <div class="mt-6">
                    <h2 class="mb-2 text-lg font-semibold">Méthodes de retrait :</h2>
                    <div class="mb-4 flex items-center">
                        <input type="radio" id="paypal" name="methode_retrait" value="paypal" class="mr-2" />
                        <label for="paypal">PayPal</label>
                    </div>
                    <div class="mb-4 flex items-center">
                        <input type="radio" id="virement" name="methode_retrait" value="virement" class="mr-2" />
                        <label for="virement">Virement bancaire</label>
                    </div>
                    <div class="mb-4 flex items-center">
                        <input type="radio" id="cheque" name="methode_retrait" value="cheque" class="mr-2" />
                        <label for="cheque">Chèque</label>
                    </div>
                    <div class="mb-4 flex items-center">
                        <input type="radio" id="carte_bancaire" name="methode_retrait" value="carte_bancaire"
                            class="mr-2" />
                        <label for="carte_bancaire">Carte bancaire</label>
                    </div>
                    <!-- Ajoutez d'autres méthodes de retrait si nécessaire -->
                </div>
            </div>
        </div>
        {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    </div>
</x-freelance-profile>