<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
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


Route::get('/home', [HomeController::class, 'index'])->name('todos.home');

Route::prefix('todos')->as('todos.')->controller(TodoController::class)->group(function()
{

    Route::get('index','index')->name('index');
    Route::get('create_todo','createTodo')->name('create');
    Route::post('create_todo','store');
    Route::get('show_todo/{id}','showTodo')->name('show');
    Route::get('edit_todo/{id}','editTodo')->name('edit');
    Route::put('edit_todo/{id}','update');
    Route::delete('delete_todo/{id}','destroy')->name('delete');

});