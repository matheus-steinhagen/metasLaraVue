<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\AuxClassificacaoController;

//ROUTERS DAS METAS
Route::get('/meta',[MetaController::class,'index']); //listagem completa, sem distinções
Route::post('/meta',[MetaController::class,'store']); //inserção de dados no banco
Route::get('/meta/{id}',[MetaController::class,'show']); //puxa infos do BD
Route::put('/meta/{id}',[MetaController::class,'update']); //update infos no BD
Route::delete('/meta/{id}',[MetaController::class,'destroy']); //update infos no BD

//ROUTERS DAS CATEGORIAS
Route::get('/categoria',[CategoriaController::class,'index']); //listagem completa, sem distinções
Route::post('/categoria',[CategoriaController::class,'store']); //inserção de dados no banco

Route::get('/categoria/{rotuloID}',[CategoriaController::class,'show']); //puxa infos do BD
Route::put('/categoria/{rotuloID}',[CategoriaController::class,'update']); //update infos no BD
Route::delete('/categoria/{rotuloID}',[CategoriaController::class,'destroy']); //update infos no BD

//ROUTES DAS CLASSSIFICAÇÕES
Route::get('/meta/categoria/{categoriaID}',[AuxClassificacaoController::class,'index']); //listagem baseada no status
Route::get('/meta/categoria/{categoriaID}/status',[AuxClassificacaoController::class,'index']); //listagem baseada no status
Route::get('/meta/categoria/{categoriaID}/count',[AuxClassificacaoController::class,'count']); //Contagem de inserções

Route::post('/meta/categoria/{categoriaID}',[AuxClassificacaoController::class,'store']);
Route::delete('/meta/categoria/{categoriaID}/{id}',[AuxClassificacaoController::class,'destroy']);