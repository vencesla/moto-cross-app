<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedules.index')->with('schedules', $schedules);
    }

    public function create()
    {
        $userTrainings = Auth::user()->trainings;
        return view('schedules.create', compact('userTrainings'));
    }

    public function store(Request $request)
    {
        // Valide et enregistre le nouvel horaire
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'training_id' => 'required|exists:trainings,id',
        ]);

        Schedule::create($request->all());

        return redirect('/Creneau/reserve')->with('success', 'Horaire créé avec succès!');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        $trainings = Auth::user()->trainings;
        return view('schedules.edit')->with([
            'schedule' => $schedule,
            'trainings' => $trainings
        ]);
    }

    public function update(Request $request, Schedule $schedule, $id)
    {
        // Récupérez l'horaire en fonction de l'identifiant
        $schedule = Schedule::findOrFail($id);

        // Valide et met à jour l'horaire existant
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'training_id' => 'required|exists:trainings,id',
        ]);

        $schedule->update($request->all());


        return redirect('/Creneau/reserve')->with('success', 'Horaire mis à jour avec succès!');
    }

    public function destroy($id)
    {
        // Récupérez l'horaire en fonction de l'identifiant
        $schedule = Schedule::findOrFail($id);

        // Supprime l'horaire
        $schedule->delete();
        return redirect('/Creneau/reserve')->with('success', 'Horaire supprimé avec succès!');
    }

    public function show(Schedule $schedule, $id)
    {
        $schedule = Schedule::findOrFail($id);
        // Chargez la relation 'training' avec l'horaire
        $schedule->load('training');

        return view('schedules.show')->with('schedule', $schedule);
    }
}
