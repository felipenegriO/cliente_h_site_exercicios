<?php
class Endereco{
	private $ip;
	private $cidr;
	private $endereco;
	
	public function getIp(){
		return $this->ip;
	}
	
	public function setIp($ip){
		$this->ip = $ip;
	}
	
	public function getCidr(){
		return $this->cidr;
	}
	
	public function setCidr($cidr){
		$this->cidr  = $cidr;
	}
	public function getEndereco(){
		return $this->endereco;
	}
	
	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}
	
	public function __construct( $endereco_completo) {
		if($this->validarCaracteres($endereco_completo)){
			$this->ip = separarIP($endereco_completo) ;
			$this->cidr = separarCidr($endereco_completo);
			if(!($this->validarCidr($this->cidr) and $this->validarIP($this->ip))){
				return throw new Exception("Dados inválidos. Verifique os dados preenchidos.");
			}
		}else{
			return throw new Exception("Dados inválidos. Verifique os dados preenchidos.");
		}

	}

	private function validarCaracteres($endereco) {
        $regexp = '/^[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}/[0-9]{1,2}$/';
        // Verifica o IP/CIDR
        if ( ! preg_match( $regexp, $endereco ) ) {
            return false;
        }else{
			return true;
		}
    }    
	private function separarIP($endereco_completo) {
        $endereco = explode( '/', $endereco_completo );
        return $endereco[0];
	}
	private function separarCidr($endereco_completo) {
        $endereco = explode( '/', $endereco_completo );
        return (int) $endereco[1];
	}
	private function validarCidr($cidr) {
        if ( $cidr > 32 ) {
            return false;
        }else{
			return true;
		}
	}
    private function validarIP($ip) {
        foreach( explode( '.', $ip ) as $numero ) {
            $numero = (int) $numero;
            if ( $numero > 255 || $numero < 0 ) {
                return false;
            }
        }
        return true;
    }
	
}
?>