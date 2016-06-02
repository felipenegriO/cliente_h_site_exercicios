<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pacientes</title>
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
					<h2>Pacientes</h2>
				</div>
				<div class="col-sm-6">
					<div class="input-group h2">
						<input name="pesquisar" class="form-control" id="pesquisar" type="text" placeholder="Pesquisar Paciente">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</div>
				<div class="col-sm-3">
					<a href="cadastro_paciente.php" class="btn btn-primary pull-right h2">Cadastrar Novo Paciente</a>
				</div>
			</div> <!-- /#top -->
			<hr />
			<div id="divlista" class="row">
				<div class="table-responsive col-md-12">
					<table class="table table-striped" id="lista" cellspacing="0" cellpadding="0">
						<thead>
						<tr>
							<th>Nome</th>
							<th>CPF</th>
							<th>Data de Nascimento</th>
							<th>Sexo</th>
							<th>Ações</th>
						</tr>
						</thead>
						<tbody>
							<?php
								include_once("classes/PacienteDAO.php");
								$pacientes = new PacienteDAO;
								$resultados = $pacientes->select();
								if ( count($resultados) ) {
									foreach($resultados as $linhaPaciente) {
										print("<tr>");	
											print_r("<td id='id'>". $linhaPaciente[1]."</td>");
											print_r("<td>". $linhaPaciente[2]."</td>");
											print_r("<td>". $linhaPaciente[3]."</td>");
											if($linhaPaciente[4] == 'M'){
												print_r("<td>Masculino</td>");
											}else{
												print_r("<td>Feminino</td>");
											}
											print('<td>');
											include_once("classes/ConsultaDAO.php");
											$consultas = new ConsultaDAO;
											$resultado = $consultas->select();
											if ( count($resultado) ) {
												foreach($resultado as $linha) {
													if($linha[5] == 0 and $linha[4]==$linhaPaciente[0]){
														print('<a onclick="dados('.$linhaPaciente[0].')" class="btn btn-success">Consultar</a>');
													}else{
														print('<a onclick="dados('.$linhaPaciente[0].')" class="btn btn-primary">Agendamento</a>');
													}
												}
											}
										print('</td>');
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

	function dados(valor){
			location.href="consultar.php?id= "+valor;
	   }

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