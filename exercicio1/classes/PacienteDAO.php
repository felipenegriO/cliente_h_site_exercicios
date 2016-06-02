	<?php
	require_once "Paciente.php";
	require_once "Conexao.php";
	class PacienteDAO {
		public static $instance;
		
		public static function getInstance() {
			if (!isset(self::$instance))
				self::$instance = new PacienteDAO();
			return self::$instance;
		}
		
		public function Inserir(Paciente $paciente) {
			try {
				$sql = "INSERT INTO paciente (nome,cpf,data_nascimento,sexo) VALUES (:nome,:cpf,:data_nascimento,:sexo)";
				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindValue(":nome", $paciente->getNome());
				$p_sql->bindValue(":cpf", $paciente->getCpf());
				$p_sql->bindValue(":data_nascimento", $paciente->getData_nascimento());
				$p_sql->bindValue(":sexo", $paciente->getSexo());
				return $p_sql->execute();
			} catch (Exception $e) {
				print "Ocorreu um erro ao tentar inserir paciente, tente novamente mais tarde.";
			}
		}
		public function select() {
        try {
            $sql = "SELECT * FROM paciente";
            $p_sql = Conexao::getInstance()->prepare($sql);
			$p_sql->execute();
			$result = $p_sql->fetchAll();
            return  $result;
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar consultar pacientes, tente novamente mais tarde.";
        }
	}
}

?>