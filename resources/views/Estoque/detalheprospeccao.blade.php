@extends('adminlte::page')

@section('title', $dados->razaoSocial.' Detalhes')

@section('content_header')
<br>
@endsection

@section('content')

<div class="card p-3 mb-3">



<div class="row">
    <div class="col-md">
        <strong> Nome: </strong> {{$dados->razaoSocial}}<br>
        <strong> CNPJ: </strong> {{$dados->cnpj}}<br>
        <strong> Segmento: </strong> {{$dados->segmento}}<br>

    </div>


    <div class="col-md">
        <strong> Endereço: </strong> {{$dados->endereco}}, {{$dados->numero}}<br>
        <strong> Complemento: </strong> {{$dados->complemento}}<br>
        <strong> Bairro: </strong> {{$dados->bairro}}<br>
        <strong> Cidade: </strong> {{$dados->cidade}}<br>
        <strong> Estado: </strong> {{$dados->uf}}<br>
        <strong> CEP: </strong> {{$dados->cep}} <br>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md">
        <h3>Contatos</h3><br>
        <strong> Telefone : </strong> {{$dados->telefone1}}<br>
        <strong> Telefone : </strong> {{$dados->telefone2}}<br>
        <strong> E-mail: </strong> {{$dados->email}}<br>

    </div>

</div>

<hr>
    <div class="row">
        
    
    <div class="col-md">
    <h3>Histórico</h3>
    <br>
    @if($observacoes)
        @foreach($observacoes as $observacao)
        <strong>{{\Carbon\Carbon::parse($observacao->created_at)->format('d/m/Y H:i:s')}}</strong> - {{$observacao->obs}} <br>
        @endforeach
    @endif


    <strong>{{\Carbon\Carbon::parse($dados->createdAt)->format('d/m/Y H:i:s')}} </strong> - Inserido no Banco de Possíveis Contatos <br>
    </div>

    
    <div class="col-md">
    <form method="POST" enctype="multipart/form-data">
    @csrf
    <x-adminlte-textarea name="obs" placeholder="Adicione uma Obervação"/>
    <div class="row justify-content-center">
    <div id="buttons">
    <button class="btn btn-block btn-success" type="submit"><i class="fas fa-upload"></i> Salvar </button>
    </div>
    </div>
    </div>
    </form>

    </div>


</div>
<hr>




@endsection