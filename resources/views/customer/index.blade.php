@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-right">
                    <a href="{{ url('client/create') }}">Ajouter</a>
                </div>
                @foreach($customers as $customer)
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $customer->firstName }} {{ $customer->lastName }}</div>
                        <div class="panel-body">
                            <a href="{{ url("/client/$customer->id") }}" class="btn btn-default">Détails</a>
                        </div>
                    </div>
                @endforeach
                <div class="text-center">
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
