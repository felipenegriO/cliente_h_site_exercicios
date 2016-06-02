<?php
	include_once "classes/ConsultaDAO.php";
	$novaConsulta = new Consulta($_GET['descricao'],$_GET['id_paciente'],1);
	$dao = new ConsultaDAO;
	$resultados = $dao->select();
	if ( count($resultados) ) {
		foreach($resultados as $linha) {
			if($linha[5]==0 and $novaConsulta->getPaciente() == $linha[4]){
				print $dao->finalizarConsulta($novaConsulta,$linha[0]);
			}
		}
	}
	
	
//header('Location:confirmacao_consulta.php');
?>
