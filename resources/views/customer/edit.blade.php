@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nouveau client</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url("/client/$customer->id") }}">
                            {{ method_field('put') }}
                            {{ csrf_field() }}

                            @include('partials.field.text', [
                                'field' => 'firstName',
                                'label' => 'Prénom',
                                'value' => $customer->firstName
                            ])
                            @include('partials.field.text', [
                                'field' => 'lastName',
                                'label' => 'Nom de famille',
                                'value' => $customer->lastName,
                            ])

                            @include('partials.field.submit', ['label' => 'Sauvegarder'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
