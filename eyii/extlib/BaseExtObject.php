<?
class BaseExtObject implements ArrayAccess{
	private $info;

	function &__get($name){
			return $this->object[$name];

	function __set($name,$value){
		$encoding = true;
		if(is_string($value)){
			$type = strtolower(substr(trim($value),0, 9));
			if($type == "function("){
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

	function setValue($name,$value,$encoding = true){
		if(!isset($this->info[$name]))$this->info[$name] = $encoding;

	function setInfo($name, $value){

	function setFunc($name, $source){/*$source like function(some){}*/

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

	function render(){
		foreach($this->object as $name=>$value){
			}elseif($this->info[$name]){
			}else{
		return "{".implode(',',$str)."}";


}