<?php

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
    return view('layouts.master');
});

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');

// Route::Resource('administrador/companias', 'CompaniasController');

Route::get('/clientes', function () {
    return view('layouts.master');
});

Route::get('/administracion/companias', function () {
    return view('layouts.master');
});

Route::get('/administracion/organizadores', function () {
    return view('layouts.master');
});

Route::get('/administracion/productores', function () {
    return view('layouts.master');
});


// Route::get('administracion/companias/edit', function () {
//     return view('layouts.master');
// });


