@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <h1 class="text-center">Modification d'un training</h1>
    <form action="{{ route('training.update', ['id' => $training->id]) }}" method="post">
        @csrf
        @update
        <div class="form-group">
            <label for="name">Nom de l'entrainement</label>
            <input type="text" class="form-control" name="name" value="{{ $training->name }}">
        </div>
        <div class="form-group">
            <label for="length">Taille de l'équipe</label>
            <input type="number" class="form-control" name="length" value="{{ $training->length }}">
        </div>
        <div class="form-group">
            <label for="max_people">Taille maximale de l'équipe</label>
            <input type="number" class="form-control" name="max_people" value="{{ $training->max_people }}">
        </div>
        <div class="form-group">
            <label for="type">Type </label>
            <input type="radio" name="type" value="adulte" {{ $training->type == 'adulte' ? 'checked' : ''
            }}>Adulde
            <input type="radio" name="type" value="enfant" {{ $training->type == 'enfant' ? 'checked' : ''
            }}>Enfant
        </div>
        <br>
        <button type="submit" class="btn btn-success">Modifier</button>
        <a class="btn btn-primary pull-right" href="{{ route('training.index') }}">Liste des trainings</a>
    </form>
</div>
@stop