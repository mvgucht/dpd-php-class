<?php
function isDPD_ParcelshopDelivery($object){
	return (get_class($object) == "DPD_ParcelshopDelivery");
}

class DPD_ParcelshopDelivery extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"parcelShopId" 				=> array(	"mandatory" => true,	"pattern" => "/^[a-z\/ 0-9\.@'-]{1,50}$/i"),
		"parcelShopNotification" 	=> array(	"mandatory" => true,	"function" => "isDPD_Notification")
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>