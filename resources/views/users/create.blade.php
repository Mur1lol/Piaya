@extends('layouts.template')

@section('titulo')
	Denuncia
@endsection

@section('conteudo')

    <div class="container chao">
        {!! Form::open(['route' => 'users.store']) !!}

       	<div class="form-group">
                {!! Form::label('titulo', 'Título') !!}
                {!! Form::text('titulo', 'Solicitacao para Administrador', ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição') !!}
            {!! Form::textarea('descricao', '', ['class' => 'form-control', 'rows' => '10', 'required']) !!}
        </div>

        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection