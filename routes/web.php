<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AplicacaoController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AppController::class, 'index']);

Route::get('/cadastro_frm_login', [AppController::class, 'frmLogin']);
Route::post('/usuario_executar_login', [AppController::class, 'executarLogin']);


Route::get('/usuario_criar_conta', [AppController::class, 'frmCriarConta']);
Route::post('/usuario_executar_criacao_nova_conta', [AppController::class, 'executarCriacaoDeNovaConta']);

Route::get('/aplicacao', [AplicacaoController::class, 'apresentarPaginaInicial']);

Route::get('/aplicacao_buscar_Usuario', [AppController::class, 'buscarUsuario']);

Route::get('/Usuario_logout', [AppController::class, 'logout']);

Route::get('/recuperar_senha', [AppController::class, 'recuperarSenha']);
Route::post('/executar_recuperar_senha', [AppController::class, 'executarRecuperarSenha']);
Route::get('/usuario_email_enviado', [AppController::class, 'emailEnviado']);


// Rota de produto
Route::get('/cadastrar_produto', [App\Http\Controllers\ProdutoController::class, 'create']);
Route::post('/cadastrar_produto', [App\Http\Controllers\ProdutoController::class, 'store']);
Route::get('/deletar_tag/{id}', [App\Http\Controllers\ProdutoController::class, 'destroy']);
Route::get('/atualizar_tag/{id}', [App\Http\Controllers\ProdutoController::class, 'edit']);
Route::post('/atualizar_tag', [App\Http\Controllers\ProdutoController::class, 'update']);


// Rota de tag
Route::get('/cadastrar_tag', [App\Http\Controllers\TagController::class, 'create']);
Route::post('/cadastrar_tag', [App\Http\Controllers\TagController::class, 'store']);
Route::get('/deletar_tag/{id}', [App\Http\Controllers\TagController::class, 'destroy']);
Route::get('/atualizar_tag/{id}', [App\Http\Controllers\TagController::class, 'edit']);
Route::post('/atualizar_tag', [App\Http\Controllers\TagController::class, 'update']);