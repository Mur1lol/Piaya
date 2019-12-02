@extends('layouts.template')

@section('conteudo')

    <div class="container chao">
        {!! Form::open(['route' => 'users.store']) !!}

       	<div class="form-group">
                {!! Form::label('titulo', 'Título') !!}
                {!! Form::text('titulo', 'Solicitacao para Administrador', ['class' => 'form-control', 'required', 'disabled']) !!}
                {!! Form::text('titulo', 'Solicitacao para Administrador', ['class' => 'form-control', 'required', 'hidden']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição') !!}
            {!! Form::textarea('descricao', '', ['class' => 'form-control', 'rows' => '10','placeholder' => 'Digite aqui...' ,'required']) !!}
        </div>

        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection