@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Créer un nouvel horaire</h2>
        <form action="{{ route('schedules.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="start_date">Date de début :</label>
                <input type="datetime-local" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">Date de fin :</label>
                <input type="datetime-local" id="end_date" name="end_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="training_id">Formation :</label>
                <select id="training_id" name="training_id" class="form-control" required>
                    @foreach ($userTrainings as $training)
                        <option value="{{ $training->id }}">{{ $training->name }}</option>
                    @endforeach
                </select>
            </div><br>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
