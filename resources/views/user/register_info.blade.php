<x-app-layout>

    <div class="py-3 border-gray-200 bg-white border-t dark:bg-gray-800">
        <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
            <div class="space-y-6 lg:flex lg:space-y-0 lg:items-center lg:gap-12">
                <div class="md:4/12 lg:w-6/12 hidden md:flex">
                    <img src="/images/hero/inscription.jpg" alt="image" class="rounded-md object-cover" loading="lazy"
                        width="" height="" />
                </div>
                <div class="md:8/12 lg:w-6/12">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white md:text-3xl">
                        Qu'est-ce qui fait un profil FIND réussi ?
                    </h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">
                        Votre première impression compte ! Créez un profil qui se démarquera de la foule sur FIND.
                    </p>

                    <div class="mt-4  gap-4 grid md:grid-cols-2 items-center">
                        <div>
                            <div class="flex w-16 h-16 gap-4 rounded-full dark:bg-teal-900/20">
                                <img src="/images/icon/user.gif" class="rounded w-32" alt="">
                            </div>
                            <div class=" mt-2 w-5/6">

                                <p class="text-gray-500 font-semibold dark:text-gray-400">
                                    Prenez votre temps pour créer votre profil afin qu'il soit exactement comme vous
                                    le souhaitez..</p>
                            </div>
                        </div>
                        <div>
                            <div class="flex w-16 h-16 gap-4 rounded-full dark:bg-teal-900/20">
                                <img src="/images/icon/social-media.gif" class="rounded w-32" alt="">
                            </div>
                            <div class=" mt-2 w-5/6">

                                <p class="text-gray-500 font-semibold dark:text-gray-400">Ajoutez de la crédibilité en
                                    vous connectant
                                    à vos réseaux professionnels pertinents.</p>
                            </div>
                        </div>
                        <div>
                            <div class="w-16 h-16 flex gap-4 rounded-full bg-purple-100 dark:bg-purple-900/20">
                                <img src="/images/icon/checklist.gif" class="rounded w-32" alt="">

                            </div>
                            <div class="w-5/6">

                                <p class="text-gray-500 dark:text-gray-400">
                                    Décrivez avec précision vos compétences professionnelles pour vous aider à
                                    obtenir plus de travail.
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="w-16 h-16 flex gap-4 rounded-full bg-purple-100 dark:bg-purple-900/20">
                                <img src="/images/icon/profile.gif" class="rounded w-32" alt="">
                            </div>
                            <div class="mt-2 w-5/6">

                                <p class="text-gray-500 font-semibold dark:text-gray-400">Mettez un visage sur votre nom
                                    !
                                    Téléchargez une photo de profil qui montre clairement votre visage..</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="flex md:mt-5 mt-2 justify-end items-end">
                <x-button md amber label="continuer" href="{{route('freelancer.register')}}" />
            </div>
        </div>
    </div>
</x-app-layout>