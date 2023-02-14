
@extends('adminlte::page')

@section('title', ' Saída de Produto')

@section('content_header')
<h1>Nova saída para {{$produto->descricao}} </h1>
@endsection

@section('content')

 <form method="POST" enctype="multipart/form-data">
    @csrf

<div class="card p-3 mb-3">

<div class="row">
    <div class="col-md">
    <x-adminlte-input name="codInterno"  label="Código Interno" disabled  value="ess_00{{$produto->id}}"
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="produto"  label="Produto" disabled value="{{$produto->descricao}}"
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="codfabricante" label="Codigo Fabricante" disabled value="{{$produto->codFabricante}}"
        fgroup-class="col-sm-12" />
    </div>

<div class="col-md">
    <x-adminlte-input name="fabricante"  label="Fabricante" disabled value="{{$produto->fabricante}}"
        fgroup-class="col-sm-12" />
    </div>


</div>

<hr>
<h5>Dados da Saída</h5>
<div class="row">

    <div class="col-md">
    <x-adminlte-input name="quantidade"   label="Quantidade" fgroup-class="col-sm-12" />
    </div>

     <div class="col-md">
    <x-adminlte-select name="estadoProduto" label="Estado do Produto"
    igroup-size="md">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info"></div>
    </x-slot>
    <option>Novo</option>
    <option>Usado</option>
    </x-adminlte-select>
    </div>
    </div>




<div class="row">

    <div class="col-md">
{{-- Disabled with predefined value --}}


<x-adminlte-input-date name="datetimepicker"  
    label="Data">
    <x-slot name="appendSlot">
       
    </x-slot>

</x-adminlte-input-date>

</div>

<div class="col-md">
    <x-adminlte-input name="cliente"   label="Cliente" fgroup-class="col-sm-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="solicitante"   label="Solicitante" fgroup-class="col-sm-12" />
</div>


    

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
<script>

    $(function() {
         $( "#datetimepicker" ).datepicker({
            format:"dd/mm/yyyy",
            language: 'br'

    
         });
       });  

   
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<input type="text" class="form-control pull-right" id="datetimepicker">



@endsection