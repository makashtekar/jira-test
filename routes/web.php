<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('project', \App\Http\Controllers\ProjectController::class);


    Route::controller(\App\Http\Controllers\TaskController::class)->group(function(){

        Route::get('/tasks/{project}','index')->name('task.index');
        Route::get('/task/{task}','show')->name('task.show');

        Route::get('/task/create/{project}','create')->name('task.create');
        Route::post('/task/create/{project}','store')->name('task.store');

        Route::get('/task/edit/{task}','edit')->name('task.edit');
        Route::post('/task/edit/{task}','update')->name('task.update');

        Route::delete('/task/{task}','destroy')->name('task.destroy');


    });

//    Route::resource('task', \App\Http\Controllers\TaskController::class);

});

require __DIR__.'/auth.php';
