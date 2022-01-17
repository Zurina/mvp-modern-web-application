<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

Route::get('/temp', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('default_welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', '\App\Http\Controllers\MapController@map')->name('/');;

# BOOK CONTROLLER
Route::resource('students', 'App\Http\Controllers\StudentController');

Route::get('test', function() {
    throw new \Exception("Mathias' awesome error");
});

require __DIR__.'/auth.php';
