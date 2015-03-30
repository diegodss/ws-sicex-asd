<?php 
 	/*
	 *	WS: SCI.TR.TR.003
	 *	Titulo: Declaracion de Parametros de Salida
	 *	Macro Proceso: PRE-INGRESO
	 *	Proceso: Documentos de ingreso	 
	 *	Autor: Alex Reimilla C.
	 *  Fecha: 26/03/2015
	 *	Service: SCI.TR.TR.003
	 */
	$server->wsdl->addComplexType(
		'SCITRTR003Response',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'CodigoMensaje'		=> array('name' => 'CodigoMensaje' 		, 'type' => SicexStringCuatro),
			'TransaccionId'		=> array('name' => 'TransaccionId'		, 'type' => SicexFechaHora),
			'NumeroVersion'		=> array('name' => 'NumeroVersion'		, 'type' => EstadoRuceEnum),
			'Destinatario'		=> array('name' => 'Destinatario'		, 'type' => SicexFechaHora),
			'Remitente'			=> array('name' => 'Remitente' 			, 'type' => SicexStringTres),
			'IdRuce'			=> array('name' => 'IdRuce'				, 'type' => SicexStringCuatro),
			'FechaCreacionRuce'	=> array('name' => 'FechaCreacionRuce'	, 'type' => SicexStringCuatro),
			'EstadoRuce'		=> array('name' => 'EstadoRuce'			, 'type' => SicexStringCuatro),
			'FechaEstadoRuce'	=> array('name' => 'FechaEstadoRuce'	, 'type' => SicexStringCuatro)
		)
	);		
	
	
?>