<?php

use App\Http\Controllers\TasksController;
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

Route::get('/', [TasksController::class,'index'])->name('dashboard');
Route::get('/task',function(){
    return view('task');
});
Route::get('/createTaskForm',[TasksController::class,'createTaskForm'])->name('createTaskForm');
Route::post('/createNewTask', [TasksController::class,'createNewTask'])->name('createNewTask');//naming route
Route::get('/editTaskForm/{id}', [TasksController::class,'editTaskForm'])->name('editTaskForm');
Route::post('/editTask',[TasksController::class,'editTask'])->name('editTask');
Route::get('/editAllTasks',[TasksController::class,'editAllTasks'])->name('editAllTasks');
Route::get('/deleteTask/{id}',[TasksController::class,'deleteTask'])->name('deleteTask');
Route::get('/completedTasks', [TasksController::class,'completedTasks'])->name('completedTasks');
Route::get('/inProgressTasks', [TasksController::class,'inProgressTasks'])->name('inProgressTasks');