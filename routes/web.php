<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\EsqueciSenhaController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\PagamentoController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\UsuarioController;

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::prefix('usuario')->group(function () {
    Route::get('/registro', [UsuarioController::class, 'registro'])->name('usuario.registro');
    Route::get('/registro/planos', [UsuarioController::class, 'planos'])->name('usuario.registro.planos');
    Route::post('/registro/auth', [UsuarioController::class, 'login'])->name('usuario.login');
    Route::post("/registro/criarusuario", [UsuarioController::class, 'criarUsuario'])->name('usuario.criarusuario');
    Route::post("/usuario/atualizarsenha", [UsuarioController::class, 'atualizarSenha'])->name('usuario.atualizarsenha');
});

Route::prefix('pagamento')->group(function () {
   Route::post('/checkout/{price_id}/{plan_id}', [PagamentoController::class, 'checkout'])
       ->middleware('auth')->name('pagamento.checkout');
});

Route::prefix('esquecisenha')->group(function () {
   Route::get('/', [EsquecisenhaController::class, 'index'])->name('esquecisenha');
   Route::get('/esquecisenha/confirmacao', [EsquecisenhaController::class, 'confirmacao'])->name('esquecisenha.confirmacao');
   Route::post('/esquecisenha/enviaremail', [EsquecisenhaController::class, 'enviarEmail'])->name('esquecisenha.enviaremail');
});

Route::get('/home', function () {
    return redirect()->route('login');
})->name('home');

Route::post('/stripe/webhook', [\App\Http\Controllers\WebHookController::class, 'handleWebhook']);

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('/leads')->middleware('auth')->group(function () {
    Route::get('/', [LeadsController::class, 'index'])->name('leads');
    Route::get('/cadastro', [LeadsController::class, 'cadastro'])->name('leads.cadastro');
    Route::post('/cadastrar', [LeadsController::class, 'cadastrarLead'])->name('leads.cadastrarlead');
    Route::post('/mover', [LeadsController::class, 'mover'])->name('leads.mover');
});

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    return 'cache limpo';
});

Route::prefix('/empresas')->middleware('auth')->group(function () {
   Route::get('/', [EmpresasController::class, 'index'])->name('empresas');
   Route::post('/criarempresa', [EmpresasController::class, 'criarEmpresa'])->name('empresas.criarempresa');
   Route::post('/criarempresa', [EmpresasController::class, 'criarEmpresa'])->name('empresas.criarempresa');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
