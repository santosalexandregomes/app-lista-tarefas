<?php
$_REQUEST['e'] = "LP"; //Listar Pendentes
require_once("../src/conexao.php");
require_once("../src/tarefa.model.php");
require_once("../src/tarefa.service.php"); 
require_once("../src/tarefa_controller.php");

?>
<html>
	<head>
		<?php include("../includes/head.php");?>
	</head>
	<body>

		<?php include("../includes/nav-bar.php");?>

		<div class="container app">
			<div class="row">

				<?php include("../includes/menu.php");?>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Tarefas pendentes</h4>
								<hr />
							<?php
							if(empty($sqlSelect)){echo "<h6 class='text-blue text-center'>Oba, nenhuma tarefa pendente.</h6>";}
							foreach($sqlSelect as $key => $value){
								if($value['cd_status'] == '1'){
									$status = '<a class="text-danger"> (pendente)</a>';
									$statusIcon = "fas fa-check-square fa-lg text-success cp";
								}else{
									$status = '<a class="text-success"> (realizada)</a>';
									$statusIcon = "fas fa-check-square fa-lg text-danger cp";
								}
							?>
								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9" id="tarefa_<?=$value['cd_tarefa']?>"><?=$value['ds_tarefa'] . $status?></div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<i class="fas fa-trash-alt fa-lg text-danger cp" onclick="deletar(<?=$value['cd_tarefa']?>, 'TP')"></i>
										<i class="fas fa-edit fa-lg text-blue cp" onclick="editar(<?=$value['cd_tarefa']?>, '<?=$value['ds_tarefa']?>', 'TP')"></i>
										<i class="<?=$statusIcon?>" onclick="atualizaStatus(<?=$value['cd_tarefa']?>, <?=$value['cd_status']?>, 'TP')"></i>
									</div>
								</div><hr>
							<?php	
								}
							?>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("../includes/alerts.php");?>
		<?php include("../includes/footer.php");?>
	</body>
</html>