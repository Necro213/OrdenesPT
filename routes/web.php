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
    return view('welcome');
});

Route::post('/dologin',[
   "uses" => "WebController@login"
]);

Route::post('/alta/cliente',[
    'uses' => 'WebController@altaCliente'
]);

Route::get('/getclientes',[
    'uses' => 'WebController@getClientes'
]);

Route::get('/getcliente/{id}',[
    'uses' => 'WebController@getCliente'
]);

Route::post('/edit/cliente/{id}',[
    'uses' => 'WebController@editCliente'
]);

Route::post('/delete/cliente/{id}',[
    'uses' => 'WebController@deleteCliente'
]);

//empleado
Route::post('/alta/empleado',[
    'uses' => 'WebController@altaEmpleado'
]);

Route::get('/getempleados',[
    'uses' => 'WebController@getEmpleados'
]);

Route::get('/getempleado/{id}',[
    'uses' => 'WebController@getEmpleado'
]);

Route::post('/edit/empleado/{id}',[
    'uses' => 'WebController@editEmpleado'
]);

Route::post('/delete/empleado/{id}',[
    'uses' => 'WebController@deleteEmpleado'
]);

//Ordenes
Route::post('/alta/orden',[
    'uses' => 'WebController@altaOrden'
]);

Route::get('/getordenes',[
    'uses' => 'WebController@getOrdenes'
]);

Route::get('/gettipos',[
    'uses' => 'WebController@getTipos'
]);

Route::get('/getorden/{id}',[
    'uses' => 'WebController@getOrden'
]);

Route::post('/edit/orden/{id}',[
    'uses' => 'WebController@editOrden'
]);

Route::post('/delete/orden/{id}',[
    'uses' => 'WebController@deleteOrden'
]);

Route::get('/getordenes/empleado/{id}',[
    'uses' => 'WebController@getOrdenesEmpleado'
]);

Route::post('/setorden/{id}',[
    'uses' => 'WebController@checkOrden'
]);

Route::post('/cerrar/{id}',[
    'uses' => 'WebController@cerrar'
]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
