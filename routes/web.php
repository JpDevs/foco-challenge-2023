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
    return view('system.index');
});

Route::get('/booking/new', function () {
    return view('system.create');
});

Route::get('/booking/new/manual', function () {
    return view('system.manual-create');
});

Route::get('/booking/{id}', function () {
    return view('system.show');
});

Route::get('/booking/{id}/edit', function () {
    return view('system.edit');
});

Route::get('/booking/{id}/edit/xml', function () {
    return view('system.edit-xml');
});
