<?php
function isDPD_Auth($object){
	return (get_class($object) == "DPD_Auth");
}

class DPD_Auth extends MVG_SOAPClass{
	private $_arrVariableMapper = array(
		"delisId" 				=> array(	"mandatory" => true),
		"password" 				=> array(	"mandatory" => true),
		"messageLanguage" 		=> array(	"mandatory" => true, 	"pattern" => "/^[a-z_]{5}$/i"),
		"authToken"				=> array(	"mandatory" => false),
		"depot"					=> array(	"mandatory" => false)
	);
	
	function __construct($arrData){
		parent::__construct(get_class($this), $this->_arrVariableMapper, $arrData);

		try { 
			$this->login();
		} catch (Exception $e) {
			throw new Exception (get_class($this).": Could not login to DPD webservices. Cauth exception: $e.message", 900);
		}
	}
	
	public function login(){
		// Call getAuth()
		$error = false;
		try { 
			$response = parent::SoapCall("getAuth", $this->getSoapData);
		} catch (SoapFault $fault) {
			$error = true;
			throw new Exception(get_class($this).": Error occured during Soap call to server.", 800);
		}

		// If we get a response we save the returned values.
		if (!$error) {
			$this->authToken 	= $response->return->authToken;
			$this->depot 		= $response->return->depot;
		}
	}
	
	function __get($name){
		if($name == "getSoapHeader"){
			$arrResult = parent::__get("getSoapData");
			unset($arrResult["SOAPURL"]);
			unset($arrResult["password"]);
			unset($arrResult["depot"]);
			return $arrResult;
		} else {
			return parent::__get($name);
		}
	}
	
}
?>