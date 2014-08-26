<?php

class MVG_TimeLogger{
	private $_dbConnection;
	private $_strTable;
	
	function __construct($dbConnection, $strTable){
		$this->_dbConnection = $dbConnection;
		$this->_strTable = $strTable;
	}
	
	public function timeFunction($info, $f, $arrVars){
		$tsStart = microtime();
		$result = $f($arrVars);
		$tsEnd = microtime();
		
		$tsTime = $tsEnd - $tsStart;
		$strQuery = "INSERT INTO ".$this->strTable." (`Info`, `Result`, `ResponseTime`) VALUES (".$info.",".$result.",".$tsTime.");";
		
		if(!$this->_dbConnection->real_query($strQuery)){
			die("Problem with query");
		} else {
			return true;
		}
	}
}

?>