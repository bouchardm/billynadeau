<div class="text-right">
    <a href="{{ url($createPath) }}">Ajouter</a>
</div>
@foreach($models as $model)
    <div class="panel panel-default">
        <div class="panel-heading">{{ $model->title() }}</div>
        <div class="panel-body">
            <div class="col-md-4">
                <a href="{{ url($model->path()) }}" class="btn btn-default">Détails</a>
                <a href="{{ url("{$model->path()}/edit") }}" class="btn btn-default">Éditer</a>
            </div>
            <div class="col-md-8 text-right">
                <form action="{{ $model->path() }}" class="form-inline" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-danger form-control">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
<div class="text-center">
    {{ $models->links() }}
</div>