@extends('layouts/template')

@section('conteudo')
	<div class="container">
		@if ($user->id != Auth::user()->id)
			<div class="container text-center">
				<h2>Ops...</h2>
				<p>Parece que você está tentando ver as informações de outra pessoa.</p>
				<img src="https://media3.giphy.com/media/1zgdz51cpTgGmbBXiS/source.gif">
			</div>
		@else
		<div class="row">
			<div class="col-md-3">
				<img src="https://prnethost.com.br/site/wp-content/uploads/2019/04/masculino.png" class="img-thumbnail" alt="Responsive image">
				<!-- <a class="text-center" href="#">Trocar Imagem</a> -->
			</div>
			<div class="col-md-9">
        		<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" id="nome" value="{{ $user->name }}" disabled>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
				</div>
				<div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" id="senha" value="{{ $user->password }}" disabled>
				</div>
				
				{{ link_to_route(
				'denuncias.edit',
				'Atualizar Dados',
				[$user->id],
				['class' => 'btn btn-primary']) }}

				@if ($user->adm == 0)

				<!-- {{link_to_route(
				'denuncias.edit',
				'Solicitar Administração',
				[Auth::user()->id],
				['class' => 'btn btn-primary'])}} -->

				{!! Form::open(['route' => ['denuncias.update', $user->id], 'method' => 'PUT']) !!}
                    <div class="form-group">
                        {!! Form::text('adm', '1', ['class' => 'form-control', 'hidden']) !!}
                    </div>
                    {!! Form::submit('Solicitar Administração', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}

				@else
					<button class="btn btn-success">Você é um Administrador</button>
				@endif
				
			</div>
		</div>
		@endif
	</div>
	
@endsection