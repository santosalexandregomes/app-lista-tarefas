<?php $url = explode("/", $_SERVER["REQUEST_URI"]);?>
<div class="col-sm-3 menu">
    <ul class="list-group">
        <li class="list-group-item <?=(in_array("tarefas_pendente", $url) ? "active" : "" ); ?>"><a href="../tarefas_pendente">Tarefas pendentes</a></li>
        <li class="list-group-item <?=(in_array("nova_tarefa", $url) ? "active" : "" ); ?>"><a href="../nova_tarefa">Nova tarefa</a></li>
        <li class="list-group-item <?=(in_array("todas_tarefas", $url) ? "active" : "" ); ?>"><a href="../todas_tarefas">Todas tarefas</a></li>
    </ul>
</div>