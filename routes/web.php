<?php

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

Route::get('/todo', function () {
    return view('todo/index', [
        'tasks' => \App\Models\Task::all()
    ]);
});

Route::get('/todo/create', function () {
    return view('todo/create');
});
Route::post('/todo/create', 'TaskController@store');
Route::get('/todo/delete/{id}', 'TaskController@delete');
