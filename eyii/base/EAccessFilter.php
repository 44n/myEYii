<?php
/**
* Rights filter class file.
*
* @author Christoffer Niska <cniska@live.com>
* @copyright Copyright &copy; 2010 Christoffer Niska
* @since 0.7
*/
class EAccessFilter extends CFilter
{
	private $_allow = array();

	/**
	* Performs the pre-action filtering.
	* @param CFilterChain $filterChain the filter chain that the filter is on.
	* @return boolean whether the filtering process should continue and the action
	* should be executed.
	*/
	protected function preFilter($filterChain)
	{
		if($this->_allow === 'all')return true;

		$controller = $filterChain->controller;
		$action = $filterChain->action;

		if(in_array($action->id, $this->_allow))return true;

		$user = Yii::app()->getUser();

		if( ($module = $controller->getModule())!==null )
			$item = ucfirst($module->id).'.';
		else
			$item = '';

		$item .= ucfirst($controller->id);
		if($user->checkAccess($item.'.*'))return true;

		$item .= ucfirst($action->id);
		if($user->checkAccess($item.'.'.ucfirst($action->id)))return true;

		$user->accessDenied();
		return false;
	}

	/**
	* Sets the allowed actions.
	*/
	public function setAllow($actions)
	{
		$this->_allow = $actions;
	}
}
