<?
class SortExtArray{

	function setPropertys($propertys){


	function sortCmp($a, $b){
		foreach($this->propertys as $property){
						return 1;
					}elseif($a->$property['property'] < $b->$property['property']){
						return -1;
					}
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
				}

		return 0;