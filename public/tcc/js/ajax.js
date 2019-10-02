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
				<td>${denuncia.user_name}</td>
			</tr>
		`;
		$('.denuncias').append(resultado);
	}

});