<?php
require_once("conexao.php");
require_once("tarefa.model.php");
require_once("tarefa.service.php");

$tarefa = new Tarefa();
$tarefa->__set('ds_tarefa', $_REQUEST['ds_tarefa']);
$conexao = new Conexao();
$tarefaService = new TarefaService($conexao, $tarefa);

if($_REQUEST['e'] == "I"){ //Inserir

    if($tarefaService->insert()){
    
        header("Location: ../todas_tarefas?e=successI");
    }else{

        header("Location: ../todas_tarefas?e=dangerI");
    }
}

if($_REQUEST['e'] == "A"){ //Alterar

    $tarefa->__set("cd_tarefa", $_REQUEST['cd_tarefa']);
    $tarefa->__set("ds_tarefa", $_REQUEST['ds_tarefa']);

    if($tarefaService->update()){

        if($_REQUEST['rota'] == "TT"){ //Enviar usuario para mesma pagina que ele estava
            header("Location: ../todas_tarefas?e=successU"); 
        }else{
            header("Location: ../tarefas_pendente?e=successU");
        }
    }else{
        if($_REQUEST['rota'] == "TT"){ //Enviar usuario para a mesma pagina que ele estava
            header("Location: ../todas_tarefas?e=dangerU"); 
        }else{
            header("Location: ../tarefas_pendente?e=dangerU");
        }
    }
}

if($_REQUEST['e'] == "L"){ //Listar

    $sqlSelect = $tarefaService->select();

}

if($_REQUEST['e'] == "LP"){ //Listar Pendentes

    $sqlSelect = $tarefaService->selectPendete();

}

if($_REQUEST['e'] == "D"){ //Deletar

    $tarefa->__set("cd_tarefa", $_REQUEST['cd_tarefa']);

    if($tarefaService->delet()){

        if($_REQUEST['rota'] == "TT"){ //Enviar usuario para a mesma pagina que ele estava
            header("Location: ../todas_tarefas?e=successD"); 
        }else{
            header("Location: ../tarefas_pendente?e=successD");
        }
    }else{
        if($_REQUEST['rota'] == "TT"){ //Enviar usuario para a mesma pagina que ele estava
            header("Location: ../todas_tarefas?e=dangerD"); 
        }else{
            header("Location: ../tarefas_pendente?e=dangerD");
        }
    }
    
}

if($_REQUEST['e'] == "AS"){ //Atualizar Status

    $tarefa->__set("cd_tarefa", $_REQUEST['cd_tarefa']);

    if($_REQUEST['cd_status'] == '1'){ //Alterar o status conforme anterior
       $tarefa->__set("cd_status", '2'); 
    }else{
        $tarefa->__set("cd_status", '1');
    }

    if($tarefaService->atualizaStatus()){

        if($_REQUEST['rota'] == "TT") { //Enviar usuario para a mesma pagina que ele estava
            header("Location: ../todas_tarefas?e=successAS");
        }else{
            header("Location: ../tarefas_pendente?e=successAS");
        }
    }else{
        if($_REQUEST['rota'] == "TT"){ //Enviar usuario para a mesma pagina que ele estava
            header("Location: ../todas_tarefas?e=dangerAS"); 
        }else{
            header("Location: ../tarefas_pendente?e=dangerAS");
        }
    }
}
?>