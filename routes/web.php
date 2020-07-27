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
    return view('auth/login');
});

Auth::routes();

/**
 * Route Grouping must be authenticated
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/ticket', 'TicketController@index')->name('listicket');
    Route::get('/ticket/create', 'TicketController@create');
    Route::post('ticket/actioncreate', 'TicketController@actioncreate');
});

