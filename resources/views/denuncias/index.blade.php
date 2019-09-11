@extends('layouts/template')

@section('conteudo')
<div class="container chao">

	@guest
		<h3 class="text-center">Você precisa estar conectado para ter acesso aos dados</h3>
		<div class="text-center"><img src="https://www.estagiarea.com.br/wp-content/uploads/2019/01/gear2.gif"></div>
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
						<tr  style="background-color: #a9ff85;">
							<th scope="col">Problema</th>
							<th scope="col">Tipo</th>
							<th scope="col">Lixeira</th>
							<th scope="col">Acontecimento</th>
							<th scope="col">Local</th>
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
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		@endif
	@endguest
</div>
@endsection
