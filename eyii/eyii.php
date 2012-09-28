<?
defined('EYII_PATH') or define('EYII_PATH',dirname(__FILE__));

require_once(EYII_PATH."/yii/yii.php");



		Yii::setPathOfAlias('eyii', EYII_PATH);
		Yii::import('eyii.base.*');
		Yii::import('eyii.models.*');
		Yii::import('eyii.components.*');
		Yii::import('eyii.helpers.*');




class EYii{
	public static function createWebApplication($config=null)
	{
		return Yii::createApplication('EWebApplication',$config);
	}

	public static function createWebAjaxApplication($config=null)
	{
		return Yii::createApplication('EWebAjaxApplication',$config);
	}

	public static function createWebExtApplication($config=null)
	{
		return Yii::createApplication('EWebExtApplication',$config);
	}

	public static function createConsoleApplication($config=null)
	{
		return Yii::createApplication('EConsoleApplication',$config);
	}
}