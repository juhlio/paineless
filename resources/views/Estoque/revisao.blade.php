@extends('adminlte::page')

@section('title', 'Revisão de Cadastro')

@section('content_header')
<h1>Revisão Cadastro Equipamento</h1>
@endsection

@section('content')


 <form method="POST" enctype="multipart/form-data">
    @csrf


<div class="row">
    <div class="col-md">
    <x-adminlte-input name="client" id="cliente" label="Cliente" placeholder="Digite o Cliente" onblur="getDadosProduto(this.value)"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
    <x-adminlte-input name="id_cliente" id="id_cliente" readonly label="ID" fgroup-class="col-sm-2" />
    </div>
</div>

{{-- With prepend slot, lg size, and label --}}

<div class="row">

<div class="col-sm-6">

<x-adminlte-select name="tipoEquipamento" label="Tipo de Equipamento"
    igroup-size="md col-6">
    <x-slot name="prependSlot">
        <div class="input-group-text bg-gradient-info">
        </div>
    </x-slot>
    <option>GMG Aberto</option>
    <option>GMG Carenado</option>
    <option>Motobomba</option>
</x-adminlte-select>

</div>


</div> {{-- fechamento row --}}

<div class="row">
    <x-adminlte-input name="identificacao" label="Identificação Do Equipamento" placeholder="G1, G2, G3..."
        fgroup-class="col-sm-6" />
</div>

<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricante" label="Fabricante do Equipamento" placeholder="Digite o Fabricante"
        fgroup-class="col-md-12" />
</div>



</div> {{--Fechamento row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="numeroSerie" label="Número de Série do Equipamento" placeholder="Digite o numero de série"
        fgroup-class="col-md-12" />
</div>


</div> {{--Fechamento row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="dataFabricacao" label="Data de Fabricação" placeholder=""
        fgroup-class="col-md-12" />
</div>

</div> {{--Fechamento row--}}


<div class="row">

<div class="col-md">
    <x-adminlte-input name="potencia" label="Potência" placeholder=""
        fgroup-class="col-md-12" />
</div>

</div> {{--Fechamento row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="abrangencia" label="Abrângencia" placeholder=""
        fgroup-class="col-md-6" />
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
    <option>Existente</option>
    <option>Sim</option>
    <option>Não</option>
</x-adminlte-select>

</div>

<div class="col-md">
    <x-adminlte-input name="capacidadeTanqueBase" label="Capacidade do Tanque na Base" placeholder=""
        fgroup-class="col-md-6" />
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
    <option>Existente</option>
    <option>Sim</option>
    <option>Não</option>
</x-adminlte-select>

</div>

<div class="col-md">
    <x-adminlte-input name="capacidadeTanqueDiario" label="Capacidade do Tanque Diário" placeholder=""
        fgroup-class="col-md-6" />
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
    <option>Existente</option>
    <option>Sim</option>
    <option>Não</option>
</x-adminlte-select>

</div>

<div class="col-md">
    <x-adminlte-input name="capacidadeTanqueMensal" label="Capacidade do Tanque Mensal" placeholder=""
        fgroup-class="col-md-6" />
</div>

</div> {{--Fechamento Row--}}

<hr>

<h4>Motor</h4>

<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricanteMotor" label="Fabricante do Motor" placeholder=""
        fgroup-class="col-md-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="modeloMotor" label="Modelo do Motor" placeholder=""
        fgroup-class="col-md-12" />
</div>


</div> {{--Fechamento row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="serieMotor" label="Número de Série do Motor" placeholder=""
        fgroup-class="col-md-12" />
</div>




</div> {{--Fechamento row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="quantidadeOleoLubrificante" label="Quantidade de Óleo Lubrificante" placeholder=""
        fgroup-class="col-md" />
</div>

</div> {{--Fechamento row--}}

<h4>Filtro de Combustível</h4>
<div class="row">

<div class="col-md">
    <x-adminlte-input name="modeloFiltroCombustivel" label="Modelo Filtro de Combustível" placeholder=""
        fgroup-class="col-md-12" />
</div>
<div class="col-md">
    <x-adminlte-input name="quantidadeFiltroCombustivel" label="Quantidade Filtro de Combustível" placeholder=""
        fgroup-class="col-md-12" />
</div>



</div> {{--Fechamento row--}}


<h4>Filtro Separador</h4>
<div class="row">

<div class="col-md">
    <x-adminlte-input name="modeloFiltroSeparador" label="Modelo Filtro Separador" placeholder=""
        fgroup-class="col-md-12" />
</div>
<div class="col-md">
    <x-adminlte-input name="quantidadeFiltroSeparador" label="Quantidade Filtro Separador" placeholder=""
        fgroup-class="col-md-12" />
</div>



</div> {{--Fechamento row--}}

<h4>Filtro de Água</h4>
<div class="row">

<div class="col-md">
    <x-adminlte-input name="modeloFiltroAgua" label="Modelo Filtro de Água" placeholder=""
        fgroup-class="col-md-12" />
</div>
<div class="col-md">
    <x-adminlte-input name="quantidadeFiltroAgua" label="Quantidade Filtro de Água" placeholder=""
        fgroup-class="col-md-12" />
</div>



</div> {{--Fechamento row--}}


<h4>Filtro de Óleo</h4>
<div class="row">

<div class="col-md">
    <x-adminlte-input name="modeloFiltroOleo" label="Modelo Filtro de Óleo" placeholder=""
        fgroup-class="col-md-12" />
</div>
<div class="col-md">
    <x-adminlte-input name="quantidadeFiltroOleo" label="Quantidade Filtro de Óleo" placeholder=""
        fgroup-class="col-md-12" />
</div>



</div> {{--Fechamento row--}}


<h4>Filtro de Ar</h4>
<div class="row">

<div class="col-md">
    <x-adminlte-input name="modeloFiltroAr" label="Modelo Filtro de Ar" placeholder=""
        fgroup-class="col-md-12" />
</div>
<div class="col-md">
    <x-adminlte-input name="quantidadeFiltroAr" label="Quantidade Filtro de Ar" placeholder=""
        fgroup-class="col-md-12" />
</div>



</div> {{--Fechamento row--}}


<hr>

<h4>Alternador</h4>

<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricanteAlternador" label="Fabricante do Alternador" placeholder=""
        fgroup-class="col-md-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="modeloAlternador" label="Modelo do Alternador" placeholder=""
        fgroup-class="col-md-12" />
</div>


</div> {{--Fechamento row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="serieAlternador" label="Número de Série do Alternador" placeholder=""
        fgroup-class="col-md-12" />
</div>




</div> {{--Fechamento row--}}

<hr>

<h4>Módulos</h4>

<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricanteModuloGrupo" label="Fabricante do Módulo do Grupo" placeholder=""
        fgroup-class="col-md-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="modeloModuloGrupo" label="Modelo do Módulo do Grupo" placeholder=""
        fgroup-class="col-md-12" />
</div>


</div> {{--Fechamento row--}}


</div> {{--Fechamento Row--}}

<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricanteModuloQta" label="Fabricante do Módulo do QTA" placeholder=""
        fgroup-class="col-md-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="modeloModuloQta" label="Modelo do Módulo do QTA" placeholder=""
        fgroup-class="col-md-12" />
</div>

</div> {{--Fechamento Row--}}




<hr>

<h4>Chave de Transferência</h4>

<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricanteChaveGrupo" label="Fabricante da Chave de Transferência do Grupo" placeholder=""
        fgroup-class="col-md-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="modeloChaveGrupo" label="Modelo da Chave de Transferência do Grupo" placeholder=""
        fgroup-class="col-md-12" />
</div>


</div> {{--Fechamento Row--}}


<div class="row">

<div class="col-md">
    <x-adminlte-input name="fabricanteChaveRede" label="Fabricante da Chave de Transferência da Rede" placeholder=""
        fgroup-class="col-md-12" />
</div>

<div class="col-md">
    <x-adminlte-input name="modeloChaveRede" label="Modelo da Chave de Transferência da Rede" placeholder=""
        fgroup-class="col-md-12" />
</div>


</div> {{--Fechamento Row--}}



</div> {{--Fim da Row--}}
<br><br>
<div id="buttons">
    <button class="btn btn-block btn-success" id="concluir" type="submit"><i class="fas fa-upload"></i> Enviar </button>
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