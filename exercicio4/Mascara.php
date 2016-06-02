<?php
class Mascara{
	private $mascara;
	private $cidr;

	public function getMascara(){
		return $this->mascara;
	}
	public function setMascara($mascara){
		$this->mascara = $mascara;
	}
	public function getCidr(){
		return $this->cidr;
	}
	public function setCidr($cidr){
		$this->cidr = $cidr;
	}
	public function __construct( $cidr) {
		$this->cidr = $cidr;
        if ( $cidr() == 0 ) {
             $this->mascara = '0.0.0.0';
        }else{
			$this->mascara =  long2ip(ip2long("255.255.255.255") << ( 32 - $cidr ));
		}
    }
    public function getRede($ip) {
        if ( $this->cidr() == 0 ) {
            return '0.0.0.0';
		}else{
			return (
				long2ip( 
					( ip2long( $ip ) ) & ( ip2long( $this->mascara() ) )
				)
			);
		}
    }
    public function getBroadcast() {
        if ( $this->cidr() == 0 ) {
            return '255.255.255.255';
        }else{
			return (
				long2ip(
					ip2long($this->getRede() ) | ( ~ ( ip2long( $this->mascara() ) ) ) 
				)
			);
		}
	}
    public function getTotalIps() {
        return( pow(2, ( 32 - $this->cidr() ) ) );
    }
    public function getQtdHosts() {
        if ( $this->cidr() == 32 ) {
            return 0;
        } elseif ( $this->cidr() == 31 ) {
            return 0;
        }
        
        return( abs( $this->getTotalIps() - 2 ) );
    }
    
    public function getPrimeiroHost() {
        if ( $this->cidr() == 32 ) {
            return null;
        } elseif ( $this->cidr() == 31 ) {
            return null;
        } elseif ( $this->cidr() == 0 ) {
            return '0.0.0.1';
        }
        
        return (
            long2ip( ip2long( $this->getRede() ) | 1 )
        );
    }
    
    public function getUltimoHost() {
        if ( $this->cidr() == 32 ) {
            return null;
        } elseif ( $this->cidr() == 31 ) {
            return null;
        }
    
        return (
            long2ip( ip2long( $this->getRede() ) | ( ( ~ ( ip2long( $this->mascara() ) ) ) - 1 ) )
        );
    }
}