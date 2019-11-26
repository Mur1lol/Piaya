@extends('layouts/template')

@section('conteudo')
    <div class="container">
    	@if ($user->id != Auth::user()->id)
			@section('script')
			    {{ Html::script('tcc/js/solicitacao.js') }}
			    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
			    <script>
			    	Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Parece que você está tentando editar as informações de outra pessoa!',
						showCloseButton: false,
						showCancelButton: false,
						focusConfirm: false,
						confirmButtonText:
						'<a href="{{ route('home') }}" style="color: white">Retornar para a pagina inicial!</a>',
						confirmButtonAriaLabel: 'Thumbs up, great!'
					})
			    </script>
			@endsection
		@else
    	<div class="row">
			<div class="col-md-12">
        		{!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
        		@csrf
	            <div class="form-group">
	                {!! Form::label('name', 'Nome') !!}
	                {!! Form::text('name', $user->name, ['class' => 'form-control', 'required']) !!}
	            </div>
	            <div class="form-group">
	                {!! Form::label('email', 'Email') !!}
	                {!! Form::text('email', $user->email, ['class' => 'form-control', 'required']) !!}
	            </div>

	            {!! Form::submit('Confirmar', ['class' => 'btn btn-primary']) !!}
	            {!! Form::close() !!}
			</div>
		</div>
		@endif
    </div>

   

@endsection