@extends('adminlte::page')

@section('title', 'Inicio Atendimento Locação')

@section('content_header')
<h1> Preventiva </h1>
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
    <x-adminlte-input name="atendimento" label="Atendimento" value="Pm1" disabled
        fgroup-class="col-sm-12" />
    </div>
    
    
</div>




<div class="row">

     <div class="col-md">
        <x-adminlte-select name="tipo" label="Tipo" 
        igroup-size="md">
         <x-adminlte-options :options="['Periódico' => 'Periódico','Venda' => 'Venda',
          'Devolução' => 'Devolução', 'Saída para Locação' => 'Saída para Locação', 'Retorno de Locação' => 'Retorno de Locação']"
            disabled="1" empty-option="Escolha uma opção"/>
    </x-adminlte-select> 
        
    </div>

    <div class="col-md">
    <x-adminlte-input name="horimetro" label="Horimetro" type="number"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
    <x-adminlte-input name="kwh" label="Kwh" type="number"
        fgroup-class="col-sm-12" />
    </div>

</div>

<div class="row">

    <div class="col-md">
        <x-adminlte-select name="colmeia" label="Condição da colméia do radiador" 
        igroup-size="md">
         <x-adminlte-options :options="['Livre' => 'Livre','Obstruida' => 'Obstruida', 'Com Vazamento' => 'Com Vazamento']"
            disabled="1" empty-option="Escolha uma opção"/>
    </x-adminlte-select> 
        
    </div>


    <div class="col-md">
        <x-adminlte-select name="aguaRadiador" label="Nível de água no radiador e/ou reservatório (quando houver)" 
        igroup-size="md">
            <x-adminlte-options :options="['Mínimo' => 'Minimo','Maximo' => 'Máximo']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>

        <x-adminlte-input name="obsAguaRadiador" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
        <x-adminlte-select name="aditivoArrefecedor" label="Verificar a concentração de aditivo no líquido arrefecedor" 
        igroup-size="md">
            <x-adminlte-options :options="['Aprovado' => 'Aprovado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>

        <x-adminlte-input name="obsAditivoArrefecedor" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>



</div>

<div class="row">

    <div class="col-md">
        <x-adminlte-select name="oleoCarter" label="Nível de óleo lubrificante no carter" 
        igroup-size="md">
             <x-adminlte-options :options="['Mínimo' => 'Mínimo', 'Máximo' => 'Máximo']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select> 
        <x-adminlte-input name="obsOleoCarter" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
        <x-adminlte-select name="mangotes" label="Verificar mangotes, abraçadeiras, tubos, conexões e mangueiras" 
        igroup-size="md">
            <x-adminlte-options :options="['Verificado' => 'Verificado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>

        <x-adminlte-input name="obsMangotes" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
        <x-adminlte-select name="preAquecimento" label="Verificar o funcionamento do Pré-Aquecimento do Motor" 
        igroup-size="md">
            <x-adminlte-options :options="['Aprovado' => 'Aprovado' , 'Não Aplicado' => 'Não Aplicado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>

        <x-adminlte-input name="obsPreAquecimento" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>

</div>


<div class="row">

    <div class="col-md">
        <x-adminlte-select name="limpezaSensorRotacao" label="Efetuada Limpeza do sensor de rotação" 
        igroup-size="md">
             <x-adminlte-options :options="['Aprovado' => 'Aprovado', 'Não Aplicado' => 'Não Aplicado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select> 
        <x-adminlte-input name="obsLimpezaSensorRotacao" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
        <x-adminlte-select name="vazamentoJuntas" label="Verificar a existência de vazamentos através das juntas e retentores" 
        igroup-size="md">
            <x-adminlte-options :options="['Aprovado' => 'Aprovado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>

        <x-adminlte-input name="obsVazamentoJuntas" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
        <x-adminlte-select name="nivelCombustivel" label="Qual o nível de combustível?" 
        igroup-size="md">
            <x-adminlte-options :options="['Cheio' => 'Cheio' , '3/4' => '3/4', '1/2' => '1/2', '1/4' => '1/4','Vazio' => 'Vazio','Não Aplicado' => 'Não Aplicado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>

        <x-adminlte-input name="obsNivelCombustivel" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>

</div>

<div class="row">

    <div class="col-md">
        <x-adminlte-select name="filtroDeAr" label="Qual a condição do filtro de ar" 
        igroup-size="md">
             <x-adminlte-options :options="['Sem Restrição' => 'Sem Restrição', 'Com Restrição' => 'Com Restrição']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select> 
        <x-adminlte-input name="obsFiltroDeAr" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
        <x-adminlte-select name="correias" label="Verificar correias, tensionando-as se necessário" 
        igroup-size="md">
            <x-adminlte-options :options="['Aprovado' => 'Aprovado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>

        <x-adminlte-input name="obsCorreias" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
        <x-adminlte-select name="gradesTampas" label="Verificar as grades e tampas de proteção das correias e hélice" 
        igroup-size="md">
            <x-adminlte-options :options="['Aprovado' => 'Aprovado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>

        <x-adminlte-input name="obsGradesTampas" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>

</div>

<div class="row">

    <div class="col-md">
        <x-adminlte-select name="reguladorDeTensao" label="Verificar Regulador de Tensão" 
        igroup-size="md">
             <x-adminlte-options :options="['Aprovado' => 'Aprovado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select> 
        <x-adminlte-input name="obsReguladorDeTensao" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">
        <x-adminlte-select name="bornes" label="Verificar as conexões do painel de controle do GMG, bornês, relês etc..." 
        igroup-size="md">
            <x-adminlte-options :options="['Aprovado' => 'Aprovado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>

        <x-adminlte-input name="obsBornes" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
        <x-adminlte-select name="baterias" label="Baterias" 
        igroup-size="md">
            <x-adminlte-options :options="['Descarregada' => 'Descarregada','Carga Média' => 'Carga Média','Carregada' => 'Carregada']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>

    
    </div>

</div>


<div class="row">
    <div class="col-md">

        <x-adminlte-input name="tensaoContinuaCarregador" placeholder="Tensão Continua" label="Verificar o funcionamento do carregador das baterias (Se aplicável)"
        fgroup-class="col-sm-12" />

        <x-adminlte-input name="ampereCarregador" placeholder="Ampere"
        fgroup-class="col-sm-12" />
    </div>


    <div class="col-md">

       <x-adminlte-input name="tensaoContinuaAlternador" placeholder="Tensão Continua" label="Verificar o funcionamento do alternador das baterias"
        fgroup-class="col-sm-12" />

        <x-adminlte-input name="ampereAlternador" placeholder="Ampere"
        fgroup-class="col-sm-12" />
    </div>

</div>

<div class="row">

    <div class="col-md">
        <x-adminlte-input name="f1F2" label="Verificar leitura de tensão F1/F2"
        fgroup-class="col-sm-12" />
        <x-adminlte-input name="obsF1F2" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
        <x-adminlte-input name="f2F3" label="Verificar leitura de tensão F2/F3"
        fgroup-class="col-sm-12" />
        <x-adminlte-input name="obsF2F3" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
        <x-adminlte-input name="f1F3" label="Verificar leitura de tensão F1/F3"
        fgroup-class="col-sm-12" />
        <x-adminlte-input name="obsF1F3" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
        <x-adminlte-input name="frequencia" label="Verificar a leitura da Frequência"
        fgroup-class="col-sm-12" />
    </div>


    

</div>

<div class="row">

    <div class="col-md">
        <x-adminlte-input name="pressaoOleo" label="Pressão do Óleo" type="number"
        fgroup-class="col-sm-12" />

    </div>

    <div class="col-md">
        <x-adminlte-input name="temperaturaMotor" label="Temperatura do Motor" type="number"
        fgroup-class="col-sm-12" />

    </div>

    <div class="col-md">
        <x-adminlte-select name="vazamentosConexoes" label="Existem vazamentos nas conexões de água, óleo, combustível, ar e escapamentos?" 
        igroup-size="md">
            <x-adminlte-options :options="['Sem Vazamentos' => 'Sem Vazamentos', 'Possui Vazamentos' => 'Possui Vazamentos']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>
        <x-adminlte-input name="obsVazamentosConexoes" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>



</div>

<div class="row">

    <div class="col-md">
        <x-adminlte-select name="ruidosAnormais" label="Ruídos anormais em funcionamento?" 
        igroup-size="md">
            <x-adminlte-options :options="['Aprovado' => 'Aprovado', 'Reprovado' => 'Reprovado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>
        <x-adminlte-input name="obsRuidosAnormais" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
        <x-adminlte-select name="densidadeFumaca" label="Verificar a densidade da fumaça dos escapamentos" 
        igroup-size="md">
            <x-adminlte-options :options="['Aprovado' => 'Aprovado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>
        <x-adminlte-input name="obsDensidadeFumaca" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
        <x-adminlte-select name="limpezaSuperficial" label="Efetuar limpeza superficial do motor, alternador, painel controle e cabinado" 
        igroup-size="md">
            <x-adminlte-options :options="['Aprovado' => 'Aprovado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>
        <x-adminlte-input name="obsLimpezaSuperficial" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>


</div>

<div class="row">

    <div class="col-md">
        <x-adminlte-select name="testeEmCarga" label="Teste em carga de 30 minutos" 
        igroup-size="md">
            <x-adminlte-options :options="['Realizado' => 'Realizado', 'Não Realizado' => 'Não Realizado']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>
        <x-adminlte-input name="obsTesteEmCarga" placeholder="Obervação"
        fgroup-class="col-sm-12" />
    </div>

    <div class="col-md">
        <x-adminlte-select name="estadoGeralEquipamento" label="Estado geral do equipamento" 
        igroup-size="md">
            <x-adminlte-options :options="['Inoperante' => 'Inoperante', 'Operando com Restrição' => 'Operando com Restrição', 'Operando Normalmente' => 'Operando Normalmente']"
            disabled="1" empty-option="Escolha uma opção"/>
        </x-adminlte-select>
    </div>

</div>

<div class="row">

    <div class="col-md">

    <x-adminlte-textarea name="obsGerais" label="Observações gerais"/>
    
    </div>

</div>

<div class="row">

<div class="col-sm">
<h5>Foto do Motor</h5>
<input type="file" name="fotoMotor" class="dropify" data-max-file-size="10M" data-show-errors="true"  />
</div>

<div class="col-sm">
<h5>Foto Cabinado</h5>
<input type="file" name="fotoCabinado" class="dropify" data-max-file-size="10M" data-show-errors="true"  />
</div>

<div class="col-sm">
<h5>Foto Geral</h5>
<input type="file" name="fotoGeral" class="dropify" data-max-file-size="10M" data-show-errors="true"  />
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