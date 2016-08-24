@extends('layouts.admin')

@section('admin-content')
    <div class="panel panel-default">
        <div class="panel-heading">Édition {{ $ticket->title() }}</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url("/bon/$ticket->id") }}">
                {{ method_field('put') }}
                {{ csrf_field() }}

                @include('partials.field.text', ['field' => 'no', 'value' => $ticket->no])
                @include('partials.field.text', ['field' => 'name', 'value' => $ticket->name])
                @include('partials.field.textarea', ['field' => 'description', 'value' => $ticket->description])
                @include('partials.field.select', ['field' => 'customer_id', 'options' => $customers, 'value' => $ticket->customer_id])

                @include('partials.field.submit', ['label' => 'Sauvegarder'])
            </form>
        </div>
    </div>
@endsection
