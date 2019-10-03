@extends('layouts/template')

@section('conteudo')
<div class="container chao">

	@if (Auth::user()->adm != 1)
		<!-- <div class="alert alert-danger text-center" role="alert">
			<strong>Está é uma função disponivel apenas para o Administrador!</strong>
		</div> -->

		<div class="row">
			<div class="col-md-8">
				<div id="sobre">
					<h2>Sobre</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<br>
				<div id="exemplo">
					<h2>Exemplo</h2>
					<iframe width="90%" height="300px" src="https://www.youtube.com/embed/MMdTyd4ZLHI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
				<br>
				<div id="devs">
					<h2>Desenvolvedores</h2>
					<p>Alunos do curso de Informática do Instituto Federal do Paraná - Campus Paranaguá</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<div class="row">
						<div class="card-index dev">
							<h2 class="text-center" style="margin-top: 10px;">Murilo</h2>
							<img class="perfil" src="{{ asset('images/Murilo.jpg') }}">
							<div class="card-text text-center">
								<p> Lorem ipsum dolor sente-se em entre consectetur, Ducimus, repudiandae temporibus omnis illum maxime quod deserunt elegendi dolor </p>
							</div>
						</div>
						<div class="card-index dev" style="width: 18rem; background-color: #a9ff85">
							<h2 class="text-center" style="margin-top: 10px;">Murilo</h2>
							<img class="perfil" src="{{ asset('images/Murilo.jpg') }}">
							<div class="card-text text-center">
								<p> Lorem ipsum dolor sente-se em entre consectetur, Ducimus, repudiandae temporibus omnis illum maxime quod deserunt elegendi dolor </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card-index menu" style="border-radius: 15px;">
					<div class="card-header text-center">
						Menu
					</div>
					
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href="#sobre">Sobre</a></li>
							<li class="list-group-item"><a href="#exemplo">Exemplos</a></li>
							<li class="list-group-item" style="border-bottom-left-radius: 15px;border-bottom-right-radius: 15px"><a href="#devs">Desenvolvedores</a></li>
						</ul>
				</div>
			</div>
		</div>
	@else
		@if (count($denuncias) == 0)
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
						</tr>
					</thead>
					<tbody class="denuncias" >
					@foreach($denuncias as $denuncia)
						<tr>
							<td scope="row">{{ $denuncia->problema }}</td>
							<td>{{ $denuncia->tipo }}</td>
							<td>{{ $denuncia->lixeira }}</td>
							<td>{{ $denuncia->acontecimento }}</td>
							<td>{{ $denuncia->local }}</td>
							<td>{{ $denuncia->user_name }}</td>
						</tr>
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