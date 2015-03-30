<?php 
class xmlTemplate extends arrayWs {

  public $array;
  public $resultValidaArrWS;
  public function __construct() {
    $xml   = simplexml_load_string( file_get_contents('arrayTemplates/xml.xml'));
	$array = xmlTemplate::XML2Array($xml);
	$this->array = array($xml->getName() => $array);
	$this->resultValidaArrWS = true;
 	//echo "resp " . $array;
  }

public function getData(){
	return $this->array;
}


function XML2Array(SimpleXMLElement $parent)
{
    $array = array();

    foreach ($parent as $name => $element) {
        ($node = & $array[$name])
            && (1 === count($node) ? $node = array($node) : 1)
            && $node = & $node[];

        $node = $element->count() ? xmlTemplate::XML2Array($element) : trim($element);
    }

    return $array;
}
function _echo($var, $opt) {
	if ($opt == "1" ){
		echo $var;
	} 
	
}
}
?> 