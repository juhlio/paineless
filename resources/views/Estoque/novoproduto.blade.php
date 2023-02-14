
@extends('adminlte::page')

@section('title', ' Cadastro de Novo Produto')

@section('content_header')
<h1>Cadastro de Novo Produto </h1>
@endsection

@section('content')

 <form method="POST" enctype="multipart/form-data">
    @csrf

<div class="card p-3 mb-3">

<div class="row">
    <div class="col-md">
    <x-adminlte-input name="descricao" label="Descrição"  
        fgroup-class="col-sm-12" />
    </div>

</div>

<div class="row">
    <div class="col-md">
    <x-adminlte-input name="fabricante"  label="Fabricante" 
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
    <x-adminlte-input name="tipo"  label="Tipo" 
        fgroup-class="col-sm-12" />
    </div>

</div>

<div class="row">

    <div class="col-md">
    <x-adminlte-input name="codFabricante"  label="Código Fabricante" fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="codEan"   label="Código Ean" fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="ncm"  label="NCM" fgroup-class="col-sm-12" />
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
    <x-adminlte-input name="localizacao"   label="Localização" fgroup-class="col-sm-12" />
    </div>
</div>



<hr>

<div class="row">

<div class="col-sm">
<h5>Envie aqui a imagem</h5>
<input type="file"  name="foto" class="dropify" data-max-file-size="3M" data-show-errors="true"  />
</div>

</div>


<br><br>
<div id="buttons">
    <button class="btn btn-block btn-success" type="submit"><i class="fas fa-upload"></i> Salvar </button>
</div>

</form>
</div>


@endsection

@section('css')

<link rel="stylesheet" type="text/css" href="{{ url('vendor/dropify/dropify.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">


@endsection


@section('js')

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



@endsection