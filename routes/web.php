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
    /**
     * Route ticket
     */
    Route::prefix('ticket')->group(function (){
        Route::get('/', 'TicketController@index')->name('listicket');
        Route::get('create', 'TicketController@create');
        Route::get('detail/{ticket}','TicketController@detail');
        Route::post('actioncreate', 'TicketController@actioncreate');
    });
});

