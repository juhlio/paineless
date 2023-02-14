
@extends('adminlte::page')

@section('title', )

@section('content_header')
<h1>Sucesso</h1>
@endsection

@section('content')


<div class="card p-3 mb-3">

Sua solicitação foi enviada. Assim que processado um arquivo com os dados chegará ao seu e-mail.<br><br>
Detalhes do pedido: <br><br>
<strong>Busca</strong> {{$busca}} <br>
<strong>E-mail que receberá o arquivo </strong> {{$email}}

</div>


@endsection