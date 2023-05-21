@extends('layouts.user')

@section('content')


@livewire('user.services.services-view-one',['service'=>$service])


@endsection