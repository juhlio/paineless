@extends('adminlte::page')

@section('title', ' Detalhes')

@section('content_header')
<h1></h1>
@endsection

@section('content')

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('success') }}
    </div>
@endif

<div class="card p-3 mb-3">

    <div class="row">

    <a class="btn btn-success p-3 mb-3 m-2" href="{{route('relatoriopm1', $id)}}">Nova - PM1</a>
    <a class="btn btn-success p-3 mb-3 m-2" href="{{route('relatorioAtendimento', $id)}}">Novo Atendimento</a>
    <a class="btn btn-success p-3 mb-3 m-2" href="{{route('alteracaoimagem', $imagens[1]->id)}}">Start-Up</a>


    </div>

    @if ($relatorioAberto->count() > 0) 

    <br><h4>Atendimento em Andamento</h4> <br>
    <div class="row">

        <table id="example" class="hover" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Endereço</th>
                <th>Tipo de Atendimento</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($relatorioAberto as $relatorio)
            <tr>
                <td>{{$relatorio->id}}</td>
                <td>{{$relatorio->endereco}}</td>
                <td>{{$relatorio->tipoAtendimento}}</td>
                <td> <a class="btn btn-success" href="{{route('alteraAtendimento', $relatorio->id)}}">Atualizar</a> </td>
                <td> <a class="btn btn-success" href="#">Finalizar</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>



    </div>

    @endif

</div>

<div class="card p-3 mb-3">

<div class="row">

    <div class="col-md">
        <strong> Fabricante Grupo:</strong> {{$dados->fabricante}} <br>
        <strong> Número Serie do Grupo: </strong> {{$dados->numeroSerie}} <br>

    <br>
    @if($imagens[1]->url)
    <div class="filter-container p-0 row">

                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[1]->url)}}" data-toggle="lightbox" data-title="{{$imagens[1]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[1]->url)}}" class="img-fluid mb-2" alt="{{$imagens[1]->posicao}}"/>
                    </a>
                    </div>
    </div>
    @endif

    <br>
    
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[1]->id)}}">Inserir ou Alterar Foto</a>

    </div>

    <div class="col-md">
        <strong> Data de Fabricação:</strong> {{$dados->dataFabricacao}} <br>
        <strong> Potência: </strong> {{$dados->potencia}} <br>
        <strong> Abrangência: </strong> {{$dados->abrangencia}} <br>
        <br>
        
        @if($imagens[4]->url)
        <div class="filter-container p-0 row">

                    
                    
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[4]->url)}}" data-toggle="lightbox" data-title="{{$imagens[4]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[4]->url)}}" class="img-fluid mb-2" alt="{{$imagens[4]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
    
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[4]->id)}}">Inserir ou Alterar Foto</a>
    </div>


    </div>




<hr>
<div class="row">
    <div class="col-md">
        <strong> Fabricante Motor:</strong> {{$dados->fabricanteMotor}} <br>
        <strong> Modelo Motor:</strong> {{$dados->modeloMotor}} <br>
        <strong> Número Serie Motor: </strong> {{$dados->serieMotor}} <br>

        @if($imagens[8]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[8]->url)}}" data-toggle="lightbox" data-title="{{$imagens[8]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[8]->url)}}" class="img-fluid mb-2" alt="{{$imagens[8]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[8]->id)}}">Inserir ou Alterar Foto</a>
    </div>


    <div class="col-md">
        <strong> Fabricante Alternador:</strong> {{$dados->fabricanteAlternador}} <br>
        <strong> Modelo Alternador:</strong> {{$dados->modeloAlternador}} <br>
        <strong> Número Alternador: </strong> {{$dados->serieAlternador}} <br>
        
        @if($imagens[14]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[14]->url)}}" data-toggle="lightbox" data-title="{{$imagens[14]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[14]->url)}}" class="img-fluid mb-2" alt="{{$imagens[14]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[14]->id)}}">Inserir ou Alterar Foto</a>
    </div>

    



</div>

<hr>



<div class="row">
    <div class="col-md">
        <h5>Tanque na Base</h5>
        <strong> Tipo:</strong> {{$dados->tanqueBase}} <br>
        <strong> Abertura de Janela:</strong> {{$dados->aberturaJanelaBase}} <br>
        <strong> Capacidade: </strong> {{$dados->capacidadeTanqueBase}} <br>

    @if($imagens[5]->url)
    <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[5]->url)}}" data-toggle="lightbox" data-title="{{$imagens[5]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[5]->url)}}" class="img-fluid mb-2" alt="{{$imagens[5]->posicao}}"/>
                    </a>
        </div>
    </div>
    @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[5]->id)}}">Inserir ou Alterar Foto</a>


    </div>

    <div class="col-md">
        <h5>Tanque Diário</h5>
        <strong> Tipo:</strong> {{$dados->tanqueDiario}} <br>
        <strong> Abertura de Janela:</strong> {{$dados->aberturaJanelaDiario}} <br>
        <strong> Capacidade: </strong> {{$dados->capacidadeTanqueDiario}} <br>

        @if($imagens[6]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[6]->url)}}" data-toggle="lightbox" data-title="{{$imagens[6]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[6]->url)}}" class="img-fluid mb-2" alt="{{$imagens[6]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[6]->id)}}">Inserir ou Alterar Foto</a>
    </div>

    <div class="col-md">
        <h5>Tanque Mensal</h5>
        <strong> Tipo:</strong> {{$dados->tanqueMensal}} <br>
        <strong> Abertura de Janela:</strong> {{$dados->aberturaJanelaMensal}} <br>
        <strong> Capacidade: </strong> {{$dados->capacidadeTanqueMensal}} <br>

        @if($imagens[7]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[7]->url)}}" data-toggle="lightbox" data-title="{{$imagens[7]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[7]->url)}}" class="img-fluid mb-2" alt="{{$imagens[7]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[7]->id)}}">Inserir ou Alterar Foto</a>
    </div>

</div>



<hr>

<div class="row">
    <div class="col-md">
        <strong> Quantidade Óleo Lubrificante:</strong> {{$dados->quantidadeOleoLubrificante}} <br>
    </div>

</div>

<hr>

<div class="row">
    <div class="col-md">
        <h5>Filtro Combustivel</h5>
        <strong> Modelo:</strong> {{$dados->modeloFiltroCombustivel}} <br>
        <strong> Quantidade:</strong> {{$dados->quantidadeFiltroCombustivel}} <br>

    @if($imagens[9]->url)
    <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[9]->url)}}" data-toggle="lightbox" data-title="{{$imagens[9]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[9]->url)}}" class="img-fluid mb-2" alt="{{$imagens[9]->posicao}}"/>
                    </a>
                    </div>
    </div>
    @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[9]->id)}}">Inserir ou Alterar Foto</a>

    </div>

    <div class="col-md">
        <h5>Filtro Separador</h5>
        <strong> Modelo:</strong> {{$dados->modeloFiltroSeparador}} <br>
        <strong> Quantidade:</strong> {{$dados->quantidadeFiltroSeparador}} <br>
        @if($imagens[10]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[10]->url)}}" data-toggle="lightbox" data-title="{{$imagens[10]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[10]->url)}}" class="img-fluid mb-2" alt="{{$imagens[10]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[10]->id)}}">Inserir ou Alterar Foto</a>

    </div>

    <div class="col-md">
        <h5>Filtro de Água</h5>
        <strong> Modelo:</strong> {{$dados->modeloFiltroAgua}} <br>
        <strong> Quantidade:</strong> {{$dados->quantidadeFiltroAgua}} <br>
        @if($imagens[11]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[11]->url)}}" data-toggle="lightbox" data-title="{{$imagens[11]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[11]->url)}}" class="img-fluid mb-2" alt="{{$imagens[11]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[11]->id)}}">Inserir ou Alterar Foto</a>

    </div>

    <div class="col-md">
        <h5>Filtro de Óleo</h5>
        <strong> Modelo:</strong> {{$dados->modeloFiltroOleo}} <br>
        <strong> Quantidade:</strong> {{$dados->quantidadeFiltroOleo}} <br>
        @if($imagens[12]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[12]->url)}}" data-toggle="lightbox" data-title="{{$imagens[12]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[12]->url)}}" class="img-fluid mb-2" alt="{{$imagens[12]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[12]->id)}}">Inserir ou Alterar Foto</a>

    </div>

    <div class="col-md">
        <h5>Filtro de Ar</h5>
        <strong> Modelo:</strong> {{$dados->modeloFiltroAr}} <br>
        <strong> Quantidade:</strong> {{$dados->quantidadeFiltroAr}} <br>
        @if($imagens[13]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[13]->url)}}" data-toggle="lightbox" data-title="{{$imagens[13]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[13]->url)}}" class="img-fluid mb-2" alt="{{$imagens[13]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[13]->id)}}">Inserir ou Alterar Foto</a>

    </div>


</div>

<hr> 


<div class="row">
    <div class="col-md">
        <h5>Módulo do Grupo</h5>
        <strong> Fabricante:</strong> {{$dados->fabricanteModuloGrupo}} <br>
        <strong> Modelo:</strong> {{$dados->modeloModuloGrupo}} <br>

        @if($imagens[15]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[15]->url)}}" data-toggle="lightbox" data-title="{{$imagens[15]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[15]->url)}}" class="img-fluid mb-2" alt="{{$imagens[15]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[15]->id)}}">Inserir ou Alterar Foto</a>

        <br><br>
        @if($imagens[16]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[16]->url)}}" data-toggle="lightbox" data-title="{{$imagens[16]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[16]->url)}}" class="img-fluid mb-2" alt="{{$imagens[16]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[16]->id)}}">Inserir ou Alterar Foto</a>

    </div>

    <div class="col-md">
        <h5>Módulo do QTA</h5>
        <strong> Fabricante:</strong> {{$dados->fabricanteModuloQta}} <br>
        <strong> Modelo:</strong> {{$dados->modeloModuloQta}} <br>

        @if($imagens[17]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[17]->url)}}" data-toggle="lightbox" data-title="{{$imagens[17]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[17]->url)}}" class="img-fluid mb-2" alt="{{$imagens[17]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[17]->id)}}">Inserir ou Alterar Foto</a>

        <br><br>

        @if($imagens[18]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[18]->url)}}" data-toggle="lightbox" data-title="{{$imagens[18]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[18]->url)}}" class="img-fluid mb-2" alt="{{$imagens[18]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[18]->id)}}">Inserir ou Alterar Foto</a>
    </div>


</div>

<hr>


<div class="row">
    <div class="col-md">
        <h5>Chave do Grupo</h5>
        <strong> Fabricante:</strong> {{$dados->fabricanteChaveGrupo}} <br>
        <strong> Modelo:</strong> {{$dados->modeloChaveGrupo}} <br>

        @if($imagens[19]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[19]->url)}}" data-toggle="lightbox" data-title="{{$imagens[19]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[19]->url)}}" class="img-fluid mb-2" alt="{{$imagens[19]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[19]->id)}}">Inserir ou Alterar Foto</a>
    </div>

    <div class="col-md">
        <h5>Chave de Rede</h5>
        <strong> Fabricante:</strong> {{$dados->fabricanteChaveRede}} <br>
        <strong> Modelo:</strong> {{$dados->modeloChaveRede}} <br>

        @if($imagens[20]->url)
        <div class="filter-container p-0 row">
        
                    <div class="filtr-item col-md-2" data-category="1">
                    <a href="{{URL::asset('assets/images/clients/'.$imagens[20]->url)}}" data-toggle="lightbox" data-title="{{$imagens[20]->posicao}}">
                        <img src="{{URL::asset('assets/images/clients/'.$imagens[20]->url)}}" class="img-fluid mb-2" alt="{{$imagens[20]->posicao}}"/>
                    </a>
                    </div>
        </div>
        @endif
        <br>
        <a class="btn btn-success" href="{{route('alteracaoimagem', $imagens[20]->id)}}">Inserir ou Alterar Foto</a>
    </div>

    


</div>

<br><br><br>

@if($dados->allexoId != "")
<div class="row">
    <div class="col-md">
        <h5>Monitoramento Remoto</h5>
        <strong> Id Allexo:</strong> {{$dados->allexoId}} <br>
        <br>
        <a class="btn btn-success" href="{{route('telamonitoramento', $dados->allexoId)}}">Acessar</a>

        
    </div>

    <div class="col-md">
        
    </div>
       
    </div>
@endif 

    


</div>

<hr> 






<br><br>
<div id="buttons">
</div>




</div>


@endsection


@section('css')

<link rel="stylesheet" type="text/css" href="{{ url('vendor/dropify/dropify.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
 <link rel="stylesheet" href="{{url('vendor/autocomplete/easy-autocomplete.min.css')}}">
 <link rel="stylesheet" href="{{url('vendor/autocomplete/easy-autocomplete.themes.min.css')}}">


@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
    <script src="{{ url('vendor/autocomplete/jquery.easy-autocomplete.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"> </script>

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