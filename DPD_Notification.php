<?php
function isDPD_Notification($object){
	return (get_class($object) == "DPD_Notification");
}

class DPD_Notification extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"channel"	=> array(	"mandatory" => true, 	"pattern" => "/^[1-3]{1}$/"),
		"value" 	=> array(	"mandatory" => true,	"pattern" => "/^[a-z\/ 0-9\.@#+'-]{1,50}$/i"),
		"language"	=> array(	"mandatory" => true, 	"pattern" => "/^[A-Z]{2}$/")
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>