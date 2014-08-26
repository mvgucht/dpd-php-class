<?php
function isDPD_Parcel($object){
	return (get_class($object) == "DPD_Parcel");
}

class DPD_Parcel extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"parcelLabelNumber" 			=> array(	"mandatory" => false,	"pattern" => "/^[0-9]{11,14}$/"),
		"customerReferenceNumber1" 		=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,35}$/i"),
		"customerReferenceNumber2" 		=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,35}$/i"),
		"customerReferenceNumber3" 		=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,35}$/i"),
		"customerReferenceNumber4" 		=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,35}$/i"),
		"swap" 							=> array(	"mandatory" => false, 	"pattern" => "/^(0|1)$/"),
		"volume" 						=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{9}$/"),
		"weight" 						=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{0,8}$/"),
		"hazardousLimitedQuantities"	=> array(	"mandatory" => false, 	"pattern" => "/^(0|1)$/"),
		"higherInsurance" 				=> array(	"mandatory" => false,	"function" => "isDPD_HigherInsurance"),
		"content" 						=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,50}$/i"),
		"addService" 					=> array(	"mandatory" => false, 	"pattern" => "/^[0-3]{1}$/"),
		"messageNumber" 				=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{0,5}$/"),
		"function" 						=> array(	"mandatory" => false, 	"pattern" => "/^(LOCKDZB|LOCKASG|LOCKEVM|LOCKSHOP|LOCKTV)$/"),
		"parameter" 					=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,300}$/i"),
		"cod" 							=> array(	"mandatory" => false,	"function" => "isDPD_COD"),
		"international" 				=> array(	"mandatory" => false,	"function" => "isDPD_International"),
		"hazardous" 					=> array(	"mandatory" => false,	"array" => "isDPD_Hazardous"),
		"printInfo1OnParcelLabel" 		=> array(	"mandatory" => false, 	"pattern" => "/^(0|1)$/"),
		"info1" 						=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,29}$/i"),
		"info2" 						=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,30}$/i"),
		"returns" 						=> array(	"mandatory" => false, 	"pattern" => "/^(0|1)$/")
	);
		
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
	
	function track($dpdAuth){
		return parent::SoapCall('getTrackingData', $this->getSoapData, $dpdAuth->getSoapHeader);
	}
}
?>