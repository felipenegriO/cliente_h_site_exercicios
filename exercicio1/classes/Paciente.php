<?php
	class Paciente{
		private $nome;
		private $cpf;
		private $data_nascimento;
		private $sexo;
		
		function __construct($nome,$cpf,$data_nascimento,$sexo) {
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->data_nascimento = $data_nascimento;
			$this->sexo    = $sexo;
		}
		public function setNome ($nome){
            $this->$nome = $nome;
        }
		public function setCpf ($cpf){
            $this->$cpf = $cpf;
        }
		public function setData_nascimento ($data_nascimento){
            $this->$data_nascimento = $data_nascimento;
        }
		public function setSexo ($sexo){
            $this->$sexo = $sexo;
        }
		 public function getNome (){
            return $this->nome;
        }
		public function getCpf (){
            return $this->cpf;
        }
		public function getData_nascimento (){
            return $this->data_nascimento;
        }		
		public function getSexo(){
            return $this->sexo;
        }
	}
?>