<?php 
/**
* Validacion de RUT Chileno
*
* @package    validacion
* @author     Diego Sanches
* @version    1.0 de 1/04/2015
* 
*/
class rut {	

  
  public function __construct() {
  	
  }
	static function validaRut( $rutCompleto ) {
		$rutCompleto =  str_replace(".","", $rutCompleto);
		if ( !preg_match("/^[0-9]+-[0-9kK]{1}/",$rutCompleto)) return false;
		$rut = explode('-', $rutCompleto);
		return strtolower($rut[1]) == rut::dv($rut[0]);
	}
	static function dv ( $T ) {
		$M=0;$S=1;
		for(;$T;$T=floor($T/10))
			$S=($S+$T%10*(9-$M++%6))%11;
		return $S?$S-1:'k';
	} 
}


		?>