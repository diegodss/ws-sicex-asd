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
	public $optEcho = "0";
	public $valueWs;
	
	public function __construct($v) {	
		$this->resultValidaArrWS = true;
		$this->templateArray 	 = new templateArray($v->service);
		
  	}
  	function validaTemplateArray($arrWs, $v){
  		
		$optEcho = $this->optEcho;		
		$totalFalse = 0;
		arrayWs::_echo("<table border=1>", $optEcho) ;		
		arrayWs::registerReceivedData($arrWs, $v->service);
  		foreach ($this->templateArray->getTemplateArray() as $field => $arrTypeField){
  			
  			arrayWs::_echo("<tr>", $optEcho) ;
  			
  			$existField = arrayWs::existFieldInArray($arrWs, $field);
  			$valueWs 	= arrayWs::getValueFromArray($arrWs, $field);
  			
  			
			arrayWs::_echo("<td>" .$field."</td>" , $optEcho) ;	  			
			arrayWs::_echo("<td>" . $valueWs." &nbsp;</td>" , $optEcho) ;		
  			
			$resultValidacion = $v->valida(  $field, $valueWs, $arrTypeField, $existField );  
			if (!$resultValidacion) $totalFalse++;  					
	  		arrayWs::_echo("<td>" . $v->formatResult($resultValidacion)." &nbsp;</td>" , $optEcho) ;	  		
  			arrayWs::_echo("</tr>", $optEcho) ;	  			
  		}
  		arrayWs::_echo("</table>", $optEcho) ;
  		return $totalFalse>0?false:true;
  	}
	function validaArrWS($arrWS, $v) {
		
		$optEcho = $this->optEcho;
		$result   = true;
	
		arrayWs::_echo("<table border=1>", $optEcho) ;
		foreach ($arrWS as $field => $value ) {
						
			arrayWs::_echo("<tr>", $optEcho) ;
			arrayWs::_echo("<td>" .$field."</td>" , $optEcho) ;	
				
			if ( !is_array ($value)) {

				$fields 		= $this->templateArray->getTemplateArray();	
				$arrayLine   	= $this->templateArray->getLineByField($field);	
				
				$resultValidacion =  $v->valida(  $field, $value, $arrayLine, true  );
				arrayWs::_echo("<td>" .$value."</td>" , $optEcho) ;
				arrayWs::_echo("<td>" .$resultValidacion."</td>" , $optEcho) ;	
										
				if (!$resultValidacion ) {
					$result = false;
					$this->resultValidaArrWS = false;
				} 					
			}else{		
				arrayWs::_echo("<td>&nbsp;" , $optEcho) ;		 			
				arrayWs::validaArrWS($value, $v);
				arrayWs::_echo("</td>" , $optEcho) ;
				arrayWs::_echo("<td>&nbsp;</td>" , $optEcho) ;							
			}				
			arrayWs::_echo("</tr>", $optEcho) ;			
		}
		arrayWs::_echo("</table>", $optEcho) ;
		return $this->resultValidaArrWS;	
	}	
	
	public function getValueFromArray($arr, $item){	  
		foreach ($arr as  $field => $value) { 
	                       
	    	if ( trim($field) == trim($item) ) {
	            return $value;
	        }
	        elseif(is_array($value)) {
	            $r = arrayWs::getValueFromArray($value, $item);
	            if($r !== null){
	                return $r;
	            }
	        }           
	    }	  
		return null;
	}

	public function existFieldInArray($arr, $item){	  
		foreach ($arr as  $field => $value) { 
	                       
	    	if ( trim($field) == trim($item) ) {
	            return true;
	        }
	        elseif(is_array($value)) {
	            $r = arrayWs::getValueFromArray($value, $item);
	            if($r !== null){
	                return $r;
	            }
	        }           
	    }	  
		return null;
	}
	
	function _echo($var, $opt) {
		if ($opt == "1" ){
			print_r ( $var );
		} 	
	}
  	public function setOptEcho($v){
  		$this->optEcho = $v;  		
  	}  	
  	function registerReceivedData($arrWs, $s){
  		
  		$io = new io;
  		$io->setService($s);
  		$io->saveDataFileLog($arrWs, "Datos-Recebidos");
  		
  	}
	
}
?>