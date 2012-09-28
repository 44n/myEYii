<?
class ChartExtChart extends BaseExtChart{
	const ClassName = "EYii.chart.chart.Chart";
	const StoreClass = "EYii.chart.store.Chart";

	function init(){
        $axes = array(
            (object)array(
                'type' => 'Numeric',
                'position' => 'bottom',
                'fields' => array('x'),
                'title' => 'Line X',
                'minimum' => 0,
 

            ),
            (object)array(
                'type' => 'Numeric',
                'position' => 'left',
                'fields' => array('y'),
                'title' => 'Line Y',
                'minimum' => 0,

            )
        );
       $this->axes=$axes; 
       
       $series = array(
            (object)array(
                'type' => 'line',
                'xField' => 'x',
                'yField' => 'y'
            )
       );
       $this->series=$series;
    
	}
}