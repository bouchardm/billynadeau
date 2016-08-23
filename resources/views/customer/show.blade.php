@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Client</div>
                    <div class="panel-body">
                        <p>Prénom: {{ $customer->firstName }}</p>
                        <p>Nom de famille: {{ $customer->lastName }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
