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
            @if ($ticket->customer)
                <p>Client: <a href="{{ $ticket->customer->path() }}">{{ $ticket->customer->title() }}</a></p>
            @else
                <span class="text-danger">Le client à été supprimé</span>
            @endif
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Clocks
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach($ticket->clocks as $clock)
                    <tbody>
                        <tr>
                            <td>{{ $clock->start }}</td>
                            <td>{{ $clock->end }}</td>
                            <td>{{ $clock->total() }}</td>
                            <td>
                                <form action="{{ $clock->path() }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn-link">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>




    <div class="text-right">
        <a href="{{ url('/clock/create') }}?ticket_id={{ $ticket->id }}">Ajouter du temps</a>
    </div>
@endsection
