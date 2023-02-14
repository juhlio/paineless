
@extends('adminlte::page')

@section('title', $cliente->nome.' Alteração')

@section('content_header')
<h1>Alterando dados de {{$cliente->nome}}</h1>
@endsection

@section('content')

 <form method="POST" enctype="multipart/form-data">
    @csrf

<div class="card p-3 mb-3">

<div class="row">
    <div class="col-md">
    <x-adminlte-input name="nome" label="Nome" value="{{$cliente->nome}}" 
        fgroup-class="col-sm-12" />
    </div>

</div>

<div class="row">
    <div class="col-md">
    <x-adminlte-input name="endereco"  label="endereco" value="{{$cliente->endereco}}" 
        fgroup-class="col-sm-12" />
    </div>

</div>

<div class="row">

    <div class="col-md">
    <x-adminlte-input name="cep" value="{{$cliente->cep}}"  label="CEP" fgroup-class="col-sm-8" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="estado" value="{{$cliente->estado}}"  label="Estado" fgroup-class="col-sm-2" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="regiao" value="{{$cliente->regiao}}"  label="Região" fgroup-class="col-sm-8" />
    </div>
</div>


<div class="row">
    
    <div class="col-md">
    <x-adminlte-input name="cnpj" id="cnpj" label="CNPJ" value="{{$cliente->cnpj}}" 
        fgroup-class="col-sm-10" />
    </div>


    <div class="col-md">
    <x-adminlte-input name="ie" value="{{$cliente->ie}}"  label="IE" fgroup-class="col-sm-10" />
    </div>
</div>



<hr>

<div class="row">

<div class="col-sm">

<x-adminlte-select name="tipoContrato" label="Tipo de Contrato"
    igroup-size="md">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info"></div>
    </x-slot>
    <option>Venda</option>
    <option>Locação</option>
    <option selected >Manutenção</option>
</x-adminlte-select>

</div>


<div class="col-sm">

<x-adminlte-select name="periodicidade" label="Periodicidade"
    igroup-size="md">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info"></div>
    </x-slot>
    <option>Mensal</option>
    <option>Bimestral</option>
    <option selected >Trimestral</option>
    <option>N/A</option>
</x-adminlte-select>

</div>



</div>

<div class="row">

<div class="col-sm">

<x-adminlte-select name="visitas" label="Vsitas"
    igroup-size="md">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info"></div>
    </x-slot>
    <option>PAR</option>
    <option>IMPART</option>
    <option selected >PAR/IMPAR</option>
    <option>N/A</option>
</x-adminlte-select>

</div>

</div>

<div class="row">
    
    <div class="col-md">
    <x-adminlte-input name="sla" label="SLA" value="{{$cliente->sla}}" 
        fgroup-class="col-sm-10" />
    </div>


    <div class="col-md">
    <x-adminlte-input name="observacao" value="{{$cliente->observacao}}"  label="Observação" fgroup-class="col-sm-10" />
    </div>
</div>


<hr>

<div class="row">
    
    <div class="col-md">
    <x-adminlte-input name="vendedor" label="Vendedor Responsável" value="{{$cliente->vendedor}}" 
        fgroup-class="col-sm-10" />
    </div>


    <div class="col-md">
    <x-adminlte-input name="tecnico" value="{{$cliente->tecnico}}"  label="Técnico Responsável" fgroup-class="col-sm-10" />
    </div>
</div>




<br><br>
<div id="buttons">
    <button class="btn btn-block btn-success" type="submit"><i class="fas fa-upload"></i> Salvar </button>
</div>

</form>
</div>


@endsection