$(document).ready(function(){

	$('.busca-input').keyup(busca);

	function busca() {
		var filtro = $('.busca-input').val();

		$.ajax({
			url: 'tcc/js/busca.json.php',
			data: `filtro=${filtro}`,
			dataType: 'json'
		}).done(function(denuncias){
			$('.denuncias').text('');
			denuncias.forEach(function(denuncia){
				populadenuncias(denuncia);
			});
		});
	}

	function populadenuncias(denuncia) {
		var resultado = `
			<tr>
				<th scope="row">${denuncia.problema}</th>
				<td>${denuncia.tipo}</td>
				<td>${denuncia.lixeira }</td>
				<td>${denuncia.acontecimento }</td>
				<td>${denuncia.local }</td>
				<td>${denuncia.usuario}</td>
				<td>
					<form method="POST" action="http://localhost:8000/denuncias/${denuncia.id}" accept-charset="UTF-8">
						<input name="_method" type="hidden" value="PUT">
						<input name="_token" type="hidden" value="yYngjCglm589bL8RX6ekCK9bARJAEJXViSpnod8d">
	                    <input hidden="" name="status" type="text" value="1">			                  
						<button type="submit" class="btn btn-success"><i class="fas fa-trash" aria-hidden="true"></i></button> 
	                </form>
	            </td>
			</tr>
		`;
		$('.denuncias').append(resultado);
	}

});