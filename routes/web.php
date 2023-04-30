<?php

use App\Http\Controllers\admin\Category;
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

Route::group(['middleware' => ['XSS']], function () {
    Route::get('/admin', 'App\Http\Controllers\Login@index');
    Route::get('/', 'App\Http\Controllers\Frontend@index');
    Route::get('/thank-you/{title}', 'App\Http\Controllers\Frontend@thank_you');
    Route::get('/login-api', 'App\Http\Controllers\Login@message')->name("login");
    Route::post('/submit-login', 'App\Http\Controllers\Login@loginCheck');
    Route::get('/sign-out', 'App\Http\Controllers\Login@signOut');
    
    Route::post('/CheckRegister', 'App\Http\Controllers\Frontend@CheckRegister');
    // Evevnt
    
    Route::get('/events', 'App\Http\Controllers\Frontend@event');
    Route::get('/Club-Details/{id}', 'App\Http\Controllers\Frontend@Club_Details');
    Route::get('/Event-Details/{id}', 'App\Http\Controllers\Frontend@Event_Details');
    Route::post('/register-event', 'App\Http\Controllers\Frontend@register_event');
    
    // Club
    
    Route::get('/club', 'App\Http\Controllers\Frontend@club');
    Route::post('/register-club', 'App\Http\Controllers\Frontend@register_club');

    // mep
    Route::get('/map', 'App\Http\Controllers\Frontend@map');
    

    Route::group(['prefix' => '/admin', 'middleware' => 'adminSession'], function () {
        Route::get('/dashboard', 'App\Http\Controllers\admin\Dashboard@dashboard');

        /* *Events routes */
        Route::get('/events-report', "App\Http\Controllers\admin\Event@report");
        Route::get('/create-event', "App\Http\Controllers\admin\Event@index");
        Route::post('/save-event', "App\Http\Controllers\admin\Event@insert");
        Route::get('/event-edit/{id}', "App\Http\Controllers\admin\Event@edit");
        Route::get('/event-delete/{id}', "App\Http\Controllers\admin\Event@delete");
        Route::post('/update-event/{id}', "App\Http\Controllers\admin\Event@update");
        Route::get('/event-register-report', "App\Http\Controllers\admin\Event@RegisterReport");

        /* *Club routes */
        Route::get('/club-report', "App\Http\Controllers\admin\Club@report");
        Route::get('/create-club', "App\Http\Controllers\admin\Club@index");
        Route::post('/save-club', "App\Http\Controllers\admin\Club@insert");
        Route::get('/club-edit/{id}', "App\Http\Controllers\admin\Club@edit");
        Route::get('/club-delete/{id}', "App\Http\Controllers\admin\Club@delete");
        Route::post('/update-club/{id}', "App\Http\Controllers\admin\Club@update");
    });
});
