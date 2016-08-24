@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Client</h2>
                @include('partials.crud.list', ['createPath' => 'client/create', 'models' => $customers])
            </div>
        </div>
    </div>
@endsection
