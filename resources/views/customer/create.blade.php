@extends('layouts.admin')

@section('admin-content')
    <div class="panel panel-default">
        <div class="panel-heading">Nouveau client</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/client') }}">
                {{ csrf_field() }}

                @include('partials.field.text', ['field' => 'firstName'])
                @include('partials.field.text', ['field' => 'lastName'])
                @include('partials.field.text', ['field' => 'address'])
                @include('partials.field.text', ['field' => 'phone'])
                @include('partials.field.text', ['field' => 'cellphone'])

                @include('partials.field.submit', ['label' => 'Créer'])
            </form>
        </div>
    </div>
@endsection
