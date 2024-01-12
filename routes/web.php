<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserControllers;
use App\Http\Controllers\WeatherController;

use App\Http\Controllers\ScheduleController;
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
    'create'
])->name('training.create')->middleware('checkRole:admin');

Route::post('training/store', [TrainingController::class, 'store',])->name('training.store')->middleware('checkRole:admin');

Route::get('training/edit/{id}', [TrainingController::class, 'edit',])->name('training.edit')->middleware('checkRole:admin');
Route::post('training/update/{id}', [TrainingController::class, 'update',])->name('training.update')->middleware('checkRole:admin');
Route::get('training/delete/{id}', [TrainingController::class, 'delete',])->name('training.delete')->middleware('checkRoler:admin');

Route::get(
    '/trainings',
    [
        TrainingController::class,
        'index'
    ]
)->name('training.index')->middleware('checkRole:admin');
Route::get(
    '/home',
    [
        TrainingController::class,
        'stores'
    ]
)->name('training.home')->middleware('checkRole:user');

Route::get('/weather', [WeatherController::class, 'index'])->middleware('checkRole:user');
;
Route::get('weather/city', [WeatherController::class, 'city'])->name('weather.city')->middleware('checkRole:user');
;
Route::post('ville/insee', [WeatherController::class, 'code'])->name('weather.insee')->middleware('checkRole:user');
;
Route::get('ville/insee/{insee}', [WeatherController::class, 'showCode'])->name('insee.detail')->middleware('checkRole:user');
;
Route::get(
    '/user/profile',
    [UserController::class, 'users']
)->name('user.all')->middleware('checkRole:user');
Route::get('user/edit/{id}', [UserController::class, 'profile'])->name('auth.profile')->middleware('checkRole:user');
Route::post('user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile')->middleware('checkRole:user');
Route::get('/user/profile/image', [UserController::class, 'userProfile'])->name('users.image')->middleware('checkRole:user');
Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');
Route::post('/schedules/store', [ScheduleController::class, 'store'])->name('schedules.store')->middleware('checkRole:user');
Route::get('/Creneau/reserve', [ScheduleController::class, 'index'])->name('schedules.index')->middleware('checkRole:user');
Route::get('/Creneau/{id}', [ScheduleController::class, 'show'])->name('schedules.show')->middleware('checkRole:user');
Route::get('/Creneau/edition/{id}', [ScheduleController::class, 'edit'])->name('schedules.edit')->middleware('checkRole:user');
Route::delete('/Creneau/suppression/{id}', [ScheduleController::class, 'destroy'])->name('schedules.destroy')->middleware('checkRole:user');
Route::put('/Creneau/modifier/{id}', [ScheduleController::class, 'update'])->name('schedules.update')->middleware('checkRole:user');
Route::get('/unauthorized', [TrainingController::class, 'unauthorized']);
