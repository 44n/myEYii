<?
class EHttpRequest extends CHttpRequest{	private $_requestUri;

	public function getRequestUri(){
		if($this->_requestUri!==null)return $this->_requestUri;
		$this->_requestUri = parent::getRequestUri();
		if(!Yii::app()->isWeb){
			if(Yii::app()->isAjax){
				$this->_requestUri = substr($this->_requestUri,5);
			}elseif(Yii::app()->isExt){
				$this->_requestUri = substr($this->_requestUri,6);
			}
		}
		return $this->_requestUri;
	}
}
