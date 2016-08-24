@extends('layouts.admin')

@section('admin-content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Bon {{ $ticket->title() }}
            <a href="{{ $ticket->path() }}/edit">Éditer</a>
        </div>
        <div class="panel-body">
            <p>No: {{ $ticket->no }}</p>
            <p>Nom: {{ $ticket->name }}</p>
            <p>Description: <br>{{ $ticket->description }}</p>
            <p>Client: <a href="{{ $ticket->customer->path() }}">{{ $ticket->customer->title() }}</a></p>
        </div>
    </div>
@endsection
