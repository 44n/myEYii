<?
class BaseExtClass{	const ClassName = "";	public $object;
	public $configs = array();


	function __construct($configs = array()){
		$this->object = new BaseExtObject;
		$this->configs = $configs;
	}

	function init(){
		/*for construct ext class*/
	}

	function __get($name){
		$method = "get".ucfirst($name);
		if(method_exists($this,$method)){			return $this->$method();		}

		return $this->object[$name];
	}

	public static function initClass($className){
		if(strtolower(substr($className,0,5)) != "eyii.")return 'BaseExtClass';
		list(,$module, $type, $class) = explode(".",$className);

		$classConstruct = $class."Ext".ucfirst($type);



		Yii::import('application.modules.'.strtolower($module).'.models.*');
		if(!is_callable($classConstruct,true)){
			if(!Yii::autoload($classConstruct)){
				return false;
			}
		}
		return $classConstruct;
	}

	function __set($name,$value){

		$method = "set".ucfirst($name);
		if(method_exists($this,$method)){
			return $this->$method($value);
		}

		$this->object[$name] = $value;
	}

	public function __isset($name){
		$method = "isset".ucfirst($name);
		if(method_exists($this,$method)){
			return $this->$method();
		}
		return isset($this->object[$name]);
	}

	public function __unset($name){
		$method = "unset".ucfirst($name);
		if(method_exists($this,$method)){
			$this->$method();
		}
		unset($this->object[$name]);
	}



	function addRequire($value){		$r = $this->object->requires;
		$r[] = $value;
		$this->object->requires = array_unique($r);	}

	function getAllRequires(){		$arr = array();		if(isset($this->object->requires)){			$arr = $this->object->requires;		}

		if(isset($this->object->extend)){
			$arr[] = $this->object->extend;
		}

		return $arr;	}

	function render(){		return "Ext.define('".static::ClassName."',".$this->object->render().");";	}

	public static function renderItem($item){		return "Ext.create(".CJSON::encode($item['className']).",".CJSON::encode($item['configs']).")";	}

}