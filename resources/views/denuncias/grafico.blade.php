@extends('layouts/template')

@section('conteudo')

	<style>
		.tamanho {
			height: 500px;
		}
	</style>

    <div class="container tamanho" id="lava_div">
        <?php echo $lava->render($tipo, 'Dados', 'lava_div'); ?>
    </div>

@endsection