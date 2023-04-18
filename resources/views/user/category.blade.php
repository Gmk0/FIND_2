@extends('layouts.user')

@section('content')
<div class="min-h-screen pt-20 md:px-8">

    <div class="mx-2">
        @include('include.breadcumb',['category'=>'cagegory'])
    </div>




    <div class="grid grid-cols-2 gap-4 md:gap-6 md:grid-cols-4 xl:gap-8">

        @forelse ($categories as $category)

        <a href="{{route('categoryByName',[$category->name])}}"
            class="flex flex-col items-center px-2 py-4 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
            <img src="{{Storage::disk('local')->url('public/'.$category->illustration) }}" class="w-20 h-20 rounded-md"
                alt="">
            <h4
                class="mt-3 mb-1 md:text-[20px] text-[16px]   font-semibold text-slate-600 duration-200 group-hover:text-white">
                {{$category->name}}</h4>

        </a>
        @empty




        <div
            class="flex flex-col items-center px-2 py-4 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
            <img src="/images/services/develloper.png" class="w-20 h-20 rounded-md" alt="">
            <h4
                class="mt-3 mb-1 md:text-[20px] text-[16px]   font-semibold text-slate-600 duration-200 group-hover:text-white">
                Programation</h4>

        </div>

        <div
            class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
            <img src="/images/services/designer.png" class="w-20 h-20 rounded-md" alt="">
            <h4
                class="mt-3 mb-1 md:text-[20px] text-[16px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                Graphisme & Designer</h4>

        </div>

        <div
            class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-blue-500/10 shadow-amber-300/10 hover:bg-amber-600">
            <img src="/images/services/photo.png" class="w-20 h-20 rounded-md" alt="">
            <h4
                class="mt-3 mb-1 md:text-[20px] text-[16px]  font-semibold text-slate-600 duration-200 group-hover:text-white">
                Photographie</h4>

        </div>

        <div
            class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
            <img src="/images/services/marketing.png" class="w-20 h-20 rounded-md" alt="">
            <h4
                class="mt-3 mb-1 md:text-[20px] text-[16px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                marketing Digital</h4>

        </div>

        <div
            class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
            <img src="/images/services/deco.png" class="w-20 h-20 rounded-md" alt="">
            <h4
                class="mt-3 mb-1 md:text-[20px] text-[16px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                Decoration</h4>

        </div>

        <div
            class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
            <img src="/images/services/business.svg" class="w-20 h-20 rounded-md" alt="">
            <h4
                class="mt-3 mb-1 md:text-[20px] text-[16px]  font-semibold text-slate-600 duration-200 group-hover:text-white">
                Bussiness</h4>

        </div>
        <div
            class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
            <img src="/images/services/redaction.svg" class="w-20 h-20 rounded-md" alt="">
            <h4
                class="mt-3 mb-1 md:text-[20px] text-[16px] font-semibold text-slate-600 duration-200 group-hover:text-white">
                Redaction & Traduction</h4>

        </div>
        <div
            class="flex flex-col items-center px-5 py-8 duration-200 border shadow-lg cursor-pointer bg-gray-50 group rounded-xl border-amber-500/10 shadow-amber-300/10 hover:bg-amber-600">
            <img src="/images/services/loisir.svg" class="w-20 h-20 rounded-md hover:bg-white" alt="">
            <h4
                class="mt-3 mb-1 md:text-[20px] text-[16px]  font-semibold text-slate-600 duration-200 group-hover:text-white">
                Loisirs</h4>

        </div>
        @endforelse
    </div>>
</div>




@endsection