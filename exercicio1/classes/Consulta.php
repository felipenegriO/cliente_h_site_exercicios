<?php
	class Consulta{
		private $descricao;
		private $Data;
		private $medico;
		private $paciente;
		private $atendido;
		private $id;
		
		function __construct($descricao,$paciente,$atendido) {
			$this->descricao = $descricao;
			$this->paciente = $paciente;
			$this->atendido = $atendido;
		}
		
		public function setAtendido($atendido){
            $this->$atendido = $atendido;
        }
		public function setId($id){
            $this->$id = $id;
        }
		public function setMedico($medico){
            $this->$medico = $medico;
        }
		public function setDescricao($descricao){
            $this->$descricao = $descricao;
        }
		public function setPaciente($paciente){
            $this->$paciente = $paciente;
        }
		public function getDescricao (){
            return $this->descricao;
        }
		public function getPaciente (){
            return $this->paciente;
        }
		public function getMedico (){
            return $this->medico;
        }
		public function getAtendido (){
            return $this->atendido;
        }
		public function getId (){
            return $this->id;
        }
	}

?>