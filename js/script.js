$(document).ready(function(){

    $("#alertSuccess").hide();
    $("#alertDanger").hide();

    function alertSuccess(){
        $("#alertSuccess").show();
	    setTimeout(function() {
			$('#alertSuccess').fadeOut('slow');
        }, 4000);
    }

    function alertDanger(){
        $("#alertDanger").show();
	    setTimeout(function() {
			$('#alertDanger').fadeOut('slow');
        }, 4000);
    }

    var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("e");

    if(c == "successU" || c == "successI" || c == "successD" || c == "successAS"){
        alertSuccess();
    }
    if(c == "dangerU" || c == "dangerI"|| c == "dangerD"|| c == "dangerAS"){
        alertDanger();
    }
    
});

function editar(id, ds_tarefa, rota){
    let form = document.createElement('form');
    form.action = `../src/tarefa_controller.php?rota=${rota}`;
    form.method = "post";
    form.className = "row";

    let inputTarefa = document.createElement("input");
    inputTarefa.type = "text";
    inputTarefa.name = "ds_tarefa";
    inputTarefa.value = ds_tarefa;
    inputTarefa.className = "col-9 form-control";

    let inputHiddenEvento = document.createElement("input");
    inputHiddenEvento.type = "hidden";
    inputHiddenEvento.value = "A";
    inputHiddenEvento.name = "e";

    let inputHidden = document.createElement("input");
    inputHidden.type = "hidden";
    inputHidden.value = id;
    inputHidden.name = "cd_tarefa";

    let button = document.createElement("button");
    button.type = "submit";
    button.className = "col-2 btn btn-blue";
    button.innerHTML = "Atualizar";

    form.appendChild(inputTarefa);
    form.appendChild(button);
    form.appendChild(inputHidden);
    form.appendChild(inputHiddenEvento);


    //capturar a div do id que esta sendo clicado
    let divTarefa = document.getElementById("tarefa_"+id);

    //Limpar o conteudo da div
    divTarefa.innerHTML = "";

    //inserir o form dentro da div que selecionamos, o segundo parametro seria o elemento filho da div, como não tem, passamos a possição 0.
    divTarefa.insertBefore(form, divTarefa[0]);

}

function deletar(cd_tarefa, rota){
    location.href = `../src/tarefa_controller.php?e=D&cd_tarefa=${cd_tarefa}&rota=${rota}`;
}

function atualizaStatus(cd_tarefa, cd_status, rota){
    location.href = `../src/tarefa_controller.php?e=AS&cd_tarefa=${cd_tarefa}&cd_status=${cd_status}&rota=${rota}`;
}