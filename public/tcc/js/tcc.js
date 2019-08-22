$(document).ready(function() {
    $(document).on('click', '.btn-editar-comentario', function() {
        const divOriginal = $(this).closest('.original');
        const divEditar = $(this).closest('.comentario').find('.editar');
        divOriginal.hide();
        divEditar.show();
    });

    $(document).on('submit', '.form-editar-comentario', function(e) {
        e.preventDefault();
        const form = $(e.target);
        const dados = form.serialize();
        
        $.ajax({
            type: 'post',
            url: form.attr('action'),
            data: dados,
            dataType: 'json'
        }).done(function(retorno) {
            if (retorno.sucesso) {
                const divOriginal = form.closest('.comentario').find('.original');
                const divEditar = form.closest('.editar');
                divOriginal.find('.texto-corpo').text(retorno.corpo);
                divOriginal.show();
                divEditar.hide();
            }
        });
    });
});