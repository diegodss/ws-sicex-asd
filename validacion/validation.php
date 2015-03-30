<?php 
/**
* Para cada linea que se encuentra en una matriz de retorno WS, se realizarán las validaciones de abajo
* Requiere como entrada en servicio que esta sendo validado
*
* @package    validacion
* @author     Diego Sanches
* @version    1.0 de 29/03/2015
* 
*/
class validation extends io {

	public $service; 		
	public function __construct($param) {		 	
		$this->service = $param;
	}
	function valida ($vField,$vData, $templateArray){
		
	global $maxlenght;
	
	$result 		= false;
	$fields 		= $templateArray->getTemplateArray();	
	$arrayLine   	= $templateArray->getLineByField($vField);	
	
		If ( validation::validaArray( $arrayLine, $vField ) ) {
			
			// prepara dados
			$maxlenght 	= $arrayLine[0];
			$type 		= validation::formatType( $arrayLine[1]) ;
			$sicexType 	= $arrayLine[2];
			$mandatorio = $arrayLine[3];
			
			If ( validation::validaMandatorio( $vField, $vData,  $mandatorio) ) {
				
				if ( validation::validaNull($vData) ) {
					
					switch ($type) {
						case "string":											
							$result = validation::validaString( $vField, $vData);
							break;			
						case "integer":
							$result = validation::validaNumeric($vField, $vData);
							break;
						case "decimal":
							$result = validation::validaNumeric($vField, $vData);
							break;			
						case "boolean":
							$result = validation::validaBoolean($vField, $vData);
							break;			
						case "fechaType":						
							$result = validation::validaDate($vField, $vData);
							break;			
						case "DireccionEmailType":
							$result = validation::validaEmail($vField, $vData);
							break;			
						case "runType":						
							$result = validation::validaRut($vData) ? true : false ;
							break;	
						default:
							// types desconocidos son tratados como string
							$result = validation::validaString( $vField, $vData);
							break;
											
						} // switch					
				} // validaNull
			} // validaMandatorio				
		} // validaArray
		//return validation::result($result);
		return ($result);  
		} // valida		

	// === New Function ===
	function validaLength($f, $d) {
		global $maxlenght;
		$result = true;
		if ($maxlenght != "0") { 
			if ( strlen($d ) > (int)$maxlenght ) {
				$result = false;
				io::save_log("length error: " . $f . "=>". $d );
			}	
		}
		return $result;
	}	
	
	// === New Function ===
	function validaNull($d) {
		if ( trim($d) == "" ) { // se vazio, e nao mandatorio, return true e sai das validacoes 
			return false; // sim, esta vazio, false para parar o script
		} else {
			return true; // nao esta vazio, segue as validacoes		
		}  
	}	
	
	// === New Function ===
	function validaArray($d, $ar) {
		if (is_array( $d)) {	
			$result = true;
		} else {	 
			$result = false;	
			io::save_log( "validaArray error: Campo nao encontrado: " .$ar);
		}
		return $result; 		
	}
	
	// === New Function ===
	function validaMandatorio( $f, $d, $p ) {
		$result = true;
		if ($p == 1 && !validation::validaNull($d) ){
			$result = false;		
			io::save_log( "Mandatorio error : " . $f . "=>". $d );
		}
		return $result; 		
	}
	
	// === New Function ===
	function validaBoolean($f, $d) {
		if ( $d == "true" or $d == "1" ) {
			$result = true;	
		} else {
			$result = false;
			io::save_log( "Boolean error : ". $f . "=>". $d);
		}
		return $result; 		
	}
	
	// === New Function ===
	function validaDate($f, $d, $format = 'Y-m-d H:i:s') {	
	    $date = DateTime::createFromFormat($format, $d);
	    $result = $date && $date->format($format) == $d;
	    if (!$result)   {			
			io::save_log( "Date error : ". $f . "=>". $d );
	    }
		return $result; 
	}
	
	// === New Function ===
	function validaEmail($f, $d) {
		$regExp = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
		if(!preg_match($regExp , $d)){
		 	$result = true; 
		}else{
			$result = false;
			io::save_log( "Email error : " . $f . "=>". $d );		
		}
		return $result; 		
	}
	// === New Function ===
	function validaString($f, $d) {	
		$result = validation::validaLength($f, $d);
		if (!$result) {
			io::save_log( "Mandatorio error : " . $f . "=>". $d );
		}
		return $result; 		
	}
	
	// === New Function ===
	function validaNumeric($f, $d) {
		if ( !is_numeric ($d) ) {
			$result = false;
			io::save_log( "Mandatorio error : " . $f . "=>". $d );
		} else {
			$result = true;
		}
		return $result; 		
	}
	// === New Function ===
	function validaRut($rut) {
	    $rut=str_replace('.', '', $rut);
	    if (preg_match('/^(\d{1,9})-((\d|k|K){1})$/',$rut,$d)) {
	        $s=1;$r=$d[1];
	        for($m=0;$r!=0;$r/=10)$s=($s+$r%10*(9-$m++%6))%11;
	        return chr($s?$s+47:75)==strtoupper($d[2]);
	    }		
	}
	
	// === New Function ===
	function formatType( $t ){		
		$type 		= str_replace( 'xsd:' , '' ,$t) ;
		$type 		= str_replace( 'aem:' , '' , $type) ;
		return $type; 	
	}	
	
	// === New Function ===
	function formatResult($r) {
		return $r?"si":"<font color='#ff0000'>no</font>";
		
	}
} // class
?>