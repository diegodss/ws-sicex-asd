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
  public $path ;
  
  public function __construct() {
  	$this->path = $_SERVER['DOCUMENT_ROOT'] . "/ws-sicex-asd/validacion/report/" ;	
  }
  public function setService($s) {
  	$this->service = $s;
  }
  public function getPath() {
  	return  $_SERVER['DOCUMENT_ROOT'] . "/ws-sicex-asd/validacion/report/";
  }
  function save_log($parse) {
	$year   = date('Y');
	$month  = date('m');
	$day    = date('d');
	$hour   = date('h');		
	$minute = date('i');
	$second = date('s');
	$fileId = io::getRunTimeId();
	$log = date('d.m.Y h:i:s')."  => ". $parse ."  \n"; 
	error_log($log , 3, io::getPath() . $this->service . "-" .$fileId.".log" );	
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
		
		$filename = io::getPath() . $this->service . "-" .$filename.".log" ;		
		
			if  (file_exists($filename)) {
			$ponteiro = fopen ($filename, "r");		
			if ($ponteiro){
				while (!feof ($ponteiro)) {
			   	$linha = $linha . fgets($ponteiro, 4096) . "<br>";		   
				}
			}
			fclose ($ponteiro);
			}
			return  $linha;
		}
		
  function saveDataFileLog($parse, $fileName) {
	$year   = date('Y');
	$month  = date('m');
	$day    = date('d');
	$hour   = date('h');		
	$minute = date('i');
	$second = date('s');
	$fileId = io::getRunTimeId();
	$fileName = $fileName . "-".$fileId;
	$log = print_r($parse, true);  ; 
	error_log($log , 3, io::getPath() . $this->service . "-" .$fileName.".log" );	
	}			
}?>