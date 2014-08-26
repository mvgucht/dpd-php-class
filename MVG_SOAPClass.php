<?php
class MVG_SOAPClass extends MVG_SimpleClass{
	private $_strSOAPUrl;
	private $_strClassName;

	function __construct($strClassName, $arrVariableMapper, $arrData){
		if (isset($arrData["SOAPURL"])){
			$this->_strClassName = $strClassName;
			$this->_strSOAPUrl = $arrData["SOAPURL"];
			unset($arrData["SOAPURL"]);
			
			parent::__construct($strClassName, $arrVariableMapper, $arrData);
		} else {
			throw new Exception($this->_strClassName.": Please provide SOAPURL variable as it is mandatory.", 100);
		}
	}
	
	function SoapCall($strFunction, $arrBodyParam, $arrHeaderParam = false, $blFeedback = false){
		// Create new SoapClient, trace is used for (future) error reporting
		$client = new SoapClient($this->_strSOAPUrl, array('trace' => 1));
		
		if($arrHeaderParam){
			// Create (and set) new header with namespace, and parameters
			$sHeader = new SoapHeader('http://dpd.com/common/service/types/Authentication/2.0', 'authentication', $arrHeaderParam);
			$client->__setSoapHeaders(array($sHeader));
		}
		
		$result;
		
		try {
			$result = $client->__soapCall($strFunction, array($arrBodyParam));
		} catch (SoapFault $fault) {
			throw new Exception($this->_strClassName.": Error occured during Soap call to server. $fault.message:".$client->__getLastRequest(), 800);
		}
		
		if($blFeedback){
			echo "Last Request:\n";
			echo $client->__getLastRequest();
			echo "\n";
			echo $client->__getLastResponse();
		}
		
		return $result;;
		
		unset($client);
	}
}
?>