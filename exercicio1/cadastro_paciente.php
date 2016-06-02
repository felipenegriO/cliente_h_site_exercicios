<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastrar Paciente</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include_once("nav.html");
		?>
		<div id="main" class="container-fluid">
			<h3 class="page-header text-center">Cadastro de Novo Paciente</h3>
			<form action="cadastrarPaciente.php" method="post">
				 <div class="row">
					<div class="form-group col-md-3"></div>
					<div class="form-group col-md-4">
						<label for="NomeCompleto">Nome Completo</label>
						<input type="text" class="form-control" id="NomeCompleto" name="nome" placeholder="Nome Completo">
					</div>
					<div class="form-group col-md-2">
						<label for="CPF">CPF</label>
						<input type="number" class="form-control" id="cpf" name="cpf" placeholder="CPF">
					</div>
					<div class="form-group col-md-3"></div>
				</div>
				<div class="row">
					<div class="form-group col-md-3"></div>
					<div class="form-group col-md-3">
						<label for="data_nascimento">Data de nascimento</label>
						<input type="date" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Data de nascimento">
					</div>
					<div class="form-group col-md-3">
						<label for="sexo">Sexo</label>
						<select name="sexo" class="form-control" name="sexosexo" id="sexo">
							<option>Escolha um sexo</option>
							<option value="M">Masculino</option>
							<option value="F">Feminino</option>
						</select>  	  
					</div>
					<div class="form-group col-md-3">
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