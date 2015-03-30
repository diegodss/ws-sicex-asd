<?php
	/*
	 *	WS: SCI.TR.TR.003
	 *	Titulo: Declaracion de Parametros de entrada
	 *	Macro Proceso: PRE-INGRESO
	 *	Proceso: Documentos de ingreso	 
	 *	NODO: DECLARACION
	 *	XSD: Declaracion-v1-0.xsd
	 *	Autor: Alex Reimilla C.
	 *  Fecha: 26/03/2015
	 *	Service: SCI.TR.TR.003
	 */
	 

// Declaracion	 
// Declaracion-v1-0.xsd
 
	$server->wsdl->addComplexType(
		'DeclaracionType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'NumeroIdentificacion'=> array('name' => 'NumeroIdentificacion', 'type' => SicexStringCuatro),
			'CodigoAduana'=> array('name' => 'CodigoAduana', 'type' => SicexNumericoDos),
			'FechaAceptacion'=> array('name' => 'FechaAceptacion', 'type' => SicexFechaHora),
			'NombreAduana'=> array('name' => 'NombreAduana', 'type' => SicexStringSeis),
			'CampoForm'=> array('name' => 'CampoForm', 'type' => SicexNumericoDos),
			'FechaDeVencimiento'=> array('name' => 'FechaDeVencimiento', 'type' => SicexFechaHora),
			'CodigoTipoOperacion'=> array('name' => 'CodigoTipoOperacion', 'type' => SicexNumericoTres),
			'TipoDeIngreso'=> array('name' => 'TipoDeIngreso', 'type' => SicexStringUno),
			'NumeroEncriptado'=> array('name' => 'NumeroEncriptado', 'type' => SicexStringCuatro),
			'Estado'=> array('name' => 'Estado', 'type' => SicexEnum),
			'UrlDin'=> array('name' => 'UrlDin', 'type' => SicexStringDiez),
			'TipoDestinacion'=> array('name' => 'TipoDestinacion', 'type' => SicexNumericoTres),
			'RegionIngreso'=> array('name' => 'RegionIngreso', 'type' => SicexStringCinco),
			'MercanciaInscritaDescrita'=> array('name' => 'MercanciaInscritaDescrita', 'type' => SicexNumericoTres),
			'HojaAnexaVehiculoType'=> array('name' => 'HojaAnexaVehiculoType', 'type' => 'tns:HojaAnexaVehiculoType'),
			'DespachadorType'=> array('name' => 'DespachadorType', 'type' => 'tns:DespachadorType'),
			'ImportadorType'=> array('name' => 'ImportadorType', 'type' => 'tns:ImportadorType'),
			'ProrrogaType'=> array('name' => 'ProrrogaType', 'type' => 'tns:ProrrogaType'),
			'InspeccionType'=> array('name' => 'InspeccionType', 'type' => 'tns:InspeccionType'),
			'ZonaPrimariaType'=> array('name' => 'ZonaPrimariaType', 'type' => 'tns:ZonaPrimariaType'),
			
		)
	);	
	
// Declaracion => HojaAnexaVehiculoType
// HojaAnexaVehiculo-v1-0.xsd

	$server->wsdl->addComplexType(
		'HojaAnexaVehiculoType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'FechaEnvio'=> array('name' => 'FechaEnvio', 'type' => SicexFechaHora),
			'TipoAccion'=> array('name' => 'TipoAccion', 'type' => SicexStringUno),
			'DocumentoAdjunto'=> array('name' => 'DocumentoAdjunto', 'type' => SicexAdjunto),
			'FechaEstado'=> array('name' => 'FechaEstado', 'type' => SicexFechaHora),
			'Estado'=> array('name' => 'Estado', 'type' => SicexEnum)
			
		)
	);		

// Declaracion => Despachador
// Despachador-v1-0.xsd

	$server->wsdl->addComplexType(
		'DespachadorType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'CodigoDespachador'=> array('name' => 'CodigoDespachador', 'type' => SicexStringDos),
			'RutDespachador'=> array('name' => 'RutDespachador', 'type' => SicexRut),
			'NombreDespachador'=> array('name' => 'NombreDespachador', 'type' => SicexStringNueve),
			'TipoNombre'=> array('name' => 'TipoNombre', 'type' => SicexStringUno),
			'NombreContacto'=> array('name' => 'NombreContacto', 'type' => SicexStringNueve),
			'TipoNombreContacto'=> array('name' => 'TipoNombreContacto', 'type' => SicexStringUno),
			'NumeroTelefonoFijo'=> array('name' => 'NumeroTelefonoFijo', 'type' => SicexTelefono),
			'NumeroTelefonoMovil'=> array('name' => 'NumeroTelefonoMovil', 'type' => SicexTelefono),
			'EmailContacto'=> array('name' => 'EmailContacto', 'type' => SicexStringSeis),
			'DireccionDespachador'=> array('name' => 'DireccionDespachador', 'type' => SicexStringSeis),
			'ComunaDespachador'=> array('name' => 'ComunaDespachador', 'type' => SicexStringSeis),
			'RegionDespachador'=> array('name' => 'RegionDespachador', 'type' => SicexStringSeis),
			'ClaveAccesoStlDespachador'=> array('name' => 'ClaveAccesoStlDespachador', 'type' => SicexStringSeis),
			'EmailDespachador'=> array('name' => 'EmailDespachador', 'type' => SicexCorreoElectronico)
			
		)
	);

// Declaracion => Importador	
// Importador-v1-0.xsd

	$server->wsdl->addComplexType(
		'ImportadorType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'RutImportador'=> array('name' => 'RutImportador', 'type' => SicexRut),
			'NombreImportador'=> array('name' => 'NombreImportador', 'type' => SicexStringNueve),
			'TipoNombre'=> array('name' => 'TipoNombre', 'type' => SicexStringUno),
			'DireccionImportador'=> array('name' => 'DireccionImportador', 'type' => SicexStringCinco),
			'ComunaImportador'=> array('name' => 'ComunaImportador', 'type' => SicexNumericoTres),
			'TipoDocumentoIdentificacion'=> array('name' => 'TipoDocumentoIdentificacion', 'type' => SicexNumericoDos),
			'RegionImportador'=> array('name' => 'RegionImportador', 'type' => SicexStringCinco),
			'NumeroTelefono'=> array('name' => 'NumeroTelefono', 'type' => SicexStringCinco),
			'Email'=> array('name' => 'Email', 'type' => SicexStringSeis),
			'ClaveAccesoStlImportador'=> array('name' => 'ClaveAccesoStlImportador', 'type' => SicexStringSeis),
			'RepresentanteLegal'=> array('name' => 'RepresentanteLegal', 'type' => 'tns:RepresentanteLegalType')
			
		)
	);		

// Declaracion => Importador => RepresentanteLegalType
// RepresentanteLegal-v1-0.xsd

	$server->wsdl->addComplexType(
		'RepresentanteLegalType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'NombreRepresentanteLegal'=> array('name' => 'NombreRepresentanteLegal', 'type' => SicexStringNueve),
			'TipoNombre'=> array('name' => 'TipoNombre', 'type' => SicexStringUno),
			'RutRepresentanteLegal'=> array('name' => 'RutRepresentanteLegal', 'type' => SicexRut),
			'DireccionRepresentanteLegal'=> array('name' => 'DireccionRepresentanteLegal', 'type' => SicexStringCinco),
			'ComunaRepresentanteLegal'=> array('name' => 'ComunaRepresentanteLegal', 'type' => SicexNumericoTres),
			'RegionRepresentanteLegal'=> array('name' => 'RegionRepresentanteLegal', 'type' => SicexStringCinco)
		
		)
	);

// Declaracion => Prorroga
// Prorroga-v1-0.xsd

	$server->wsdl->addComplexType(
		'ProrrogaType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'NumeroProrroga'=> array('name' => 'NumeroProrroga', 'type' => SicexNumericoCuatro),
			'NumeroResolucion'=> array('name' => 'NumeroResolucion', 'type' => SicexNumericoCuatro),
			'FechaResolucion'=> array('name' => 'FechaResolucion', 'type' => SicexFechaHora),
			'DiasSolicitados'=> array('name' => 'DiasSolicitados', 'type' => SicexNumericoTres),
			'DiasAutorizados'=> array('name' => 'DiasAutorizados', 'type' => SicexNumericoTres),
			'Causal'=> array('name' => 'Causal', 'type' => SicexNumericoDos),
			'EstadoSolicitud'=> array('name' => 'EstadoSolicitud', 'type' => SicexEnum),
			'FechaSolicitud'=> array('name' => 'FechaSolicitud', 'type' => SicexFechaHora),
			'IdSolicitud'=> array('name' => 'IdSolicitud', 'type' => SicexStringCinco),
			'MotivoRechazo'=> array('name' => 'MotivoRechazo', 'type' => SicexStringNueve),
			'TipoDocumento'=> array('name' => 'TipoDocumento', 'type' => SicexNumericoUno),
			'DocumentoAdjunto'=> array('name' => 'DocumentoAdjunto', 'type' => SicexAdjunto),
			'AduanaOtorgamiento'=> array('name' => 'AduanaOtorgamiento', 'type' => SicexNumericoDos),
			'Observaciones'=> array('name' => 'Observaciones', 'type' => SicexStringNueve)
		
		)
	);
	
// Declaracion => Inspeccion	
// Inspeccion-v1-0.xsd

	$server->wsdl->addComplexType(
		'InspeccionType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'TipoDeInspeccion'=> array('name' => 'TipoDeInspeccion', 'type' => SicexStringDos),
			'ResultadoInspeccion'=> array('name' => 'ResultadoInspeccion', 'type' => SicexStringTres),
			'FechaResultadoInspeccion'=> array('name' => 'FechaResultadoInspeccion', 'type' => SicexFechaHora),
			'EstadoInspeccion'=> array('name' => 'EstadoInspeccion', 'type' => SicexEnum),
			'FechaMovimiento'=> array('name' => 'FechaMovimiento', 'type' => SicexFechaHora),
			'CodigoNuevoAforo'=> array('name' => 'CodigoNuevoAforo', 'type' => SicexStringDos),
			'NumeroMic'=> array('name' => 'NumeroMic', 'type' => SicexStringCuatro),
			'FechaMic'=> array('name' => 'FechaMic', 'type' => SicexFechaHora),
			'ObservacionInspeccion'=> array('name' => 'ObservacionInspeccion', 'type' => SicexStringSeis),
			'TipoDeRetencion'=> array('name' => 'TipoDeRetencion', 'type' => SicexStringUno),
			'Retencion'=> array('name' => 'Retencion', 'type' => SicexStringUno),
			'FechaInspeccion'=> array('name' => 'FechaInspeccion', 'type' => SicexFechaHora),
			'DetalleInspeccion'=> array('name' => 'DetalleInspeccion', 'type' => SicexStringDiez),
			'TipoDeInspeccionOIG'=> array('name' => 'TipoDeInspeccionOIG', 'type' => SicexStringCuatro),
			'InstalacionDestino'=> array('name' => 'InstalacionDestino', 'type' => 'tns:InstalacionDestinoType'),
			
		)
	);
	
// Declaracion => Inspeccion => InstalacionDestino
// InstalacionDestino-v1-0.xsd

	$server->wsdl->addComplexType(
		'InstalacionDestinoType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'NumeroDocumentoComercial'=> array('name' => 'NumeroDocumentoComercial', 'type' => SicexStringSeis),
			'NombreInstalacionDestino'=> array('name' => 'NombreInstalacionDestino', 'type' => SicexStringSeis),
			'RegionInstalacionDestino'=> array('name' => 'RegionInstalacionDestino', 'type' => SicexStringCinco),
			'ComunaInstalacionDestino'=> array('name' => 'ComunaInstalacionDestino', 'type' => SicexNumericoTres),
			'NumeroResolucionAutorizacion'=> array('name' => 'NumeroResolucionAutorizacion', 'type' => SicexStringCinco),
			'FechaEmisionResolucion'=> array('name' => 'FechaEmisionResolucion', 'type' => SicexFechaHora),
			'EntidadEmisora'=> array('name' => 'EntidadEmisora', 'type' => SicexStringSeis),
			'DireccionInstalacionDestino'=> array('name' => 'DireccionInstalacionDestino', 'type' => SicexStringCinco),
			'OficinaSSPP'=> array('name' => 'OficinaSSPP', 'type' => SicexStringCinco),
			'NombreDirectorTecnico'=> array('name' => 'NombreDirectorTecnico', 'type' => SicexStringNueve),
			'TipoNombre'=> array('name' => 'TipoNombre', 'type' => SicexStringUno),
			'CodigoInstalacionDestino'=> array('name' => 'CodigoInstalacionDestino', 'type' => SicexStringCinco),
			'TelefonoInstalacionDestino'=> array('name' => 'TelefonoInstalacionDestino', 'type' => SicexTelefono),
			'ContactoInstalacionDestino'=> array('name' => 'ContactoInstalacionDestino', 'type' => SicexStringCuatro),
			'TipoInstalacion'=> array('name' => 'TipoInstalacion', 'type' => SicexStringCinco),
			'NombreFantasia'=> array('name' => 'NombreFantasia', 'type' => SicexStringSeis),
			'DocumentoResolucion'=> array('name' => 'DocumentoResolucion', 'type' => SicexAdjunto),
			'OigPropietario'=> array('name' => 'OigPropietario', 'type' => SicexStringCuatro),
		
		)
	);	

// Declaracion => ZonaPrimaria 
// ZonaPrimaria-v1-0.xsd

	$server->wsdl->addComplexType(
		'ZonaPrimariaType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'FechaSalidaZonaPrimaria'=> array('name' => 'FechaSalidaZonaPrimaria', 'type' => SicexFechaHora),
			'EstadoSalidaZonaPrimaria'=> array('name' => 'EstadoSalidaZonaPrimaria', 'type' => SicexEnum),
			'TipoDocumento'=> array('name' => 'TipoDocumento', 'type' => SicexStringCuatro),
			'NumeroDocumento'=> array('name' => 'NumeroDocumento', 'type' => SicexStringCuatro),
			'FechaDocumento'=> array('name' => 'FechaDocumento', 'type' => SicexFechaHora),
			'Transporte'=> array('name' => 'Transporte', 'type' => 'tns:TransporteType'),
	
		)
	);

// Declaracion => ZonaPrimaria => Transporte 
// Transporte-v1-0.xsd

	$server->wsdl->addComplexType(
		'TransporteType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'PesoBruto'=> array('name' => 'PesoBruto', 'type' => SicexNumericoDiez),
			'CantidadMercancia'=> array('name' => 'CantidadMercancia', 'type' => SicexNumericoDiez),
			'MatriculaRemolque'=> array('name' => 'MatriculaRemolque', 'type' => SicexStringCuatro),
			'Patente'=> array('name' => 'Patente', 'type' => SicexStringCinco),
			'PaisVehiculo'=> array('name' => 'PaisVehiculo', 'type' => SicexStringCuatro),
			'TaraCamion'=> array('name' => 'TaraCamion', 'type' => SicexStringCuatro),
			'TaraRemolque'=> array('name' => 'TaraRemolque', 'type' => SicexStringCuatro),
			'FechaArribo'=> array('name' => 'FechaArribo', 'type' => SicexFechaHora),
			'ViaDeTransporte'=> array('name' => 'ViaDeTransporte', 'type' => SicexNumericoDos),
			'GlosaPuertoDeEmbarque'=> array('name' => 'GlosaPuertoDeEmbarque', 'type' => SicexStringCuatro),
			'CodigoPuertoDeEmbarque'=> array('name' => 'CodigoPuertoDeEmbarque', 'type' => SicexStringTres),
			'CodigoDeTransbordo'=> array('name' => 'CodigoDeTransbordo', 'type' => SicexStringUno),
			'GlosaPuertoDeDesembarque'=> array('name' => 'GlosaPuertoDeDesembarque', 'type' => SicexStringCuatro),
			'CodigoPuertoDeDesembarque'=> array('name' => 'CodigoPuertoDeDesembarque', 'type' => SicexStringTres),
			'TipoDeCarga'=> array('name' => 'TipoDeCarga', 'type' => SicexStringUno),
			'NombreCompaniaTransporte'=> array('name' => 'NombreCompaniaTransporte', 'type' => SicexStringCuatro),
			'CodigoPaisCompaniaTransportadora'=> array('name' => 'CodigoPaisCompaniaTransportadora', 'type' => SicexStringDos),
			'RutCompaniaTransportadora'=> array('name' => 'RutCompaniaTransportadora', 'type' => SicexRut),
			'NumeroDocumentoTransporte'=> array('name' => 'NumeroDocumentoTransporte', 'type' => SicexStringCuatro),
			'FechaDocumentoTransporte'=> array('name' => 'FechaDocumentoTransporte', 'type' => SicexFechaHora),
			'FechaEmbarque'=> array('name' => 'FechaEmbarque', 'type' => SicexFechaHora),
			'FechaDesembarque'=> array('name' => 'FechaDesembarque', 'type' => SicexFechaHora),
			'NombreNave'=> array('name' => 'NombreNave', 'type' => SicexStringCuatro),
			'Ruta'=> array('name' => 'Ruta', 'type' => SicexStringNueve),
			'TipoMedioTransporte'=> array('name' => 'TipoMedioTransporte', 'type' => SicexStringCuatro),
			'FechaEstimadaLlegada'=> array('name' => 'FechaEstimadaLlegada', 'type' => SicexFechaHora),
			'NombreTransportista'=> array('name' => 'NombreTransportista', 'type' => SicexStringNueve),
			'TipoNombre'=> array('name' => 'TipoNombre', 'type' => SicexStringUno),
			'CodigoPaisProcedencia'=> array('name' => 'CodigoPaisProcedencia', 'type' => SicexStringDos),
			'RutTransportista'=> array('name' => 'RutTransportista', 'type' => SicexRut),
			'GlosaPaisProcedencia'=> array('name' => 'GlosaPaisProcedencia', 'type' => SicexStringCuatro),
			'OrigenDistintoMenorCincuenta'=> array('name' => 'OrigenDistintoMenorCincuenta', 'type' => SicexBooleano),
			'PaisDistintoMenorCincuenta'=> array('name' => 'PaisDistintoMenorCincuenta', 'type' => SicexBooleano),	
			'Transbordo'=> array('name' => 'Transbordo', 'type' => 'tns:TransbordoType'),
			'Manifiesto'=> array('name' => 'Manifiesto', 'type' => 'tns:ManifiestoType'),
			'Emisor'=> array('name' => 'Emisor', 'type' => 'tns:EmisorType'),
			
		
		)
	);
	
// Declaracion => ZonaPrimaria  => Transporte => Transbordo
// Transbordo-v1-0.xsd

	$server->wsdl->addComplexType(
		'TransbordoType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'SecuencialTransbordo'=> array('name' => 'SecuencialTransbordo', 'type' => SicexNumericoDos),
			'CodigoPuertoTransbordo'=> array('name' => 'CodigoPuertoTransbordo', 'type' => SicexStringTres),
			'GlosaPuertoTransbordo'=> array('name' => 'GlosaPuertoTransbordo', 'type' => SicexStringCuatro),
	
		)
	);	
	
// Declaracion => ZonaPrimaria  => Transporte => Manifiesto
// Manifiesto-v1-0.xsd

	$server->wsdl->addComplexType(
		'ManifiestoType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'SecuencialManifiesto'=> array('name' => 'SecuencialManifiesto', 'type' => SicexNumericoUno),
			'NumeroManifiesto'=> array('name' => 'NumeroManifiesto', 'type' => SicexStringCuatro),
			'FechaManifiesto'=> array('name' => 'FechaManifiesto', 'type' => SicexFechaHora),
		)
	);	
	
// Declaracion => ZonaPrimaria  => Transporte => Emisor
// Emisor-v1-0.xsd

	$server->wsdl->addComplexType(
		'EmisorType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'NombreEmisor'=> array('name' => 'NombreEmisor', 'type' => SicexStringNueve),
			'TipoNombre'=> array('name' => 'TipoNombre', 'type' => SicexStringUno),
			'RutEmisor'=> array('name' => 'RutEmisor', 'type' => SicexRut),
		)
	);		
		
?>
