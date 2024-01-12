@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mt-4 text-center">Liste des Horaires</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date de Début</th>
                    <th>Date de Fin</th>
                    <th>Formation</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->id }}</td>
                        <td>{{ $schedule->start_date }}</td>
                        <td>{{ $schedule->end_date }}</td>
                        <td>{{ $schedule->training->name }}</td>
                        <td>
                            <a href="{{ route('schedules.show', ['id' => $schedule->id]) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('schedules.edit', ['id' => $schedule->id]) }}"
                                class="btn btn-warning">Éditer</a>
                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="post"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet horaire ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
