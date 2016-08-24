@extends('layouts.admin')

@section('admin-content')
    <h2>Bon de travail</h2>
    @include('partials.crud.list', ['createPath' => 'bon/create', 'models' => $tickets])
@endsection
