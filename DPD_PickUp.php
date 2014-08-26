<?php
function isDPD_Pickup($object){
	return (get_class($object) == "DPD_Pickup");
}

class DPD_PickUp extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"tour" 						=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{3}$/"),
		"quantity" 					=> array(	"mandatory" => true, 	"pattern" => "/^[0-9]{5}$/"),
		"date"						=> array(	"mandatory" => true, 	"pattern" => "/^[0-9]{8}$/"),
		"day" 						=> array(	"mandatory" => true, 	"pattern" => "/^[0-6]{1}$/"),
		"fromTime1" 				=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{4}$/"),
		"toTime1" 					=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{4}$/"),
		"fromTime2" 				=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{4}$/"),
		"toTime2" 					=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{4}$/"),
		"collectionRequestAddress" 	=> array(	"mandatory" => false,	"function" => "isDPD_Address")
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>