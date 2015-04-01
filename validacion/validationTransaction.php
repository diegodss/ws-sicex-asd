<?php 
/**
* Devoluciones de validación de mensajes de acuerdo conPIN_DOC_IntegraciónOrganismoProveedor_V2.0.pdf 
* Note: la palabra "validation" fue omitida del nombre de la clase para facilitar el desarrollo
*
* @package    validacion
* @author     Diego Sanches
* @version    1.0 de 29/03/2015
* 
*/
class transaction{	
	
	public $codigoMensaje;
	public $glosaMensaje;
	
	public function __construct() {
		$this->codigoMensaje = "00";
		$this->glosaMensaje = "Transacción Exitosa";			
	}
	public function validaParametrosEntrada($b) {
		if ($b) {
			$this->codigoMensaje = "00";
			$this->glosaMensaje = transaction::getGlosa($this->codigoMensaje);						
		} else {
			$this->codigoMensaje = "03";
			$this->glosaMensaje = transaction::getGlosa($this->codigoMensaje);						
		}
		return false; 
	}	
	public function getGlosa($cod){
		switch ($cod){
			case "00":
				$msg = "Transacción Exitosa";
				break;
			case "01":
				$msg = "Error de Autenticación";
				break;
			case "02":
				$msg = "Error de Autorización";
				break;
			case "03":
				$msg = "Error en parámetros de entrada";
				break;
			case "04":
				$msg = "Error en XML de entrada";
				break;
			case "05":
				$msg = "No Existen datos para responder consulta";
				break;
			case "06":
				$msg = "Error de Timeout";
				break;
			case "07":
				$msg = "Datos No Disponibles";
				break;
			default:
				$msg = "Error Interno";	
		}
	}
}
?>