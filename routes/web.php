<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/gl', function () {
    return view('welcome');
});

//Evenement
Route::get('/listEvenement',[\App\Http\Controllers\EvenementController::class,'index'])->name('listEvenement');
Route::get('/createEvenement',[\App\Http\Controllers\EvenementController::class,'create'])->name('createEvenement');
Route::post('/saveEvenement',[\App\Http\Controllers\EvenementController::class,'store'])->name('saveEvenement');
Route::delete('/deleteEvenement/{id}',[\App\Http\Controllers\EvenementController::class,'destroy'])->name('deleteEvenement');
Route::get('/editEvenement/{id}',[\App\Http\Controllers\EvenementController::class,'edit'])->name('editEvenement');
Route::put('/updateEvenement',[\App\Http\Controllers\EvenementController::class,'update'])->name('updateEvenement');

//Reservation
Route::resource('reservation',\App\Http\Controllers\ReservationController::class);
