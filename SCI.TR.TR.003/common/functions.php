<?php
	 	/*
	 *	WS: SCI.TR.TR.003
	 *	Titulo: Declaracion de Parametros de entrada
	 *	Macro Proceso: PRE-INGRESO
	 *	Proceso: Documentos de ingreso	 
	 *	NODO: CABECERA
	 *	XSD: Cabecera-v1-0.xsd
	 *	Autor: Alex Reimilla C.
	 *  Fecha: 26/03/2015
	 *	Service: SCI.TR.TR.003
	 */



function insSolicitudCDA($arrWS)
{
	//print_r($arrWS);
	require_once '../validacion/_packageValidation.php';

	// Crear un objeto con la con las funciones de validaciones requiridas
	$validator 		= new validation('SCITRTR003');
	// Crea un objeto de recibir los datos de la declaración. Para hacer frente a un retorno de carro, una validación adecuada se implementa
	$arrayValidator = new arrayWs($validator);
	// Devuelve verdadero o falso. Si sólo hay un campo devuelve falso, todo regreso será entonces falsa.
	$result 		= $arrayValidator->validaArrWS($arrWS, $validator);
	
	// El objeto transaction tiene que validar todos los estados de errores.
	$transaction = new transaction;	
	$transaction->validaParametrosEntrada($result);
	
	$returnCod = $transaction->codigoMensaje;
	$returnMsg = $transaction->glosaMensaje;
	
	$retorno = array();
	
	if (!$result) { 
		$retorno['CodigoMensaje'] 		= $returnCod;
		$retorno['TransaccionId'] 		= $arrWS["Cabecera"]["TransaccionId"];
		$retorno['NumeroVersion'] 		= '';
		$retorno['Destinatario'] 		= '';
		$retorno['Remitente'] 			= '';
		$retorno['IdRuce'] 				= '';
		$retorno['FechaCreacionRuce'] 	= '';
		$retorno['EstadoRuce'] 			= '';
		$retorno['FechaEstadoRuce'] 	= '';	
		// insertas 
	} else {		
		$retorno['CodigoMensaje'] = $returnCod;
		$retorno['GlosaMensaje']  = $returnMsg;
	}

	// Destroy objetos de la memoria 
	unset($validator);
	unset($arrayValidator);
	unset($transaction);
	
	return $retorno;
}		



?>
