<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/trainings',
    [
        TrainingController::class,
        'index'
    ]
)->name('training.index');

Route::get('training/create', [
    TrainingController::class,
    'create',
    function () {
        return view('training.create');
    }
])->name('training.create');

Route::post('training/store', [TrainingController::class, 'store',])->name('training.store');

Route::get('training/edit/{id}', [TrainingController::class, 'edit',])->name('training.edit');
Route::post('training/update/{id}', [TrainingController::class, 'update',])->name('training.update');
Route::get('training/delete/{id}', [TrainingController::class, 'delete',])->name('training.delete');