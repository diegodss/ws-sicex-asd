<?php
	/*
	 *	WS: SCI.TR.TR.003
	 *	Titulo: Declaracion de Parametros de entrada
	 *	Proceso: Documentos de ingreso	 
	 *	Autor: Alex Reimilla C.
	 *  Fecha: 26/03/2015
	 *	Service: SCI.TR.TR.003
	 */


require_once '/common/definitionsRequestCabecera.php';
require_once '/common/definitionsRequestDocumentoIngreso.php';
require_once '/common/definitionsRequestIdentificacionUsuario.php';
require_once '/common/definitionsRequestDeclaracion.php';


$server->wsdl->addComplexType(
	'SCITRTR003ConsultaType',
	'complexType',
	'struct',
	'all',
	'',
	array(
		'Cabecera'=> array('name' => 'Cabecera', 'type' => 'tns:CabeceraType'),
		'DocumentoIngreso'=> array('name' => 'DocumentoIngreso', 'type' => 'tns:DocumentoIngresoType'),
		'IdentificacionUsuario'=> array('name' => 'IdentificacionUsuario', 'type' => 'tns:IdentificacionUsuarioType'),
		'Declaracion'=> array('name' => 'Declaracion', 'type' => 'tns:DeclaracionType'),
	)
);	


?>
