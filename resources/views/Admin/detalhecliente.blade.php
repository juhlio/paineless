@extends('adminlte::page')

@section('title', $cliente->nome.' Detalhes')

@section('content_header')
<h1>Detalhes de {{$cliente->nome}}</h1>
@endsection

@section('content')

<div class="card p-3 mb-3">

<div class="row">
    <div class="col-md">
        <strong> Nome: </strong> {{$cliente->nome}}<br>
        <strong> CNPJ: </strong> {{$cliente->cnpj}}<br>
        <strong> IE: </strong> {{$cliente->ie}}
    </div>


    <div class="col-md">
        <strong> Endereço: </strong> {{$cliente->endereco}}<br>
        <strong> Estado: </strong> {{$cliente->estado}}<br>
        <strong> CEP: </strong> {{$cliente->cep}} <br>
        <strong> Região: </strong> {{$cliente->regiao}}
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md">
        <strong> Tipo de Contrato: </strong> {{$cliente->tipoContrato}}<br>
        <strong> Periodicidade: </strong> {{$cliente->periodicidade}}<br>
        <strong> Visitas: </strong> {{$cliente->visitas}}<br>
        <strong> SLA: </strong> {{$cliente->sla}}<br>
        <strong> Observação: </strong> {{$cliente->observacao}}<br>
    </div>


    <div class="col-md">
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md">
        <strong> Vendedor Responsável: </strong> {{$cliente->vendedor}}<br>
        <strong> Técnico Responsável: </strong> {{$cliente->tecnico}}<br>
    </div>


    <div class="col-md">
    </div>
</div>


<br><br>
<div id="buttons">
    <a class="btn btn-success" href="{{route('alteracliente', $cliente->id)}}"><i class="fas fa-upload"></i> Alterar Informações </a>
</div>

<br><br>

<h4>Equipamentos</h4>

<table id="example" class="hover" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fabricante Motor</th>
                <th>Modelo Motor</th>
                <th>Série Motor</th>
                <th>Detalhes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($maquinas as $maquina)
                <td>{{$maquina->id}}</td>
                <td>{{$maquina->fabricanteMotor}}</td>
                <td>{{$maquina->modeloMotor}}</td>
                <td>{{$maquina->serieMotor}}</td>
                <td> <a class="btn btn-success" href="{{route('detalhemaquina', $maquina->id)}}">Mais Informações</a> </td>
                @endforeach
            </tr>
        
        </tbody>
    </table>

</div>


@endsection