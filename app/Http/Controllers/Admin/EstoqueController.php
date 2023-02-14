<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Imagemproduto;
use App\Models\Entrada;
use App\Models\Saida;
use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth'); 

    }


    public function index()
    {
        $produtos = Produto::select()
            ->get();


        return view('Estoque.home',[
            'produtos' => $produtos
        ]);
    }

    public function novoProduto()
    {
        return view('Estoque.novoproduto');
    }

    public function criaProduto()
    {
        $descricao = filter_input(INPUT_POST, 'descricao');
        $fabricante = filter_input(INPUT_POST, 'fabricante');
        $tipo = filter_input(INPUT_POST, 'tipo');
        $codFabricante = filter_input(INPUT_POST, 'codFabricante');
        $codEan = filter_input(INPUT_POST, 'codEan');
        $ncm = filter_input(INPUT_POST, 'ncm');
        $unidadeMedida = filter_input(INPUT_POST, 'unidadeMedida');
        $localizacao = filter_input(INPUT_POST, 'localizacao');

        $produto = new Produto();
        $produto->descricao = $descricao;
        $produto->fabricante = $fabricante;
        $produto->tipo = $tipo;
        $produto->codFabricante = $codFabricante;
        $produto->codEan = $codEan;
        $produto->ncm = $ncm;
        $produto->unidadeMedida = $unidadeMedida;
        $produto->localizacao = $localizacao;
        $produto->save();

        $criado = Produto::select()
            ->orderBy('created_at', 'desc')
            ->first();

        if ($_FILES['foto']['name']) {


            $foto = new ImagemProduto();
            $nomefotocapa = $criado->id . '_produto_'  . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/products/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['foto']['tmp_name'], $nomefotocapacompleto);

            $foto->idProduto = $criado->id;
            $foto->url = $nomefotocapa;
            $foto->save();
        };

        return redirect()->route('detalheproduto', $criado->id)->with('success', 'Atualizado.');
    }

    public function detalheProduto($id)
    {


        $produto = Produto::select()
            ->where('id', $id)
            ->first();

        $entradas = Entrada::select()
            ->where('idConsumiveis', $id)
            ->sum('quantidade');

        $saidas = Saida::select()
            ->where('idConsumiveis', $id)
            ->sum('quantidade');

        $total = $entradas - $saidas;

        $entradasNovos = Entrada::select()
            ->where('idConsumiveis', $id)
            ->where('novo', '1')
            ->sum('quantidade');


        $saidasNovos = Saida::select()
            ->where('idConsumiveis', $id)
            ->where('estado', '1')
            ->sum('quantidade');

        $totalNovos = $entradasNovos - $saidasNovos;

        $entradasUsados = Entrada::select()
            ->where('idConsumiveis', $id)
            ->where('novo', '0')
            ->sum('quantidade');

        $saidasUsados = Saida::select()
            ->where('idConsumiveis', $id)
            ->where('estado', '0')
            ->sum('quantidade');

        $totalUsados = $entradasUsados - $saidasUsados;

        $detalhesEntradas = Entrada::select()
            ->where('idConsumiveis', $id)
            ->get();

        $detalhesSaidas = Saida::select()
            ->where('idConsumiveis', $id)
            ->get();

        $foto = ImagemProduto::select()
            ->where('idProduto', $id)
            ->first();



        return view('Estoque.detalheproduto', [
            'produto' => $produto,
            'foto' => $foto,
            'total' => $total,
            'totalNovos' => $totalNovos,
            'totalUsados' => $totalUsados,
            'detalhesEntradas' => $detalhesEntradas,
            'detalhesSaidas' => $detalhesSaidas,
            'id' => $id,

        ]);
    }

    public function alteraProduto($id)
    {

        $produto = Produto::select()
            ->where('id', $id)
            ->first();

        return view(
            'Estoque.alteraproduto',
            ['produto' => $produto]
        );
    }

    public function salvaAlteracaoProduto($id)
    {

        $produto = Produto::select()
            ->where('id', $id)
            ->first();

        $descricao = filter_input(INPUT_POST, 'descricao');
        $fabricante = filter_input(INPUT_POST, 'fabricante');
        $tipo = filter_input(INPUT_POST, 'tipo');
        $codFabricante = filter_input(INPUT_POST, 'codFabricante');
        $codEan = filter_input(INPUT_POST, 'codEan');
        $ncm = filter_input(INPUT_POST, 'ncm');
        $unidadeMedida = filter_input(INPUT_POST, 'unidadeMedida');
        $localizacao = filter_input(INPUT_POST, 'localizacao');

        $produto->descricao = $descricao;
        $produto->fabricante = $fabricante;
        $produto->tipo = $tipo;
        $produto->codFabricante = $codFabricante;
        $produto->codEan = $codEan;
        $produto->ncm = $ncm;
        $produto->unidadeMedida = $unidadeMedida;
        $produto->localizacao = $localizacao;
        $produto->save();

        return redirect()->route('detalheproduto', $id)->with('success', 'Atualizado.');
    }

    public function alteracaoimagem($id)
    {

        return view('Estoque.alteraimagem');
    }

    public function processaimagem($id)
    {
        $image = Imagemproduto::select()->where('id', $id)->first();

        $nomefotocapa = $image->idProduto . '_produto_'  . date('dmYHis') . '.jpeg';
        $diretorio = "assets/images/products/";
        $nomefotocapacompleto = $diretorio . $nomefotocapa;
        move_uploaded_file($_FILES['foto']['tmp_name'], $nomefotocapacompleto);

        $image->url =  $nomefotocapa;
        $image->save();

        return redirect()->route('detalheproduto', $image->idProduto)->with('success', 'Atualizado.');
    }

    public function entradaProduto($id)
    {

        $produto = Produto::select()
            ->where('id', $id)
            ->first();

        return view('Estoque.entradaproduto', [
            'produto' => $produto,
        ]);
    }

    public function processaEntrada($id)
    {

        if (filter_input(INPUT_POST, 'estadoProduto') === "Novo") {
            $novo = 1;
        } else {
            $novo = 0;
        }

        if (filter_input(INPUT_POST, 'tipoEntrada') === "Compra") {
            $tipoEntrada = 1;
        } else if (filter_input(INPUT_POST, 'tipoEntrada') === "Devolução") {
            $tipoEntrada = 2;
        } else if (filter_input(INPUT_POST, 'tipoEntrada') === "Retorno de Obra") {
            $tipoEntrada = 3;
        }


        $idConsumiveis = $id;
        $cliente = filter_input(INPUT_POST, 'cliente');
        $nf = filter_input(INPUT_POST, 'nf');
        $custo = filter_input(INPUT_POST, 'custo');
        $quantidade = filter_input(INPUT_POST, 'quantidade');
        $data = filter_input(INPUT_POST, 'datetimepicker');

        $custo =   str_replace(",", ".", $custo);

        $entrada = new Entrada();
        $entrada->idConsumiveis = $idConsumiveis;
        $entrada->fornecedor = $cliente;
        $entrada->nf = $nf;
        $entrada->novo = $novo;
        $entrada->tipoEntrada = $tipoEntrada;
        $entrada->custo = $custo;
        $entrada->quantidade = $quantidade;
        $entrada->data = $data;
        $entrada->save();
        //echo $data;

        return redirect()->route('detalheproduto', $id)->with('success', 'Atualizado.');
    }

    public function saidaProduto($id)
    {

        $produto = Produto::select()
            ->where('id', $id)
            ->first();

        return view('Estoque.saidaproduto', [
            'produto' => $produto,
        ]);
    }

    public function processaSaida($id)
    {
        if (filter_input(INPUT_POST, 'estadoProduto') === "Novo") {
            $novo = 1;
        } else {
            $novo = 0;
        }



        $idConsumiveis = $id;
        $quantidade = filter_input(INPUT_POST, 'quantidade');
        $data = filter_input(INPUT_POST, 'datetimepicker');
        $cliente = filter_input(INPUT_POST, 'cliente');
        $solicitante = filter_input(INPUT_POST, 'solicitante');




        $saida = new Saida();
        $saida->idConsumiveis = $idConsumiveis;
        $saida->quantidade = $quantidade;
        $saida->estado = $novo;
        $saida->data = $data;
        $saida->cliente = $cliente;
        $saida->solicitante = $solicitante;
        $saida->save();

        return redirect()->route('detalheproduto', $id)->with('success', 'Atualizado.');
    }
}
