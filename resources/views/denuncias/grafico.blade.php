@extends('layouts/template')

@section('conteudo')

	<div class="container">
		@if (count($denuncia) == 0)
			<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
				<strong>Sem nenhuma denuncia até o momento :) !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@else
		    <div id="lava_div" class="grafico" style="font-size: 50px">
		        <?php echo $lava->render($tipo, 'Dados', 'lava_div'); ?>
		    </div>
	    @endif
	</div>

@endsection