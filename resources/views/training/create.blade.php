@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <h1 class="text-center">Création d'un training</h1>
        <form action="{{ route('training.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nom de l'entrainement</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="length">Taille de l'équipe</label>
                <input type="number" class="form-control" name="length" required>
            </div>
            <div class="form-group">
                <label for="max_people">Taille maximale de l'équipe</label>
                <input type="number" class="form-control" name="max_people">
            </div>
            <div class="form-group">
                <label for="type">Type </label>
                <input type="radio" name="type" value="adulte" alue="valeur1">Adulte
                <input type="radio" name="type" value="enfant">Enfant
            </div>
            <br>
            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a class="btn btn-primary pull-right" href="{{ route('training.index') }}">Liste des trainings</a>
        </form>
    </div>
@stop
