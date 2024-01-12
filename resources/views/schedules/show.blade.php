@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Détails de l'Horaire</h2>
        <div class="card">
            <div class="card-header">
                Horaire #{{ $schedule->id }}
            </div>
            <div class="card-body">
                <p class="card-text"><strong>Date de Début:</strong> {{ $schedule->start_date }}</p>
                <p class="card-text"><strong>Date de Fin:</strong> {{ $schedule->end_date }}</p>
                <p class="card-text"><strong>Formation:</strong> {{ optional($schedule->training)->name }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('schedules.edit', ['id' => $schedule->id]) }}" class="btn btn-warning">Éditer</a>
                <form action="{{ route('schedules.destroy', $schedule->id) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire ?')">Supprimer</button>
                </form>
                <a href="{{ route('schedules.index') }}" class="btn btn-primary">Mes réservations</a>
            </div>
        </div>
    </div>
@endsection
