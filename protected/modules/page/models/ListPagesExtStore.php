<?
class ListPagesExtStore extends BaseExtStore{
	const ModelClass = 'EYii.page.model.Page';
	function init(){
		$this->pageSize = "50";
		$this->addProxyUrl('/page/static/list');
	}

