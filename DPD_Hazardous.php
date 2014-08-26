<?php
function isDPD_Hazardous($object){
	return (get_class($object) == "DPD_Hazardous");
}

class DPD_Hazardous extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"identificationUnNo" 	=> array(	"mandatory" => true,	"pattern" => "/^[0-9]{4}$/"),
		"identificationClass"	=> array(	"mandatory" => true, 	"pattern" => "/^[0-9\.]{0,6}$/"),
		"classificationCode" 	=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,5}$/i"),
		"packingGroup" 			=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,5}$/i"),
		"packingCode" 			=> array(	"mandatory" => true, 	"pattern" => "/^(0A|0A1|0A2|1A|1A1|1A2|1B|1B1|1B2|1H|1H1|1H2|3A|3A1|3A2|3B|3B1|3B2|3H|3H1|3H2|4A|4B|4D|4G|4H|4H1|4H2|5H|5M|6H)$/"),
		"description" 			=> array(	"mandatory" => true, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,160}$/i"),
		"subsidiaryRisk" 		=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,10}$/i"),
		"tunnelRestrictionCode"	=> array(	"mandatory" => false, 	"pattern" => "/^[A-E]{1}$"),
		"hazardousWeight" 		=> array(	"mandatory" => true, 	"pattern" => "/^[0-9]{0,6}$/"),
		"netWeight" 			=> array(	"mandatory" => false, 	"pattern" => "/^[0-9]{0,6}$/"),
		"factor" 				=> array(	"mandatory" => true, 	"pattern" => "/^[0-9]{0,3}$/"),
		"notOtherwiseSpecified"	=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,150}$/i")
	);
		
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>