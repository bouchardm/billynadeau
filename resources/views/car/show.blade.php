@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Voiture {{ $car->title() }}</div>
                    <div class="panel-body">
                        <p>Marque: {{ $car->marque }}</p>
                        <p>Modèle: {{ $car->modele }}</p>
                        <p>Plaque: {{ $car->no_plaque }}</p>
                        <p>Serie: {{ $car->no_serie }}</p>
                        @if (isset($car->customer))
                            <p>Client: <a href="{{ $car->customer->path() }}">{{ $car->customer->title() }}</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
