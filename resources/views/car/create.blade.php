@extends('layouts.admin')

@section('admin-content')
    <div class="panel panel-default">
        <div class="panel-heading">Nouvelle voiture</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/voiture') }}">
                {{ csrf_field() }}

                @include('partials.field.text', ['field' => 'marque'])
                @include('partials.field.text', ['field' => 'modele'])
                @include('partials.field.text', ['field' => 'annee'])
                @include('partials.field.text', ['field' => 'no_plaque'])
                @include('partials.field.text', ['field' => 'no_serie'])
                @include('partials.field.select', ['field' => 'customer_id', 'options' => $customers, 'value' => request('customer_id')])

                @include('partials.field.submit', ['label' => 'Créer'])
            </form>
        </div>
    </div>
@endsection
