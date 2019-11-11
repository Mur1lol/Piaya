@extends('layouts/template')

@section('conteudo')
	<div class="container chao">
		<h3 style="margin-bottom: 25px">Lista de Solicitações</h3>
		
		<div class="row">
			@foreach($users as $user)
				<div class="col-md-6">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" id="nome" value="{{ $user->name }}" disabled aria-describedby="button-addon2">
							<div class="input-group-append">
								<button class="btn btn-success" type="button" id="button-addon2"><i class="fas fa-list"></i></button>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection