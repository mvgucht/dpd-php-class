<?php
function isDPD_Delivery($object){
	return (get_class($object) == "DPD_Delivery");
}

class DPD_Delivery extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"day" 		=> array(	"mandatory" => false,	"pattern" => "/^[0-6]{1}$/"),
		"dateFrom" 	=> array(	"mandatory" => false,	"pattern" => "/^[0-9]{8}$/"),
		"dateTo" 	=> array(	"mandatory" => false,	"pattern" => "/^[0-9]{8}$/"),
		"timeFrom"	=> array(	"mandatory" => false,	"pattern" => "/^(1[0-9]|2[0-4])[0-5]{1}[0-9]{1}$/"),
		"timeTo" 	=> array(	"mandatory" => false,	"pattern" => "/^(1[0-9]|2[0-4])[0-5]{1}[0-9]{1}$/")
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>