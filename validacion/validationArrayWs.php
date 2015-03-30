<?php
/**
* Función recursiva que tiene acceso a toda la matriz validar cada artículo. 
* Cuando un nodo tiene un nodo hijo se llama a la función recursiva hasta los últimos niños
* Note: la palabra "validation" fue omitida del nombre de la clase para facilitar el desarrollo
*
* @package    validacion
* @author     Diego Sanches
* @version    1.0 de 29/03/2015
* 
*/
class arrayWs {
	
	public $resultValidaArrWS;
	public $templateArray;
	
	public function __construct($v) {	
		$this->resultValidaArrWS = true;
		$this->templateArray 	 = new templateArray($v->service);
  	}
	function validaArrWS($arrWS, $v) {
		
		$opt_echo = "0";
		$result   = true;
					
		arrayWs::_echo("<table border=1>", $opt_echo) ;
		foreach ($arrWS as $field => $value ) {
						
			arrayWs::_echo("<tr>", $opt_echo) ;
			arrayWs::_echo("<td>" .$field."</td>" , $opt_echo) ;	
				
			if ( !is_array ($value)) {					
				$resultValidacion =  $v->valida(  $field, $value, $this->templateArray  );
				arrayWs::_echo("<td>" .$value."</td>" , $opt_echo) ;
				arrayWs::_echo("<td>" .$resultValidacion."</td>" , $opt_echo) ;	
										
				if (!$resultValidacion ) {
					$result = false;
					$this->resultValidaArrWS = false;
				} 					
			}else{		
				arrayWs::_echo("<td>&nbsp;" , $opt_echo) ;		 			
				arrayWs::validaArrWS($value, $v);
				arrayWs::_echo("</td>" , $opt_echo) ;
				arrayWs::_echo("<td>&nbsp;</td>" , $opt_echo) ;							
			}				
			arrayWs::_echo("</tr>", $opt_echo) ;			
		}
		arrayWs::_echo("</table>", $opt_echo) ;
		return $this->resultValidaArrWS;	
	}	
	function _echo($var, $opt) {
		if ($opt == "1" ){
			print_r ( $var );
		} 	
	}
}
?>