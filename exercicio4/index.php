<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Exercicio 4</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include ("nav.html");
		?> 
		<div id="main" class="container-fluid">
			<h3 class="page-header">Atividade para entrega Exercicio 4</h3>
			<div class="row">
				<h3 class="page-header">MASCARA DE SUB - REDE</h3>
			</div>	
			<div class="row">
				<input type="text" class="form-control" id="ip" name="ip"> <input type="text" class="form-control" id="ip" name="ip">
			</div>
				<button>calcular<button>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#ip').mask('0000.0000.0000.0000');
			});
		</script>
	</body>
</html>