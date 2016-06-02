	<?php
	require_once "Especialidade.php";
	require_once "Conexao.php";
	class EspecialidadeDAO {
		public static $instance;
		
		public static function getInstance() {
			if (!isset(self::$instance))
				self::$instance = new EspecialidadeDAO();
			return self::$instance;
		}
		
		public function Inserir(Especialidade $especialidade) {
			try {
				$sql = "INSERT INTO especialidade (id,descricao) VALUES (:id,:descricao)";
				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindValue(":id", $especialidade->getId());
				$p_sql->bindValue(":descricao", $especialidade->getDescricao());
				return $p_sql->execute();
			} catch (Exception $e) {
				print "Ocorreu um erro ao tentar inserir especialidade, tente novamente mais tarde.";
			}
		}
		
		public function Editar(Especialidade $especialidade) {
			try {
				$sql = "UPDATE especialidade set descricao = :descricao WHERE id = :id";
				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindValue(":id", $especialidade->getId());
				$p_sql->bindValue(":descricao", $especialidade->getDescricao());
				return $p_sql->execute();
			} catch (Exception $e) {
				print "Ocorreu um erro ao tentar editar especialidade, tente novamente mais tarde.";			
			}
		}

		public function Deletar($cod) {
			try {
				$sql = "DELETE FROM especialidade WHERE cod_usuario = :cod";
				
				$p_sql = Conexao::getInstance()->prepare($sql);
				$p_sql->bindValue(":cod", $cod);

				return $p_sql->execute();
			} catch (Exception $e) {
				print "Ocorreu um erro ao tentar deletar especialidade, tente novamente mais tarde.";			
			}
		}
		public function select() {
        try {
            $sql = "SELECT descricao FROM especialidade";
            $p_sql = Conexao::getInstance()->prepare($sql);
			$p_sql->execute();
			$result = $p_sql->fetchAll();
            return  $result;
        } catch (Exception $e) {
			print "Ocorreu um erro ao tentar selecionar especialidade, tente novamente mais tarde.";
        }
	}
	public function selectall() {
        try {
            $sql = "SELECT * FROM especialidade";
            $p_sql = Conexao::getInstance()->prepare($sql);
			$p_sql->execute();
			$result = $p_sql->fetchAll();
            return  $result;
        } catch (Exception $e) {
			print "Ocorreu um erro ao tentar selecionar especialidade por id, tente novamente mais tarde.";
		}
	}
}

?>