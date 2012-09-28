<?php

class SectionController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';
    
    public function allowedActions(){
    
        return array('createsubsection');
    }
    
    
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($parent = 0)
    {
        $model=new SectionModel;
        $model->parent_id = $parent;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['SectionModel']))
        {
            $model->attributes=$_POST['SectionModel'];
            
            if($model->save()){
                if($model->parent_id ==0)
                $this->redirect('index');
                $this->redirect(array('view','id'=>$model->parent_id));
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }
    
   
   

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['SectionModel']))
        {
            $model->attributes=$_POST['SectionModel'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {   $this->actionAdmin();
    
     /*
        $dataProvider=new CActiveDataProvider('SectionModel');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));*/
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new SectionModel('search');
        $model->unsetAttributes();  // clear any default values
        $model->parent_id = 0;
        if(isset($_GET['SectionModel']))
            $model->attributes=$_GET['SectionModel'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model=SectionModel::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='section-model-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
