@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Voiture</h2>
                @include('partials.crud.list', ['createPath' => 'voiture/create', 'models' => $cars])
            </div>
        </div>
    </div>
@endsection
