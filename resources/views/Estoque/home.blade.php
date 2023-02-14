@extends('adminlte::page')


@section('content')


<div class="card p-3 mb-3">

<div class="row">
    
    <div class="col-md-4">

    <x-adminlte-small-box title="Novo produto" text="Incluir novo produto" icon="fas fa-plus text-white"
    theme="primary" url="{{route('novoprodutoestoque')}}" url-text="Adicionar Agora"/>
        
    </div>



</div>

<table id="example" class="hover" style="width:100%">
        <thead>
            <tr>
                <th>Cód Interno</th>
                <th>Cód Fabricante</th>
                <th>EAN</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Fabricante</th>
                <th>Localização</th>
                {{-- <th>Total Em Estoque</th> --}}
                <th>Detalhes</th>
                <th>Alterar</th>
                <th>Nova Entrada</th>
                <th>Nova Saída</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>ess_00{{$produto->id}}</td>
                <td>{{$produto->codFabricante}}</td>
                <td>{{$produto->ean}}</td>
                <td>{{$produto->descricao}}</td>
                <td>{{$produto->tipo}}</td>
                <td>{{$produto->fabricante}}</td>
                <td>{{$produto->localizacao}}</td>
                <td> <a class="btn btn-success" href="{{route('detalheproduto', $produto->id)}}">Detalhes</a> </td>
                <td> <a class="btn btn-success" href="{{route('alteraproduto', $produto->id)}}">Alterar</a> </td>
                <td> <a class="btn btn-success" href="{{route('entradaproduto', $produto->id)}}">Nova Entrada</a> </td>
                <td> <a class="btn btn-success" href="{{route('saidaproduto', $produto->id)}}">Nova Saída</a> </td>
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