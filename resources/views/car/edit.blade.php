@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Édition {{ $car->title() }}</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url("/voiture/$car->id") }}">
                            {{ method_field('put') }}
                            {{ csrf_field() }}

                            @include('partials.field.text', ['field' => 'marque', 'label' => 'marque', 'value' => $car->marque])
                            @include('partials.field.text', ['field' => 'modele', 'label' => 'Modèle', 'value' => $car->modele])
                            @include('partials.field.text', ['field' => 'annee', 'label' => 'Année', 'value' => $car->annee])
                            @include('partials.field.text', ['field' => 'no_plaque', 'label' => 'Numéro de plaque', 'value' => $car->no_plaque])
                            @include('partials.field.text', ['field' => 'no_serie', 'label' => 'Numéro de série', 'value' => $car->no_serie])
                            @include('partials.field.select', ['field' => 'customer_id', 'label' => 'Client', 'options' => $customers, 'value' => $car->customer_id])

                            @include('partials.field.submit', ['label' => 'Sauvegarder'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
