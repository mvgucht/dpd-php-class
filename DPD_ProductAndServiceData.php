<?php
function isDPD_ProductAndServiceData($object){
	return (get_class($object) == "DPD_ProductAndServiceData");
}

class DPD_ProductAndServiceData extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"orderType" 					=> array(	"mandatory" => true, 	"pattern" => "/^(consignment|collection request order|pickup information)$/"),
		"saturdayDelivery" 				=> array(	"mandatory" => false, 	"pattern" => "/^(0|1)$/"),
		"exWorksDelivery" 				=> array(	"mandatory" => false, 	"pattern" => "/^(0|1)$/"),
		"guarantee"						=> array(	"mandatory" => false, 	"pattern" => "/^(0|1)$/"),
		"personalDelivery" 				=> array(	"mandatory" => false,	"function" => "isDPD_PersonalDelivery"),
		"pickup" 						=> array(	"mandatory" => false,	"function" => "isDPD_Pickup"),
		"parcelShopDelivery" 			=> array(	"mandatory" => false,	"function" => "isDPD_ParcelshopDelivery"),
		"predict" 						=> array(	"mandatory" => false,	"function" => "isDPD_Notification"),
		"personalDeliveryNotification" 	=> array(	"mandatory" => false,	"function" => "isDPD_Notification"),
		"proactiveNotification" 		=> array(	"mandatory" => false,	"array" => "isDPD_ProactiveNotification"),
		"delivery" 						=> array(	"mandatory" => false,	"function" => "isDPD_Delivery"),
		"invoiceAddress" 				=> array(	"mandatory" => false,	"function" => "isDPD_Address")
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>