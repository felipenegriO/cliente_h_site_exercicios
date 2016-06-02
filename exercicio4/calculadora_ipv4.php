<?php
	include 'Mascara.php';
 	include 'Endereco.php';
	
class calculadora_ipv4{
	$endereco;
	$mascara;
	public calcularIP($ip,$cidr){
		try{
			$this->endereco = new Endereco($ip . '/' . $cidr);
			$this->mascara = new Mascara($this->endereco::getCidr());
		}catch(Execption $e){
			echo $e->getMessage();
		}
		$endereco_completo = $this->endereco::getEndereco();
		$ip =  $this->endereco::getIp();
		$cidr =  $this->endereco::getCidr();
		$mascara =  $this->mascara::getMascara();
		$ipRrede =  $this->mascara::getRede() . '/' . $this->endereco::getCidr();
		$broadcast =  $this->mascara::getBroadcast();
		$primeiroIp = $this->mascara::getPrimeiroHost();
		$ultimoIIp = $this->mascara::getUltimoHost();
		$totalIp =$this->mascara::getTotalIps();
		$qtdHost=$this->mascara::getQtdHosts();
	}
	
	
	// Cria o objeto da classe já recebendo o IP/CIDR
	$ip = new calc_ipv4('192.168.0.5/29');
	 
	// Checa se o IP é válido
	
    
}