<?
class EExtResponse{
		if(!empty($mes))$this->data['result']['msg'] = $mes;
		$this->data['result'] = (object)$this->data['result'];

	function data($data){

	function total($count){

	function render(){