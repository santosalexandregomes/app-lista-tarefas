<?php
    switch ($_GET['e']) {
        case "successD";
            $msg = "<strong>Sucesso!</strong> Sua tarefa foi apagada.";
        break;

        case "successU";
            $msg = "<strong>Sucesso!</strong> A tarefa foi alterada.";
        break;

        case "successI";
            $msg = "<strong>Oba!</strong> Agora voce têm uma nova tarefa.";
        break;

        case "successAS";
            $msg = "<strong>Sucesso!</strong> O Status foi alterado.";
        break;

        case "dangerU";
            $msg = "<strong>Ops!</strong> Houve um erro ao alterar a tarefa.";
        break;

        case "dangerI";
            $msg = "<strong>Ops!</strong> Houve um erro ao inserir sua tarefa.";
        break;

        case "dangerD";
            $msg = "<strong>Ops!</strong> Houve um erro ao deletar a tarefa.";
        break;

        case "dangerAS";
            $msg = "<strong>Ops!</strong> Houve um erro ao atualizar o status da tarefa.";
        break;
    }

?>
<div class="alert alert-success alert-dismissible" id="alertSuccess">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?=$msg;?> <i class="far fa-thumbs-up"></i>
</div>
<div class="alert alert-danger alert-dismissible" id="alertDanger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?=$msg;?> <i class="far fa-frown"></i>
</div>
