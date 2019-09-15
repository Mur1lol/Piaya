$(document).ready(function(){
    document.querySelector('.abre').style.display = "inherit"
    $('.abre').hide();
    $('#lixeiras').hide();

    document.getElementById('lixo').addEventListener('click', function() { 
        $(".abre").slideUp(1000);
        $(".abre").slideDown(1000);
    
        const resposta = document.querySelector('.respostas');
        resposta.textContent = '';
        resposta.innerHTML= 
        `<div class="input-group mb-3">
            <select class="custom-select" required id="tipo" name="tipo">
                <option selected value="">Escolha...</option>
                <option value="Papel">Papel</option>
                <option value="Reciclavel">Reciclável</option>
                <option value="Comum">Comum</option>
                <option value="Infectante">Infectante</option>
                <option value="Quimico">Químico</option>
                <option value="Perfurocortante">Perfurocortante</option>
            </select>
        </div>`
        $('#lixeiras').show(2000);
    })

    document.getElementById('agua').addEventListener('click', function() { 
        $(".abre").slideUp(1000);
        $(".abre").slideDown(1000);

        const resposta = document.querySelector('.respostas');
        resposta.textContent = '';
        resposta.innerHTML= 
        `<div class="input-group mb-3">
            <select class="custom-select" required id="tipo" name="tipo">
                <option selected value="">Escolha...</option>
                <option value="Entupimento">Entupimento</option>
                <option value="Torneira aberta">Torneira aberta</option>
            </select>
        </div>`
        $('#lixeiras').hide(2000);
    })

    document.getElementById('luz').addEventListener('click', function() { 
        $(".abre").slideUp(1000);
        $(".abre").slideDown(1000);

        const resposta = document.querySelector('.respostas');
        resposta.textContent = '';
        resposta.innerHTML= 
        `<div class="input-group mb-3">
            <select class="custom-select" required id="tipo" name="tipo">
                <option selected value="">Escolha...</option>
                <option value="Luz acesa em ambiente vazio">Luz acesa em ambiente vazio</option>
                <option value="Ar condicionado ligado em sala vazia">Ar condicionado ligado em sala vazia</option>
            </select>
        </div>`
        $('#lixeiras').hide(2000);
    })

    document.querySelector('.envio').addEventListener('click', function(){
        var valor1 = document.getElementById('acontecimento').value
        var valor2 = retira_acentos(valor1).replace(/[^a-zA-Z0-9 ]/g, "")

        document.getElementById('acontecimento').value = valor2
    })



    function retira_acentos(str) {

        com_acento = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝŔÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿŕ";
        sem_acento = "AAAAAAACEEEEIIIIDNOOOOOOUUUUYRsBaaaaaaaceeeeiiiionoooooouuuuybyr";

        novastr="";
        for(i=0; i<str.length; i++) {
            troca=false;
            for (a=0; a<com_acento.length; a++) {
                if (str.substr(i,1)==com_acento.substr(a,1)) {
                    novastr+=sem_acento.substr(a,1);
                    troca=true;
                    break;
                }
            }
            if (troca==false) {
                novastr+=str.substr(i,1);
            }
        }
        return novastr;
    }
})