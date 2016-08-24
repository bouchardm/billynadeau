<div class="panel panel-default">
    <div class="panel-heading">
        Bon de travail: {{ $ticket->no }} {{ $ticket->name }}
    </div>
    <div class="panel-body">
        <a href="{{ url($ticket->path()) }}" class="btn btn-default">Détails</a>
    </div>
</div>