document.getElementById('problemas').addEventListener('click', function() { 
    var valor = document.querySelector('input[name=problema]:checked').value

    document.getElementById('tipos').style.display = "inherit"

    const categ = document.querySelector('.respostas');
    categ.textContent = '';

    if (valor == "Descarte incorreto de lixo ou residuos") {
        categ.innerHTML= 
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
        document.getElementById('lixeiras').style.display = "inherit"
    } 
    else if (valor == "Problemas relacionados a agua") {
        categ.innerHTML= 
        `<div class="input-group mb-3">
            <select class="custom-select" required id="tipo" name="tipo">
                <option selected value="">Escolha...</option>
                <option value="Entupimento">Entupimento</option>
                <option value="Torneira aberta">Torneira aberta</option>
            </select>
        </div>`
        document.getElementById('lixeiras').style.display = "none"
    }
    else {
        categ.innerHTML= 
        `<div class="input-group mb-3">
            <select class="custom-select" required id="tipo" name="tipo">
                <option selected value="">Escolha...</option>
                <option value="Luz acesa em ambiente vazio">Luz acesa em ambiente vazio</option>
                <option value="Ar condicionado ligado em sala vazia">Ar condicionado ligado em sala vazia</option>
            </select>
        </div>`
        document.getElementById('lixeiras').style.display = "none"
    }
    document.getElementById('locais').style.display = "inherit"
    document.getElementById('acontecimentos').style.display = "inherit"
})

document.querySelector('.envio').addEventListener('click', function(){
    valor1 = document.getElementById('acontecimento').value
    console.log(valor1)

    valor2 = retira_acentos(valor1).replace(/[^a-zA-Z0-9 ]/g, "")
    console.log(valor2)

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
