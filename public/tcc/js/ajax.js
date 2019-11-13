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

	var rota = document.getElementById('rota').value

	function populadenuncias(denuncia) {
		if(denuncia.tipo){
			var resultado = `
				<tr>
					<th scope="row">${denuncia.problema}</th>
					<td>${denuncia.tipo}</td>
					<td>${denuncia.lixeira }</td>
					<td>${denuncia.acontecimento }</td>
					<td>${denuncia.local }</td>
					<td>${denuncia.usuario}</td>
					<td>
						<form method="POST" action="${rota}/${denuncia.id}" accept-charset="UTF-8"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="EKZyo7k5D3mdDUskyAR6rcFnNipoSi3AA1UJtV65">
		                    <input hidden="" name="status" type="text" value="1">			                  
							<button type="submit" class="btn btn-success">
								<i class="fas fa-trash" aria-hidden="true"></i>
							</button> 
		                </form>
		            </td>
				</tr>
			`;
		}
		else{
			var resultado = `
				<tr>
					<th scope="row">${denuncia.problema}</th>
					<td>${denuncia.tipo}</td>
					<td>${denuncia.lixeira }</td>
					<td>${denuncia.acontecimento }</td>
					<td>${denuncia.local }</td>
					<td>${denuncia.usuario}</td>
					<td>
				    </td>
				</tr>
			`;
		}
		$('.denuncias').append(resultado);
	}

});