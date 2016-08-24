@extends('layouts.admin')

@section('admin-content')
    <div class="panel panel-default">
        <div class="panel-heading">Édition {{ $customer->title() }}</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url("/client/$customer->id") }}">
                {{ method_field('put') }}
                {{ csrf_field() }}

                @include('partials.field.text', ['field' => 'firstName', 'value' => $customer->firstName])
                @include('partials.field.text', ['field' => 'lastName', 'value' => $customer->lastName])

                @include('partials.field.text', ['field' => 'address', 'value' => $customer->address])
                @include('partials.field.text', ['field' => 'phone', 'value' => $customer->phone])
                @include('partials.field.text', ['field' => 'cellphone', 'value' => $customer->cellphone])

                @include('partials.field.submit', ['label' => 'Sauvegarder'])
            </form>
        </div>
    </div>
@endsection
