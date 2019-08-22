$(document).ready(function(){
	$('.pexquisa').submit(function(event) {
		event.preventDefault();
		busca();
	});

	$('.busca-input').keyup(busca);


	function busca() {
		let filtro = $('.busca-input').val();

		$.ajax({
			url: 'busca.json.php',
			data: `filtro=${filtro}`,
			dataType: 'json'
		}).done(function(temporadas){
			$('.temporadas').text('');
			temporadas.forEach(function(temporada){
				populatemporadas(temporada);
			});
		});
	}

	function populatemporadas(temporada) {
		const resultado = `
			<div class="card border-info col-md-3" style="max-width: 18rem; margin: 15px;">
				<div class="card-header">${ temporada.descricao }</div>
				<div class="card-body text-info">
					<h5 class="card-title">${temporada.inicio }</h5>

				
					
				</div>
			</div>
		`;
		$('.temporadas').append(resultado);
	}

	$('.esconde').hide();
	$(".aparece").click(function() {
		$(".esconde").slideToggle(1000);
	});	

});