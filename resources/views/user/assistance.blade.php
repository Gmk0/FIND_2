@extends('layouts.userProfile')

@section('content')


<section class="min-h-screen  ">

    <div>
        @include('include.breadcumbUser',['assistance'=>'assistance'])
    </div>

    <section class=" py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-semibold mb-8">Besoin d'assistance ?</h2>
            <div class="flex flex-wrap -mx-4">
                <div class="w-full lg:w-1/3 px-4 mb-8">
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl text-gray-800 font-semibold mb-4">Contactez-nous</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">Vous avez une question ou un problème ?
                            N'hésitez pas à nous
                            contacter
                            !</p>
                        <a href="#"
                            class="inline-block py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">Nous
                            contacter</a>
                    </div>
                </div>
                <div class="w-full lg:w-1/3 px-4 mb-8">
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl text-gray-800 font-semibold mb-4">FAQ</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">Consultez notre Foire Aux Questions pour
                            trouver rapidement des
                            réponses à vos questions.</p>
                        <a href="#"
                            class="inline-block py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">FAQ</a>
                    </div>
                </div>
                <div class="w-full lg:w-1/3 px-4 mb-8">
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl text-gray-800 font-semibold mb-4">Support en ligne</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">Vous avez besoin d'une assistance en temps réel
                            ? Utilisez notre
                            support en ligne pour discuter avec un agent.</p>
                        <a href="#"
                            class="inline-block py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">Support
                            en ligne</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



</section>

@endsection
