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
    <x-adminlte-input name="cliente" label="Cliente" disabled value="{{$cliente->nome}}"
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="data" label="Data"  value="{{date('d-m-Y')}}"
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
    <x-adminlte-input name="atendimento" label="Atendimento" value="Atendimento" disabled
        fgroup-class="col-sm-12" />
    </div>
    
    
</div>




<div class="row">

    <div class="col-md">
    <x-adminlte-input name="endereco" label="Endereço"
        fgroup-class="col-sm-12" />
    </div>



</div>

<div class="row">

    <div class="col-md">
        <x-adminlte-select name="tipoAtendimento" label="Tipo" 
            igroup-size="md">
            <x-adminlte-options :options="['Emergencial' => 'Emergencial','Programado' => 'Programado']"
                disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select> 
            
    </div>

    <div class="col-md">
       <x-adminlte-input name="horaChamado" label="Hora Chamado" value="{{date('d-m-Y d:i')}}"
        fgroup-class="col-sm-12" />
    </div>

  <div class="col-md">
        <x-adminlte-select name="tipoConexao" label="Tipo Conexão" 
            igroup-size="md">
            <x-adminlte-options :options="['Subterrânea' => 'Subterrânea','Aérea' => 'Aérea']"
                disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select> 
            
    </div>

</div>

<div class="row">

    <div class="col-md">

         <x-adminlte-select name="caminhao" label="Selecione o Caminhão" 
            igroup-size="md">
            <x-adminlte-options :options="['1' => '1','2' => '2', '3' => '3', '4' => '4', '5' => '5']"
                empty-option="Escolha uma opção"/>
        </x-adminlte-select> 
    </div>

    <div class="col-md">
       <x-adminlte-input name="chegadaGmg" label="Chegada GMG" value="{{date('d-m-Y d:i')}}"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
        <x-adminlte-select name="status" label="Status" id="status"
            igroup-size="md">
            <x-adminlte-options :options="['Stand By' => 'Stand By', 'Aguardando COD' => 'Aguardando COD', 
            'Gerador Ligado' => 'Gerador Ligado']"
                empty-option="Escolha uma opção"/>
        </x-adminlte-select> 
            
    </div>
            

        
</div>

<h2>Cabeamento Utilizado</h2>

<div class="row">

    <div class="col-md">
        <x-adminlte-select name="seccaoCondutor" label="Secção do Condutor" 
        igroup-size="md">
            <x-adminlte-options :options="['70' => '70mm', '95' => '95mm', '120' => '120mm',
            '240' => '240mm']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select> 
    </div>


    <div class="col-md">
        <x-adminlte-select name="lancesFase" label="Lances por Fase" 
        igroup-size="md">
            <x-adminlte-options :options="['1' => '1', '2' => '2', '3' => '3',
            '4' => '4', '5' => '5', '6' => '6']"
            empty-option="Escolha uma opção"/>
        </x-adminlte-select>

    </div>

    <div class="col-md">
        <x-adminlte-select name="lancesNeutro" label="Lances Neutro" 
        igroup-size="md">
            <x-adminlte-options :options="['1' => '1', '2' => '2', '3' => '3',
            '4' => '4', '5' => '5', '6' => '6']"
            empty-option="Escolha uma opção"/>
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


    <div class="col-md">
        <x-adminlte-input name="inicioOperacao" label="Inicio da Operação" value="{{date('d-m-Y d:i')}}"
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

// Registra a função "atualizarHorimetroVisibilidade" para ser chamada toda vez que o valor do campo "Status" for alterado
statusInput.addEventListener('change', atualizarHorimetroVisibilidade);

// Chama a função uma vez para definir a visibilidade inicial do campo "Horímetro"
atualizarHorimetroVisibilidade();

</script>

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