<?

class ErrorExtClass extends BaseExtWindow{
	function init(){
		$this->windowTitle = "Error Window";

		$this->addBodyItem("Ext.panel.Panel", (object)array("html"=>"Error - Window html"));