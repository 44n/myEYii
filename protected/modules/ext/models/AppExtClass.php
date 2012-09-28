<?
class AppExtClass extends BaseExtClass{
	function init(){
		if(empty($this->configs['shortcuts']))$this->configs['shortcuts'] = array();

		$this->extend = "Desktop.App";
		if(!empty($this->configs['modules']))$this->requires = $this->configs['modules'];

		$this->userName = $this->configs['userName'];

		if(!empty($this->configs['wallpaper'])){
			$this->wallpaperStretch = $this->configs['wallpaper']['stretch'];
		}

		$this->getModules = "function(){".
		"return ".CJSON::encode($this->configs['modules']).";".
		"}";

		$this->getShortcuts = "function(){".
		"return ".CJSON::encode($this->configs['shortcuts']).";".
		"}";