@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4 text-center">Édition de l'Horaire #{{ $schedule->id }}</h2>
        <form action="{{ route('schedules.update', ['id' => $schedule->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="start_date">Date de Début :</label>
                <input type="datetime-local" id="start_date" name="start_date" class="form-control"
                    value="{{ $schedule->start_date }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">Date de Fin :</label>
                <input type="datetime-local" id="end_date" name="end_date" class="form-control"
                    value="{{ $schedule->end_date }}" required>
            </div>

            <div class="form-group">
                <label for="training_id">Formation :</label>
                <select id="training_id" name="training_id" class="form-control" required>
                    @foreach ($trainings as $training)
                        <option value="{{ $training->id }}" {{ $training->id == $schedule->training_id ? 'selected' : '' }}>
                            {{ $training->name }}</option>
                    @endforeach
                </select>
            </div><br>

            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>
@endsection
