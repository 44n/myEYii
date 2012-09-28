<?
class StaticController extends EController{
	public function actionShow(){
		/*
        echo "test";
        
		echo "<br>";
		echo "scriptUrl: ".Yii::app()->getRequest()->RequestUri;
		echo "<br>";
		echo "ScriptFile: ".Yii::app()->getRequest()->ScriptFile;
		echo "<br>";
		echo "ScriptUrl: ".Yii::app()->getRequest()->ScriptUrl;*/
	}

	public function actionShowIndex(){
		echo "Index";
		echo "<br>";
		$this->actionShow();
	}

	public function actionEdit(){
		if(Yii::app()->isExt){
			var_export($_REQUEST);
		}
	}

	public function actionList(){
		if(Yii::app()->isExt){
			if(empty($_SESSION['data'])){
			}
			$count = 1000;
			$data = array();
			for ($i=1; $i<=$count; $i++) {
				$data[] = array('id' => $i, 'name' => "some text ".$i);
			}

			$response = new EExtResponse;
			$response->result(true);


			if(isset($_REQUEST['sort'])){
				$sort = new SortExtArray;
				$sort->setPropertys(CJSON::decode($_REQUEST['sort']));
				usort($data , array($sort,'sortCmp'));
			}

			$data = array_slice($data,$_REQUEST['start'], $_REQUEST['limit']);



			$response->total($count);

			$response->data($data);

			echo $response->render();



			/*var_export($_REQUEST);*/
		}
	}
}