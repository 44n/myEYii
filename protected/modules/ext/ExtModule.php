<?
class ExtModule extends EWebModule{
	public function init(){
		Yii::app()->initExtLib();
		$this->setImport(array(
			'ext.models.*',
			'ext.components.*',
		));
	}
}