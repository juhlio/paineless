@extends('adminlte::page')

@section('title', $produto->descricao.' Detalhes')

@section('content_header')
<h2>Detalhes de {{$produto->descricao}}</h2>
@endsection

@section('content')

<div class="card p-3 mb-3">

<div class="row">
    <div class="col-md">
        <strong> Código Interno: </strong> ess_00{{$produto->id}} <br>
        <strong> Descrição: </strong> {{$produto->descricao}} <br>
        <strong> Fabricante: </strong> {{$produto->fabricante}} <br>
        <strong> Código Fabricante: </strong> {{$produto->codFabricante}}
            <strong> Tipo: </strong> {{$produto->tipo}}<br>
        <strong> NCM: </strong>  {{$produto->ncm}}<br>
        <strong> Unidade de Medida: </strong> {{$produto->unidadeMedida}} <br><br><br>

        <div {{-- class="row justify-content-center" --}}>
<a class="btn btn-success" href="{{route('alteraproduto', $produto->id)}}">Alterar</a>
</div>
    </div>


    <div class="col-md">
    @if($foto)

    <div class="filter-container p-0 row justify-content-center">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/products/'.$foto->url)}}" data-toggle="lightbox" data-title="{{$produto->descricao}}">
                        <img src="{{URL::asset('assets/images/products/'.$foto->url)}}" class="img-fluid mb-2" alt="{{$produto->descricao}}"/>
                    </a>
                    </div>
                    
    </div>
    <br><br>
                    <div class="row justify-content-center">
                    <a class="btn btn-success" href="{{route('alteracaoimagemproduto', $foto->id)}}">Alterar Imagem</a>
                    </div>






@endif
    </div>
</div>

<br><br>


<hr>



<div class="row">
    
    <div class="col-md-4">

    <x-adminlte-small-box  title="{{$total}}" text="Total em Estoque" {{-- icon="fas fa-download text-white" --}}
    theme="primary"/>

        
    </div>

    <div class="col-md-4">

    <x-adminlte-small-box title="{{$totalNovos}}" text="Novos" 
    theme="teal"/>

        
    </div>

    <div class="col-md-4">

    <x-adminlte-small-box title="{{$totalUsados}}" text="Usados" 
    theme="danger"/>

        
    </div>


</div>


<hr>

<div>
<h4>Entradas</h4>
<br>
<div class="row justify-content-center">
                    <a class="btn btn-success" href="{{route('entradaproduto', $id)}}">Nova Entrada</a>
                    </div>
<br>

<table id="example" class="hover"  style="width:100%">
        <thead>
            <tr>
                
                <th>Fornecedor/Cliente</th>
                <th>NF</th>
                <th>Quantidade</th>
                <th>Estado</th>
                <th>Tipo de Entrada</th>
                <th>Custo</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
             @foreach($detalhesEntradas as $entrada )
                    @if($entrada->novo == '1')
                    @php($estado = "Novo")
                    @else 
                    @php($estado = "Usado")
                    @endif

                    @if($entrada->tipoEntrada == '1')
                    @php($tipo = "Compra")
                    @elseif($entrada->tipoEntrada == '2')
                    @php($tipo = "Devolução")
                    @elseif($entrada->tipoEntrada == '3')
                    @php($tipo = "Devolução de Obra")
                    @endif

                    

            <tr>
                <td>{{$entrada->fornecedor}}</td>
                <td>{{$entrada->nf}}</td>
                <td>{{$entrada->quantidade}}</td>
                <td>{{$estado}}</td> 
                <td>{{$tipo}}</td>
                <td>R$ {{number_format($entrada->custo,2,",",".")}}</td>
                <td>{{$entrada->data}}</td>
               
            </tr>
            @endforeach 
        </tbody>
    </table> 

</div>


<div class="justify-content-center">
<h4>Saídas</h4>
<br>
<div class="row justify-content-center">
                    <a class="btn btn-success" href="{{route('saidaproduto', $id)}}">Nova Saída</a>
                    </div>
<br>
<table id="example1" class="hover"  style="width:100%">
        <thead>
            <tr>
                
                <th>Cliente</th>
                <th>Quantidade</th>
                <th>Estado</th>
                <th>Data</th>
                <th>Solicitante</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalhesSaidas as $saida)
            @if($saida->estado == "1")
            @php($estado = "Novo")
            @else 
            @php($estado = "Usado")
            @endif

            <tr>
                <td>{{$saida->cliente}}</td>
                <td>{{$saida->quantidade}}</td>
                <td>{{$estado}}</td>
                <td>{{$saida->data}}</td>
                <td>{{$saida->solicitante}}</td>
            </tr>
            @endforeach 
        </tbody>
    </table> 

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