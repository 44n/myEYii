<?
class EExtResponse{	private $data = array();	function result($val, $mes = ""){		$this->data['result']['success'] = $val;
		if(!empty($mes))$this->data['result']['msg'] = $mes;
		$this->data['result'] = (object)$this->data['result'];	}

	function data($data){		$this->data['data'] = $data;	}

	function total($count){		$this->data['total'] = $count;	}

	function render(){		return CJSON::encode($this->data);	}}