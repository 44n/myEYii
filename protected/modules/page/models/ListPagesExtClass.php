<?

class ListPagesExtClass extends BaseExtWindow{	const ClassName = "EYii.page.class.ListPages";
	function init(){
		$this->menuTitle = "Static Pages";
		$this->windowTitle = "List Static Pages";

		/*$modelClassConstruct = $this->initClass('EYii.page.model.ListPages');
		$columns = call_user_func(array($modelClassConstruct, 'createGridColumns'), $modelClassConstruct);*/

		$this->addBodyItem("EYii.page.grid.ListPages");

		/*$this->addBodyItem("Ext.grid.Panel", (object)array(
			'store' => 'EYii.page.store.ListPages',
			'columns' => $columns
		));*/
	}
}