<?php
function isDPD_COD($object){
	return (get_class($object) == "DPD_COD");
}

class DPD_COD extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"amount" 			=> array(	"mandatory" => true, "pattern" => "/^[0-9]{1,10}$/"),
		"currency" 			=> array(	"mandatory" => true, "pattern" => "/^[A-Z]{3}$/"),
		"inkasso" 			=> array(	"mandatory" => true, "pattern" => "/^(0|1)$/"),
		"purpose" 			=> array(	"mandatory" => false, "pattern" => "/^[a-z\/ 0-9\.'-]{0,14}$/i"),
		"bankCode" 			=> array(	"mandatory" => false, "pattern" => "/^[a-z\/ 0-9\.'-]{0,25}$/i"),
		"bankName" 			=> array(	"mandatory" => false, "pattern" => "/^[a-z\/ 0-9\.'-]{0,27}$/i"),
		"bankAccountNumber" => array(	"mandatory" => false, "pattern" => "/^[a-z\/ 0-9\.'-]{0,25}$/i"),
		"bankAccountHolder" => array(	"mandatory" => false, "pattern" => "/^[a-z\/ 0-9\.'-]{0,30}$/i"),
		"iban" 				=> array(	"mandatory" => false, "pattern" => "/^[a-z\/ 0-9\.'-]{0,50}$/i"),
		"bic" 				=> array(	"mandatory" => false, "pattern" => "/^[a-z\/ 0-9\.'-]{0,50}$/i"),
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>