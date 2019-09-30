@extends('layouts/template')

@section('conteudo')
<div class="container chao">

	@if (Auth::user()->adm != 1)
		<div class="alert alert-danger text-center" role="alert">
			<strong>Está é uma função disponivel apenas para o Administrador!</strong>
		</div>
	@else
		@if (count($denuncias) == 0)
			<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
				<strong>Sem nenhuma denuncia até o momento :) !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

		@else
			<div class="input-group mb-3">
				<input type="text" id="busca-teste" class="form-control busca-input" placeholder="Buscar...">
				<div class="input-group-append">
				    <button class="btn btn-success pesquisa busca" type="submit"><i class="fas fa-search"></i></button>
				</div>
			</div>
			
			<div class="table-responsive" id="table-scroll">
				<table class="table table-bordered table-dark text-center" >
					<thead class="" id="titulo">
						<tr style="background-color: #a9ff85;">
							<th scope="col">Problema</th>
							<th scope="col">Tipo</th>
							<th scope="col">Lixeira</th>
							<th scope="col">Acontecimento</th>
							<th scope="col">Local</th>
							<th scope="col">Usuario</th>
						</tr>
					</thead>
					<tbody class="denuncias" >
					@foreach($denuncias as $denuncia)
						<tr>
							<td scope="row">{{ $denuncia->problema }}</td>
							<td>{{ $denuncia->tipo }}</td>
							<td>{{ $denuncia->lixeira }}</td>
							<td>{{ $denuncia->acontecimento }}</td>
							<td>{{ $denuncia->local }}</td>
							<td>ANONIMO</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		@endif
	@endguest
</div>
@endsection

@section('script')
    {{ Html::script('tcc/js/ajax.js') }}
@endsection