<?
class EController extends Controller
{

	public function accessDenied($message=null)
	{
		Yii::app()->user->accessDenied($message);
	}

	public static function t($category, $message, $params=array(), $source=null, $language=null)
	{
		return Yii::t($category, $message, $params, $source, $language);
	}
}