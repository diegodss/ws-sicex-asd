<?php 
$fields = array(
				'NumeroDocumentoIngreso'	=> array('50','xsd:string','SicexStringCinco','1'),	
				'ComunaInstalacionDestino'	=> array('5','xsd:integer','SicexNumericoTres','1'),	
				'PesoNeto'	=> array('18,4','xsd:decimal','SicexNumericoOnce','1'),	
				'EsFijo'	=> array('true/false','xsd:boolean','SicexBooleano','1'),	
				'FechaEmisionResolucion'	=> array('"YYYY/MM/DD HH:MM:SS"','aem:fechaType','SicexFechaHora','0'),	
				'EmailConsignante'	=> array('0','aem:DireccionEmailType','SicexCorreoElectronico','0'),	
				'RutImportador' => array('8','aem:runType','SicexRut','1')	

				);?>