@extends('adminlte::page')

@section('content')

<div class="card p-3 mb-3">




    <table id="example" class="hover" style="width:100%">
        <thead>
            <tr>
                <th>Número</th>
                <th>Cliente</th>
                <th>Identificação</th>
                <th>Data</th>
                <th>Tipo</th>
                <th>Detalhes</th>
            </tr>
        </thead>
    <tbody>
            @foreach($relatorios as $relatorio) 
            <tr>
                <td>{{$relatorio->id}}</td>
                <td>{{$relatorio->nome}}</td>
                <td>{{$relatorio->identificacao}}</td>
                <td>{{\Carbon\Carbon::parse($relatorio->data)->format('d/m/Y')}}</td> 
                <td>{{$relatorio->tipo}}</td>           
                <td> <a class="btn btn-success" href="{{route('detalherelatorio', $relatorio->id)}}">Detalhes</a> </td>
            </tr>
            @endforeach  
    </tbody> 
    </table>



</div>



@endsection

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.css">


@endsection

@section('js')

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.js"> </script>


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
            },
        }, responsive: true
    });
});
</script>

@endsection