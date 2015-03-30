<?php 
/**
* Array de plantillas tiene los parámetros Necesarios para la validación basada en archivoDG.SCO.DT.E-Diseño_contratos_servicios_Documento_de_Ingreso.xlsx
* Com base no nome do servico o codigo encontra sua array relativa na pasta /arrayTemplates/
* Cada serivo a ser validado deve possuir um arrau nesta pasta. 
* Note: la palabra "validation" fue omitida del nombre de la clase para facilitar el desarrollo
*
* @package    validacion
* @author     Diego Sanches
* @version    1.0 de 29/03/2015
* 
*/
class templateArray {
		
	public $fields;
	public $servico;
	
	public function __construct($param) {
		$this->servico = $param;
		templateArray::setTemplateArray($this->servico);
	}
	public function setTemplateArray($servico){
		require_once 'arrayTemplates/'.$servico.'.php';
	 	$this->fields = $fields ;
	}
	public function getTemplateArray(){
		return $this->fields ;  	
	}
	public function getLineByField($item) {
		$generalArray = templateArray::getTemplateArray();
		$exist = false;
		$return = array();		
		foreach ($generalArray as  $field => $value) {		 	
			if ($field == $item) {
				$return = $value;
				$exist = true;
				break;
			}
		}
		if (!$exist) {
			//validation::save_log("No encontrado error: " . $item); *documentar
			$return = false;
		}
		return $return;
	}
}
?>