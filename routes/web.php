<?php

use Illuminate\Support\Facades\Route;

Route::get('/temp', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('default_welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', '\App\Http\Controllers\MapController@map');

# BOOK CONTROLLER
Route::resource('students', 'App\Http\Controllers\StudentController');

Route::get('test', function() {
    abort(500);
});

require __DIR__.'/auth.php';
