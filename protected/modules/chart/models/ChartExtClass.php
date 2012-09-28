<?
    class ChartExtClass extends BaseExtWindow{
        const ClassName = "EYii.chart.class.Chart";
        function init(){
            $this->menuTitle = "chart";
            $this->windowTitle = "chartTitle";
            

            $this->addBodyItem("EYii.chart.chart.Chart");


        }
    }