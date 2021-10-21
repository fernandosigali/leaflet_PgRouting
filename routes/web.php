<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;

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
Route::get('patio', [MapController::class, 'show_p']);

Route::get('patio/get_data_vias', [MapController::class, 'get_data_vias']);

Route::get('patio/get_data_caminhos', [MapController::class, 'get_data_caminhos']);

Route::get('patio/get_rota/{a}', [MapController::class, 'get_rota']);