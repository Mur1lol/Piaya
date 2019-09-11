@extends('layouts.template')

@section('titulo')
	Denuncia
@endsection

@section('conteudo')
    <div class="container">
        
        {!! Form::open(['route' => 'denuncias.store']) !!}

        <div class="form-group" id="problemas">
        	{!! Form::label('lixo', 'Problema') !!}
            <div class="row">
            	<!-- <div class="input-group col-md-4">
	            	<div class="input-group-prepend">
						<div class="input-group-text">
							{!! Form::radio('problema', 'Descarte incorreto de lixo ou residuos', false) !!}
						</div>
					</div>
					{!! Form::label('lixo', 'Descarte incorreto de lixo ou residuos', ['class' => 'form-control']) !!}
	            </div> -->
            	<div class="input-group col-md-4">
            		<div class="input-group-prepend">
						<div class="input-group-text">
		            		<input type="radio" id="lixo" name="problema" value="Descarte incorreto de lixo ou residuos" required>
		            	</div>
		            </div>
            		<label for="lixo" class="form-control label-radio">Descarte incorreto de lixo ou residuos</label>
            	</div>
            	<div class="input-group col-md-4">
            		<div class="input-group-prepend">
						<div class="input-group-text">
		            		<input type="radio" id="agua" name="problema" value="Problemas relacionados a agua">
		            	</div>
		            </div>
            		<label for="agua" class="form-control label-radio">Problemas relacionados a agua</label>
            	</div>
            	<div class="input-group col-md-4">
            		<div class="input-group-prepend">
						<div class="input-group-text">
		            		<input type="radio" id="luz" name="problema" value="Uso inadequado da luz">
		            	</div>
		            </div>
            		<label for="luz" class="form-control label-radio">Uso inadequado da luz</label>
            	</div>
            </div>
        </div>           

        <div class="form-group" id="tipos" style="display: none">
            {!! Form::label('tipo', 'Tipo') !!}
            <div class="respostas"> </div>
            <!-- <div class="input-group mb-3">
            	{!! Form::select(
            		'tipo', 
            		array(
            			'' => 'Selecione...',
            			'Lixo' => array(
            				'Comum' => 'Comum',
            				'Reciclavel' => 'Reciclavel'
            			),

            			'Agua' => array(
            				'Entupimento' => 'Entupimento',
            				'Torneira Aberta' => 'Torneira Aberta'
            			),

            			'Luz'  => array(
            				'Luz acesa em ambiente vazio' => 'Luz acesa em ambiente vazio',
            				'Ar condicionado ligado em sala vazia' => 'Ar condicionado ligado em sala vazia'
            			)
					), 
					'', 
					['class' => 'custom-select', 'required'] )
				!!}
            </div> -->
        </div>

        <div class="form-group" id="lixeiras" style="display: none">
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

        <div class="form-group" id="locais" style="display: none">
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

        <div class="form-group" id="acontecimentos" style="display: none">
            {!! Form::label('acontecimento', 'Acontecimento') !!} <small>(Não colocar caracteres especiais)</small>
            {!! Form::textarea('acontecimento', '', ['class' => 'form-control','placeholder' => 'Digite aqui...', 'rows' => '3', 'required']) !!}
        </div>

        {!! Form::submit('Enviar', ['class' => 'envio btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection