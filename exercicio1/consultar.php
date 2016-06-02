<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tarifa</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>
	<body>
	<?php
			$nome ="";
			$sexo="";
			$dataNascimento ="";
			$descricao_consulta="";
			include_once("classes/PacienteDAO.php");
			$pacientes = new PacienteDAO;
			$resultados = $pacientes->select();
			if ( count($resultados) ) {
				foreach($resultados as $linhaPaciente) {
					if($_GET['id'] == $linhaPaciente[0] ){
						$nome = $linhaPaciente[1];
						$dataNascimento =$linhaPaciente[3];
						$sexo=$linhaPaciente[4];
						print($nome);
					}
				}
			}
		?> 
		<?php
			include ("nav.html");
		?> 
		<div id="main" class="container-fluid">
			<div class="row">
				<div class="col-xs-6 col-md-4"></div>
				<div class="col-xs-6 col-md-4">
					<h3>
						Ficha
						<?php
							if(strcmp($sexo,'F')==0){
								echo "da";
							} else {
								echo "do";
							} 
						?>
						Paciente
						<?php
							echo $nome 
						?>
					</h3>
				</div>
				<div class="col-xs-6 col-md-4"></div>
			</div>
			<div class="row">
				<div class="col-xs-4 col-md-2"></div>
				<div class="col-xs-6 col-md-4"><h4>Dados Cadastrais</h4></div>
				<div class="col-xs-6 col-md-4"></div>
			</div>
			<div class="row">
			<br />
				<div class="col-xs-4 col-md-2"></div>
				<div class="col-xs-6 col-md-4">
					<b>Data de nascimento:</b> <?php echo  $dataNascimento?>
				</div>
				<div class="col-xs-6 col-md-4">
					<b>Sexo:</b>
					<?php
						if(strcmp($sexo,'F')==0){
							echo "Feminino";
						} else {
							echo "Masculino";
						}  
					?>
				</div>
			</div>
			<br />
			<br />
			<div class="row">
				<div class="col-xs-4 col-md-2"></div>
				<div class="col-xs-6 col-md-4"><h4>Descrição da consulta</h4></div>
				<div class="col-xs-6 col-md-4"></div>
			</div>
		</div>
		<form action="salvarConsulta.php" method="GET">
			<div class="row">
				<div class="col-xs-4 col-md-2"></div>
				<div class="col-xs-6 col-md-8">
					<textarea rows="4"  cols="80" name="descricao" id="descricao" class="form-control"></textarea>
					<input id="id_paciente" name="id_paciente" value="<?php echo $_GET['id'] ?>" type="hidden">
				</div>
			</div>
			<br />
			<br />
			<div class="row">
				<div class="col-xs-8 col-md-8"></div>
				<button type="submit" class="btn btn-primary">Finalizar Consulta</button>
			</div>
		</form>
		<div class="row">
			<div class="col-xs-4 col-md-2"></div>
			<div class="col-xs-6 col-md-7"><h4>Consultas anteriores</h4></div>
			<div class="col-xs-6 col-md-1"></div>
		</div>
		<br />
		<div class="row">
				<div class="col-xs-4 col-md-2"></div>
				<div class="col-xs-6 col-md-8"><div class="table-responsive col-md-12">
					<table class="table table-striped" id="lista" cellspacing="0" cellpadding="0">
						<thead>
						<tr>
							<th>Data</th>
							<th>Descrição</th>
							<th>Medico</th>
						</tr>
						</thead>
						<tbody>
							<?php
								include_once("classes/ConsultaDAO.php");
								$consultas = new ConsultaDAO;
								$resultados = $consultas->select();
								if ( count($resultados) ) {
									foreach($resultados as $linha) {
										if($linha[4]==$_GET['id'] and $linha[5] >=1){
											print("<tr>");	
												print_r("<td>". $linha[1]."</td>");
												print_r("<td>". $linha[2]."</td>");
												print_r("<td>". $linha[3]."</td>");
											print("</tr>");
										}
									}
								}
							?>
						</tbody>
					</table>
					</div>

			</div>
		<?php
			include ("rodape.html");
		?> 
	</body>
</html>
