	<?php
	require_once "Consulta.php";
	require_once "Conexao.php";
	class ConsultaDAO {
		public static $instance;
		
		public static function getInstance() {
			if (!isset(self::$instance))
				self::$instance = new ConsultaDAO();
			return self::$instance;
		}
		
		public function Inserir(Consulta $consulta) {
			try {
				$sql = "INSERT INTO consulta (descricao,medico, paciente) VALUES (:descricao,:medico,:paciente)";
				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindValue(":descricao",$consulta->getDescricao());
				$p_sql->bindValue(":medico",$consulta->getMedico());
				$p_sql->bindValue(":paciente",$consulta->getPaciente());
				return $p_sql->execute();
			} catch (Exception $e) {
				print "Ocorreu um erro ao tentar inserir consulta, tente novamente mais tarde.";
			}
		}
		public function select() {
			try {
				$sql = "SELECT * FROM consulta";
				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->execute();
				$result = $p_sql->fetchAll();
				return  $result;
			} catch (Exception $e) {
				print "Ocorreu um erro ao tentar executar consultar consultas, tente novamente mais tarde.";
			}
		}
		public function finalizarConsulta(Consulta $consulta,$id) {
			try {
				$sql = "UPDATE consulta set atendido = :atendido, descricao = :descricao WHERE id = :id";
				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindValue(":atendido", 1);
				$p_sql->bindValue(":descricao", $consulta->getDescricao());
				$p_sql->bindValue(":id", $id);
				print $consulta->getId();
				return $p_sql->execute();
			} catch (Exception $e) {
				print "Ocorreu um erro ao tentar editar especialidade, tente novamente mais tarde.";			
			}
		}
}

?>