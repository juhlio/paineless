<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;


use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ControleController;
use App\Http\Controllers\Admin\ComercialController;
use App\Http\Controllers\Admin\EstoqueController;
use App\Http\Controllers\Admin\LocacoesController;

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Providers\AuthServiceProvider;
use App\Http\Controllers\CustomAuthController;

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
//grupo Comercial - ID 3
Route::middleware(['auth', 'can:comercial'])->group(function () {


    Route::get('prospeccoes', [ComercialController::class, 'inicioProspecoes'])->name('homeProspecoes');
    Route::get('prospeccao/detalhes/{contato}', [ComercialController::class, 'detalheDaProspeccao'])->name('detalheprospeccao');
    Route::post('prospeccao/detalhes/{contato}', [ComercialController::class, 'insereobsprospect']);
    Route::get('buscadecnpjenviada/{cidade}/{segmento}', [ComercialController::class, 'buscacnpjenviada'])->name('buscacnpjenviada');


    Route::get('prospecta', [ComercialController::class, 'formprospeccao'])->name('telaprospeccao');
    Route::post('prospecta', [ComercialController::class, 'processaprospeccao']);
    Route::get('prospeccaoenviada/{busca}/{email}', [ComercialController::class, 'prospeccaoenviada'])->name('prospeccaoenviada');

    Route::get('buscacnpjs', [ComercialController::class, 'formbuscacnpj'])->name('telabuscacnpj');
    Route::post('buscacnpjs', [ComercialController::class, 'buscaCnpj']);

    Route::get('filtrocnpj', [ComercialController::class, 'telafiltrocnpj'])->name('filtrocnpj');
    Route::post('filtrocnpj', [ComercialController::class, 'processafiltro']);
    Route::get('resultadofiltro/{cidade}/{seg}', [ComercialController::class, 'resultadofiltro'])->name('resultadofiltro');
});


//grupo Sala de Controle - ID2 
Route::middleware(['auth', 'can:salacontrole'])->group(function () {

    Route::get('revisao-cadastro', [ControleController::class, 'revisaoCadastro']);
    Route::post('revisao-cadastro', [ControleController::class, 'novaRevisao']);
    Route::get('clients', [ControleController::class, 'clients']);
    Route::get('client/{client}', [ControleController::class, 'clientdata']);
    Route::get('clientes', [ControleController::class, 'clientes'])->name('clientes');
    Route::get('clientes/detalhes/{client}', [ControleController::class, 'detalhescliente'])->name('detalhecliente');
    Route::get('clientes/altera/{client}', [ControleController::class, 'alteracliente'])->name('alteracliente');
    Route::post('clientes/altera/{client}', [ControleController::class, 'alteracaocliente']);
    Route::get('imagens/alteracao/{id}', [ControleController::class, 'alteracaoimagem'])->name('alteracaoimagem');
    Route::post('imagens/alteracao/{id}', [ControleController::class, 'processaimagem']);
    Route::get('maquinas', [ControleController::class, 'listamaquinas'])->name('listamaquinas');
    Route::get('maquinas/detalhes/{maquina}', [ControleController::class, 'detalhemaquina'])->name('detalhemaquina');
    Route::get('maquinas/alterar/{maquina}', [ControleController::class, 'telaAlteramaquina'])->name('alteramaquina');
    Route::post('maquinas/alterar/{maquina}', [ControleController::class, 'processaAlteracaoMaquina']);
    Route::get('maquinas/monitoramento/{maquina}', [ControleController::class, 'telamonitoramento'])->name('telamonitoramento');
});


Route::get('/', [HomeController::class, 'index'])->name('dashboard');


Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);

Route::get('registro', [RegisterController::class, 'registro'])->name('registro');
Route::post('register', [RegisterController::class, 'criar']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('cidadesibge', [HomeController::class, 'listaCidadesIbge'])->name('listaCidadesIbge');
Route::get('codigoibge/{cidade}', [HomeController::class, 'codigoIbge'])->name('codigoIbge');


Route::get('estoque', [EstoqueController::class, 'index'])->name('homeestoque');
Route::get('estoque/novoproduto', [EstoqueController::class, 'novoProduto'])->name('novoprodutoestoque');
Route::post('estoque/novoproduto', [EstoqueController::class, 'criaProduto']);

Route::get('estoque/detalheproduto/{produto}', [EstoqueController::class, 'detalheProduto'])->name('detalheproduto');
Route::get('estoque/alteraproduto/{produto}', [EstoqueController::class, 'alteraProduto'])->name('alteraproduto');
Route::post('estoque/alteraproduto/{produto}', [EstoqueController::class, 'salvaAlteracaoProduto']);
Route::get('estoque/imagens/alteracao/{id}', [EstoqueController::class, 'alteracaoimagem'])->name('alteracaoimagemproduto');
Route::post('estoque/imagens/alteracao/{id}', [EstoqueController::class, 'processaimagem']);
Route::get('estoque/entradaproduto/{produto}', [EstoqueController::class, 'entradaProduto'])->name('entradaproduto');
Route::post('estoque/entradaproduto/{produto}', [EstoqueController::class, 'processaEntrada']);

Route::get('estoque/saidaproduto/{produto}', [EstoqueController::class, 'saidaProduto'])->name('saidaproduto');
Route::post('estoque/saidaproduto/{produto}', [EstoqueController::class, 'processaSaida']);


Route::get('locacoes', [LocacoesController::class, 'index'])->name('homelocacoes');
Route::get('locacoes/inicio', [LocacoesController::class, 'inicioAtendimento']);

Route::get('locacoes/relatorio/pm1/{id}', [LocacoesController::class, 'relatorioPm1'])->name('relatoriopm1');
Route::post('locacoes/relatorio/pm1/{id}', [LocacoesController::class, 'processaPm1']);
Route::get('locacoes/relatorios', [LocacoesController::class, 'listarelatorios'])->name('relatorioslocacao');
Route::get('locacoes/relatorio/{id}', [LocacoesController::class, 'detalherelatorio'])->name('detalherelatorio');
Route::get('locacoes/relatorio/atendimento/{id}', [LocacoesController::class, 'relatorioAtendimento'])->name('relatorioAtendimento');
Route::post('locacoes/relatorio/atendimento/{id}', [LocacoesController::class, 'processaRelatorioAtendimento']);
Route::get('locacoes/relatorio/atendimento/altera/{id}', [LocacoesController::class, 'alteraAtendimento'])->name('alteraAtendimento');
Route::post('locacoes/relatorio/atendimento/altera/{id}', [LocacoesController::class, 'processaAlteraAtendimento']);
