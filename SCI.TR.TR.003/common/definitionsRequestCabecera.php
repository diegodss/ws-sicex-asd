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

// Cabecera
// Cabecera-v1-0.xsd
	 
	$server->wsdl->addComplexType(
		'CabeceraType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'IdRuce' 			=> array('name' => 'IdRuce' 			, 'type' => SicexStringCuatro),
			'FechaCreacionRuce'	=> array('name' => 'FechaCreacionRuce'	, 'type' => SicexFechaHora),
			'EstadoRuce'		=> array('name' => 'EstadoRuce'			, 'type' => EstadoRuceEnum),
			'FechaEstadoRuce'	=> array('name' => 'FechaEstadoRuce'	, 'type' => SicexFechaHora),
			'CodigoMensaje'		=> array('name' => 'CodigoMensaje' 		, 'type' => SicexStringTres),
			'TransaccionId'		=> array('name' => 'TransaccionId'		, 'type' => SicexStringCuatro),
			'NumeroVersion'		=> array('name' => 'NumeroVersion'		, 'type' => SicexStringCuatro),
			'Destinatario'		=> array('name' => 'Destinatario'		, 'type' => SicexStringCuatro),
			'Remitente'			=> array('name' => 'Remitente'			, 'type' => SicexStringCuatro)
		)
	);	
	

?>
