<?
class BaseExtObject implements ArrayAccess{	private $object;
	private $info;

	function &__get($name){		if(isset($this->object[$name])){
			return $this->object[$name];		}	}

	function __set($name,$value){
		$encoding = true;
		if(is_string($value)){
			$type = strtolower(substr(trim($value),0, 9));
			if($type == "function("){				$encoding = false;			}
		}

		$this->setValue($name, $value, $encoding);
	}

	public function __isset($name){
		return isset($this->object[$name]);
	}

	public function __unset($name){
		unset($this->object[$name]);
		unset($this->info[$name]);
	}

	function setValue($name,$value,$encoding = true){		$this->object[$name] = $value;
		if(!isset($this->info[$name]))$this->info[$name] = $encoding;	}

	function setInfo($name, $value){		$this->info[$name] = $value;	}

	function setFunc($name, $source){/*$source like function(some){}*/		$this->setValue($name,$source,false);	}

	public function offsetSet($offset, $value) {
		$this->__set($offset,$value);
	}
	public function offsetExists($offset) {
		return $this->__isset($offset);
	}
	public function offsetUnset($offset) {
		$this->__unset($offset);
	}
	public function offsetGet($offset){
		return $this->__get($offset);
	}

	function render(){		$str = array();
		foreach($this->object as $name=>$value){			if(is_array($this->info[$name])){				$str[] = CJSON::encode($name).":".call_user_func($this->info[$name],$value);
			}elseif($this->info[$name]){				$str[] = CJSON::encode($name).":".CJSON::encode($value);
			}else{				$str[] = CJSON::encode($name).":".$value;			}		}
		return "{".implode(',',$str)."}";	}


}