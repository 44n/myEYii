<?

class ErrorExtClass extends BaseExtWindow{	const ClassName = "EYii.ext.class.Error";
	function init(){		$this->menuTitle = "Error Window";
		$this->windowTitle = "Error Window";

		$this->addBodyItem("Ext.panel.Panel", (object)array("html"=>"Error - Window html"));	}}