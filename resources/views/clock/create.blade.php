@extends('layouts.admin')

@section('admin-content')
    <div class="panel panel-default">
        <div class="panel-heading">Nouveau clock</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/clock') }}">
                {{ csrf_field() }}

                @include('partials.field.datetime', ['field' => 'start'])
                @include('partials.field.datetime', ['field' => 'end'])
                <input type="hidden" name="ticket_id" value="{{ $ticketId }}">


                @include('partials.field.submit', ['label' => 'Ajouter'])
            </form>
        </div>
    </div>
@endsection
