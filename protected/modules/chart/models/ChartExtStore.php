<?
class ChartExtStore extends BaseExtStore{
	const ClassName = "EYii.chart.store.Chart";
	const ModelClass = 'EYii.chart.model.Chart';
	function init(){
		$this->addProxyUrl('/chart/data/load');
	}


}