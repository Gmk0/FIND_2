@extends('layouts.userProfile')

@section('content')

<div>

    @livewire('user.commande.commande-one-view',['Order'=>$Order]);

</div>

@endsection