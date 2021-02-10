<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

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

Route::redirect('/', '/tasks');

Route::prefix('/tasks')->group(function(){
  Route::get('/', [TaskController::class, 'list'])->name('tasks.list');

  Route::get('/add', [TaskController::class, 'add'])->name('tasks.add');
  Route::post('/add', [TaskController::class, 'addAction'])->name('tasks.addAction');

  Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
  Route::post('/edit/{id}', [TaskController::class, 'editAction'])->name('tasks.editAction');

  Route::get('/delete/{id}', [TaskController::class, 'delete'])->name('tasks.delete');

  Route::get('/check/{id}', [TaskController::class, 'check'])->name('tasks.check');
});

Route::fallback(function() {
  return view('404');
});
