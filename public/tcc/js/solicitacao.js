$(document).ready(function(){
    $('.abre').hide();

    $('.botao').click(function() {
		$(this).next().toggle(1000);
	});
})