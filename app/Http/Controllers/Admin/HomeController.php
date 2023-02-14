<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Revision;
use App\Models\Client;
use App\Models\ImageRevision;
use App\Models\Genset;
use App\Models\Image;
use App\Models\Allexoequipdata;
use App\Models\Municipio;
use App\Models\Prospecto;
use App\Models\Obsprospecto;
use Illuminate\Support\Facades\Http;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth'); 

    }


    public function index()
    {
        return view('Admin.home');
    }

    public function revisaoCadastro()
    {
        return view('Admin.revisao');
    }

    public function novaRevisao(Request $request)
    {
        $idCliente = filter_input(INPUT_POST, 'id_cliente');
        $tipoEquipamento = filter_input(INPUT_POST, 'tipoEquipamento');
        $identificacao = filter_input(INPUT_POST, 'identificacao');
        $fabricante = filter_input(INPUT_POST, 'fabricante');
        $numeroSerie = filter_input(INPUT_POST, 'numeroSerie');
        $dataFabricacao = filter_input(INPUT_POST, 'dataFabricacao');
        $potencia = filter_input(INPUT_POST, 'potencia');
        $abrangencia = filter_input(INPUT_POST, 'abrangencia');
        $tanqueBase = filter_input(INPUT_POST, 'tanqueBase');
        $aberturaJanelaBase = filter_input(INPUT_POST, 'aberturaJanelaBase');
        $capacidadeTanqueBase = filter_input(INPUT_POST, 'capacidadeTanqueBase');
        $tanqueDiario = filter_input(INPUT_POST, 'tanqueDiario');
        $aberturaJanelaDiario = filter_input(INPUT_POST, 'aberturaJanelaDiario');
        $capacidadeTanqueDiario = filter_input(INPUT_POST, 'capacidadeTanqueDiario');
        $tanqueMensal = filter_input(INPUT_POST, 'tanqueMensal');
        $aberturaJanelaMensal = filter_input(INPUT_POST, 'aberturaJanelaMensal');
        $capacidadeTanqueMensal = filter_input(INPUT_POST, 'capacidadeTanqueMensal');
        $fabricanteMotor = filter_input(INPUT_POST, 'fabricanteMotor');
        $modeloMotor = filter_input(INPUT_POST, 'modeloMotor');
        $serieMotor = filter_input(INPUT_POST, 'serieMotor');
        $quantidadeOleoLubrificante = filter_input(INPUT_POST, 'quantidadeOleoLubrificante');
        $modeloFiltroCombustivel = filter_input(INPUT_POST, 'modeloFiltroCombustivel');
        $quantidadeFiltroCombustivel = filter_input(INPUT_POST, 'quantidadeFiltroCombustivel');
        $modeloFiltroSeparador = filter_input(INPUT_POST, 'modeloFiltroSeparador');
        $quantidadeFiltroSeparador = filter_input(INPUT_POST, 'quantidadeFiltroSeparador');
        $modeloFiltroAgua = filter_input(INPUT_POST, 'modeloFiltroAgua');
        $quantidadeFiltroAgua = filter_input(INPUT_POST, 'quantidadeFiltroAgua');
        $modeloFiltroOleo = filter_input(INPUT_POST, 'modeloFiltroOleo');
        $quantidadeFiltroOleo = filter_input(INPUT_POST, 'quantidadeFiltroOleo');
        $modeloFiltroAr = filter_input(INPUT_POST, 'modeloFiltroAr');
        $quantidadeFiltroAr = filter_input(INPUT_POST, 'quantidadeFiltroAr');
        $fabricanteAlternador = filter_input(INPUT_POST, 'fabricanteAlternador');
        $modeloAlternador = filter_input(INPUT_POST, 'modeloAlternador');
        $serieAlternador = filter_input(INPUT_POST, 'serieAlternador');
        $fabricanteModuloGrupo = filter_input(INPUT_POST, 'fabricanteModuloGrupo');
        $modeloModuloGrupo = filter_input(INPUT_POST, 'modeloModuloGrupo');
        $fabricanteModuloQta = filter_input(INPUT_POST, 'fabricanteModuloQta');
        $modeloModuloQta = filter_input(INPUT_POST, 'modeloModuloQta');
        $fabricanteChaveGrupo = filter_input(INPUT_POST, 'fabricanteChaveGrupo');
        $modeloChaveGrupo = filter_input(INPUT_POST, 'modeloChaveGrupo');
        $fabricanteChaveRede = filter_input(INPUT_POST, 'fabricanteChaveRede');
        $modeloChaveRede = filter_input(INPUT_POST, 'modeloChaveRede');

        $gmg = Genset::select()->where('numeroSerie', $numeroSerie)->first();

        if ($gmg === null) {

            $new_post = [
                'idCliente' => $idCliente,
                'tipoEquipamento'  => $tipoEquipamento,
                'identificacao'  => $identificacao,
                'fabricante'  => $fabricante,
                'numeroSerie'  => $numeroSerie,
                'dataFabricacao'  => $dataFabricacao,
                'potencia'  => $potencia,
                'abrangencia'  => $abrangencia,
                'tanqueBase'  => $tanqueBase,
                'aberturaJanelaBase'  => $aberturaJanelaBase,
                'capacidadeTanqueBase'  => $capacidadeTanqueBase,
                'tanqueDiario'  => $tanqueDiario,
                'aberturaJanelaDiario' => $aberturaJanelaDiario,
                'capacidadeTanqueDiario' => $capacidadeTanqueDiario,
                'tanqueMensal' => $tanqueMensal,
                'aberturaJanelaMensal' => $aberturaJanelaMensal,
                'capacidadeTanqueMensal' => $capacidadeTanqueMensal,
                'fabricanteMotor' => $fabricanteMotor,
                'modeloMotor' => $modeloMotor,
                'serieMotor' => $serieMotor,
                'quantidadeOleoLubrificante' => $quantidadeOleoLubrificante,
                'modeloFiltroCombustivel' => $modeloFiltroCombustivel,
                'quantidadeFiltroCombustivel' => $quantidadeFiltroCombustivel,
                'modeloFiltroSeparador' => $modeloFiltroSeparador,
                'quantidadeFiltroSeparador' => $quantidadeFiltroSeparador,
                'modeloFiltroAgua' => $modeloFiltroAgua,
                'quantidadeFiltroAgua' => $quantidadeFiltroAgua,
                'modeloFiltroOleo' => $modeloFiltroOleo,
                'quantidadeFiltroOleo' => $quantidadeFiltroOleo,
                'modeloFiltroAr' => $modeloFiltroAr,
                'quantidadeFiltroAr' => $quantidadeFiltroAr,
                'fabricanteAlternador' => $fabricanteAlternador,
                'modeloAlternador' => $modeloAlternador,
                'serieAlternador' => $serieAlternador,
                'fabricanteModuloGrupo' => $fabricanteModuloGrupo,
                'modeloModuloGrupo' => $modeloModuloGrupo,
                'fabricanteModuloQta' => $fabricanteModuloQta,
                'modeloModuloQta' => $modeloModuloQta,
                'fabricanteChaveGrupo' => $fabricanteChaveGrupo,
                'modeloChaveGrupo' => $modeloChaveGrupo,
                'fabricanteChaveRede' => $fabricanteChaveRede,
                'modeloChaveRede' => $modeloChaveRede,

            ];

            $post = new Genset($new_post);
            $post->save();

            $gmg = Genset::select()->orderby('id', 'desc')->first();

            //cria posicao imagens
            $posicoes = array(
                'geralGmg',
                'fabricante',
                'serie',
                'dataFabricacao',
                'potencia',
                'tanqueBase',
                'tanqueDiario',
                'tanqueMensal',
                'plaquetaMotor',
                'filtroCombustivel',
                'filtroSeparador',
                'filtroAgua',
                'filtroOleo',
                'filtroAr',
                'plaquetaAlternador',
                'frontalModuloGrupo',
                'traseiraModuloGrupo',
                'frontalModuloQta',
                'traseiraModuloQta',
                'frontalChaveGrupo',
                'frontalChaveRede',
                'cabinadoOuSala',
                'pisoParedes',
                'geradorPortaAberta',
                'preAquecimento',
                'escapamento',
                'qtaFechado',
                'qtaAberto',
                'contencao',
                'faixada',
            );

            foreach ($posicoes as $posicao) {
                $image = new Image();
                $image->idGmg = $gmg->id;
                $image->posicao = $posicao;
                $image->save();
            };
        } else {
            $idGmg = $gmg->id;

            echo "GERADOR JA EXISTE - use a tela de alteração";
        }


        return redirect()->route('detalhecliente', $idCliente)->with('success', 'Atualizado.');


        /* 
        if ($_FILES['fotoGeralGmg']['name']) {
            $posicao = '_geralGMG_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoGeralGmg']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoFabricante']['name']) {
            $posicao = '_fabricante_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoFabricante']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }


        if ($_FILES['fotoNumeroSerie']['name']) {
            $posicao = '_serie_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoNumeroSerie']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoDataFabricacao']['name']) {
            $posicao = '_fabricacao_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoDataFabricacao']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoPotencia']['name']) {
            $posicao = '_potencia_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoPotencia']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }


        if ($_FILES['fotoTanqueBase']['name']) {
            $posicao = '_tanqueBase_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoTanqueBase']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoTanqueDiario']['name']) {
            $posicao = '_tanqueDiario_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoTanqueDiario']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoTanqueMensal']['name']) {
            $posicao = '_tanqueMensal_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoTanqueMensal']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoPlaquetaMotor']['name']) {
            $posicao = '_plaquetaMotor_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoPlaquetaMotor']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoFiltroCombustivel']['name']) {
            $posicao = '_filtroCombustivel_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoFiltroCombustivel']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoFiltroSeparador']['name']) {
            $posicao = '_filtroSeparador_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoFiltroSeparador']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoFiltroAgua']['name']) {
            $posicao = '_filtroAgua_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoFiltroAgua']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoFiltroOleo']['name']) {
            $posicao = '_filtroOleo_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoFiltroOleo']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }


        if ($_FILES['fotoFiltroAr']['name']) {
            $posicao = '_filtroAr_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoFiltroAr']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoPlaquetaAlternador']['name']) {
            $posicao = '_plaquetaAlternador_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoPlaquetaAlternador']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoFrontalModuloGrupo']['name']) {
            $posicao = '_frontalModuloGrupo_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoFrontalModuloGrupo']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoTraseiraModuloGrupo']['name']) {
            $posicao = '_traseiraModuloGrupo_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoTraseiraModuloGrupo']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }


        if ($_FILES['fotoFrontalModuloQta']['name']) {
            $posicao = '_frontalModuloQta_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoFrontalModuloQta']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoTraseiraModuloQta']['name']) {
            $posicao = '_traseiraModuloQta_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoTraseiraModuloQta']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoFrontalChaveGrupo']['name']) {
            $posicao = '_frontalChaveGrupo_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoFrontalChaveGrupo']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoFrontalChaveRede']['name']) {
            $posicao = '_frontalChaveRede_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoFrontalChaveRede']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }


        if ($_FILES['fotoCabinadoOuSala']['name']) {
            $posicao = '_cabinadoSala_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoCabinadoOuSala']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }


        if ($_FILES['fotoPisoParedes']['name']) {
            $posicao = '_pisoParedes_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoPisoParedes']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }


        if ($_FILES['fotoGeradorPortaAberta']['name']) {
            $posicao = '_geradorPortaAberta_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoGeradorPortaAberta']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoPreAquecimento']['name']) {
            $posicao = '_preAquecimanto_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoPreAquecimento']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }


        if ($_FILES['fotoEscapamento']['name']) {
            $posicao = '_escapamento_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoEscapamento']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }


        if ($_FILES['fotoQtaFechado']['name']) {
            $posicao = '_qtaFechado_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoQtaFechado']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }


        if ($_FILES['fotoQtaAberto']['name']) {
            $posicao = '_qtaAberto_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoQtaAberto']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }


        if ($_FILES['fotoContencao']['name']) {
            $posicao = '_contencao_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoContencao']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        }

        if ($_FILES['fotoFaixada']['name']) {
            $posicao = '_faixada_';
            $nomefotocapa = $idCliente . $posicao . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/clients/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoFaixada']['tmp_name'], $nomefotocapacompleto);



            $image = new Image();
            $image->idCliente = $idCliente;
            $image->posicao = $posicao;
            $image->url =  $nomefotocapa;
            $image->save();
        } else {
            $nomefotocapa = null;
        } */
    }

    public function clients()
    {

        $clients = new Client();

        $client = $clients->all();

        foreach ($client as $row) {
            $data[] = array(

                'name'   => $row["nome"],

            );
        }




        echo json_encode($data);
    }

    public function clientdata(Request $r)
    {

        $client = Client::select()
            ->where('nome', $r->client)
            ->first();

        $data = array(

            'id'   => $client["id"],

        );


        echo json_encode($data);
    }

    public function clientes()
    {

        $clientes =  Client::select()
            ->orderByRaw('created_at DESC')
            ->get();
        return view('Admin.clientes', ['clientes' => $clientes]);
    }

    public function detalhescliente($id)
    {

        $cliente = Client::select()
            ->where('id', $id)
            ->first();

        $maquinas = Genset::select()
            ->where('idCLiente', $id)
            ->get(); {
            return view(
                'Admin.detalhecliente',
                [
                    'cliente' => $cliente,
                    'maquinas' => $maquinas
                ]
            );
        }
    }
    public function alteracliente($id)
    {

        $cliente = Client::select()
            ->where('id', $id)
            ->first(); {
            return view(
                'Admin.alteracliente',
                ['cliente' => $cliente]
            );
        }
    }

    public function alteracaocliente($id)
    {
        $nome = filter_input(INPUT_POST, 'nome');
        $endereco = filter_input(INPUT_POST, 'endereco');
        $cep = filter_input(INPUT_POST, 'cep');
        $estado = filter_input(INPUT_POST, 'estado');
        $regiao = filter_input(INPUT_POST, 'regiao');
        $cnpj = filter_input(INPUT_POST, 'cnpj');
        $ie = filter_input(INPUT_POST, 'ie');
        $tipoContrato = filter_input(INPUT_POST, 'tipoContrato');
        $periodicidade = filter_input(INPUT_POST, 'periodicidade');
        $visitas = filter_input(INPUT_POST, 'visitas');
        $sla = filter_input(INPUT_POST, 'sla');
        $observacao = filter_input(INPUT_POST, 'observacao');
        $vendedor = filter_input(INPUT_POST, 'vendedor');
        $tecnico = filter_input(INPUT_POST, 'tecnico');

        $cliente = Client::select()
            ->where('id', $id)
            ->first();

        $cliente->nome = $nome;
        $cliente->endereco = $endereco;
        $cliente->cep = $cep;
        $cliente->estado = $estado;
        $cliente->regiao = $regiao;
        $cliente->cnpj = $cnpj;
        $cliente->ie = $ie;
        $cliente->tipoContrato = $tipoContrato;
        $cliente->periodicidade = $periodicidade;
        $cliente->visitas = $visitas;
        $cliente->sla = $sla;
        $cliente->observacao = $observacao;
        $cliente->vendedor = $vendedor;
        $cliente->tecnico = $tecnico;
        $cliente->save();

        return redirect()->route('detalhecliente', $id)->with('success', 'Atualizado.');
    }

    public function detalhemaquina($id)
    {

        $gmg = Genset::select()
            ->where('id', $id)
            ->first();

        $images = Image::select()
            ->where('idGmg', $id)
            ->get();


        return view('Admin.detalhemaquina', [
            'dados' =>  $gmg,
            'imagens' => $images
        ]);
    }

    public function alteracaoimagem($id)
    {

        return view('Admin.alteraimagem');
    }

    public function processaimagem($id)
    {
        $image = Image::select()->where('id', $id)->first();

        $nomefotocapa = $image->idGmg . '_' . $image->posicao . '_' . date('dmYHis') . '.jpeg';
        $diretorio = "assets/images/clients/";
        $nomefotocapacompleto = $diretorio . $nomefotocapa;
        move_uploaded_file($_FILES['foto']['tmp_name'], $nomefotocapacompleto);

        $image->url =  $nomefotocapa;
        $image->save();

        return redirect()->route('detalhemaquina', $image->idGmg)->with('success', 'Atualizado.');
    }

    public function listamaquinas()
    {

        $maquinas =  Genset::select('gensets.*', 'clients.nome')
            ->join('clients', 'gensets.idCliente', '=', 'clients.id')
            ->orderByRaw('gensets.created_at DESC')
            ->get();
        return view('Admin.maquinas', ['maquinas' => $maquinas]);
    }


    public function telaMonitoramento($id)
    {

        $dados = Allexoequipdata::select('allexoequipdatas.*', 'allexoequipvars.name')
            ->join('allexoequipvars', 'allexoequipdatas.symbol', '=', 'allexoequipvars.symbol')
            ->where('allexoequipdatas.idEquip', $id)
            ->get();

        return view(
            'Admin.telamonitoramento',
            ['dados' => $dados]
        );
    }


    public function formprospeccao()
    {

        return view('Admin.telaprospeccao');
    }

    public function prospeccaoenviada($busca, $email)
    {

        return view('Admin.prospeccaoenviada', [
            'busca' => $busca,
            'email' => $email
        ]);
    }


    public function processaprospeccao()
    {
        $busca = filter_input(INPUT_POST, 'busca');
        $email = filter_input(INPUT_POST, 'email');



        $response = Http::get(
            'http://apiessencial.com.br/prospecta',
            //'http://localhost:456/',
            [
                'busca' => $busca,
                'email' => $email,
            ]
        );

        return redirect()->route(
            'prospeccaoenviada',
            [
                'busca' => $busca,
                'email' => $email,
            ]
        );
    }

    public function formbuscacnpj()
    {

        return view('Admin.telabuscacnpj');
    }

    public function listaCidadesIbge()
    {

        $municipios = Municipio::select('nome', 'ufSigla', 'id')->get();

        foreach ($municipios as $row) {
            $data[] = array(

                'name'   => $row["nome"] . ' - ' . $row['ufSigla'] . ' | ' . $row['id'],


            );
        }

        echo json_encode($data);
    }
    public function codigoIbge($cidade)
    {

        $cidade = Municipio::select('id')->where('nome', $cidade)->first();

        $cidade = array(

            'id'   => $cidade["id"],

        );

        echo json_encode($cidade);
    }

    public function buscaCnpj()
    {

        $cidade = filter_input(INPUT_POST, 'cidade');
        $cidade = explode('|', $cidade);
        $city = $cidade[0];
        $cidade = $cidade[1];
        $segmento = filter_input(INPUT_POST, 'segmento');
        $segmento = explode('|', $segmento);
        $seg = $segmento[0];
        $segmento = $segmento[1];


        $response = Http::get(
            //'http://apiessencial.com.br/buscacnpjs',
            'http://localhost:3000/',
            [
                'cidade' => $cidade,
                'segmento' => $segmento,
                'seg' => $seg,
            ]
        );

         return redirect()->route(
            'buscacnpjenviada',
            [
                'cidade' => $city,
                'segmento' => $seg,
            ]
        );
        
        //echo "A cidade é: ".$cidade."<br> E o segmento é: ".$seg;
    }

    public function inicioProspecoes()
    {

        $dados = Prospecto::select('id', 'razaoSocial', 'cidade', 'segmento')->get();
        $total = Prospecto::select()->count();

        return view('Admin.inicioProspecoes', [
            'dados' => $dados,
            'total' => $total
            ]);
    }

    public function detalheDaProspeccao($id)
    {

        $dados = Prospecto::select()
            ->where('id', $id)
            ->first();

        $obs = Obsprospecto::select()
            ->where('idprospect', $id)
            ->orderby('id', 'desc')
            ->get();

        return view(
            'Admin.detalheprospeccao',
            [
                'dados' => $dados,
                'observacoes' => $obs
            ]
        );
    }

    public function insereobsprospect($contato)
    {
        $obs = filter_input(INPUT_POST, 'obs');

        Obsprospecto::create([
            'idprospect' => $contato,
            'obs' => $obs
        ]);

    return redirect()->route('detalheprospeccao', $contato);
    
    }

     public function buscacnpjenviada($cidade, $segmento)
    {

        return view('Admin.buscacnpjenviada', [
            'cidade' => $cidade,
            'segmento' => $segmento
        ]);
    }
}
