<?php
function isDPD_HigherInsurance($object){
	return (get_class($object) == "DPD_HigherInsurance");
}

class DPD_HigherInsurance extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"amount" 	=> array(	"mandatory" => true, "pattern" => "/^[0-9]{1,10}$/"),
		"currency" 	=> array(	"mandatory" => true, "pattern" => "/^[A-Z]{3}$/")
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>