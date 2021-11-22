<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\DepartmentController;

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

// worker routes - start
Route::resource('workers', 'WorkerController');
// Route::get('workers','WorkerController@index');
// Route::get('workers/create','WorkersController@create');
// Route::post('workers','WorkersController@store');
// Route::get('workers/{id}','WorkersController@show');
// Route::get('workers/{id}/edit','WorkersController@edit');

// Route::get('/worker', function () {
//     return 'worker - show';
// });

// Route::post('/worker', function () {
//     return 'worker - create';
// });

// Route::put('/worker', function () {
//     return 'worker - edit';
// });

// Route::delete('/worker', function () {
//     return 'worker - destroy';
// });
//  worker routes - end

// department routes - start
Route::resource('departments', 'DepartmentController');
// Route::get('departments','DepartmentController@index');

// Route::post('departments','DepartmentController@create');
// department routes - end