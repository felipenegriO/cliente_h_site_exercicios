<?php
	class Medico{
		private $NomeCompleto;
		private $Especialidade;
		private $CRM;
		
		function __construct($NomeCompleto,$Especialidade,$CRM) {
			$this->NomeCompleto = $NomeCompleto;
			$this->Especialidade    = $Especialidade;
			$this->CRM					  = $CRM;
		}
		public function setNomeCompleto ($NomeCompleto){
            $this->$NomeCompleto = $NomeCompleto;
        }
		public function setEspecialidade ($Especialidade){
            $this->$Especialidade = $Especialidade;
        }
		public function setCRM ($CRM){
            $this->$CRM = $CRM;
        }
		 public function getNomeCompleto (){
            return $this->NomeCompleto;
        }
		public function getEspecialidade (){
            return $this->Especialidade;
        }
		public function getCRM (){
            return $this->CRM;
        }
	}
?>