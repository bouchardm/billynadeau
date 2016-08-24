@extends('layouts.admin')

@section('admin-content')
    <h2>Client</h2>
    @include('partials.crud.list', ['createPath' => 'client/create', 'models' => $customers])
@endsection
