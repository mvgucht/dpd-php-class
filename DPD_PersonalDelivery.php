<?php

function isDPD_PersonalDelivery($object){
	return (get_class($object) == "DPD_PersonalDelivery");
}

class DPD_PersonalDelivery extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"type" 			=> array(	"mandatory" => true,	"pattern" => "/^[1-5]{1}$/"),
		"floor" 		=> array(	"mandatory" => false,	"pattern" => "/^[a-z\/ 0-9.'-]0,30}$/i"),
		"building" 		=> array(	"mandatory" => false,	"pattern" => "/^[a-z\/ 0-9.'-]{0,30}$/i"),
		"department" 	=> array(	"mandatory" => false,	"pattern" => "/^[a-z\/ 0-9.'-]{0,30}$/i"),
		"name" 			=> array(	"mandatory" => false,	"pattern" => "/^[a-z\/ 0-9.'-]{0,35}$/i"),
		"phone" 		=> array(	"mandatory" => false,	"pattern" => "/^[a-z\/ 0-9.'-]{0,20}$/i"),
		"personId" 		=> array(	"mandatory" => false,	"pattern" => "/^[a-z\/ 0-9.'-]{0,35}$/i"),
	);
		
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>