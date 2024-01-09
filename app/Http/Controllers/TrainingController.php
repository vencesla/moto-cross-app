<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
  public function index()
  {
    $trainings = Training::all();
    return view("training.index", [
      "trainings" => $trainings
    ]);
  }

  public function create()
  {

    return view("training.create", [
      "type"
    ]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string |max:255',
      'lenght' => 'required#',
      'max_people' => 'required|numeric',
      'type' => 'required',
    ]);

    if ($request->type != 'adulte' && $request->type != 'enfant') {
      return redirect()->route('training.create');
    }
    Training::create([
      'name' => $request->name,
      'length' => $request->length,
      'max_people' => $request->max_people,
      'type' => $request->type
    ]);
    session()->flash('success', 'Training créé avec succès!');
    return redirect()->route('training.index');
  }

  public function edit($id)
  {
    $training = Training::find($id);
    return view('training.edit', compact('training'));
  }

  public function update(Request $request, $id)
  {
    $training = Training::find($id);
    $training->update([
      'name' => $request->name,
      'length' => $request->length,
      'max_people' => $request->max_people,
      'type' => $request->type
    ]);
    session()->flash('success', 'Opération réussie !');
    return redirect('/trainings');
  }

  public function delete($id)
  {
    Training::find($id)->delete();

    session()->flash('success', 'Training supprimé avec succès!');
    return redirect('/home');
  }

  public function stores()
  {
    return view('training.stores');
  }
}
