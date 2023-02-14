@extends('adminlte::page')


@section('content')

@section('content_header')
<h5> Resultado do fitro para {{$segmento}} em {{$cidade}}</h5>
@endsection

<br><br>




<div class="row justify-content-center">

      <div class="col-md-4">

           <x-adminlte-small-box title="{{$total}}" text="Cadastros com o filtro criado" 
            theme="primary" url="#" url-text=""/>
    </div>




</div>

<div class="row justify-content-center">

      <div class="col-md-4">

           <x-adminlte-small-box title="Filtro" text="Filtrar Cadastros" 
            theme="primary" url="{{route('filtrocnpj')}}" url-text=""/>
    </div>

    <div class="col-md-4">

        <x-adminlte-small-box title="Nova Busca" text="Buscar novos possíveis contatos"
            theme="primary" url="{{route('telabuscacnpj')}}" url-text="Buscar"/>
    </div>



</div>

<div class="card">

<table id="example" class="hover"  style="width:100%">
        <thead>
            <tr>
                
                <th>Nome</th>
                <th>Cidade</th>
                <th>Segmento</th>
                <th>Detalhes</th>
            </tr>
        </thead>
        <tbody>
        @foreach($dados as $dado)
            <tr>
                <td>{{$dado->razaoSocial}}</td>
                <td>{{$dado->cidade}}</td>
                <td>{{$dado->segmento}}</td>
                <td><a href="{{route('detalheprospeccao', $dado->id)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                <i class="fa fa-lg fa-fw fa-eye"></i> 
                    </a></td> 
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

@endsection