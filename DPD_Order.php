<?php
function isDPD_Order($object){
	return (get_class($object) == "DPD_Order");
}

class DPD_Order extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"generalShipmentData" 	=> array(	"mandatory" => true,	"function" 	=> "isDPD_GeneralShipmentData"),
		"parcels" 				=> array(	"mandatory" => false,	"array" 	=> "isDPD_Parcel"),
		"productAndServiceData" => array(	"mandatory" => true,	"function" 	=> "isDPD_ProductAndServiceData")
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>