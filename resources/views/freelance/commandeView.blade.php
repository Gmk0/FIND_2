@extends('layouts.freelanceTest')


@section('content')
@livewire('freelance.commande.commande-details',['order'=>$commande])
@endsection