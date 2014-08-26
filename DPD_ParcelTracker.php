<?php
function isDPD_ParcelTracker($object){
	return (get_class($object) == "DPD_ParcelTracker");
}

class DPD_ParcelTracker extends MVG_SOAPClass{
	private $_arrVariableMapper = array(
		"parcellabelnumber" 			=> array(	"mandatory" => true,	"pattern" => "/^[0-9]{11,14}$/"),
	);
		
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
	}
	
	function track($dpdAuth){
		return parent::SoapCall('getTrackingData', $this->getSoapData, $dpdAuth->getSoapHeader);
	}
}
?>