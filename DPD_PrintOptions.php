<?php
function isDPD_PrintOptions($object){
	return (get_class($object) == "DPD_PrintOptions");
}

class DPD_PrintOptions extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"printerLanguage" 				=> array(	"mandatory" => true,	"pattern" => "/^(PDF|ZPL)$/"),
		"paperFormat"			 		=> array(	"mandatory" => true, 	"pattern" => "/^(A4|A6|A7)$/"),
		"printer"						=> array( 	"mandatory" => false,	"function" => "isDPD_Printer")
	);
		
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>