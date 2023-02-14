
@extends('adminlte::page')

@section('title', )

@section('content_header')
<h1>Sucesso</h1>
@endsection

@section('content')


<div class="card p-3 mb-3">

Sua solicitação foi enviada. Os dados coletados estão em processamento.<br><br>
Detalhes do pedido: <br><br>
<strong>Cidade</strong> {{$cidade}} <br>
<strong>Segmento </strong> {{$segmento}}

<br><br>
<div class="row justify-content-center">
<a href="{{route('homeProspecoes')}}" class="btn btn-success" title="Details">
                Voltar ao Início</a>

</div>

</div>


@endsection