<?
class SortExtArray{	private $propertys = array();

	function setPropertys($propertys){		$this->propertys = $propertys;	}


	function sortCmp($a, $b){
		foreach($this->propertys as $property){			if($property['direction'] == "ASC"){				if(is_array($a)){					if($a[$property['property']] > $b[$property['property']]){						return 1;					}elseif($a[$property['property']] < $b[$property['property']]){						return -1;					}				}else{					if($a->$property['property'] > $b->$property['property']){
						return 1;
					}elseif($a->$property['property'] < $b->$property['property']){
						return -1;
					}				}			}else{				if(is_array($a)){
					if($a[$property['property']] > $b[$property['property']]){
						return -1;
					}elseif($a[$property['property']] < $b[$property['property']]){
						return 1;
					}
				}else{
					if($a->$property['property'] > $b->$property['property']){
						return -1;
					}elseif($a->$property['property'] < $b->$property['property']){
						return 1;
					}
				}			}		}

		return 0;	}}