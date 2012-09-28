<?
class BaseExtChart extends BaseExtClass{
    const StoreClass = "";
    function __construct($configs = array()){
        parent::__construct($configs);
        $this->extend = 'Ext.chart.Chart';
        $this->object->setValue('listeners',"{render: function(p){},delay: 50}",false);
        $this->constructor = "function(){this.callParent(arguments);this.on({render: function(grid){Ext.data.StoreManager.lookup(this.getStore()).load();}});}";

    }



    function render(){
        $storeClassConstruct = $this->initClass(static::StoreClass);
        $modelClass = $storeClassConstruct::ModelClass;
        $modelClassConstruct = $this->initClass($modelClass);

        $this->addRequire($modelClass);
        $this->addRequire(static::StoreClass);

        $this->store = static::StoreClass;
       /* $this->axes = call_user_func(array($modelClassConstruct, 'createChartAxes'));      */

        return parent::render();
    }
}