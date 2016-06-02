<?php
	include_once "classes/MedicoDAO.php";
	$novoMedico = new Medico($_POST["nome"],$_POST["especialidade"],$_POST["crm"]);
	$dao = new MedicoDAO;
	$dao->Inserir($novoMedico);	
	header('Location:confirmacao_cadastro_medico.php');
?>
