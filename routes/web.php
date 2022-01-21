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

Route::get('/', '\App\Http\Controllers\MapController@indexMap')->name('/');
Route::get('/personalMap/{id}', '\App\Http\Controllers\MapController@personalMap')->name('personalMap');

Route::resource('students', 'App\Http\Controllers\StudentController');
Route::resource('addresses', 'App\Http\Controllers\AddressController');

Route::get('test', function() {
    throw new \Exception("Mathias' awesome error");
});

Route::middleware('isUserAdmin')->group(function () {
    Route::get('admin', \App\Http\Controllers\AdminController::class)->name('admin');
});

require __DIR__.'/auth.php';
