@extends('layouts/template')

@section('conteudo')
<div class="container chao">
	@if (Auth::user()->adm == 0)
		<div class="row">
			<div class="col-md-10">
				<div id="sobre">
					<h2>Sobre</h2>
					<p>O Projeto Piaya é um programa cujo principal objetivo é permitir que haja uma diminuição de desperdícios em um certo ambiente, fazendo com que nesse local os prejuízos ao meio ambiente sejam diminuídos bem como os gastos da empresa, que emprega a aplicação, nos setores de luz e água.</p>
				</div>
				
				<div id="funcionamento">
					<h2>Funcionamento</h2>
					<p>A aplicação funciona como um meio para as pessoas avisarem a empresa sobre problemas relacionados a qualquer tipo de desperdício ou de descarte incorreto de lixo, através de envios de formulários que poderão ser visualizados pelos administradores para que estes tomem a melhor decisão para solucionar o problema ou dificultar sua volta.</p>
					<p>Para enviar estes formulários não é necessário estar logado no sistema, caso decida fazer um envio sem ser identificado basta utilizar o aplicativo para smartphone ou mesmo utilizar o site sem se logar, porém caso queira se identificar, basta logar-se antes de fazer o envio do mesmo.</p>
				</div>
				
				<!-- <div id="exemplo">
					<h2>Exemplo</h2>
					<iframe width="90%" height="300px" src="https://www.youtube.com/embed/MMdTyd4ZLHI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<br> -->
				<div id="devs">
					<h2>Desenvolvedores</h2>
					<p>Esta aplicação foi desenvolvida pelos alunos Murilo Brasil e Rafael Tesch do último ano do Ensino Médio Integrado ao curso de Informática, como forma de demonstrar a instituição de ensino que possuem os conhecimentos necessários para se formarem e atuar na área de informática como profissionais competentes.</p>
					<!-- <div class="row">
						<div class="col-md card-index dev">
							<h3 class="text-center" style="margin-top: 10px;">Murilo</h3>
							<img class="perfil" src="{{ asset('images/Murilo.jpg') }}" style="width: 286px;">
							<div class="card-text text-center">
								<p> Lorem ipsum dolor sente-se em entre consectetur, Ducimus, repudiandae temporibus omnis illum maxime quod deserunt elegendi dolor </p>
							</div>
						</div>
						<div class="col-md card-index dev">
							<h3 class="text-center" style="margin-top: 10px;">Rafael</h3>
							<img class="perfil" src="{{ asset('images/Rafael.jpg') }}" style="width: 286px;">
							<div class="card-text text-center">
								<p> Lorem ipsum dolor sente-se em entre consectetur, Ducimus, repudiandae temporibus omnis illum maxime quod deserunt elegendi dolor </p>
							</div>
						</div>
					</div> -->
				</div>
			</div>
			<!-- <div class="col-md-4">
				<div class="card menu" style="border-radius: 15px;">
					<div class="card-header text-center">
						Menu
					</div>
					
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href="#sobre">Sobre</a></li>
						<li class="list-group-item"><a href="#funcionamento">Funcionamento</a></li>
						<li class="list-group-item"><a href="#exemplo">Exemplo</a></li>
						<li class="list-group-item" style="border-bottom-left-radius: 15px;border-bottom-right-radius: 15px"><a href="#devs">Desenvolvedores</a></li>
					</ul>
				</div>
			</div> -->
		</div>
	@else
		<?php $ativo = 0 ?>
				
		@foreach($denuncias as $denuncia)
			@if($denuncia->status == 0)
				<?php $ativo = 1?>
			@endif
		@endforeach

		@if($ativo == 0)
			<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
				<strong>Sem nenhuma denuncia até o momento :) !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@else
			<div class="input-group mb-3">
				<input type="text" id="busca-teste" class="form-control busca-input" placeholder="Buscar...">
				<div class="input-group-append">
				    <button class="btn btn-success pesquisa busca" type="submit"><i class="fas fa-search"></i></button>
				</div>
			</div>

			<input type="hidden" id="rota" value="{{ route('denuncias.update', '') }}">
			
			<div class="table-responsive" id="table-scroll">
				<table class="table table-bordered table-dark text-center" >
					<thead class="" id="titulo">
						<tr style="background-color: #a9ff85;">
							<th scope="col">Problema</th>
							<th scope="col">Tipo</th>
							<th scope="col">Lixeira</th>
							<th scope="col">Acontecimento</th>
							<th scope="col">Local</th>
							<th scope="col">Usuario</th>
							<th scope="col">Excluir</th>
						</tr>
					</thead>
					<tbody class="denuncias" >
					@foreach($denuncias as $denuncia)
						@if($denuncia->status == 0)
							<tr>
								<td scope="row">{{ $denuncia->problema }}</td>
								<td>{{ $denuncia->tipo }}</td>
								<td>{{ $denuncia->lixeira }}</td>
								<td>{{ $denuncia->acontecimento }}</td>
								<td>{{ $denuncia->local }}</td>

								@if ($denuncia->user_id == "") 
									<td>Anonimo</td>
								@else 
									<td>{{ $denuncia->user->name }}</td>
								@endif

								<td> 
								{!! Form::open(['route' => ['denuncias.update', $denuncia->id], 'method' => 'PUT']) !!}
				                    {!! Form::text('status', '1', ['hidden']) !!}			                  
									<button type="submit" class="btn btn-success">
										<i class="fas fa-trash"></i>
									</button> 
				                {!! Form::close() !!}
				                </td>
							</tr>
						@endif
					@endforeach
					</tbody>
				</table>
			</div>
		@endif
	@endguest
</div>
@endsection

@section('script')
    {{ Html::script('tcc/js/ajax.js') }}
@endsection