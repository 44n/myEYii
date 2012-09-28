<?php
    class DataController extends EController{
        public function actionLoad(){
            if(Yii::app()->isExt){
                $x = 0;
                for($i=1;$i<=100;$i++){
                    $s = $i/10;
                    $x = $s*$s;
                    
                    $data[] = array('x'=>$x,'y'=>$i );    
                    
                }
                                
                $respons = new EExtResponse;
                $respons->result(true);
                $respons->data($data);
                echo $respons->render();
            }
            if(Yii::app()->isAjax){
                echo 'Ajax';    
            }
            if(Yii::app()->isWeb){
                echo 'Web';    
            }
        }
    }