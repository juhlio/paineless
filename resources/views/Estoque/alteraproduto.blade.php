@extends('adminlte::page')

@section('title', $produto->descricao.' Alteração')

@section('content_header')
<h1>Alteração de {{$produto->descricao}}</h1>
@endsection

@section('content')

<div class="card p-3 mb-3">

<div class="row">
    <div class="col-md">
        <strong> Código Interno: </strong> ess_00{{$produto->id}} <br>
    </div>

</div>

<hr>


<form method="POST" enctype="multipart/form-data">
    @csrf

<div class="card p-3 mb-3">

<div class="row">
    <div class="col-md">
    <x-adminlte-input name="descricao" label="Descrição" value="{{$produto->descricao}}" 
        fgroup-class="col-sm-12" />
    </div>

</div>

<div class="row">
    <div class="col-md">
    <x-adminlte-input name="fabricante"  label="Fabricante"  value="{{$produto->fabricante}}"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
    <x-adminlte-input name="tipo"  label="Tipo"  value="{{$produto->tipo}}"
        fgroup-class="col-sm-12" />
    </div>

</div>

<div class="row">

    <div class="col-md">
    <x-adminlte-input name="codFabricante"  label="Código Fabricante" value="{{$produto->codFabricante}}" fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="codEan"   label="Código Ean" value="{{$produto->codEan}}" fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="ncm"  label="NCM" fgroup-class="col-sm-12" value="{{$produto->ncm}}" />
    </div>
</div>


<div class="row">
    
    <div class="col-md">
    <x-adminlte-select name="unidadeMedida" label="Unidade de Medida"
    igroup-size="md">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info"></div>
    </x-slot>
    <option>Uni</option>
    <option>Peça</option>
    <option>Litro</option>
    <option>Par</option>
    <option>Metro</option>
</x-adminlte-select>
    </div>


    <div class="col-md">
    <x-adminlte-input name="localizacao"   label="Localização" value="{{$produto->localizacao}}" fgroup-class="col-sm-12" />
    </div>
</div>



<hr>

<br><br>
<div id="buttons">
    <button class="btn btn-block btn-success" type="submit"><i class="fas fa-upload"></i> Salvar </button>
</div>


</form>



@endsection
