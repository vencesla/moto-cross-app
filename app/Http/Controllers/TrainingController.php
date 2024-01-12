<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
  public function index()
  {
    // Vérifiez si l'utilisateur est connecté
    if (Auth::check()) {
      // Récupérez l'utilisateur connecté
      $user = Auth::user();

      // Récupérez les formations associées à l'utilisateur connecté
      $trainings = $user->trainings;

      // Passez les formations à la vue
      return view("training.index", [
        "trainings" => $trainings
      ]);
    }
    return redirect()->route('/');
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
      'name' => 'required|string|max:255',
      'length' => 'required|numeric',
      'max_people' => 'required|numeric',
      'type' => 'required|in:enfant,adulte',
    ]);

    Training::create([
      'name' => $request->name,
      'length' => $request->length,
      'max_people' => $request->max_people,
      'type' => $request->type,
      'user_id' => Auth::user()->id,
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

  public function unauthorized()
  {
    return view('auth.unauthorized');
  }
}
