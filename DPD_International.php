<?php
function isDPD_International($object){
	return (get_class($object) == "DPD_International");
}

class DPD_International extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"parcelType" 							=> array(	"mandatory" => true, 	"pattern" => "/^(0|1)$/"),
		"customsAmount" 						=> array(	"mandatory" => true, 	"pattern" => "/^[0-9]{0,13}$/"),
		"customsCurrency" 						=> array(	"mandatory" => true, 	"pattern" => "/^[A-Z]{3}$/"),
		"customsTerms"							=> array(	"mandatory" => true, 	"pattern" => "/^0[1-6]$/"),
		"customsContent"						=> array(	"mandatory" => true, 	"pattern" => "/^[a-z\/ 0-9\.'-]{0,35}$/i"),
		"customsTarif"							=> array(	"mandatory" => false, 	"pattern" => "/^([0-9]{4}\.[0-9]{2}|)$/"),
		"customsPaper" 							=> array(	"mandatory" => false, 	"pattern" => "/^[A-I]{0,20}$/"),
		"customsEnclosure"						=> array(	"mandatory" => false, 	"pattern" => "/^(0|1)$/"),
		"customsInvoice"						=> array(	"mandatory" => false),
		"customsInvoiceDate" 					=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{0,8}$/"),
		"customsAmountParcel" 					=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{1,12}$/"),
		"customsOrigin"							=> array(	"mandatory" => false, 	"pattern" => "/^[A-Z]{2}$/"),
		"linehaul" 								=> array(	"mandatory" => false, 	"pattern" => "/^(AI|RO|)$/"),
		"shipMrn" 								=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9\.'-]{0,20}$/i"),
		"collectiveCustomsClearance" 			=> array(	"mandatory" => false, 	"pattern" => "/^(0|1)$/"),
		"invoicePosition" 						=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9\.'-]{0,6}$/i"),
		"comment1" 								=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9\.'-]{0,70}$/i"),
		"comment2" 								=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9\.'-]{0,70}$/i"),
		"commercialInvoiceConsigneeVatNumber" 	=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9\.'-]{0,20}$/i"),
		"commercialInvoiceConsignee" 			=> array(	"mandatory" => true,	"function" => "isDPD_Address")
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>