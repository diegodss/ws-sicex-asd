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
	function valida ($vField,$vData, $arrayLine, $existField){
		
	global $maxlenght;
	
	$result = false ;
	
		If ( validation::validaArray( $arrayLine, $vField ) ) {
			
			// prepara dados
			$maxlenght 	= $arrayLine[0];
			$type 		= validation::formatType( $arrayLine[1]) ;
			$sicexType 	= $arrayLine[2];
			$mandatorio = $arrayLine[3];
						
			If ( validation::validaMandatorio( $vField, $vData,  $mandatorio, $existField) ) {
				
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
							$vData = validation::formatDate($vData);				
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
				 } else{
				 	// vData esta vazio, y no es obligatorio, por eso retorna true para seguir con loop
				 	// Se quisermos gravar um logo de datos vazio, aqui e o lugar. 
				 	io::save_log(validation::validaMensage("noexistnomandatorio") . $vField );
		
				 	$result = true;
				 }// validaNull
			} // validaMandatorio				
		} // validaArray
		//return validation::result($result);
		return ($result);  
	} // valida		

	// === New Function ===
	function validaLength($f, $d) {
		global $maxlenght;
		$d = trim($d);
		$msgError = validation::validaMensage("length");
		$result = true;
		if ($maxlenght != "0") { 
			if ( (int)strlen($d ) > (int)$maxlenght ) {
				$result = false;
				io::save_log($msgError . $f . "=>". $d );
			}	
		}
		return $result;
	}	
	
	// === New Function ===
	function validaNull($d) {		
		$msgError = validation::validaMensage("null");
		if ( trim($d) == "" ) { // se vazio, e nao mandatorio, return true e sai das validacoes 
			return false; // sim, esta vazio, false para parar o script
		} else {
			return true; // nao esta vazio, segue as validacoes		
		}  
	}	
	
	// === New Function ===
	function validaArray($d, $ar) {
		$msgError = validation::validaMensage("array");
		if (is_array( $d)) {	
			$result = true;
		} else {	 
			$result = false;	
			io::save_log( $msgError .$ar);
		}
		return $result; 		
	}
	
	// === New Function ===
	function validaMandatorio( $f, $d, $p, $existField ) {
		
		$result = true;

	if ($f == "RazonReingreso" ) {
		echo $f . "[".$p. "] =>" . $existField;
	}
	
		if ( $p == 1 ){
			if ( $existField ) {				
				if ( !validation::validaNull($d) ){
					$msgError = validation::validaMensage("mandatorio");
					$result = false;		
					io::save_log( $msgError . $f . "=>". $d );
				}else{
					$result = true;
				}
			}else{
				io::save_log($msgError = validation::validaMensage("noexist") . $f  );		
				$result = false;
			}			
		}
		return $result; 		
	}
	
	// === New Function ===
	function validaBoolean($f, $d) {
		 $d = (bool)$d;
		$msgError = validation::validaMensage("boolean");
		if ( $d == "true" or $d == "1" ) {
			$result = true;	
		} else {
			$result = false;
			io::save_log( $msgError. $f . "=>". $d);
		}
		return $result; 		
	}
	
	// === New Function ===
	function validaDate($f, $d, $format = 'Y-m-d H:i:s') {

		$result  = false;
		//$d = date($format,strtotime($d));
		$msgError = validation::validaMensage("date");		
	    $date = DateTime::createFromFormat($format, $d);
	    $result = $date && $date->format($format) == $d;	    
	    if (!$result)   {			
			io::save_log( $msgError. $f . "=>". $d );
	    }
		return $result; 	
	}
	
	// === New Function ===
	function validaEmail($f, $d) {
		$msgError = validation::validaMensage("email");
		$regExp = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
		if(!preg_match($regExp , $d)){
		 	$result = true; 
		}else{
			$result = false;
			io::save_log( $msgError . $f . "=>". $d );		
		}
		return $result; 		
	}
	// === New Function ===
	function validaString($f, $d) {	
		$msgError = validation::validaMensage("string");
		$result = validation::validaLength($f, $d);
		if (!$result) {
			io::save_log( $msgError . $f . "=>". $d );
		}
		return $result; 		
	}
	
	// === New Function ===
	function validaNumeric($f, $d) {
		$d = (int)$d;
		$msgError = validation::validaMensage("numeric");
		if ( !is_numeric ($d) ) {
			$result = false;
			io::save_log( $msgError . $f . "=>". $d );
		} else {
			$result = true;
		}
		return $result; 		
	}
	// === New Function ===
	function validaRut($rut) {
		$msgError = validation::validaMensage("rut");
		$result = true;
	    $rut=str_replace('.', '', $rut);
	    /*
	    if (preg_match('/^(\d{1,9})-((\d|k|K){1})$/',$rut,$d_rut)) {	    	
	        $s=1;$r=$d_rut[1];
	        for($m=0;$r!=0;$r/=10)$s=($s+$r%10*(9-$m++%6))%11;	       	       
	        $result = chr($s?$s+47:75)==strtoupper($d_rut[2]);
	    }	 
	    if (!$result){
        	io::save_log( $msgError . $rut  );	
        }	
        */
	    return $result; 		
	}
	function validaMensage($msg) {
		switch ($msg) {
			case "length":
				$msgDescription = "El tamaño es más grande que el permitido: ";
			break;
			case "null":
				$msgDescription = "No hay datos: ";
			case "noexistnomandatorio":
				$msgDescription = "Campo no encontrado en la collection de retorno (no obligatorio): ";
				break;
			case "noexist":
				$msgDescription = "Campo no encontrado en la collection de retorno: ";
				break;
			case "array":
				$msgDescription = "No hay coleccion de datos para validacion: ";
			break;
			case "mandatorio":
				$msgDescription = "El dato es obligatorio: ";
			break;
			case "boolean":
				$msgDescription = "El dato tiene que ser verdadero o falso: ";
			break;
			case "date":
				$msgDescription = "La fecha esta incorrecta: ";
			break;
			case "email":
				$msgDescription = "El e-mail esta incorrecto: ";
			break;
			case "string":
				$msgDescription = "Datos tienen que ser del tipo String: ";
			break;
			case "numeric":
				$msgDescription = "Datos tienen que ser numericos: ";
			break;
			case "rut":
				$msgDescription = "El RUT es invalido: ";
			break;
			default:
				$msgDescription = "General error: ";
			break; 				
		}
		return $msgDescription;
	}
	
		
	
	// === New Function ===
	function formatType( $t ){		
		$type 		= str_replace( 'xsd:' , '' ,$t) ;
		$type 		= str_replace( 'aem:' , '' , $type) ;
		return $type; 	
	}	
	// === New Function ===
    function formatDate($d){
    	$d = str_replace("T", " ", $d);
		$d = str_replace("Z", "", $d);
		$d = trim($d);
		return $d;
    }	
	// === New Function ===
	function formatResult($r) {
		return $r?"si":"<font color='#ff0000'>no</font>";
		
	}
} // class
?>