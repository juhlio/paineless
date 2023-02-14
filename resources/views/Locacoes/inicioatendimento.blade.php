@extends('adminlte::page')

@section('title', 'Inicio Atendimento Locação')

@section('content_header')
<h1> Início Atedimento Máquinas de Locação</h1>
@endsection


@section('content')

<form method="POST" enctype="multipart/form-data">
    @csrf

<div class="card p-3 mb-3">

<div class="row">
      <div class="col-md">
    <x-adminlte-input name="nome" label="Nome" 
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="nome" label="Nome" 
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="nome" label="Nome" 
        fgroup-class="col-sm-12" />
    </div>
    
    
</div>



<br><br>
<div id="buttons">
    <button class="btn btn-block btn-success" type="submit"><i class="fas fa-upload"></i> Salvar </button>
</div>

</form>
</div>


@endsection