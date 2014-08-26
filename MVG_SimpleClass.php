<?php
function array_map_recursive($callback, $array) {
	if(is_array($array)){
		foreach ($array as $key => $value) {
			if (is_array($array[$key])) {
				$array[$key] = array_map_recursive($callback, $array[$key]);
			}
			else {
				$array[$key] = call_user_func($callback, $array[$key]);
			}
		}
		return $array;
	} else {
		throw new Exception("Array_map_recursive needs the second parameter to be an array. Given: ".$array);
	}
}

class MVG_SimpleClass{
	private $_strClassName;
	private $_arrVariableMapper;
	private $_arrData;
	
	private function dataCheck($name, $data){
		$blCheck = true;
		if(isset($this->_arrVariableMapper[$name]["pattern"])){
			$blCheck = preg_match($this->_arrVariableMapper[$name]["pattern"], $data) == 0 ? false : true;
		}
		if(isset($this->_arrVariableMapper[$name]["function"])){
			$blCheck = call_user_func($this->_arrVariableMapper[$name]["function"], $data);
		}
		if(isset($this->_arrVariableMapper[$name]["array"])){
			if(!(count($data) == 0)){
				$blCheck = array_product(array_map($this->_arrVariableMapper[$name]["array"], $data));
			}
		}
		return $blCheck;
	}
	
	function __construct($strClassName, $arrVariableMapper, $arrData){
		$this->_strClassName = $strClassName;
		$this->_arrVariableMapper = $arrVariableMapper;
		
		foreach ($this->_arrVariableMapper as $name => $arrNameData){
			if($arrNameData["mandatory"] && !(isset($arrData[$name]))){
				throw new Exception($this->_strClassName.": Please provide $name variable as it is mandatory.", 100);
			}
		}
		foreach ($arrData as $name => $data){
			$this->__set($name, $data);
		}
	}
	
	function __set($name, $data){
		//provide array handling.
		if(isset($this->_arrVariableMapper[$name])){
			if($this->dataCheck($name, $data)){
				$this->_arrData[$name] = $data;
			} else {
				throw new Exception($this->_strClassName.": $data is not the correct format for variable $name.", 110);
			}
		} else {
			throw new Exception($this->_strClassName.": $name is not a valid variable.", 200);
		}
	}
	
	function __get($name){
		if($name == "getSoapData"){
			$fnMapper = function($object){
					if(get_parent_class($object) == "MVG_SimpleClass"){
						return $object->getSoapData;
					} else {
						return $object;
					}
				};
			try{
				if(is_array($this->_arrData)){
					return array_map_recursive($fnMapper, $this->_arrData);
				} else {
					return $this->_arrData;
				}
			} catch (Exception $e){
				throw new Exception($this->_strClassName.": array_map_recursive problem");
			}
		} elseif (isset($this->_arrVariableMapper[$name])){
			if(isset($this->_arrData[$name])){
				return $this->_arrData[$name];
			} else {
				throw new Exception($this->_strClassName.": $name is not set.", 300);
			}
		} else {
			throw new Exception($this->_strClassName.": $name is not a valid variable name.", 200);
		}
	}
}
?>