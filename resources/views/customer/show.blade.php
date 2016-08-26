@extends('layouts.admin')

@section('admin-content')
    <h2>Informations</h2>
    <div class="panel panel-default">
        <div class="panel-heading">
            Client {{ $customer->title() }}
            <a href="{{ $customer->path() }}/edit">Éditer</a>
        </div>
        <div class="panel-body">
            <p>Prénom: {{ $customer->firstName }}</p>
            <p>Nom de famille: {{ $customer->lastName }}</p>
            <p>Adresse: {{ $customer->address }}</p>
            <p>Téléphone: {{ $customer->phone }}</p>
            <p>Cellulaire: {{ $customer->cellphone }}</p>
        </div>
    </div>

    <h2>Voitures</h2>
    @each('customer.partials.car', $customer->cars, 'car')
    <div class="text-right">
        <a href="{{ url('/voiture/create') }}?customer_id={{ $customer->id }}">Ajouter</a>
    </div>

    <h2>Bons de travail</h2>
    @each('customer.partials.ticket', $customer->tickets, 'ticket')
    <div class="text-right">
        <a href="{{ url('/bon/create') }}?customer_id={{ $customer->id }}">Ajouter</a>
    </div>
@endsection
