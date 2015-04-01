<?php 
error_reporting(E_ALL & ~E_NOTICE);

require_once '_packageValidation.php';
require_once '../../herramientas/print_r_reverse.php';
		
	$validator 		= new validation('SCITRTR003');
	$arrayValidator = new arrayWs($validator);	
	
	$arrayValidator->optEcho = "1";
	
	$arrWS 		= print_r_reverse($arryreversa);	
	
	if($_GET["p"] == "excel") {
		$result 		= $arrayValidator->validaTemplateArray($arrWS, $validator);
		//$result 		= $arrayValidator->validaArrWS($arrWS, $validator);
	} elseif (($_GET["p"] == "xml") ) {
		$xmlTemplate = new xmlTemplate("EjemploWS003.xml");
		$arrWS = $xmlTemplate->getData();
		$result 		= $arrayValidator->validaArrWS($arrWS, $validator);
	} else {
		$result 		= $arrayValidator->validaArrWS($arrWS, $validator);
	}
	echo($validator->printLogFile());	

	//echo count($arrWs);
	print_r ( "<br> VALIDACAO ". $validator->formatResult($result) . "<BR>");
	//if (!$reuslt) $v->printLogFile();


// leitor de schemas





?>