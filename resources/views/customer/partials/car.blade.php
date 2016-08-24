<div class="panel panel-default">
    <div class="panel-heading">
        Voiture {{ $car->title() }}
        <a href="{{ $car->path() }}/edit">Éditer</a>
    </div>
    <div class="panel-body">
        <p>Marque: {{ $car->marque }}</p>
        <p>Modèle: {{ $car->modele }}</p>
        <p>Plaque: {{ $car->no_plaque }}</p>
        <p>Serie: {{ $car->no_serie }}</p>
        @if (isset($car->customer))
            <p>Client: <a href="{{ $car->customer->path() }}">{{ $car->customer->title() }}</a></p>
        @endif
    </div>
</div>