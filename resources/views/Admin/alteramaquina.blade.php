@extends('adminlte::page')

@section('title', 'Alteração de Máquina')

@section('content_header')
<h1>Alteração de máquina</h1>
@endsection

@section('content')


 <form method="POST" enctype="multipart/form-data">
    @csrf




<div class="row">

<div class="col-sm-6">

<x-adminlte-select name="tipoEquipamento" label="Tipo de Equipamento"
    igroup-size="md col-6">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
        </div>
    </x-slot>
    <option>{{$dados->tipoEquipamento}}</option>
    <option>GMG Aberto</option>
    <option>GMG Carenado</option>
    <option>Motobomba</option>
</x-adminlte-select>

</div>


</div> {{-- fechamento row --}}

<div class="row">
    <x-adminlte-input name="identificacao" label="Identificação Do Equipamento" placeholder="G1, G2, G3..."
      value="{{$dados->identificacao}}"  fgroup-class="col-sm-6" />
</div>

<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricante" label="Fabricante do Equipamento" placeholder="Digite o Fabricante"
       value="{{$dados->fabricante}}" fgroup-class="col-md-12" />
</div>



</div> {{--Fechamento row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="numeroSerie" label="Número de Série do Equipamento" required placeholder="Digite o numero de série"
     value="{{$dados->numeroSerie}}"   fgroup-class="col-md-12" />
</div>


</div> {{--Fechamento row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="dataFabricacao" label="Data de Fabricação" placeholder=""
      value="{{$dados->dataFabricacao}}"  fgroup-class="col-md-12" />
</div>

</div> {{--Fechamento row--}}


<div class="row">

<div class="col-md">
    <x-adminlte-input name="potencia" label="Potência" placeholder=""
      value="{{$dados->potencia}}"  fgroup-class="col-md-12" />
</div>

</div> {{--Fechamento row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="abrangencia" label="Abrângencia" placeholder=""
     value="{{$dados->abrangencia}}"   fgroup-class="col-md-6" />
</div>

</div> {{-- Fechamento Row--}}

<hr>

<h4>Tanque na Base</h4>

<div class="row">

<div class="col-sm">

<x-adminlte-select name="tanqueBase" label="Tanque na Base" 
    igroup-size="md">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-engine"></i>
        </div>
    </x-slot>
    <option>{{$dados->tanqueBase}}</option>
    <option>N/A</option>
    <option>Metal S/ Janela de Inspeção</option>
    <option>Metal C/ Janela de Inspeção</option>
    <option>Polietileno S/ Janela de Inspeção</option>
    <option>Polietileno C/ Janela de Inspeção</option>
</x-adminlte-select>

</div>

</div> {{-- fechamento row --}}

<div class="row">

<div class="col-sm">

<x-adminlte-select name="aberturaJanelaBase" label="Possibilidade de Abertura de Janela" 
    igroup-size="md">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-engine"></i>
        </div>
    </x-slot>
    <option>{{$dados->aberturaJanelaBase}}</option>
    <option>Existente</option>
    <option>Sim</option>
    <option>Não</option>
</x-adminlte-select>

</div>

<div class="col-md">
    <x-adminlte-input name="capacidadeTanqueBase" label="Capacidade do Tanque na Base" placeholder=""
    value="{{$dados->capacidadeTanqueBase}}"    fgroup-class="col-md-6" />
</div>

</div> {{--Fechamento Row--}}

<hr>

<h4>Tanque Diário</h4>

<div class="row">

<div class="col-sm">

<x-adminlte-select name="tanqueDiario" label="Tanque Diário" 
    igroup-size="md">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-engine"></i>
        </div>
    </x-slot>
    <option>{{$dados->tanqueDiario}}</option>
    <option>N/A</option>
    <option>Metal S/ Janela de Inspeção</option>
    <option>Metal C/ Janela de Inspeção</option>
    <option>Polietileno S/ Janela de Inspeção</option>
    <option>Polietileno C/ Janela de Inspeção</option>
</x-adminlte-select>

</div>


</div> {{-- fechamento row --}}

<div class="row">

<div class="col-sm">

<x-adminlte-select name="aberturaJanelaDiario" label="Possibilidade de Abertura de Janela do Tanque Diário" 
    igroup-size="md">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-engine"></i>
        </div>
    </x-slot>
    <option>{{$dados->aberturaJanelaDiario}}</option>
    <option>Existente</option>
    <option>Sim</option>
    <option>Não</option>
</x-adminlte-select>

</div>

<div class="col-md">
    <x-adminlte-input name="capacidadeTanqueDiario" label="Capacidade do Tanque Diário" placeholder=""
     value="{{$dados->capacidadeTanqueDiario}}"   fgroup-class="col-md-6" />
</div>

</div> {{--Fechamento Row--}}

<hr>

<h4>Tanque Mensal</h4>

<div class="row">

<div class="col-sm">

<x-adminlte-select name="tanqueMensal" label="Tanque Mensal" 
    igroup-size="md">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-engine"></i>
        </div>
    </x-slot>
    <option>{{$dados->tanqueMensal}}</option>
    <option>N/A</option>
    <option>Metal S/ Janela de Inspeção</option>
    <option>Metal C/ Janela de Inspeção</option>
    <option>Polietileno S/ Janela de Inspeção</option>
    <option>Polietileno C/ Janela de Inspeção</option>
</x-adminlte-select>

</div>


</div> {{-- fechamento row --}}

<div class="row">

<div class="col-sm">

<x-adminlte-select name="aberturaJanelaMensal" label="Possibilidade de Abertura de Janela do Tanque Mensal" 
    igroup-size="md">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
            <i class="fas fa-engine"></i>
        </div>
    </x-slot>
    <option>{{$dados->aberturaJanelaMensal}}</option>
    <option>Existente</option>
    <option>Sim</option>
    <option>Não</option>
</x-adminlte-select>

</div>

<div class="col-md">
    <x-adminlte-input name="capacidadeTanqueMensal" label="Capacidade do Tanque Mensal" placeholder=""
      value="{{$dados->capacidadeTanqueMensal}}"  fgroup-class="col-md-6" />
</div>

</div> {{--Fechamento Row--}}

<hr>

<h4>Motor</h4>

<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricanteMotor" label="Fabricante do Motor" placeholder=""
     value="{{$dados->fabricanteMotor}}"   fgroup-class="col-md-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="modeloMotor" label="Modelo do Motor" placeholder=""
      value="{{$dados->modeloMotor}}"  fgroup-class="col-md-12" />
</div>


</div> {{--Fechamento row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="serieMotor" label="Número de Série do Motor" placeholder=""
     value="{{$dados->serieMotor}}"   fgroup-class="col-md-12" />
</div>




</div> {{--Fechamento row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="quantidadeOleoLubrificante" label="Quantidade de Óleo Lubrificante" placeholder=""
     value="{{$dados->quantidadeOleoLubrificante}}"   fgroup-class="col-md" />
</div>

</div> {{--Fechamento row--}}

<h4>Filtro de Combustível</h4>
<div class="row">

<div class="col-md">
    <x-adminlte-input name="modeloFiltroCombustivel" label="Modelo Filtro de Combustível" placeholder=""
     value="{{$dados->modeloFiltroCombustivel}}"   fgroup-class="col-md-12" />
</div>
<div class="col-md">
    <x-adminlte-input name="quantidadeFiltroCombustivel" label="Quantidade Filtro de Combustível" placeholder=""
    value="{{$dados->quantidadeFiltroCombustivel}}"    fgroup-class="col-md-12" />
</div>



</div> {{--Fechamento row--}}


<h4>Filtro Separador</h4>
<div class="row">

<div class="col-md">
    <x-adminlte-input name="modeloFiltroSeparador" label="Modelo Filtro Separador" placeholder=""
     value="{{$dados->modeloFiltroSeparador}}"   fgroup-class="col-md-12" />
</div>
<div class="col-md">
    <x-adminlte-input name="quantidadeFiltroSeparador" label="Quantidade Filtro Separador" placeholder=""
      value="{{$dados->quantidadeFiltroSeparador}}"  fgroup-class="col-md-12" />
</div>



</div> {{--Fechamento row--}}

<h4>Filtro de Água</h4>
<div class="row">

<div class="col-md">
    <x-adminlte-input name="modeloFiltroAgua" label="Modelo Filtro de Água" placeholder=""
      value="{{$dados->modeloFiltroAgua}}"  fgroup-class="col-md-12" />
</div>
<div class="col-md">
    <x-adminlte-input name="quantidadeFiltroAgua" label="Quantidade Filtro de Água" placeholder=""
    value="{{$dados->quantidadeFiltroAgua}}"    fgroup-class="col-md-12" />
</div>



</div> {{--Fechamento row--}}


<h4>Filtro de Óleo</h4>
<div class="row">

<div class="col-md">
    <x-adminlte-input name="modeloFiltroOleo" label="Modelo Filtro de Óleo" placeholder=""
     value="{{$dados->modeloFiltroOleo}}"   fgroup-class="col-md-12" />
</div>
<div class="col-md">
    <x-adminlte-input name="quantidadeFiltroOleo" label="Quantidade Filtro de Óleo" placeholder=""
     value="{{$dados->quantidadeFiltroOleo}}"   fgroup-class="col-md-12" />
</div>



</div> {{--Fechamento row--}}


<h4>Filtro de Ar</h4>
<div class="row">

<div class="col-md">
    <x-adminlte-input name="modeloFiltroAr" label="Modelo Filtro de Ar" placeholder=""
      value="{{$dados->modeloFiltroAr}}"  fgroup-class="col-md-12" />
</div>
<div class="col-md">
    <x-adminlte-input name="quantidadeFiltroAr" label="Quantidade Filtro de Ar" placeholder=""
      value="{{$dados->quantidadeFiltoAr}}"  fgroup-class="col-md-12" />
</div>



</div> {{--Fechamento row--}}


<hr>

<h4>Alternador</h4>

<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricanteAlternador" label="Fabricante do Alternador" placeholder=""
      value="{{$dados->fabricanteAlternador}}"  fgroup-class="col-md-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="modeloAlternador" label="Modelo do Alternador" placeholder=""
    value="{{$dados->modeloAlternador}}" fgroup-class="col-md-12" />
</div>


</div> {{--Fechamento row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="serieAlternador" label="Número de Série do Alternador" placeholder=""
     value="{{$dados->serieAlternador}}"   fgroup-class="col-md-12" />
</div>




</div> {{--Fechamento row--}}

<hr>

<h4>Módulos</h4>

<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricanteModuloGrupo" label="Fabricante do Módulo do Grupo" placeholder=""
     value="{{$dados->fabricanteModuloGrupo}}"   fgroup-class="col-md-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="modeloModuloGrupo" label="Modelo do Módulo do Grupo" placeholder=""
     value="{{$dados->modeloModuloGrupo}}"   fgroup-class="col-md-12" />
</div>


</div> {{--Fechamento row--}}




<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricanteModuloQta" label="Fabricante do Módulo do QTA" placeholder=""
      value="{{$dados->fabricanteModuloQta}}"  fgroup-class="col-md-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="modeloModuloQta" label="Modelo do Módulo do QTA" placeholder=""
     value="{{$dados->modeloModuloQta}}"   fgroup-class="col-md-12" />
</div>

</div> {{--Fechamento Row--}}




<hr>

<h4>Chave de Transferência</h4>

<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricanteChaveGrupo" label="Fabricante da Chave de Transferência do Grupo" placeholder=""
     value="{{$dados->fabricanteChaveGrupo}}"   fgroup-class="col-md-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="modeloChaveGrupo" label="Modelo da Chave de Transferência do Grupo" placeholder=""
    value="{{$dados->modeloChaveGrupo}}"   fgroup-class="col-md-12" />
</div>


</div> {{--Fechamento Row--}}


<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricanteChaveRede" label="Fabricante da Chave de Transferência da Rede" placeholder=""
     value="{{$dados->fabricanteChaveRede}}"   fgroup-class="col-md-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="modeloChaveRede" label="Modelo da Chave de Transferência da Rede" placeholder=""
      value="{{$dados->modeloChaveRede}}"  fgroup-class="col-md-12" />
</div>


</div> {{--Fechamento Row--}}



</div> {{--Fim da Row--}}
<br><br>
<div id="buttons">
    <button class="btn btn-block btn-success" id="concluir" type="submit"><i class="fas fa-upload"></i> Salvar </button>
</div>

</form>



@endsection {{-- fechamento da section content --}}

@section('css')

<link rel="stylesheet" type="text/css" href="{{ url('vendor/dropify/dropify.min.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
 <link rel="stylesheet" href="{{url('vendor/autocomplete/easy-autocomplete.min.css')}}">
 <link rel="stylesheet" href="{{url('vendor/autocomplete/easy-autocomplete.themes.min.css')}}">


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

   <script>
        function getDadosProduto(cliente) {
            let url = 'client/' + cliente

            let xmlHttp = new XMLHttpRequest()
            xmlHttp.open('GET', url)

            xmlHttp.onreadystatechange = () => {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    let dadosJSONText = xmlHttp.responseText
                    let dadosJSONObj = JSON.parse(dadosJSONText)

                    
                    document.getElementById('id_cliente').value = dadosJSONObj.id




                }
            }

            xmlHttp.send()
        }
    </script>

  <!--Função autocomplete-->

<script>
    var options = {
        url: "clients",

        getValue: "name",


        list: {
            match: {
                enabled: true
            }
        }
    };

    $("#cliente").easyAutocomplete(options);
</script>
@endsection