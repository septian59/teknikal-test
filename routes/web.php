<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\TeamController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::get('city', [CityController::class, 'index'])->name('city.index');
    Route::get('city-deleted', [CityController::class, 'cityDeleted'])->name('city.recyle');
    Route::get('city/data', [DataController::class, 'cities'])->name('city.data');
    Route::get('team/data', [DataController::class, 'teams'])->name('team.data');
    Route::get('player/data', [DataController::class, 'players'])->name('player.data');

    Route::get('city-deleted/data', [DataController::class, 'citiesDeleted'])->name('city.delete');
    Route::get('team-deleted/data', [DataController::class, 'teamsDeleted'])->name('team.delete');

    Route::get('city/create', [CityController::class, 'create'])->name('city.create');
    Route::post('city/store', [CityController::class, 'store'])->name('city.store');
    Route::get('city/{city:id}/edit', [CityController::class, 'edit'])->name('city.edit');
    Route::patch('city/{city:id}', [CityController::class, 'update'])->name('city.update');
    Route::delete('city/{city:id}', [CityController::class, 'destroy'])->name('city.destroy');

    Route::get('city/{city:id}/restore', [CityController::class, 'restore'])->name('city.restore');
    Route::get('city/{city:id}/force', [CityController::class, 'force'])->name('city.force');

    Route::get('team', [TeamController::class, 'index'])->name('team.index');
    Route::get('team-deleted', [TeamController::class, 'teamsDeleted'])->name('team.recyle');
    Route::get('team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('team/store', [TeamController::class, 'store'])->name('team.store');
    Route::get('team/{team:id}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::patch('team/{team:id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('team/{team:id}', [TeamController::class, 'destroy'])->name('team.destroy');
    Route::get('team/{team:id}/restore', [TeamController::class, 'restore'])->name('team.restore');
    Route::get('team/{team:id}/force', [TeamController::class, 'force'])->name('team.force');

    Route::get('player', [PlayerController::class, 'index'])->name('player.index');
    Route::get('player/create', [PlayerController::class, 'create'])->name('player.create');
    Route::post('player/store', [PlayerController::class, 'store'])->name('player.store');
    Route::get('player/{player:id}/edit', [PlayerController::class, 'edit'])->name('player.edit');
    Route::patch('player/{player:id}', [PlayerController::class, 'update'])->name('player.update');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
