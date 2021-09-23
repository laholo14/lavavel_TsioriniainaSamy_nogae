<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitComtroller;
use App\Http\Controllers\UserController;
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


Route::get('/',[ProduitComtroller::class,'read'])->name("list_produit");
Route::get('/details/{id}',[ProduitComtroller::class,'details'])->name("details")->whereNumber('id');

Route::post('/clientCreate',[ClientController::class,'create'])->name('C_create');

Route::post('/log',[UserController::class,'login'])->name('login_user');

Route::get('/admin',[UserController::class,'index_login']);
Route::get('/Home',[UserController::class,'index'])->name('index_admin');
Route::get('/userId/{id}',[UserController::class,'readById'])->name('U_id')->whereNumber('id');
Route::get('/userDelete/{id}',[UserController::class,'delete'])->name('U_delete')->whereNumber('id');
Route::post('/userCreate',[UserController::class,'create'])->name('U_create');
Route::post('/userUpdate',[UserController::class,'update'])->name('U_update');


Route::get('/Produit',[ProduitComtroller::class,'index'])->name('produit_admin');
Route::get('poduitId/{id}',[ProduitComtroller::class,'readById'])->name('P_id')->whereNumber('id');
Route::get('poduitDelete/{id}',[ProduitComtroller::class,'delete'])->name('P_delete')->whereNumber('id');
Route::post('/produitCreate',[ProduitComtroller::class,'create'])->name('P_create');
Route::post('/produitUpdate',[ProduitComtroller::class,'update'])->name('P_update');

Route::get('/Commande',[CommandeController::class,'read'])->name('commande_admin');
Route::get('/acheter/{id_c}/{id_p}/{qte}',[CommandeController::class,'acheter_panier'])->name('Acheter');
