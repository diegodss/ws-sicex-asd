<?php 
require_once '_packageValidation.php';
require_once '../../herramientas/print_r_reverse.php';
	$arrWS 			= print_r_reverse($arryreversa);	
	$validator 		= new validation('SCITRTR003');
	$arrayValidator = new arrayWs($validator);	
	$result 		= $arrayValidator->validaArrWS($arrWS, $validator);
	$file  			= $validator->printLogFile();	

	//echo count($arrWs);
	print_r ( "<br> VALIDACAO ". $validator->formatResult($result) . "<BR>");
	//if (!$reuslt) $v->printLogFile();







?>