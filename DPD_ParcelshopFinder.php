<?php
function isDPD_ParcelshopFinder($object){
	return (get_class($object) == "DPD_ParcelshopFinder");
}

class DPD_ParcelshopFinder extends MVG_SOAPClass{
	private $_arrVariableMapper = array(
		"street" 					=> array(	"mandatory" => false,	"pattern" => "/^[a-z\/ 0-9\.@'-]{0,50}$/i"),
		"houseNo" 					=> array(	"mandatory" => false,	"pattern" => "/^[0-9 -a-z\/]{0,8}$/i"),
		"countryISO" 				=> array(	"mandatory" => true,	"pattern" => "/^[A-Z]{2}$/"),
		"zipCode" 					=> array(	"mandatory" => false,	"pattern" => "/^[a-z0-9 ]{0,9}$/i"),
		"city" 						=> array(	"mandatory" => false,	"pattern" => "/^[a-z0-9 -']{1,35}$/i"),
		"limit" 					=> array(	"mandatory" => true,	"pattern" => "/^[0-9]{1,3}$/"),
		"consigneePickupAllowed" 	=> array(	"mandatory" => false,	"pattern" => "/^(0|1|)$/"),
		"returnAllowed" 			=> array(	"mandatory" => false,	"pattern" => "/^(0|1|)$/"),
		"expressAllowed" 			=> array(	"mandatory" => false,	"pattern" => "/^(0|1|)$/"),
		"hideOnHoliday" 			=> array(	"mandatory" => false,	"pattern" => "/^(0|1|)$/"),
		"hideClosed" 				=> array(	"mandatory" => false,	"pattern" => "/^(0|1|)$/"),
		"availabilityDate" 			=> array(	"mandatory" => false),	//Pattern todo
		"prepaidAllowed" 			=> array(	"mandatory" => false,	"pattern" => "/^(0|1|)$/"),
		"cashOnDeliveryAllowed" 	=> array(	"mandatory" => false,	"pattern" => "/^(0|1|)$/"),
		"cashOnDeliveryPayment"		=> array(	"mandatory" => false,	"pattern" => "/^[0-9]{0,3}$/")
	);
	
	function __construct($arrData){
		if(is_array($arrData)){
			if(isset($arrData["zipCode"]) || isset($arrData["city"])){ //Not both are needed, one of the two is enough.
				if(!(isset($arrData["limit"]))){
					$arrData["limit"] = "10";
				}
				parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);
			} else	{
				throw new Exception(get_class($this).": Please provide zipCode and/or city.", 100);
			}
		} else {
			throw new Exception(get_class($this).": Please provide variables array.", 400);
		}
	}
	
	function findParcelShops($dpdAuth, $blFeedback = false){
		return parent::SoapCall('findParcelShops', $this->getSoapData, $dpdAuth->getSoapHeader, $blFeedback);
	}
	
	function findCities($dpdAuth){
		return parent::SoapCall('findCities', $this->getSoapData, $dpdAuth->getSoapHeader);
	}
}
?>