<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('default_welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/map', '\App\Http\Controllers\MapController@map');

# BOOK CONTROLLER
Route::resource('students', 'App\Http\Controllers\StudentController');

require __DIR__.'/auth.php';
