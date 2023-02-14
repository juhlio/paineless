@extends('adminlte::page')

@section('content_header')
<h1>Detalhes Relatório </h1>
@endsection

@section('content')

<div class="card p-3 mb-3">

<div class="row justify-content-center">
    <h4>Atendimento Número: {{$id}} </h4>
</div>

<div class="row">

    <div class="col-md">
        <strong> Cliente:</strong> {{$relatorio->nome}} <br>
        <strong> Fabricante Motor: </strong> {{$relatorio->fabricanteMotor}} <br>
        <strong> Modelo  Motor: </strong> {{$relatorio->modeloMotor}}  <br>
        <strong> Série  Motor: </strong>  {{$relatorio->serieMotor}}<br>
        <strong> Número Serie do Grupo: </strong> {{$relatorio->numeroSerie}} <br>
    </div>
    <div class="col-md">
        <br>
        <strong> Fabricante Alternador: </strong> {{$relatorio->fabricanteAlternador}} <br>
        <strong> Modelo  Alternador: </strong> {{$relatorio->modeloAlternador}}  <br>
        <strong> Série  Alternador: </strong>  {{$relatorio->serieAlternador}}<br>
    </div>

</div>

<hr>

<div class="row">
   
    <div class="col-md">
        <strong> Funcionamento:</strong> {{$relatorio->horimetro}}<br>
        <strong> Kwh: </strong> {{$relatorio->kwh}} <br>
        <strong> Data: </strong> {{\Carbon\Carbon::parse($relatorio->data)->format('d/m/Y')}} <br>
        <strong> Atendimento: </strong> {{$relatorio->atendimento}} <br>
        <strong> Tipo de Atendimento: </strong> {{$relatorio->tipo}} <br>
    </div>


</div>


<hr>

<div class="card p-3 mb-3">

<div class="row">
   
    <div class="col-md">
        <strong> Colmeia:</strong> {{$relatorio->colmeia}} <br><br>
        <strong> Nível de Água no Radiador: </strong> {{$relatorio->aguaRadiador}} <br>
        <strong> Observação: </strong> {{$relatorio->obsAguaRadiador}} <br><br>
        <strong> Concentração de Aditivo no arrefecedor: </strong> {{$relatorio->aditivoArrefecedor}} <br>
        <strong> Observação: </strong> {{$relatorio->obsAditivoArrefecedor}} <br><br>
        <strong> Óleo lubrificante no Carter: </strong> {{$relatorio->oleoCarter}} <br>
        <strong> Observação: </strong> {{$relatorio->obsOleoCarter}} <br><br>
        <strong> Mangotes, abraçadeiras, tubos, conexões e mangueiras: </strong> {{$relatorio->mangotes}}  <br>
        <strong> Observação: </strong> {{$relatorio->obsMangotes}} <br><br>
        <strong> Pré-aquecimento: </strong> {{$relatorio->preAquecimento}}  <br>
        <strong> Observação: </strong> {{$relatorio->obsPreAquecimento}} <br><br>
        <strong> Limpeza do Sensor de rotação: </strong> {{$relatorio->limpezaSensorRotacao}} <br>
        <strong> Observação: </strong> {{$relatorio->obsLimpezaSensorRotacao}} <br><br>
        <strong> Verificação de vazamentos na juntas e retentores: </strong> {{$relatorio->vazamentoJuntas}} <br>
        <strong> Observação: </strong> {{$relatorio->obsVazamentoJuntas}} <br><br>
        <strong> Nível de Combustível: </strong> {{$relatorio->nivelCombustivel}}  <br>
        <strong> Observação: </strong> {{$relatorio->obsNivelCombustivel}} <br><br>
        <strong> Filtro de Ar: </strong> {{$relatorio->filtroDeAr}}<br>
        <strong> Observação: </strong> {{$relatorio->obsFiltroDeAr}} <br><br>
        <strong> Correias: </strong> {{$relatorio->correias}} <br>
        <strong> Observação: </strong> {{$relatorio->obsCorreias}} <br><br>
        <strong> Grades de Proteção: </strong> {{$relatorio->gradesTampas}}  <br>
        <strong> Observação: </strong> {{$relatorio->obsGradesTampas}} <br><br>
        <strong> Baterias: </strong> {{$relatorio->baterias}} <br><br>
        <strong> Regulador de Tensão: </strong> {{$relatorio->reguladorDeTensao}}  <br>
        <strong> Observação: </strong> {{$relatorio->obsReguladorDeTensao}} <br><br>
        <strong> Conexões do painel de Controle: </strong> {{$relatorio->bornes}} <br>
        <strong> Observação: </strong> {{$relatorio->obsBornes}} 

    </div>
    <div class="col-md">
        <strong> Carregador de bateria </strong>  <br>
        <strong> Tensão Continua: </strong> {{$relatorio->tensaoContinuaCarregador}}  <br>
        <strong> Ampere: </strong> {{$relatorio->ampereCarregador}} <br><br>
        <strong> Alternador das baterias </strong>  <br>
        <strong> Tensão Continua: </strong> {{$relatorio->tensaoContinuaAlternador}} <br>
        <strong> Ampere: </strong> {{$relatorio->ampereAlternador}}  <br><br>
        <strong> Leitura de tensão </strong>  <br>
        <strong> F1/F2: </strong> {{$relatorio->f1F2}}  <br>
        <strong> Observação: </strong> {{$relatorio->obsF1F2}} <br><br>
        <strong> F2/F3: </strong> {{$relatorio->f1F3}} <br>
        <strong> Observação: </strong> {{$relatorio->obsF2F3}}  <br><br>
        <strong> F1/F3: </strong> {{$relatorio->f1F3}} <br>
        <strong> Observação: </strong> {{$relatorio->obsF1F3}} <br><br>
        <strong> Frequência: </strong> {{$relatorio->frequencia}} <br>
        <strong> Pressão do Óleo: </strong> {{$relatorio->pressaoOleo}} bar <br><br>
        <strong> Temperatura do Motor: </strong> {{$relatorio->temperaturaMotor}} ºC <br><br>
        <strong> Vazamentos nas conexões de água, óleo, combustível, ar e escapamentos: </strong> {{$relatorio->vazamentosConexoes}} <br>
        <strong> Observação: </strong> {{$relatorio->obsVazamentosConexoes}} <br><br>
        <strong> Verificação de ruídos anormais quando em funcionamento: </strong> {{$relatorio->ruidosAnormais}} <br>
        <strong> Observação: </strong> {{$relatorio->obsRuidosAnormais}} <br><br>
        <strong> Densidade da fumaça dos escapamentos: </strong> {{$relatorio->densidadeFumaca}}  <br>
        <strong> Observação: </strong> {{$relatorio->obsDensidadeFumaca}} <br><br>
        <strong> Limpeza superficial do motor, alternador, painel de controle e cabinado: </strong> {{$relatorio->limpezaSuperficial}} <br>
        <strong> Observação: </strong> {{$relatorio->obsLimpezaSuperficial}} <br><br>
        <strong> Teste em carga: </strong> {{$relatorio->testeEmCarga}}  <br>
        <strong> Observação: </strong>  {{$relatorio->obsTesteEmCarga}} <br><br>
        
    </div>

</div>
<hr>

<div class="row justify-content-center">

        <strong>Estado Geral do Equipamento: {{$relatorio->estadoGeralEquipamento}}  </strong>
</div>
<hr>
<div class="row justify-content-center">

        <strong> Observações Gerais: {{$relatorio->obsGerais}} </strong> 
    
</div>

</div>

<hr>


    
    <div class="filter-container p-0 row justify-content-center">
                    @if($foto1)
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/relatorios/'.$foto1->url)}}" data-toggle="lightbox" data-title="Foto do Motor" >
                        <img src="{{URL::asset('assets/images/relatorios/'.$foto1->url)}}" class="img-fluid mb-2"/>
                    </a>
    </div>
    @endif
                @if($foto2)
               <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/relatorios/'.$foto2->url)}}" data-toggle="lightbox" data-title="Foto do Cabinado" >
                        <img src="{{URL::asset('assets/images/relatorios/'.$foto2->url)}}" class="img-fluid mb-2"/>
                    </a>
    </div>
    @endif
    @if($foto3)
    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/relatorios/'.$foto3->url)}}" data-toggle="lightbox" data-title="Foto Geral" >
                        <img src="{{URL::asset('assets/images/relatorios/'.$foto3->url)}}" class="img-fluid mb-2"/>
                    </a>
    </div>
      @endif              
    </div>
    
    


</div>

@endsection


@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


@endsection

@section('js')

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>


<script>
$(document).ready(function () {
    $('#example').DataTable({
        "language":{
            "search": "Buscar",
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "info": "Página _PAGE_ de _PAGES_",
            "paginate": {
                "previous" : "Anterior",
                "next": "Próxima",
                "first": "Primeira",
                "last": "Última"
            }
        }
    });
});
</script>

<script>
$(document).ready(function () {
    $('#example1').DataTable({
        "language":{
            "search": "Buscar",
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "info": "Página _PAGE_ de _PAGES_",
            "paginate": {
                "previous" : "Anterior",
                "next": "Próxima",
                "first": "Primeira",
                "last": "Última"
            }
        }
    });
});
</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>


  <script> $('.dropify').dropify({
    messages: {
        'default': 'Insira a Imagem',
        'replace': 'Arraste e solte ou clique para trocar a imagem',
        'remove':  'Remover',
        'error':   'Ooops, algo errado aconteceu.'
    }
  }); </script>

  <script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>


@endsection