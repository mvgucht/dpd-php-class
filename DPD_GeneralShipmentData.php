<?php
function isDPD_GeneralShipmentData($object){
	return (get_class($object) == "DPD_GeneralShipmentData");
}

class DPD_GeneralShipmentData extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"mpsId" 						=> array(	"mandatory" => false,	"pattern" => "/^(MPS|EXP|B2C)[0-9]{22}$/"),
		"cUser" 						=> array(	"mandatory" => false, 	"pattern" => "/^[a-z0-9]{0,10}$/i"),
		"mpsCustomerReferenceNumber1" 	=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,50}$/i"),
		"mpsCustomerReferenceNumber2" 	=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,35}$/i"),
		"mpsCustomerReferenceNumber3" 	=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,35}$/i"),
		"mpsCustomerReferenceNumber4" 	=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,35}$/i"),
		"identificationNumber" 			=> array(	"mandatory" => false,	"pattern" => "/^[0-9]{0,3}$/"),
		"sendingDepot" 					=> array(	"mandatory" => true,	"pattern" => "/^[0-9]{4}$/"),
		"product" 						=> array(	"mandatory" => true,	"pattern" => "/^(CL|E830|E10|E12|E18|IE2|PL|PL+|MAIL)$/"),
		"mpsCompleteDelivery"			=> array(	"mandatory" => false, 	"pattern" => "/^(0|1)$/"),
		"mpsCompleteDeliveryLabel" 		=> array(	"mandatory" => false, 	"pattern" => "/^(0|1)$/"),
		"mpsVolume" 					=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{9}$/"),
		"mpsWeight" 					=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{8}$/"),
		"mpsExpectedSendingDate"		=> array( 	"mandatory" => false,	"pattern" => "/^[0-9]{8}$/"),
		"mpsExpectedSendingTime" 		=> array(	"mandatory" => false,	"pattern" => "/^(1[0-9]|2[0-4])[0-5]{1}[0-9]{1}$/"),
		"sender" 						=> array(	"mandatory" => true,	"function" => "isDPD_Address"),
		"recipient" 					=> array(	"mandatory" => true,	"function" => "isDPD_Address")
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>