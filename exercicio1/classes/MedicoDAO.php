	<?php
	require_once "Medico.php";
	require_once "Conexao.php";
	class MedicoDAO {
		public static $instance;
		
		public static function getInstance() {
			if (!isset(self::$instance))
				self::$instance = new MedicoDAO();
			return self::$instance;
		}
		
		public function Inserir(Medico $medico) {
			require_once "EspecialidadeDAO.php";
			$especialidade = new EspecialidadeDAO;
			$resultado = $especialidade->selectall();
			if ( count($resultado) ) {
				foreach($resultado as $linha) {
					if(0==strcmp($linha[1],$medico->getEspecialidade())){
						$resultado =$linha[0];
					}
				}
			}
			try {
				$sql = "INSERT INTO medico (nome,crm,id_especialidade) VALUES (:nome,:crm,:id_especialidade)";
				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindValue(":nome", $medico->getNomeCompleto());
				$p_sql->bindValue(":crm", $medico->getCRM());
				$p_sql->bindValue(":id_especialidade",$resultado );
				return $p_sql->execute();
			} catch (Exception $e) {
				print "Ocorreu um erro ao tentar inserir medico, tente novamente mais tarde.";
			}
		}
		public function select() {
        try {
            $sql = "SELECT * FROM medico";
            $p_sql = Conexao::getInstance()->prepare($sql);
			$p_sql->execute();
			$result = $p_sql->fetchAll();
            return  $result;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar consultar medicos, tente novamente mais tarde.";
        }
	}
}

?>