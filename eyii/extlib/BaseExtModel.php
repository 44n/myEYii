<?
class BaseExtModel extends BaseExtClass{
	private $proxyUrl = '';

	function __construct($configs = array()){
		parent::__construct($configs);
		$this->extend = 'Ext.data.Model';
		$this->fields = array();
		$this->validations = array();
	}

	function addField($field, $type = ""){
		if(is_string($field)){
			$field = array(
				'name'=>$field,
				'type'=>$type
			);
		}
		$f = $this->fields;
		$f[] = (object)$field;
		$this->fields = $f;
	}

	function addValidator($fieldName, $validator, $configs=array()){
		$configs['field'] = $fieldName;
		$configs['type'] = $validator;

		$v = $this->validations;
		$v[] = (object)$configs;
		$this->validations = $v;
	}
	function render(){
		$this->renderFields();
		if(!empty($this->proxyUrl)){
			$this->proxy = (object)array(
				'type' => 'ajax',
				'url'  => '/extjs'.$this->proxyUrl,
				'reader' => (object)array(
					'type' => 'json',
					'root' => 'data'
				)
			);
		}

		return parent::render();
	}

	public static function fields(){
		return array();
	}

	public static function createGridColumns(){
		$fields = static::fields();
		$columns = array();
		foreach($fields as $key=>$field){
			$column = array(
				'header' => $field['title'],
				'dataIndex' => $key,
			);
			if(isset($field['flex'])){
				$column['flex'] = 1;
			}
			$columns[] = (object)$column;
		}
		return $columns;
	}
    
    public static function createChartAxes(){
        $fields = static::fields();
        $axes = array();
        foreach($fields as $key=>$field){
            $ax =  $field['axes'];
            switch($field['type']){
                case 'date':
                case 'datetime':
                case 'time':
                case 'timestamp': $ax['type'] = 'Time'; break;
                default: $ax['type'] = 'Numeric'; break;
            }
            
            if(empty($ax['title']))$ax['title'] = $field['title'];
             
            
            
            $axes[] = (object)$ax;
        }
        return $axes;
    }

	function renderFields(){
		$fields = $this->fields();
		foreach($fields as $key=>$field){
			$this->addField($key, $field['type']);
			if($field['validators']){
				foreach($field['validators'] as $v){
					$this->addValidator($key, $v['validator'], $v['configs']);
				}
			}
		}
	}

	function addProxyUrl($route,$params=array(),$ampersand='&'){
		$this->proxyUrl = Yii::app()->createUrl(trim($route,'/'),$params,$ampersand);
	}
}