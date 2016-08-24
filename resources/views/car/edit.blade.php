@extends('layouts.admin')

@section('admin-content')
    <div class="panel panel-default">
        <div class="panel-heading">Édition {{ $car->title() }}</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url("/voiture/$car->id") }}">
                {{ method_field('put') }}
                {{ csrf_field() }}

                @include('partials.field.text', ['field' => 'marque', 'value' => $car->marque])
                @include('partials.field.text', ['field' => 'modele', 'value' => $car->modele])
                @include('partials.field.text', ['field' => 'annee', 'value' => $car->annee])
                @include('partials.field.text', ['field' => 'no_plaque', 'value' => $car->no_plaque])
                @include('partials.field.text', ['field' => 'no_serie', 'value' => $car->no_serie])
                @include('partials.field.select', ['field' => 'customer_id', 'options' => $customers, 'value' => $car->customer_id])

                @include('partials.field.submit', ['label' => 'Sauvegarder'])
            </form>
        </div>
    </div>
@endsection
