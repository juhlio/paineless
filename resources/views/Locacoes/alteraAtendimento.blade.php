@extends('adminlte::page')

@section('title', 'Inicio Atendimento Locação')

@section('content_header')
<h1> Atendimento </h1>
@endsection

@section('content')

<form method="POST" enctype="multipart/form-data">
    @csrf


<div class="card p-3 mb-3">

<div class="row">
    
    <div class="col-md">
    <x-adminlte-input name="data" label="Data Chamado"  value="{{$dadosRelatorio->horaChamado}}" readonly
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="atendimento" label="Atendimento" value="Atendimento" disabled readonly
        fgroup-class="col-sm-12" />
    </div>
    
    
</div>




<div class="row">

    <div class="col-md">
    <x-adminlte-input name="endereco" label="Endereço" value="{{$dadosRelatorio->endereco}}" readonly
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="tipoAtendimento" label="Tipo" value="{{$dadosRelatorio->tipoAtendimento}}" readonly
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="chegadaGmg" label="Chegada Do GMG" value="{{$dadosRelatorio->chegadaGmg}}" readonly
        fgroup-class="col-sm-12" />
    </div>



</div>


<div class="row">

    <div class="col-md">
    <x-adminlte-input name="tipoConexao" label="Conexão" value="{{$dadosRelatorio->tipoConexao}}" readonly
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="caminhao" label="Caminhao" value="{{$dadosRelatorio->caminhao}}" readonly
        fgroup-class="col-sm-12" />
    </div>



</div>

@if($dadosRelatorio->statusRelatorio === 3)
<div class="row">

    <div class="col-md">
    <x-adminlte-input name="horimetroInicial" label="Horimetro Inicial" value="{{$dadosRelatorio->horimetroInicial}}" readonly
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="kwhInicial" label="Kwh Inicial" value="{{$dadosRelatorio->kwhInicial}}" readonly
        fgroup-class="col-sm-12" />
    </div>



</div>

@endif



<div class="row">

    <div class="col-md-4">
    <x-adminlte-input  name="statusAtual" label="Status Atual" value="{{$dadosRelatorio->statusRelatorio}}" readonly
        fgroup-class="col-sm-12" />
    </div>

</div>

<div class="row">

        <div class="col-md-4">
        <x-adminlte-select name="status" label="Novo Status" id="status" igroup-size="md">
            @if($dadosRelatorio->statusRelatorio === 1)
            <x-adminlte-options :options="['Aguardando COD' => 'Aguardando COD', 
            'Gerador Ligado' => 'Gerador Ligado', 'Atendimento Finalizado' => 'Atendimento Finalizado' ]"
                empty-option="Escolha uma opção"/>
            @elseif($dadosRelatorio->statusRelatorio === 2)
            <x-adminlte-options :options="['Gerador Ligado' => 'Gerador Ligado', 'Atendimento Finalizado' => 'Atendimento Finalizado' ]"
                empty-option="Escolha uma opção"/>
            @elseif($dadosRelatorio->statusRelatorio === 3)
            <x-adminlte-options :options="['Atendimento Finalizado' => 'Atendimento Finalizado' ]"
                empty-option="Escolha uma opção"/>
                @endif
        </x-adminlte-select> 
           
    </div>
            

        
</div>


<div class="row" id="horimetro-row">

    <div class="col-md">
        <x-adminlte-input name="horimetroInicial" label="Horimento Inicial" 
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
        <x-adminlte-input name="kwhInicial" label="Kwh Inicial" 
        fgroup-class="col-sm-12" />
    </div>



</div>

<div class="row" id="horimetro-fim-row">

    <div class="col-md">
        <x-adminlte-input name="horimetroFinal" label="Horimento Final" 
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
        <x-adminlte-input name="kwhFinal" label="Kwh Final" 
        fgroup-class="col-sm-12" />
    </div>



</div>


<div class="row">

    <div class="col-md">

    <x-adminlte-textarea name="obsGerais" label="Observações gerais"/>
    
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

    // Obtém os elementos HTML dos campos de "Status" e "Horímetro"
const statusInput = document.getElementById('status');
const horimetroRow = document.getElementById('horimetro-row');
const horimetroFimRow = document.getElementById('horimetro-fim-row');

// Função que será chamada toda vez que o valor do campo "Status" for alterado
function atualizarHorimetroVisibilidade() {
  // Verifica se o valor selecionado no campo "Status" é "Gerador Ligado"
  if (statusInput.value === 'Gerador Ligado') {
    // Se for, exibe a linha do campo "Horímetro"
    horimetroRow.style.display = 'table-row';
  } else {
    // Caso contrário, esconde a linha do campo "Horímetro"
    horimetroRow.style.display = 'none';
  }
}

// Função que será chamada toda vez que o valor do campo "Status" for alterado
function atualizarHorimetroFimVisibilidade() {
  // Verifica se o valor selecionado no campo "Status" é "Gerador Ligado"
  if (statusInput.value === 'Atendimento Finalizado') {
    // Se for, exibe a linha do campo "Horímetro"
    horimetroFimRow.style.display = 'table-row';
  } else {
    // Caso contrário, esconde a linha do campo "Horímetro"
    horimetroFimRow.style.display = 'none';
  }
}

// Registra a função "atualizarHorimetroVisibilidade" para ser chamada toda vez que o valor do campo "Status" for alterado
statusInput.addEventListener('change', atualizarHorimetroVisibilidade);
// Registra a função "atualizarHorimetroVisibilidade" para ser chamada toda vez que o valor do campo "Status" for alterado
statusInput.addEventListener('change', atualizarHorimetroFimVisibilidade);

// Chama a função uma vez para definir a visibilidade inicial do campo "Horímetro"
atualizarHorimetroVisibilidade();
atualizarHorimetroFimVisibilidade();

</script>




@endsection