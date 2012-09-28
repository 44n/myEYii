<?
class ChartExtModel extends BaseExtModel{
	const ClassName = "EYii.chart.model.Chart";

	function init(){
		
	}

	public static function fields(){
		return array(
			'x' => array('type' => 'float', 'title' => 'X', 'axes'=> array('minimum' => 0, 'maximum' => 100, 'position' => 'left')),
			'y' => array('type' => 'float', 'title' => 'Y', 'axes'=> array('position' => 'bottom'))
		);
	}

}