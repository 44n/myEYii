<?
class PageExtModel extends BaseExtModel{	const ClassName = "EYii.page.model.Page";

	function init(){		$this->addProxyUrl('/page/static/edit');
	}

	public static function fields(){
		return array(
			'id' => array('type' => 'int', 'title' => 'ID'),
			'name' => array('type' => 'string', 'title' => 'Page Name', 'flex' => 1)
		);
	}
}