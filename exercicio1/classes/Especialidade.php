<?php
	class Especialidade{
		private $id;
		private $Descricao;
		
		function __construct($id,$Descricao) {
			$this->id = $id;
			$this->Descricao    = $Descricao;
		}
		public function setid ($id){
            $this->$id = $id;
        }
		public function setDescricao ($Descricao){
            $this->$Descricao = $Descricao;
        }
		 public function getid (){
            return $this->id;
        }
		public function getDescricao (){
            return $this->Descricao;
        }
	}
?>