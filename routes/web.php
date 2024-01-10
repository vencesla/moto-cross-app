<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserControllers;

use App\Http\Controllers\TrainingController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;


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


Route::get("/", function () {
    return view("auth.login");
})->name("home");


Route::get('training/create', [
    TrainingController::class,
    'create',
    function () {
        return view('training.create');
    }
])->name('training.create')->middleware('checkRole:user');

Route::post('training/store', [TrainingController::class, 'store',])->name('training.store')->middleware('checkRole:user');

Route::get('training/edit/{id}', [TrainingController::class, 'edit',])->name('training.edit')->middleware('checkRole:user');
Route::post('training/update/{id}', [TrainingController::class, 'update',])->name('training.update')->middleware('checkRole:user');
Route::get('training/delete/{id}', [TrainingController::class, 'delete',])->name('training.delete')->middleware('checkRole:user');

Route::get(
    '/trainings',
    [
        TrainingController::class,
        'index'
    ]
)->name('training.index')->middleware('checkRole:user');
Route::get(
    '/home',
    [
        TrainingController::class,
        'stores'
    ]
)->name('training.home')->middleware('checkRole:user');

Route::get('/weather', [WeatherController::class, 'index']);
Route::get('weather/city', [WeatherController::class, 'city'])->name('weather.city');
Route::post('ville/insee', [WeatherController::class, 'code'])->name('weather.insee');
Route::get('ville/insee/{insee}', [WeatherController::class, 'showCode'])->name('insee.detail');
