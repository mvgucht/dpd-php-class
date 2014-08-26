<?php
function isDPD_ProactiveNotification($object){
	return (get_class($object) == "DPD_ProactiveNotification");
}

class DPD_ProactiveNotification extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"channel"	=> array(	"mandatory" => true, 	"pattern" => "/^[1-3]{1}$/"),
		"value" 	=> array(	"mandatory" => true,	"pattern" => "/^[a-z\/ 0-9\.@'-]{1,50}$/i"),
		"rule"		=> array(	"mandatory" => true, 	"pattern" => "/^((|1|2)[0-9]{1}|3(0|1))$/"),
		"language"	=> array(	"mandatory" => true, 	"pattern" => "/^[A-Z]{2}$/")
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>