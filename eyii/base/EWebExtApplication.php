<?
class EWebExtApplication extends EWebApplication{
	public  $isAjax = false;
	public  $isExt = true;

	public function __construct($config=null){
		parent::__construct($config);
		$this->initExtLib();
	}
