<?php
	/*
	 *	WS: SCI.TR.TR.003
	 *	Titulo: Documento Ingreso de Parametros de entrada
	 *	Macro Proceso: PRE-INGRESO
	 *	Proceso: Documentos de ingreso	 
	 *	NODO: IdentificacionUsuario
	 *	XSD: IdentificacionUsuario-v1-0.xsd
	 *	Autor: Alex Reimilla C.
	 *  Fecha: 27/03/2015
	 *	Service: SCI.TR.TR.003
	 */
	 

// IdentificacionUsuarioType	 
// IdentificacionUsuario-v1-0.xsd
 
	$server->wsdl->addComplexType(
		'IdentificacionUsuarioType',
		'complexType',
		'struct',
		'all',
		'',
		array(
		
			'DatosOrganizacion'=> array('name' => 'DatosOrganizacion', 'type' => 'tns:DatosOrganizacionType'),
			'DatosUsuario'=> array('name' => 'DatosUsuario', 'type' => 'tns:DatosUsuarioType'),

		)
	);	

// IdentificacionUsuarioType => DatosOrganizacion 
// DatosOrganizacion-v1-0.xsd
	
	$server->wsdl->addComplexType(
		'DatosOrganizacionType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'RutOrganizacion'=> array('name' => 'RutOrganizacion', 'type' => SicexRut),
			'NombreOrganizacion'=> array('name' => 'NombreOrganizacion', 'type' => SicexStringNueve),
			'DomicilioOrganizacion'=> array('name' => 'DomicilioOrganizacion', 'type' => SicexStringDiez),
			'GiroComercialOrganizacion'=> array('name' => 'GiroComercialOrganizacion', 'type' => SicexStringNueve),
			'DatosSuborganizacion'=> array('name' => 'DatosSuborganizacion', 'type' => 'tns:DatosSuborganizacionType'),
		)
	);	
		
// IdentificacionUsuarioType => DatosOrganizacion  => DatosSuborganizacion
// DatosSuborganizacion-v1-0.xsd
		
	$server->wsdl->addComplexType(
		'DatosSuborganizacionType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'RutSubOrganizacion'=> array('name' => 'RutSubOrganizacion', 'type' => SicexRut),
			'NombreSubOrganizacion'=> array('name' => 'NombreSubOrganizacion', 'type' => SicexStringNueve),
			'DomicilioSubOrganizacion'=> array('name' => 'DomicilioSubOrganizacion', 'type' => SicexStringDiez),
			'GiroComercialSubOrganizacion'=> array('name' => 'GiroComercialSubOrganizacion', 'type' => SicexStringNueve)
		)
	);	
	
// IdentificacionUsuarioType => DatosUsuarioType
// DatosUsuario-v1-0.xsd
		
	$server->wsdl->addComplexType(
		'DatosUsuarioType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'DatosUsuarioType'=> array('name' => 'DatosUsuarioType', 'type' => SicexRut),
			'Perfil'=> array('name' => 'Perfil', 'type' => SicexStringCuatro),
			'NombreUsuario'=> array('name' => 'NombreUsuario', 'type' => SicexStringCuatro),

		)
	);		
	
	
	
		
?>
