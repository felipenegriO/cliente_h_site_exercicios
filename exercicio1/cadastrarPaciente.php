<?php
	include_once "classes/PacienteDAO.php";
	$novoPaciente = new Paciente($_POST["nome"],$_POST["cpf"],$_POST["data_nascimento"],$_POST["sexo"]);
	$dao = new PacienteDAO;
	$dao->Inserir($novoPaciente);	
	header('Location:confirmacao_cadastro_paciente.php');
?>
