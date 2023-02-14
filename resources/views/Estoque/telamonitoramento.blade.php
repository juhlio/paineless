@extends('adminlte::page')

@section('title', 'Monitoramento Maquina')



@section('content')

@section('content_header')
<h1>Manitoramento da Maquina</h1>
@endsection

<div class="card">

<table id="example" class="hover"  style="width:100%">
        <thead>
            <tr>
                
                <th>Nome</th>
                <th>Symbol</th>
                <th>Valor</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dados as $dado)
            <tr>
                <td>{{$dado->name}}</td>
                <td>{{$dado->symbol}}</td>
                <td>{{$dado->valor}}</td>
                <td>{{\Carbon\Carbon::parse($dado->createdAt)->format('d/m/Y H:i:s')}}</td>
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