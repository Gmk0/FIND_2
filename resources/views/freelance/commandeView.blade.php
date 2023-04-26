@extends('layouts.freelanceTest2')


@section('content')
@livewire('freelance.commande.commande-details',['order'=>$commande])
@endsection
