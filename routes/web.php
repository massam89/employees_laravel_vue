<?php

use App\Http\Controllers\Backend\changePasswordController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\StateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CityController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::resource('countries', CountryController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('states', StateController::class);
Route::resource('cities', CityController::class);

Route::post('/users/{user}/change-password', [changePasswordController::class, 'change_password'])->name('users.change.passoword');

Route::get('{any}', function(){
    return view('employees.index');
})->where('any', '.*');