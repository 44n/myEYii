<?
class BaseExtWindow extends BaseExtClass{
	function __construct($configs = array()){
		parent::__construct($configs);
		$this->extend = "Desktop.Window";
		$this->object->setValue("createBodyItems",array(),array(get_class($this),"createBodyItems"));
	}

	public static function createBodyItems($items){		$rItems = array();
		foreach($items as $item){			$class = BaseExtClass::initClass($item['className']);
			if($class !== false){
				$rItems[] = call_user_func(array($class,"renderItem"),$item);
			}		}
		return "function(){return [".implode(",",$rItems)."];}";	}

	public function addBodyItem($item, $configs = array()){		$this->addRequire($item);
		$this->object->createBodyItems[] = array('className' => $item, 'configs' => $configs);	}
}