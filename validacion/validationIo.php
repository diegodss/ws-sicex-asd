<?php 
/**
* Función principal y tienda de entrada de registro y salida de tratamiento.
* Save_log: después de crear un archivo de registro para el procesamiento, el almacenamiento de la rentabilidad de cada PROCESAMIENTO
* GetRunTimeId: determinar un ID para el procesamiento en tiempo real
* PrintLogFile: digitales en la pantalla el retorno del archivo de registro.
* Note: la palabra "validation" fue omitida del nombre de la clase para facilitar el desarrollo 
*
* @package    validacion
* @author     Diego Sanches
* @version    1.0 de 29/03/2015
* 
*/
class io {	
  public $service;
  public function __construct() {	
  }
  public function setService($s) {
  	$this->service = $s;
  }
  function save_log($parse) {
	$year   = date('Y');
	$month  = date('m');
	$day    = date('d');
	$hour   = date('h');		
	$minute = date('i');
	$second = date('s');
	$filename = io::getRunTimeId();
	$log = date('d.m.Y h:i:s')."  => ". $parse ."  \n"; 
	error_log($log , 3, $_SERVER['DOCUMENT_ROOT'] . "/ws-sicex-asd/validacion/report/" . $this->service . "-" .$filename.".log" );	
	}	

	function getRunTimeId() {
		$year   = date('Y');
		$month  = date('m');
		$day    = date('d');
		$hour   = date('h');		
		$minute = date('i');
		$second = date('s');
		$runTimeId = $year.$month.$day.$hour.$minute.$second;
		return $runTimeId;
	}	
	
	function printLogFile() {	
		$filename = io::getRunTimeId();
			if  (file_exists("report/".$this->service . "-".$filename.".log")) {
			$ponteiro = fopen ("report/".$this->service . "-".$filename.".log", "r");		
			if ($ponteiro){
				while (!feof ($ponteiro)) {
			   	$linha = fgets($ponteiro, 4096);		   
				}
			}
			fclose ($ponteiro);
			}
			return '01'; //"report/".$filename.".log";
		}
}?>