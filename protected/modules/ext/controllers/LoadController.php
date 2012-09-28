<?
class LoadController extends EController{


	function renderClass($name, $configs = array()){
		$classConstruct = BaseExtClass::initClass($name);
		if($classConstruct === false)return false;

		$class = new $classConstruct($configs);
		$class->init();

		return $class->render();
	}


	public function actionDesktop(){
		$configs['modules'] = array("EYii.ext.class.Error","EYii.page.class.ListPages","EYii.chart.class.Chart");
		$configs['userName'] = "some User";
		$configs['shortcuts'] = array();

		echo $this->renderClass("EYii.ext.class.App", $configs);
	}

	public function missingAction(){
		$route = Yii::app()->getUrlManager()->parseUrl(Yii::app()->getRequest());

		$thisRoute = $this->getRoute();
		$ost = str_ireplace($thisRoute."/","", $route);

		$ost = trim($ost);
		$class = substr($ost,0, -3);


		$class = str_replace("/",".",$class);
		$class = "EYii.".$class;
		echo $this->renderClass($class, $configs);
	}
}