<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\parserController;
use App\Http\Controllers\HomeController;

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

Route::get(
    '/',
    [HomeController::class, 'ShowAllNews']
)->name('home');

Route::get(
    '/{alias}',
    [HomeController::class, 'ShowItemNews']
)->name('aliase-data-item');

Route::post(
    '/parse',
    [parserController::class, 'parserNews']
)->name('pars-controller');