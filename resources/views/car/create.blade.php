@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nouvelle voiture</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/voiture') }}">
                            {{ csrf_field() }}

                            @include('partials.field.text', ['field' => 'marque', 'label' => 'Marque'])
                            @include('partials.field.text', ['field' => 'modele', 'label' => 'Modèle'])
                            @include('partials.field.text', ['field' => 'annee', 'label' => 'Année'])
                            @include('partials.field.text', ['field' => 'no_plaque', 'label' => 'Numéro de plaque'])
                            @include('partials.field.text', ['field' => 'no_serie', 'label' => 'Numéro de série'])
                            @include('partials.field.select', ['field' => 'customer_id', 'label' => 'Client', 'options' => $customers])

                            @include('partials.field.submit', ['label' => 'Créer'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
