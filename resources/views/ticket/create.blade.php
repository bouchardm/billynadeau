@extends('layouts.admin')

@section('admin-content')
    <div class="panel panel-default">
        <div class="panel-heading">Nouveau bon</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/bon') }}">
                {{ csrf_field() }}

                @include('partials.field.text', ['field' => 'no'])
                @include('partials.field.text', ['field' => 'name'])
                @include('partials.field.textarea', ['field' => 'description'])
                @include('partials.field.select', ['field' => 'customer_id', 'options' => $customers, 'value' => request('customer_id')])

                @include('partials.field.submit', ['label' => 'Créer'])
            </form>
        </div>
    </div>
@endsection
