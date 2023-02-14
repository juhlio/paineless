
@extends('adminlte::page')

@section('title',' Filtro')



@section('content')


<form method="POST" enctype="multipart/form-data">
    @csrf




<div class="row">

    <div class="col-md">
    <x-adminlte-input name="cidade" label="Cidade"  id="autoComplete" />
    </div>

    <div class="col-md">
    <x-adminlte-select name="segmento" label="Segmento" fgroup-class="col-md-6">
    <option>Condomínios Prediais | 8112-5/00 </option>
    <option>Síndico Profissional | 6822-6/00 </option>
    <option>Fabricantes de Medicamentos | 2121-1 </option>
    <option>COMÉRCIO ATACADISTA DE MEDICAMENTOS | 4644301 </option>
    </x-adminlte-select>
    
    </div>


</div>





<br><br>
<div id="buttons">
    <button class="btn btn-block btn-success" type="submit"><i class="fas fa-upload"></i> Buscar </button>
</div>

</form>
</div>



@endsection

@section('js')

<script src="{{ asset('vendor/autocomplete/jquery.easy-autocomplete.min.js') }}" type="text/javascript"></script>

<script>
var options = {
    url: "{{route('listaCidadesIbge')}}",

        getValue: "name",


        list: {
		match: {
			enabled: true
		},
		maxNumberOfElements: 3
	},

	theme: "description"

        
    };

    $("#autoComplete").easyAutocomplete(options);
</script>




@endsection

@section('css')

<link href="{{ asset('vendor/autocomplete/easy-autocomplete.min.css')}}">
<link href="{{ asset('vendor/autocomplete/easy-autocomplete.themes.min.css')}}">

@endsection
