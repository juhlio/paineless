<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Relatorio;
use App\Models\Imagemrelatorio;
use App\Models\Genset;
use App\Models\Atendimentoreport;
use App\Models\Obsatendimentoreport;
use Mail;
use App\Mail\NovoRelatorio;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Jobs\Enviaemail;
use Carbon\Carbon;


use Illuminate\Http\Request;

class LocacoesController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth'); 

    }


    public function index()
    {
        return view('Locacoes.home');
    }

    public function inicioAtendimento()
    {

        return view('Locacoes.inicioatendimento');
    }

    public function relatorioPm1($id)
    {
        $cliente  = Genset::select()
            ->join('clients', 'clients.id', '=', 'gensets.idCliente')
            ->where('gensets.id', $id)
            ->first();

        /* var_dump($cliente); */

        return view('Locacoes.pm1', [
            'cliente' => $cliente,
        ]);
    }

    public function processaPm1($id)
    {


        $data = date('Y-m-d', strtotime(filter_input(INPUT_POST, 'data')));
        $atendimento = filter_input(INPUT_POST, 'atendimento');
        $tipo = filter_input(INPUT_POST, 'tipo');
        $kwh = filter_input(INPUT_POST, 'kwh');
        $horimetro = filter_input(INPUT_POST, 'horimetro');
        $colmeia = filter_input(INPUT_POST, 'colmeia');
        $aguaRadiador = filter_input(INPUT_POST, 'aguaRadiador');
        $obsAguaRadiador = filter_input(INPUT_POST, 'obsAguaRadiador');
        $aditivoArrefecedor = filter_input(INPUT_POST, 'aditivoArrefecedor');
        $obsAditivoArrefecedor = filter_input(INPUT_POST, 'obsAditivoArrefecedor');
        $oleoCarter = filter_input(INPUT_POST, 'oleoCarter');
        $obsOleoCarter = filter_input(INPUT_POST, 'obsOleoCarter');
        $mangotes = filter_input(INPUT_POST, 'mangotes');
        $obsMangotes = filter_input(INPUT_POST, 'obsMangotes');
        $preAquecimento = filter_input(INPUT_POST, 'preAquecimento');
        $obsPreAquecimento = filter_input(INPUT_POST, 'obsPreAquecimento');
        $limpezaSensorRotacao = filter_input(INPUT_POST, 'limpezaSensorRotacao');
        $obsLimpezaSensorRotacao = filter_input(INPUT_POST, 'obsLimpezaSensorRotacao');
        $vazamentoJuntas = filter_input(INPUT_POST, 'vazamentoJuntas');
        $obsVazamentoJuntas = filter_input(INPUT_POST, 'obsVazamentoJuntas');
        $nivelCombustivel = filter_input(INPUT_POST, 'nivelCombustivel');
        $obsNivelCombustivel = filter_input(INPUT_POST, 'obsNivelCombustivel');
        $filtroDeAr = filter_input(INPUT_POST, 'filtroDeAr');
        $obsFiltroDeAr = filter_input(INPUT_POST, 'obsFiltroDeAr');
        $correias = filter_input(INPUT_POST, 'correias');
        $obsCorreias = filter_input(INPUT_POST, 'obsCorreias');
        $gradesTampas = filter_input(INPUT_POST, 'gradesTampas');
        $obsGradesTampas = filter_input(INPUT_POST, 'obsGradesTampas');
        $baterias = filter_input(INPUT_POST, 'baterias');
        $reguladorDeTensao = filter_input(INPUT_POST, 'reguladorDeTensao');
        $obsReguladorDeTensao = filter_input(INPUT_POST, 'obsReguladorDeTensao');
        $bornes = filter_input(INPUT_POST, 'bornes');
        $obsBornes = filter_input(INPUT_POST, 'obsBornes');
        $tensaoContinuaCarregador = filter_input(INPUT_POST, 'tensaoContinuaCarregador');
        $ampereCarregador = filter_input(INPUT_POST, 'ampereCarregador');
        $tensaoContinuaAlternador = filter_input(INPUT_POST, 'tensaoContinuaAlternador');
        $ampereAlternador = filter_input(INPUT_POST, 'ampereAlternador');
        $f1F2 = filter_input(INPUT_POST, 'f1F2');
        $obsF1F2 = filter_input(INPUT_POST, 'obsF1F2');
        $f2F3 = filter_input(INPUT_POST, 'f2F3');
        $obsF2F3 = filter_input(INPUT_POST, 'obsF2F3');
        $f1F3 = filter_input(INPUT_POST, 'f1F3');
        $obsF1F3 = filter_input(INPUT_POST, 'obsF1F3');
        $frequencia = filter_input(INPUT_POST, 'frequencia');
        $pressaoOleo = filter_input(INPUT_POST, 'pressaoOleo');
        $temperaturaMotor = filter_input(INPUT_POST, 'temperaturaMotor');
        $vazamentosConexoes = filter_input(INPUT_POST, 'vazamentosConexoes');
        $obsVazamentosConexoes = filter_input(INPUT_POST, 'obsVazamentosConexoes');
        $ruidosAnormais = filter_input(INPUT_POST, 'ruidosAnormais');
        $obsRuidosAnormais = filter_input(INPUT_POST, 'obsRuidosAnormais');
        $densidadeFumaca = filter_input(INPUT_POST, 'densidadeFumaca');
        $obsDensidadeFumaca = filter_input(INPUT_POST, 'obsDensidadeFumaca');
        $limpezaSuperficial = filter_input(INPUT_POST, 'limpezaSuperficial');
        $obsLimpezaSuperficial = filter_input(INPUT_POST, 'obsLimpezaSuperficial');
        $testeEmCarga = filter_input(INPUT_POST, 'testeEmCarga');
        $obsTesteEmCarga = filter_input(INPUT_POST, 'obsTesteEmCarga');
        $estadoGeralEquipamento = filter_input(INPUT_POST, 'estadoGeralEquipamento');
        $obsGerais = filter_input(INPUT_POST, 'obsGerais');



        $relatorio = new Relatorio();
        $relatorio->idMaquina = $id;
        $relatorio->data = $data;
        $relatorio->atendimento = 'Pm1';
        $relatorio->tipo = $tipo;
        $relatorio->horimetro = $horimetro;
        $relatorio->kwh = $kwh;
        $relatorio->colmeia = $colmeia;
        $relatorio->aguaRadiador = $aguaRadiador;
        $relatorio->obsAguaRadiador = $obsAguaRadiador;
        $relatorio->aditivoArrefecedor = $aditivoArrefecedor;
        $relatorio->obsAditivoArrefecedor = $obsAditivoArrefecedor;
        $relatorio->oleoCarter = $oleoCarter;
        $relatorio->obsOleoCarter = $obsOleoCarter;
        $relatorio->mangotes = $mangotes;
        $relatorio->obsMangotes = $obsMangotes;
        $relatorio->preAquecimento = $preAquecimento;
        $relatorio->obsPreAquecimento = $obsPreAquecimento;
        $relatorio->limpezaSensorRotacao = $limpezaSensorRotacao;
        $relatorio->obsLimpezaSensorRotacao = $obsLimpezaSensorRotacao;
        $relatorio->vazamentoJuntas = $vazamentoJuntas;
        $relatorio->obsVazamentoJuntas = $obsVazamentoJuntas;
        $relatorio->nivelCombustivel = $nivelCombustivel;
        $relatorio->obsNivelCombustivel = $obsNivelCombustivel;
        $relatorio->filtroDeAr = $filtroDeAr;
        $relatorio->obsFiltroDeAr = $obsFiltroDeAr;
        $relatorio->correias = $correias;
        $relatorio->obsCorreias = $obsCorreias;
        $relatorio->gradesTampas = $gradesTampas;
        $relatorio->obsGradesTampas = $obsGradesTampas;
        $relatorio->baterias = $baterias;
        $relatorio->reguladorDeTensao = $reguladorDeTensao;
        $relatorio->obsReguladorDeTensao = $obsReguladorDeTensao;
        $relatorio->bornes = $bornes;
        $relatorio->obsBornes = $obsBornes;
        $relatorio->tensaoContinuaCarregador = $tensaoContinuaCarregador;
        $relatorio->ampereCarregador = $ampereCarregador;
        $relatorio->tensaoContinuaAlternador = $tensaoContinuaAlternador;
        $relatorio->ampereAlternador = $ampereAlternador;
        $relatorio->f1F2 = $f1F2;
        $relatorio->obsF1F2 = $obsF1F2;
        $relatorio->f2F3 = $f2F3;
        $relatorio->obsF2F3 = $obsF2F3;
        $relatorio->f1F3 = $f1F3;
        $relatorio->obsF1F3 = $obsF1F3;
        $relatorio->frequencia = $frequencia;
        $relatorio->pressaoOleo = $pressaoOleo;
        $relatorio->temperaturaMotor = $temperaturaMotor;
        $relatorio->vazamentosConexoes = $vazamentosConexoes;
        $relatorio->obsVazamentosConexoes = $obsVazamentosConexoes;
        $relatorio->ruidosAnormais = $ruidosAnormais;
        $relatorio->obsRuidosAnormais = $obsRuidosAnormais;
        $relatorio->densidadeFumaca = $densidadeFumaca;
        $relatorio->obsDensidadeFumaca = $obsDensidadeFumaca;
        $relatorio->limpezaSuperficial = $limpezaSuperficial;
        $relatorio->obsLimpezaSuperficial = $obsLimpezaSuperficial;
        $relatorio->testeEmCarga = $testeEmCarga;
        $relatorio->obsTesteEmCarga = $obsTesteEmCarga;
        $relatorio->estadoGeralEquipamento = $estadoGeralEquipamento;
        $relatorio->obsGerais = $obsGerais;
        $relatorio->save();

        $criado = Relatorio::select()
            ->orderBy('created_at', 'desc')
            ->first();

        if ($_FILES['fotoMotor']['name']) {


            $foto = new Imagemrelatorio();
            $nomefotocapa = $criado->id . '_fotoMotor_'  . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/relatorios/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoMotor']['tmp_name'], $nomefotocapacompleto);

            $foto->idRelatorio = $criado->id;
            $foto->url = $nomefotocapa;
            $foto->posicao = '1';
            $foto->save();
        };

        if ($_FILES['fotoCabinado']['name']) {


            $foto = new Imagemrelatorio();
            $nomefotocapa = $criado->id . '_fotoCabinado_'  . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/relatorios/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoCabinado']['tmp_name'], $nomefotocapacompleto);

            $foto->idRelatorio = $criado->id;
            $foto->url = $nomefotocapa;
            $foto->posicao = '2';
            $foto->save();
        };

        if ($_FILES['fotoGeral']['name']) {


            $foto = new Imagemrelatorio();
            $nomefotocapa = $criado->id . '_fotoGeral_'  . date('dmYHis') . '.jpeg';
            $diretorio = "assets/images/relatorios/";
            $nomefotocapacompleto = $diretorio . $nomefotocapa;
            move_uploaded_file($_FILES['fotoGeral']['tmp_name'], $nomefotocapacompleto);

            $foto->idRelatorio = $criado->id;
            $foto->url = $nomefotocapa;
            $foto->posicao = '3';
            $foto->save();
        };

        $url = route('detalherelatorio', $criado->id);

        $body = [
            'url_a' => $url,
            'name' => 'Sena',
            'to' => 'sena@essencialenergia.com'
        ];

        Enviaemail::dispatch($body);

        return redirect()->route('detalherelatorio', $criado->id);
    }

    public function listarelatorios()
    {

        /*   $relatorios = Relatorio::select('id', 'idCliente', 'data', 'tipo')->get(); */

        $relatorios = DB::table('relatorios')
            ->join('gensets', 'gensets.id', '=', 'relatorios.idMaquina')
            ->join('clients', 'clients.id', '=', 'gensets.idCliente')
            ->select(
                'relatorios.id',
                'relatorios.data',
                'relatorios.tipo',
                'gensets.identificacao',
                'clients.nome'
            )
            ->get();

        return view(
            'Locacoes.listarelatorios',
            [
                'relatorios' => $relatorios,
            ]
        );
    }

    public function detalherelatorio($id)
    {
        $relatorio = Relatorio::select()
            ->join('gensets', 'gensets.id', '=', 'relatorios.idMaquina')
            ->join('clients', 'clients.id', '=', 'gensets.idCliente')
            ->where('relatorios.id', $id)
            ->first();

        $foto1 = Imagemrelatorio::select()
            ->where('idRelatorio', $id)
            ->where('posicao', '1')
            ->first();

        $foto2 = Imagemrelatorio::select()
            ->where('idRelatorio', $id)
            ->where('posicao', '2')
            ->first();

        $foto3 = Imagemrelatorio::select()
            ->where('idRelatorio', $id)
            ->where('posicao', '3')
            ->first();

        return view('Locacoes.detalherelatorio', [
            'relatorio' => $relatorio,
            'id' => $id,
            'foto1' => $foto1,
            'foto2' => $foto2,
            'foto3' => $foto3,
        ]);
    }

    public function relatorioAtendimento($id)
    {

        $relatorioAberto = AtendimentoReport::where('idEquip', $id)
            ->where('statusRelatorio', '<>', 4)
            ->get();



        if ($relatorioAberto->count() > 0) {
            return redirect()->route('detalhemaquina', $id)->with('error', 'Esse equipamento possui atendimento aberto. N??o ?? possivel criar um novo no momento');
        } else {

            $cliente  = Genset::select()
                ->join('clients', 'clients.id', '=', 'gensets.idCliente')
                ->where('gensets.id', $id)
                ->first();

            return view('Locacoes.atendimento', [
                'cliente' => $cliente,
            ]);
        }
    }

    public function processaRelatorioAtendimento($id)
    {

        $endereco = filter_input(INPUT_POST, 'endereco');
        $tipoAtendimento = filter_input(INPUT_POST, 'tipoAtendimento');
        $horaChamadoFormat = filter_input(INPUT_POST, 'horaChamado');
        $horaChamado =  Carbon::createFromFormat('d-m-Y H:i', $horaChamadoFormat)->format('Y-m-d H:i');
        $tipoConexao = filter_input(INPUT_POST, 'tipoConexao');
        $caminhao = filter_input(INPUT_POST, 'caminhao');
        $seccaoCondutor = filter_input(INPUT_POST, 'seccaoCondutor');
        $lancesPorFase = filter_input(INPUT_POST, 'lancesFase');
        $lancesNeutro = filter_input(INPUT_POST, 'lancesNeutro');
        if (filter_input(INPUT_POST, 'horimetroInicial') == '') {
            $horimetroInicial = null;
        } else {
            $horimetroInicial = filter_input(INPUT_POST, 'horimetroInicial');
        }

        if (filter_input(INPUT_POST, 'horimetroFinal') == '') {
            $horimetroFinal = null;
        } else {
            $horimetroFinal = filter_input(INPUT_POST, 'horimetroFinal');
        }

        if (filter_input(INPUT_POST, 'kwhInicial') == '') {
            $kwhInicial = null;
        } else {
            $kwhInicial = filter_input(INPUT_POST, 'kwhInicial');
        }

        if (filter_input(INPUT_POST, 'kwhFinal') == '') {
            $kwhFinal = null;
        } else {
            $kwhFinal = filter_input(INPUT_POST, 'kwhFinal');
        }

        $chegadaGmgFormat = filter_input(INPUT_POST, 'chegadaGmg');
        $chegadaGmg =  Carbon::createFromFormat('d-m-Y H:i', $chegadaGmgFormat)->format('Y-m-d H:i');

        $inicioOperacaoFormat = filter_input(INPUT_POST, 'inicioOperacao');
        $inicioOperacao =  Carbon::createFromFormat('d-m-Y H:i', $inicioOperacaoFormat)->format('Y-m-d H:i');

        $terminoOperacao = filter_input(INPUT_POST, 'terminoOperacao');
        $obs = filter_input(INPUT_POST, 'obsGerais');

        if (filter_input(INPUT_POST, 'status') === 'Stand By') {
            $statusRelatorio = 1;
        } elseif (filter_input(INPUT_POST, 'status') === 'Aguardando COD') {
            $statusRelatorio = 2;
        } elseif (filter_input(INPUT_POST, 'status') === 'Gerador Ligado') {
            $statusRelatorio = 3;
        } else {
            $statusRelatorio = 4;
        }


        $relatorio = new AtendimentoReport();
        $relatorio->idEquip = $id;
        $relatorio->endereco = $endereco;
        $relatorio->tipoAtendimento = $tipoAtendimento;
        $relatorio->horaChamado = $horaChamado;
        $relatorio->tipoConexao = $tipoConexao;
        $relatorio->caminhao = $caminhao;
        $relatorio->seccaoCondutor = $seccaoCondutor;
        $relatorio->lancesPorFase = $lancesPorFase;
        $relatorio->lancesNeutro = $lancesNeutro;
        $relatorio->horimetroInicial = $horimetroInicial;
        $relatorio->horimetroFinal = $horimetroFinal;
        $relatorio->kwhInicial = $kwhInicial;
        $relatorio->kwhFinal = $kwhFinal;
        $relatorio->chegadaGmg = $chegadaGmg;
        $relatorio->inicioOperacao = $inicioOperacao;
        $relatorio->terminoOperacao = $terminoOperacao;
        $relatorio->obs = $obs;
        $relatorio->statusRelatorio = $statusRelatorio;
        $relatorio->save();

        $idAtendimento = Atendimentoreport::latest('id')->first();
        $obsReport = 'Novo Status: ' . filter_input(INPUT_POST, 'status');

        Obsatendimentoreport::create([
            'idAtendimento' => $idAtendimento->id,
            'obs' => 'Atendimento Criado'
        ]);

        Obsatendimentoreport::create([
            'idAtendimento' => $idAtendimento->id,
            'obs' => $obsReport
        ]);

        if ($obs) {

            Obsatendimentoreport::create([
                'idAtendimento' => $idAtendimento->id,
                'obs' => $obs
            ]);
        }

        return redirect()->route('detalhemaquina', $id)->with('success', 'Atendimento Criado com sucesso!');
    }

    public function alteraAtendimento($id)
    {

        $dadosRelatorio = AtendimentoReport::where('id', $id)->first();

        return view('Locacoes.alteraAtendimento', [
            'dadosRelatorio' => $dadosRelatorio,
        ]);
    }

    public function processaAlteraAtendimento($id)
    {

        if (filter_input(INPUT_POST, 'status') === 'Stand By') {
            $statusRelatorio = 1;
        } elseif (filter_input(INPUT_POST, 'status') === 'Aguardando COD') {
            $statusRelatorio = 2;
        } elseif (filter_input(INPUT_POST, 'status') === 'Gerador Ligado') {
            $statusRelatorio = 3;
        } else {
            $statusRelatorio = 4;
        }

        if (filter_input(INPUT_POST, 'horimetroInicial') == '') {
            $horimetroInicial = null;
        } else {
            $horimetroInicial = filter_input(INPUT_POST, 'horimetroInicial');
        }

        if (filter_input(INPUT_POST, 'horimetroFinal') == '') {
            $horimetroFinal = null;
        } else {
            $horimetroFinal = filter_input(INPUT_POST, 'horimetroFinal');
        }


        if (filter_input(INPUT_POST, 'kwhInicial') == '') {
            $kwhInicial = null;
        } else {
            $kwhInicial = filter_input(INPUT_POST, 'kwhInicial');
        }

        if (filter_input(INPUT_POST, 'kwhFinal') == '') {
            $kwhFinal = null;
        } else {
            $kwhFinal = filter_input(INPUT_POST, 'kwhFinal');
        }


        $relatorio = AtendimentoReport::findOrFail($id);

        $relatorio->statusRelatorio = $statusRelatorio;
        $relatorio->horimetroInicial = $horimetroInicial;
        $relatorio->horimetroFinal = $horimetroFinal;
        $relatorio->kwhInicial = $kwhInicial;
        $relatorio->kwhFinal = $kwhFinal;

        $relatorio->save();

        $obsReport = 'Novo Status: ' . filter_input(INPUT_POST, 'status');
        Obsatendimentoreport::create([
            'idAtendimento' => $id,
            'obs' => $obsReport
        ]);

        $obs = filter_input(INPUT_POST, 'obsGerais');

        if ($obs) {

            Obsatendimentoreport::create([
                'idAtendimento' => $id,
                'obs' => $obs,
            ]);
        }

        $idMaquina = AtendimentoReport::where('id', $id)->first();

        if (filter_input(INPUT_POST, 'status') === 'Atendimento Finalizado') {
            return redirect()->route('detalhemaquina', $idMaquina->idEquip)->with('success', 'Atendimento Finalizado com sucesso!');
        } else {
            return redirect()->route('detalhemaquina', $idMaquina->idEquip)->with('success', 'Atendimento Alterado com sucesso!');
        }
    }
}
