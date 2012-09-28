<?
class BaseExtStore extends BaseExtClass{
	private $proxyUrl = '';
	const ModelClass = '';


	function __construct($configs = array()){
		parent::__construct($configs);
		$this->extend = 'Ext.data.Store';
		$this->model = static::ModelClass;
	}

	function addProxyUrl($route,$params=array(),$ampersand='&'){
		$this->proxyUrl = Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
	}




	function render(){
		if(!empty($this->proxyUrl)){
			$proxy = array(
				'type' => 'ajax',
				'url'  => '/extjs'.$this->proxyUrl,
				'reader' => array(
					'type' => 'json',
					'root' => 'data',
				)
			);

			if(isset($this->pageSize)){				$proxy['reader']['totalProperty'] = 'total';			}

			$proxy['reader'] = (object)$proxy['reader'];

			$this->proxy = (object)$proxy;
		}

		$str = parent::render();
		$str .= "Ext.onReady(function(){Ext.create('".static::ClassName."',{storeId: '".static::ClassName."'});});";

		return $str;
	}
}