@extends('layouts.admin')

@section('admin-content')
    <h2>Voiture</h2>
    @include('partials.crud.list', ['createPath' => 'voiture/create', 'models' => $cars])
@endsection
