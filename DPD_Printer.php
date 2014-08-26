<?php
function isDPD_Printer($object){
	return (get_class($object) == "DPD_Printer");
}

class DPD_Printer extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"manufacturer"	 				=> array(	"mandatory" => false),
		"model"					 		=> array(	"mandatory" => false),
		"revision"				 		=> array(	"mandatory" => false),
		"offsetX"				 		=> array(	"mandatory" => true, 	"pattern" => "/^[0-9]*$/"),
		"offsetY"				 		=> array(	"mandatory" => true, 	"pattern" => "/^[0-9]*$/"),
		"connectionType"		 		=> array(	"mandatory" => true, 	"pattern" => "/^(SERIAL|PARALLEL)$/"),
		"barcodeCapable2D"				=> array( 	"mandatory" => true,	"pattern" => "/^(0|1)$/")
	);
		
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>