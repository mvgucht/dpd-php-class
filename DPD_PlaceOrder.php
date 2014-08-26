<?php
function isDPD_PlaceOrder($object){
	return (get_class($object) == "DPD_PlaceOrder");
}

class DPD_PlaceOrder extends MVG_SOAPClass{
	private $_arrVariableMapper = array(
		"paperFormat" 	=> array(	"mandatory" => true,	"pattern" 	=> "/^[A-Z]{1}(4|6)$/"),
		"order" 		=> array(	"mandatory" => true,	"array" 	=> "isDPD_Order")
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
	
	function send($dpdAuth, $blFeedback = false){
		return parent::SoapCall('storeOrders', $this->getSoapData, $dpdAuth->getSoapHeader, $blFeedback);
	}
}
?>