<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarkerController;
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
    return view('project');
});


Route::post('/save_marker', [MarkerController::class, 'store'])->name('save_marker');
Route::get('/get_markers', [MarkerController::class, 'index'])->name('get_markers');
Route::get('/remove_marker/{id}', [MarkerController::class, 'destroy'])->name('remove_marker');

