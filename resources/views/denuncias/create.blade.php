@extends('layouts.template')

@section('titulo')
	Denuncia
@endsection

@section('conteudo')
<style type="text/css">
    datalist {
        background-color: #e2f;
    }
</style>

    <div class="container chao">
        {!! Form::open(['route' => 'denuncias.store']) !!}

        <div class="form-group" id="problemas">
        	{!! Form::label('lixo', 'Problema') !!}
            <div class="row">
            	<div class="input-group col-md-4" id="p1">
            		<div class="input-group-prepend">
						<div class="input-group-text">
                            {!! Form::radio('problema', 'Descarte incorreto de lixo ou residuos', false, ['id' => 'lixo', 'required']) !!}
                        </div>
                    </div>
                    {!! Form::label('lixo', 'Descarte incorreto de lixo ou residuos', ['class' => 'form-control label-radio']) !!}
            	</div>
            	<div class="input-group col-md-4">
            		<div class="input-group-prepend">
						<div class="input-group-text">
                            {!! Form::radio('problema', 'Problemas relacionados a agua', false, ['id' => 'agua']) !!}
                        </div>
                    </div>
                    {!! Form::label('agua', 'Problemas relacionados a agua', ['class' => 'form-control label-radio']) !!}
            	</div>
            	<div class="input-group col-md-4">
            		<div class="input-group-prepend">
						<div class="input-group-text">
                            {!! Form::radio('problema', 'Uso inadequado da luz', false, ['id' => 'luz']) !!}
		            	</div>
		            </div>
                    {!! Form::label('luz', 'Uso inadequado da luz', ['class' => 'form-control label-radio']) !!}
            	</div>
            </div>
        </div>

        <div class="abre" style="display: none">           
            <div class="form-group" id="tipos">
                {!! Form::label('tipo', 'Tipo') !!}
                <div class="respostas"> </div>
            </div>

            <div class="form-group" id="lixeiras">
            	{!! Form::label('lixeira', 'Lixeira') !!}
            	{!! Form::select(
            		'lixeira', 
            		array(
            			'--' => '--',
            			'Comum' => 'Comum',
            			'Reciclavel' => 'Reciclavel'
    				), 
    				'', 
    				['class' => 'custom-select', 'required'] )
    			!!}
            </div> 

            <div class="form-group" id="locais">
                {!! Form::label('local', 'Local') !!}
                <div class="input-group mb-3">
                	{!! Form::select(
                		'local', 
                		array(
                			'' => 'Selecione...',
                			'Sala 01' => 'Sala 01',
                			'Sala 02' => 'Sala 02',
                			'Sala 03' => 'Sala 03',
                			'Sala 04' => 'Sala 04',
                			'Sala 05' => 'Sala 05',
                			'Sala 06' => 'Sala 06',
                			'Sala 07' => 'Sala 07',
                			'Sala 08' => 'Sala 08',
                			'Sala 09' => 'Sala 09',
                			'Sala 10' => 'Sala 10',
                			'Sala 11' => 'Sala 11',
                			'Sala 12' => 'Sala 12',
                            'Banheiro' => 'Banheiro',
                            'Quadra' => 'Quadra',
                            'Laboratorio 1 - Informatica' => 'Laboratório 1 - Informática',
                            'Laboratorio 2 - Informatica' => 'Laboratório 2 - Informática',
                            'Laboratorio 3 - Informatica' => 'Laboratório 3 - Informática',
                            'Laboratorio 4 - Informatica' => 'Laboratório 4 - Informática',
                            'Laboratorio 5 - Informatica' => 'Laboratório 5 - Informática',
                            'Laboratorio Biologia' => 'Laboratório Biologia',
                            'Laboratorio Quimica' => 'Laboratório Química',
                            'Laboratorio Fisica' => 'Laboratório Física'
    					), 
    					'', 
    					['class' => 'custom-select', 'required'] )
    				!!}
                </div>
            </div>

            <div class="form-group" id="acontecimentos">
                {!! Form::label('acontecimento', 'Acontecimento') !!}
                {!! Form::textarea('acontecimento', '', ['class' => 'form-control','placeholder' => 'Digite aqui...', 'rows' => '3', 'required', 'maxlength' => '100']) !!}
            </div>
        </div>

        @guest
            {!! Form::text('user_id', '', ['class' => 'form-control', 'hidden']) !!}
        @else
            {!! Form::text('user_id', Auth::user()->id, ['class' => 'form-control','hidden']) !!}
        @endguest

        {!! Form::submit('Enviar', ['class' => 'envio btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection

@section('script')
    {{ Html::script('tcc/js/tcc.js') }}
@endsection