<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Médicos</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include("nav.html");
		?>
		<div id="main" class="container-fluid" style="margin-top: 50px">
			<div id="top" class="row">
				<div class="col-sm-3">
					<h2>Médicos</h2>
				</div>
				<div class="col-sm-6">
					<div class="input-group h2">
						<input name="pesquisar" class="form-control" id="pesquisar" type="text" placeholder="Pesquisar Médico">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</div>
				<div class="col-sm-3">
					<a href="cadastro_medico.php" class="btn btn-primary pull-right h2">Cadastrar Novo Médico</a>
				</div>
			</div> <!-- /#top -->
			<hr />
			<div id="divlista" class="row">
				<div class="table-responsive col-md-12">
					<table class="table table-striped" id="lista" cellspacing="0" cellpadding="0">
						<thead>
						<tr>
							<th>CRM</th>
							<th>Nome</th>
							<th>Especialidade</th>
						</tr>
						</thead>
						<tbody>
							<?php
								include_once("classes/medicoDAO.php");
								$medicos = new MedicoDAO;
								$resultados = $medicos->select();
								if ( count($resultados) ) {
									foreach($resultados as $linhaMedico) {
										print("<tr>");
											print_r("<td>". $linhaMedico[1]."</td>");
											print_r("<td>". $linhaMedico[2]."</td>");
											
											require_once "classes/EspecialidadeDAO.php";
											$especialidade = new EspecialidadeDAO;
											$resultadoEspecialide = $especialidade->selectall();
											if ( count($resultadoEspecialide) ) {
												foreach($resultadoEspecialide as $linhaEspecialidade) {
													if($linhaMedico[3]==$linhaEspecialidade[0]){
														print_r("<td>". $linhaEspecialidade[1]."</td>");
													}
												}
											}
										print("</tr>");
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div> <!-- /#list -->
		</div> <!-- /#main -->
		<?php
			include ("rodape.html");
		?> 
	</body>

</html>

<script>
	var filtro = document.getElementById('pesquisar');
	var tabela = document.getElementById('lista');
	filtro.onkeyup = function() {
		var nomeFiltro = filtro.value;
		for (var i = 1; i < tabela.rows.length; i++) {
			var conteudoCelula = tabela.rows[i].cells[0].innerText;
			var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
			tabela.rows[i].style.display = corresponde ? '' : 'none';
		}
	};
</script>