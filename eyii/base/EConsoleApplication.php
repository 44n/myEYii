<?
class EConsoleApplication extends CConsoleApplication{
	public  $isWeb = false;
	public  $isAjax = false;
	public  $isExt = false;

	public function __construct($config=null){
		parent::__construct($config);
		Yii::setPathOfAlias('configs', Yii::getPathOfAlias('application.config'));
		Yii::import('application.modules.user.models.*');
		Yii::import('application.modules.user.components.*');
	}

	protected function registerCoreComponents(){
		parent::registerCoreComponents();

		$components = array(
			'image'=>array(
				'class'=>'eyii.extensions.image.CImageComponent',
				'driver'=>'GD'
			),
		);

		$this->setComponents(EYii::arrayCoreComponents('console'));
	}}