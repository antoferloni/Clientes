<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

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
/*Route::get('/cliente', function () {
    return view('cliente.index');
});
Route::get('cliente/create',[ClienteController::class,'create']);*/

//Route::resource('cliente', ClienteController::class);
Route::get("cliente",[ClienteController::class,"index"])->name("cliente.index");
//ruta para agregar nuevo usuario
Route::post("/registrar-cliente",[ClienteController::class,"create"])->name("cliente.create");
//ruta para modificar usuario
Route::post("/modificar-cliente",[ClienteController::class,"update"])->name("cliente.update");
//ruta para eliminar usuario
Route::get("/eliminar-cliente-{id}",[ClienteController::class,"destroy"])->name("cliente.destroy");
