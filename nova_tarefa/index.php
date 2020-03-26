<?php
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
								<h4>Nova tarefa</h4>
								<hr>

								<form method="post" action="../src/tarefa_controller.php">
									<div class="form-group tarefa text-blue">
										<input type="text" class="form-control" name="ds_tarefa" placeholder="Descreva sua tarefa...">
									</div>
									<input type="hidden" name="e" value="I">
									<button class="btn btn-blue">Inserir</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("../includes/footer.php");?>
	</body>
</html>