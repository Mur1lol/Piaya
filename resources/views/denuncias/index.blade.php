@extends('layouts/template')

@section('conteudo')
<div class="container chao">
	<div class="card">
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Tipo</th>
					<th scope="col">Informação</th>
					<th scope="col">Extra</th>
					<th scope="col">Acontecimento</th>
					<th scope="col">Local</th>
				</tr>
			</thead>
			<tbody>
			@foreach($denuncias as $denuncia)
				<tr>
					<th scope="row">{{ $denuncia->tipo }}</th>
					<td>{{ $denuncia->info }}</td>
					<td>{{ $denuncia->extra }}</td>
					<td>{{ $denuncia->acontecimento }}</td>
					<td>{{ $denuncia->local }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
