<?php
function isDPD_Address($object){
	return (get_class($object) == "DPD_Address");
}

function glnChecker($strSubject){
	$arrGln = str_split($strSubject);
	$intTest = (3 * ($arrGln[1] + $arrGln[3] + $arrGln[5] + $arrGln[7] + $arrGln[9] + $arrGln[11])) + ($arrGln[0] + $arrGln[2] + $arrGln[4] + $arrGln[6] + $arrGln[8] + $arrGln[10]);
	$intCheck = 10 - ($intTest % 10);
	return ($arrGln[12] == $intCheck);
}

class DPD_Address extends MVG_SimpleClass{
	private $_arrVariableMapper = array(
		"name1" 			=> array(	"mandatory" => true,	"pattern" => "/^[a-z\/ 0-9.'-]{1,35}$/i"),
		"name2" 			=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{0,35}$/i"),
		"street" 			=> array(	"mandatory" => true, 	"pattern" => "/^[a-z\/ 0-9.'-]{1,35}$/i"),
		"houseNo" 			=> array(	"mandatory" => false, 	"pattern" => "/^[0-9 -a-z\/]{0,8}$/i"),
		"state" 			=> array(	"mandatory" => false, 	"pattern" => "/^(|[A-Z0-9]{2})$/"),
		"country" 			=> array(	"mandatory" => true, 	"pattern" => "/^[A-Z]{2}$/"),
		"zipCode" 			=> array(	"mandatory" => true, 	"pattern" => "/^[a-z0-9 ]{0,9}$/i"),
		"city" 				=> array(	"mandatory" => true, 	"pattern" => "/^[a-z0-9 -']{1,35}$/i"),
		"gln"				=> array(	"mandatory" => false, 	"function" => "glnChecker"),
		"customerNumber" 	=> array(	"mandatory" => false, 	"pattern" => "/^[a-z0-9]{0,17}$/i"),
		"contact" 			=> array(	"mandatory" => false, 	"pattern" => "/^[a-z\/ 0-9.'-]{1,35}$/i"),
		"phone" 			=> array(	"mandatory" => false, 	"pattern" => "/^[\/ 0-9.#-]{0,30}$/"),
		"fax" 				=> array(	"mandatory" => false, 	"pattern" => "/^[\/ 0-9.#-]{0,30}$/i"),
		"email" 			=> array(	"mandatory" => false, 	"pattern" => "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/"),
		"comment" 			=> array(	"mandatory" => false, 	"pattern" => "/^.{0,70}$/"),
		"iaccount" 			=> array(	"mandatory" => false)
	);
		
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
}
?>