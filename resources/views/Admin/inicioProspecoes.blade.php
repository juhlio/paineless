@extends('adminlte::page')


@section('content')

<br><br>

<div class="row">

    <div class="col-md-4">

           <x-adminlte-small-box title="Filtro" text="Faça um filtro entre os resultados" 
            theme="primary" url="{{route('filtrocnpj')}}" url-text="Filtrar"/>
    </div>

 <div class="col-md-4">

           <x-adminlte-small-box title="{{$total}}" text="Cadastrados como possíveis contatos" 
            theme="primary" url="#" url-text=""/>
    </div>

    <div class="col-md-4">

        <x-adminlte-small-box title="Nova Busca" text="Buscar novos possíveis contatos" icon="fas fa-search-plus text-white"
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