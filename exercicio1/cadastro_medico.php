<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastrar Médico</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include_once("nav.html");
		?>
		<div id="main" class="container-fluid">
			<h3 class="page-header text-center">Cadastro de Novo Médico</h3>
			<form action="cadastrarMedico.php" method="post">
				<div class="row">
					<div class="form-group col-md-3"></div>
					<div class="form-group col-md-6">
						<label for="exampleInputEmail1">Nome Completo</label>
						<input type="text" class="form-control" id="NomeCompleto" name="nome" placeholder="Nome Completo">
					</div>
					<div class="form-group col-md-3"></div>
				</div>
				<div class="row">
					<div class="form-group col-md-3"></div>
					<div class="form-group col-md-6">
						<label for="espcialidade">Especialidade</label>
						<select name="especialidade" class="form-control" id="especialdiade">
							<option>Escolha uma especialidade</option>
							<?php
								include_once("classes/EspecialidadeDAO.php");
								$especialidadeDAO = new EspecialidadeDAO;
								$result = $especialidadeDAO->select();
								if ( count($result) ) {
									foreach($result as $row) {
										print("<option>");
										print_r($row[0]);
										print("</option>");
									}
								}
							?>
						</select>  	  
					</div>
					<div class="form-group col-md-3"></div>
				</div>
				<div class="row">
					<div class="form-group col-md-3"></div>
					<div class="form-group col-md-6">
						<label for="NomeCompleto">CRM</label>
						<input type="number" class="form-control" id="CRM" name="crm" placeholder="CRM">
					</div>
				</div>  
				<div class="row text-center">
					<hr />
					<button type="submit" class="btn btn-primary">Salvar</button>
					<a href="template.html" class="btn btn-default">Cancelar</a>
				</div>
				<div class="form-group col-md-4"></div>
			</form>
		</div>
		<?php
			include ("rodape.html");
		?> 
	</body>
</html>
