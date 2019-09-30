@extends('layouts/template')

@section('conteudo')
    <div class="container">
    	@if ($user->id != Auth::user()->id)
			<div class="container text-center">
				<h2>Ops...</h2>
				<p>Parece que você está tentando editar as informações de outra pessoa.</p>
				<img src="https://img.ibxk.com.br/2017/12/12/gif-giphy-12172743636300.gif">
			</div>
		@else
    	<div class="row">
			<div class="col-md-3">
				<img src="https://prnethost.com.br/site/wp-content/uploads/2019/04/masculino.png" class="img-thumbnail" alt="Responsive image">
				<!-- <a class="text-center" href="#">Trocar Imagem</a> -->
			</div>
			<div class="col-md-9">
        		{!! Form::open(['route' => ['denuncias.update', $user->id], 'method' => 'PUT']) !!}
        		@csrf
	            <div class="form-group">
	                {!! Form::label('name', 'Nome') !!}
	                {!! Form::text('name', $user->name, ['class' => 'form-control', 'required']) !!}
	            </div>
	            <div class="form-group">
	                {!! Form::label('email', 'Email') !!}
	                {!! Form::text('email', $user->email, ['class' => 'form-control', 'required']) !!}
	            </div>
	            <div class="form-group">
					<label for="senha">Senha</label>
					<input type="password" class="form-control" id="senha" value="{{ $user->password }}" disabled>
				</div>

	            {!! Form::submit('Confirmar', ['class' => 'btn btn-primary']) !!}
	            {!! Form::close() !!}
			</div>
		</div>
		@endif
    </div>

   

@endsection