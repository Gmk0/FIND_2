@extends('layouts.user')

@section('content')

<section class="py-24 bg-gray-100 dark:bg-gray-900">
    <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
        <div class="lg:text-center">
            <h2 class="text-base font-semibold tracking-wide text-indigo-600 uppercase">À Propos de FIND</h2>
            <p class="mt-2 text-xl font-extrabold leading-8 tracking-tight text-gray-800 sm:text-4xl">
                Trouvez le meilleur talent pour votre projet
            </p>
            <p class="max-w-2xl mt-4 text-xl text-gray-500 lg:mx-auto">
                FIND est une plateforme qui met en relation des freelances qualifiés avec des clients à la recherche de
                compétences spécifiques pour leurs projets. Que vous ayez besoin d'un développeur, d'un designer, d'un
                responsable financier ou d'un autre professionnel, nous avons les talents qu'il vous faut pour mener à
                bien votre projet.
            </p>
        </div>
        <div class="mt-10">
            <h3 class="text-lg font-medium leading-6 text-gray-800">Notre Équipe</h3>
            <div class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="flex items-center justify-center h-48 bg-gray-200 sm:h-56 md:h-64 lg:h-72 xl:h-80">
                        <img class="object-cover object-center w-full h-full" src="/chemin/vers/image1.jpg"
                            alt="Photo du fondateur de FIND">
                    </div>
                    <div class="px-4 py-4 sm:px-6">
                        <h4 class="text-lg font-semibold text-gray-800">Ulrich Lukemba</h4>
                        <p class="mt-1 text-sm text-gray-500">Fondateur et PDG</p>
                    </div>
                </div>
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="flex items-center justify-center h-48 bg-gray-200 sm:h-56 md:h-64 lg:h-72 xl:h-80">
                        <img class="object-cover object-center w-full h-full" src="/chemin/vers/image2.jpg"
                            alt="Photo de la responsable financière de FIND">
                    </div>
                    <div class="px-4 py-4 sm:px-6">
                        <h4 class="text-lg font-semibold text-gray-800">Naomie</h4>
                        <p class="mt-1 text-sm text-gray-500">Responsable Financière</p>
                    </div>
                </div>
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="flex items-center justify-center h-48 bg-gray-200 sm:h-56 md:h-64 lg:h-72 xl:h-80">
                        <img class="object-cover object-center w-full h-full" src="/chemin/vers/image3.jpg"
                            alt="Photo du développeur de FIND">
                    </div>
                    <div class="px-4 py-4 sm:px-6">
                        <h4 class="text-lg font-semibold text-gray-800"> GMK</h4>
                        <p class="mt-1 text-sm text-gray-500">Responsable Technique</p>
                    </div>
                </div>
                <div class="overflow-hidden bg-white rounded-lg shadow">
                    <div class="flex items-center justify-center h-48 bg-gray-200 sm:h-56 md:h-64 lg:h-72 xl:h-80">
                        <img class="object-cover object-center w-full h-full" src="/chemin/vers/image4.jpg"
                            alt="Photo du designer de FIND">
                    </div>
                    <div class="px-4 py-4 sm:px-6">
                        <h4 class="text-lg font-semibold text-gray-800">Sophie Dupont</h4>
                        <p class="mt-1 text-sm text-gray-500">Designer Graphique</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection