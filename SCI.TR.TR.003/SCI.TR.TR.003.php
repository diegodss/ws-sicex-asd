<?php
	/*
	 *	WS: SCI.TR.TR.003
	 *	Titulo: Envío solicitud documento de ingreso / Envío datos solicitud rectificación Documento de Ingreso					
	 *	XSD: SCITRTR003Consulta-v1-0
	 *	Autor: Alex Reimilla C.
	 *  Fecha: 26/03/2015
	 *	Service: SOAP endpoint
	 *	Payload: rpc/encoded
	 *	Transport: http
	 *	Authentication: none	 
	 */

	//ini_set( "display_errors", "on" );

	// Incluye la librería NuSOAP
	require_once('../nusoap/lib/nusoap.php');

	// Incluye el archivo de configuración de nuestro servidor web
	require_once('/common/config.php');

	// Incluye el archivo de funciones
	require_once('/common/functions.php');
	
	// Configura el WSDL
	$server = new soap_server();
	$server->debug_flag = SOAP_SERVER_DEBUG_MODE;
	$server->configureWSDL(SOAP_SERVER_NAME, SOAP_SERVER_NAMESPACE);
	$server->wsdl->schemaTargetNamespace = SOAP_SERVER_NAMESPACE;
	$server->soap_defencoding = SOAP_SERVER_ENCODING; 
	
	// Definición de tipos y metodos en nuestro servicio web
	//require_once '/common/definitions.php';
	require_once '/common/definitionsRequest.php';
	require_once '/common/definitionsResponse.php';	


	$server->register(
		'insSolicitudCDA',           		  	 			// Nombre del método
		array('consultaType'=> 'tns:SCITRTR003ConsultaType'),    	 	// Parámetros de entrada
		array('return' => 'tns:SCITRTR003Response'),  // Parámetros de salida
		SOAP_SERVER_NAMESPACE,                	 		// Nombre del workspace
		SOAP_SERVER_NAMESPACE,        	// Acción soap
		'rpc',                                	 		// Estilo
		'encoded',                            	 		// Uso
		'Insertar una solicitud' 		 				// Documentación
	);	

	// Código para invocar el servicio.
	$HTTP_RAW_POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
			
	$server->service($HTTP_RAW_POST_DATA);
?>
