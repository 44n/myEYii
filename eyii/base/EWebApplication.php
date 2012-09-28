<?
class EWebApplication extends CWebApplication{
	public  $isAjax = false;
	public  $isExt = false;

	public function __construct($config=null){
		Yii::import('application.modules.user.models.*');
		Yii::import('application.modules.user.components.*');

	public function initExtLib(){

	public function getApplicationType(){

		if($this->isAjax){
			return 'ajax';
		}

		if($this->isExt){
			return 'ext';
		}

	}


	protected function registerCoreComponents(){
		parent::registerCoreComponents();

		$components = array(
			'request'=>array(
				'class'=>'EHttpRequest',
			),
			'image'=>array(
				'class'=>'eyii.extensions.image.CImageComponent',
				'driver'=>'GD',
				'params'=>array('directory'=>$this->runtimePath),
			),
			'errorHandler'=>array(
				'errorAction'=>'static/page/error',
			),
			'urlManager'=>array(
				'class'=>'EUrlManager',
				'urlFormat'=>'path',
				'showScriptName' => false,
				'caseSensitive' => false,
				'rules' => array(
					'' => 'page/static/showindex'
				),
			),
			'log'=>array(
				'class'=>'CLogRouter',
				'routes'=>array(
					array(
						'class'=>'CFileLogRoute',
						'levels'=>'error, warning',
					),
					// uncomment the following to show log messages on web pages
					/*
					array(
						'class'=>'CWebLogRoute',
					),
					*/
				),
			),
		);

		$this->setComponents($components);
	}