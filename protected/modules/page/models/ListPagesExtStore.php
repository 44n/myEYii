<?
class ListPagesExtStore extends BaseExtStore{	const ClassName = "EYii.page.store.ListPages";
	const ModelClass = 'EYii.page.model.Page';
	function init(){
		$this->pageSize = "50";
		$this->addProxyUrl('/page/static/list');
	}

}