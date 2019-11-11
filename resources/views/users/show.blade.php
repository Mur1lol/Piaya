@extends('layouts/template')

@section('conteudo')
	<div class="container chao">
		@if ($user->id != Auth::user()->id)
			<div class="container text-center">
				<h2>Ops...</h2>
				<p>Parece que você está tentando ver as informações de outra pessoa.</p>
				<img src="https://media3.giphy.com/media/1zgdz51cpTgGmbBXiS/source.gif">
			</div>
		@else
		<div class="row">
			<div class="col-md-12">
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
				'users.edit',
				'Atualizar Dados',
				[$user->id],
				['class' => 'btn btn-primary']) }}

				@if ($user->adm == 1)


				{{link_to_route(
				'users.create',
				'Solicitar Administração',
				[],
				['class' => 'btn btn-primary'])}}

				<!-- {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                    <div class="form-group">
                        {!! Form::text('status', '1', ['class' => 'form-control', 'hidden']) !!}
                    </div>
                    {!! Form::submit('Solicitar Administração', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!} -->

				@else
					<button class="btn btn-success">Você é um Administrador</button>
				@endif
				
			</div>
		</div>
		@endif
	</div>
	
@endsection