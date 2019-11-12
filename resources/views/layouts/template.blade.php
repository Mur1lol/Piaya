<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset = "utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" type="image/x-png" href="https://br.seaicons.com/wp-content/uploads/2017/03/leaf-icon.png">

	    <title>Projeto Piaya</title>  

	    {{ Html::style('tcc/css/bootstrap.min.css') }}
    	{{ Html::style('tcc/css/estilo.css') }}  
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-success ">
			<div class="container">
				<img src="https://br.seaicons.com/wp-content/uploads/2017/03/leaf-icon.png" style="width: 30px; height: auto; margin-right: 5px;">
				{{ link_to_route(
	                'home',
	                'Piaya',
	                [],
	                ['class' => 'navbar-brand']
                ) }}
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="{{ route('home') }}">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							{{ link_to_route(
							'denuncias.create',
							'Problema Identificado',
							[],
							['class' => 'nav-link']) }}
						</li>
						@guest
						<li class="nav-item">
						    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						<li class="nav-item">
						    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
						</li>
						@else
							@if (Auth::user()->adm == 1)
								@if(Auth::user()->super == 1)
									<li class="nav-item">
										{{ link_to_route(
										'users.index',
										'Solicitações',
										[],
										['class' => 'nav-link']) }}
									</li>
								@endif
								<div class="nav-item dropdown">
		  							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								        Visualizar Gráficos<span class="caret"></span>
								    </a>
									<ul class="dropdown-menu">
										<li>
											{{ link_to_route(
											'denuncias.grafico',
											'Problemas',
											["problema"],
											['class' => 'dropdown-item']) }}
										</li>
										<li>
											{{ link_to_route(
											'denuncias.grafico',
											'Locais',
											["local"],
											['class' => 'dropdown-item']) }}
										</li>
									</ul>
								</div>

								<div class="nav-item dropdown">
		  							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								        Gerar Ralatório <span class="caret"></span>
								    </a>
									<ul class="dropdown-menu">
										<li>
											{{ link_to_route(
											'denuncias.relatorio',
											'Todos',
											["0"],
											['class' => 'dropdown-item', 'target' => '_blank']) }}
										</li>
										<li>
											{{ link_to_route(
											'denuncias.relatorio',
											'Lixo',
											["Descarte incorreto de lixo ou residuos"],
											['class' => 'dropdown-item', 'target' => '_blank']) }}
										</li>
										<li>
											{{ link_to_route(
											'denuncias.relatorio',
											'Água',
											["Problemas relacionados a agua"],
											['class' => 'dropdown-item', 'target' => '_blank']) }}
										</li>
										<li>
											{{ link_to_route(
											'denuncias.relatorio',
											'Luz',
											["Uso inadequado da luz"],
											['class' => 'dropdown-item', 'target' => '_blank']) }}
										</li>
									</ul>
								</div>
							@endif
							<li class="nav-item dropdown">
							    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							        {{ Auth::user()->name }} <span class="caret"></span>
							    </a>

							    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							        {{ link_to_route(
										'users.show',
										'Perfil',
										[ Auth::user()->id ],
										['class' => 'dropdown-item']) }}

							        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
							        document.getElementById('logout-form').submit();">
							            {{ __('Sair') }}
							        </a>

							        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							            @csrf
							        </form>
							    </div>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		<main class="py-4">
            @yield('conteudo')
        </main>

		<footer class="py-2 bg-success text-center footer">
			<div class="container">
				<p class="m-0 text-center text-white">Murilo Brasil e Rafael Tesch - 2019</p>
			</div>
		</footer>

		{{ Html::script('tcc/js/jquery.min.js') }}
		{{ Html::script('tcc/js/bootstrap.bundle.min.js') }}
		@yield('script')
		{{ Html::script('https://kit.fontawesome.com/8f5e3edf98.js') }}
	</body>
</html>