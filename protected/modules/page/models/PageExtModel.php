<?
class PageExtModel extends BaseExtModel{

	function init(){
	}

	public static function fields(){
		return array(
			'id' => array('type' => 'int', 'title' => 'ID'),
			'name' => array('type' => 'string', 'title' => 'Page Name', 'flex' => 1)
		);
	}
