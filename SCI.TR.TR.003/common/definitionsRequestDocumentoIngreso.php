<?php
	/*
	 *	WS: SCI.TR.TR.003
	 *	Titulo: Documento Ingreso de Parametros de entrada
	 *	Macro Proceso: PRE-INGRESO
	 *	Proceso: Documentos de ingreso	 
	 *	NODO: DocumentoIngreso
	 *	XSD: DocumentoIngreso-v1-0.xsd
	 *	Autor: Alex Reimilla C.
	 *  Fecha: 27/03/2015
	 *	Service: SCI.TR.TR.003
	 */
	 

// DocumentoIngresoType	 
// DocumentoIngreso-v1-0.xsd
 
	$server->wsdl->addComplexType(
		'DocumentoIngresoType',
		'complexType',
		'struct',
		'all',
		'',
		array(
		
			'CodigoPrestacion'=> array('name' => 'CodigoPrestacion', 'type' => SicexStringSeis),
			'NumeroDocumentoIngreso'=> array('name' => 'NumeroDocumentoIngreso', 'type' => SicexStringCinco),
			'FechaResolucion'=> array('name' => 'FechaResolucion', 'type' => SicexFechaHora),
			'IdTramiteSSPP'=> array('name' => 'IdTramiteSSPP', 'type' => SicexStringCinco),
			'EstadoAnulacion'=> array('name' => 'EstadoAnulacion	', 'type' => SicexEnum),
			'ObservacionDocumento'=> array('name' => 'ObservacionDocumento', 'type' => SicexStringNueve),
			'Url'=> array('name' => 'Url', 'type' => SicexStringDiez),
			'NumeroItem'=> array('name' => 'NumeroItem', 'type' => SicexNumericoTres),
			'CodigoEvaluadorDocumentoIngreso'=> array('name' => 'CodigoEvaluadorDocumentoIngreso', 'type' => SicexStringTres),
			'TipoSolicitud'=> array('name' => 'TipoSolicitud', 'type' => SicexStringTres),
			'FechaSolicitud'=> array('name' => 'FechaSolicitud', 'type' => SicexFechaHora),
			'FechaDocumentoIngreso'=> array('name' => 'FechaDocumentoIngreso', 'type' => SicexFechaHora),	
			'IdSolicitud'=> array('name' => 'IdSolicitud', 'type' => SicexStringCuatro),			
			'ServiciosPublicosRelacionados'=> array('name' => 'ServiciosPublicosRelacionados', 'type' => SicexStringCuatro),
			'ValorTramite'=> array('name' => 'ValorTramite', 'type' => SicexNumericoOnce),
			'EstadoSolicitud'=> array('name' => 'EstadoSolicitud', 'type' => SicexEnum),
			'FechaReferencia'=> array('name' => 'FechaReferencia', 'type' => SicexFechaHora),
			'ActaRechazoImportacion'=> array('name' => 'ActaRechazoImportacion', 'type' => SicexStringCinco),
			'ActaInmovilizacionProductos'=> array('name' => 'ActaInmovilizacionProductos', 'type' => SicexStringCinco),
			'RequiereUsoYDisposicion'=> array('name' => 'RequiereUsoYDisposicion', 'type' => SicexBooleano),
			'DocumentoIngresoSSPP'=> array('name' => 'DocumentoIngresoSSPP', 'type' => SicexAdjunto),
			'NumeroIdentificacion'=> array('name' => 'NumeroIdentificacion', 'type' => SicexNumericoCuatro),
			'Mercancia'=> array('name' => 'Mercancia', 'type' => 'tns:MercanciaType'),
					
		)
	);	

// DocumentoIngreso => Mercancia
// Mercancia-v1-0.xsd

	$server->wsdl->addComplexType(
		'MercanciaType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'NumeroTotalDeItems'=> array('name' => 'NumeroTotalDeItems', 'type' => SicexNumericoTres),
			'TotalBultos'=> array('name' => 'TotalBultos', 'type' => SicexNumericoCuatro),
			'TotalPesoBruto'=> array('name' => 'TotalPesoBruto', 'type' => SicexNumericoDiez),
			'IdentificacionDeBultos'=> array('name' => 'IdentificacionDeBultos', 'type' => SicexStringCinco),
			'Item'=> array('name' => 'Item', 'type' => 'tns:ItemType'),
			
		)
	);	

// DocumentoIngreso => Mercancia => Item
// Item-v1-0.xsd

	$server->wsdl->addComplexType(
		'ItemType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'NumeroItem'=> array('name' => 'NumeroItem', 'type' => SicexNumericoTres),
			'CodigoArancel'=> array('name' => 'CodigoArancel', 'type' => SicexStringTres),
			'ServiciosPublicosCompetentes'=> array('name' => 'ServiciosPublicosCompetentes', 'type' => SicexStringDiez),
			'UsoPrevisto'=> array('name' => 'UsoPrevisto', 'type' => SicexStringSeis),
			'CodigoPaisProduccion'=> array('name' => 'CodigoPaisProduccion', 'type' => SicexStringDos),
			'GlosaPaisProduccion'=> array('name' => 'GlosaPaisProduccion', 'type' => SicexStringCuatro),
			'ValorCIF'=> array('name' => 'ValorCIF', 'type' => SicexNumericoDiez),
			'MontoAjuste'=> array('name' => 'MontoAjuste', 'type' => SicexNumericoDiez),
			'SignoDelAjuste'=> array('name' => 'SignoDelAjuste', 'type' => SicexStringUno),
			'Cantidad'=> array('name' => 'Cantidad', 'type' => SicexNumericoDiez),
			'CodigoUnidadDeMedida'=> array('name' => 'CodigoUnidadDeMedida', 'type' => SicexNumericoDos),
			'CantidadDeMercanciasEstimada'=> array('name' => 'CantidadDeMercanciasEstimada', 'type' => SicexBooleano),	
			'PrecioUnitarioFOB'=> array('name' => 'PrecioUnitarioFOB', 'type' => SicexNumericoDiez),
			'CodigoArancelDelTratado'=> array('name' => 'CodigoArancelDelTratado', 'type' => SicexStringTres),
			'NumeroCorrelativoArancel'=> array('name' => 'NumeroCorrelativoArancel', 'type' => SicexNumericoDos),
			'CodigoAcuerdoComercial'=> array('name' => 'CodigoAcuerdoComercial', 'type' => SicexNumericoTres),
			'SujetoACupo'=> array('name' => 'SujetoACupo', 'type' => SicexBooleano),
			'PorcentajeAdvalorem'=> array('name' => 'PorcentajeAdvalorem', 'type' => SicexNumericoNueve),	
			'CodigoCuentaAdvalorem'=> array('name' => 'CodigoCuentaAdvalorem', 'type' => SicexNumericoTres),
			'MontoCuentaAdvalorem'=> array('name' => 'MontoCuentaAdvalorem', 'type' => SicexNumericoDiez),
			'CaracteristicaEspecial'=> array('name' => 'CaracteristicaEspecial', 'type' => SicexStringCuatro),
			'PesoUnitario'=> array('name' => 'PesoUnitario', 'type' => SicexNumericoCuatro),
			'CodigoUnidadDeMedidaPesoUnitario'=> array('name' => 'CodigoUnidadDeMedidaPesoUnitario', 'type' => SicexNumericoDos),
			'OtraDescripcion'=> array('name' => 'OtraDescripcion', 'type' => SicexStringDiez),			
			'ObservacionOIG'=> array('name' => 'ObservacionOIG', 'type' => SicexStringNueve),
			'Lote'=> array('name' => 'Lote', 'type' => SicexStringSeis),
			'NombreProductor'=> array('name' => 'NombreProductor', 'type' => SicexStringNueve),
			'CodigoArancelarioFinal'=> array('name' => 'CodigoArancelarioFinal', 'type' => SicexStringTres),
			'MercadoDestino'=> array('name' => 'MercadoDestino', 'type' => SicexStringCinco),
			'NumeroResolucionSubpesca'=> array('name' => 'NumeroResolucionSubpesca', 'type' => SicexStringCuatro),		
			'PesoNeto'=> array('name' => 'PesoNeto', 'type' => SicexNumericoOnce),
			'PesoBruto'=> array('name' => 'PesoBruto', 'type' => SicexNumericoDiez),
			'DocumentosAdjuntos'=> array('name' => 'DocumentosAdjuntos', 'type' => SicexAdjunto),
			'Direccionproductor'=> array('name' => 'Direccionproductor', 'type' => SicexStringCinco),
			'CuarentenaPostFrontera'=> array('name' => 'CuarentenaPostFrontera', 'type' => SicexStringSeis),
			'NumeroAutorizacionExportacion'=> array('name' => 'NumeroAutorizacionExportacion', 'type' => SicexStringCuatro),
			'NombreProducto'=> array('name' => 'NombreProducto', 'type' => SicexStringNueve),
			'EstadoCondicionProducto'=> array('name' => 'EstadoCondicionProducto', 'type' => SicexEnum),
			'Observaciones'=> array('name' => 'Observaciones', 'type' => SicexStringDiez),
			'EstadoItem'=> array('name' => 'EstadoItem', 'type' => SicexEnum),
			'CodigoPrestacion'=> array('name' => 'CodigoPrestacion', 'type' => SicexStringSeis),
			'Producto'=> array('name' => 'Producto', 'type' => 'tns:ProductoType'),	
			'Destino'=> array('name' => 'Destino', 'type' => 'tns:DestinoType'),	
			
					
		)
	);	

// DocumentoIngreso => Mercancia => item => Producto
// Producto-v1-0.xsd	

	$server->wsdl->addComplexType(
		'ProductoType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'CodigoProducto'=> array('name' => 'CodigoProducto', 'type' => SicexStringCuatro),
			'Atributo'=> array('name' => 'Atributo', 'type' => 'tns:AtributoType')
		)
	);	
	
	
// DocumentoIngreso => Mercancia => item => Producto => Atributo
// Producto-v1-0.xsd	

	$server->wsdl->addComplexType(
		'AtributoType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'SecuenciaAtributo'=> array('name' => 'SecuenciaAtributo', 'type' => SicexNumericoTres),
			'NombreAtributo'=> array('name' => 'NombreAtributo', 'type' => SicexStringSeis),
			'ValorAtributo'=> array('name' => 'ValorAtributo', 'type' => SicexStringNueve),
			'EsFijo'=> array('name' => 'EsFijo', 'type' => SicexStringUno),
			'CodigoUnicoAtributo'=> array('name' => 'CodigoUnicoAtributo', 'type' => SicexStringCuatro)
		)
	);		
	

// DocumentoIngreso => Destino
// Destino-v1-0.xsd		

	$server->wsdl->addComplexType(
		'DestinoType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'CantidadVehiculo'=> array('name' => 'CantidadVehiculo', 'type' => SicexStringSeis),
			'Transporte'=> array('name' => 'Transporte', 'type' => 'tns:TransporteType'),
		)
	);		

// DocumentoIngreso => Destino
// Destino-v1-0.xsd		

	$server->wsdl->addComplexType(
		'DestinoType',
		'complexType',
		'struct',
		'all',
		'',
		array(
			'CantidadVehiculo'=> array('name' => 'CantidadVehiculo', 'type' => SicexStringSeis),
			'Transporte'=> array('name' => 'Transporte', 'type' => 'tns:TransporteType'), //definitionsRequestDeclaracion
			'InstalacionDestino'=> array('name' => 'InstalacionDestino', 'type' => 'tns:InstalacionDestinoType'), //definitionsRequestDeclaracion
		)
	);	
	
?>
