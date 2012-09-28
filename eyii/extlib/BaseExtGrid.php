<?
class BaseExtGrid extends BaseExtClass{	const StoreClass = "";
	function __construct($configs = array()){
		parent::__construct($configs);
		$this->extend = 'Ext.grid.Panel';
		$this->loadMask = true;
		$this->object->setValue('listeners',"{render: function(p){},delay: 50}",false);
		$this->constructor = "function(){this.callParent(arguments);this.on({render: function(grid){Ext.data.StoreManager.lookup(this.getStore()).load();}});}";

	}


	/*
	bbar: Ext.create('Ext.PagingToolbar', {
            store: store,
            displayInfo: true,
            displayMsg: 'Displaying topics {0} - {1} of {2}',
            emptyMsg: "No topics to display",
            items:[
                '-', {
                text: 'Show Preview',
                pressed: pluginExpanded,
                enableToggle: true,
                toggleHandler: function(btn, pressed) {
                    var preview = Ext.getCmp('gv').getPlugin('preview');
                    preview.toggleExpanded(pressed);
                }
            }]
        })


	*/

	function initBbar(){
		/*$this->addRequire('Ext.PagingToolbar');*/

		/*$this->constructor = "function(){this.callParent(arguments);this.bbar = Ext.create('Ext.PagingToolbar',{store:'".static::StoreClass."',displayInfo:true,displayMsg: 'Displaying topics {0} - {1} of {2}',emptyMsg: 'No topics to display'});this.on({render: function(grid){Ext.data.StoreManager.lookup(this.getStore()).load();}});}";*/
		$this->bbar = (object)array(
				'xtype' => 'pagingtoolbar',
				'store' => static::StoreClass,
				'displayInfo' => true
		);

		/*$this->object->setFunc("bbar","Ext.create('Ext.PagingToolbar',{store:'".static::StoreClass."',displayInfo:true,displayMsg: 'Displaying topics {0} - {1} of {2}',emptyMsg: 'No topics to display'})");*/
	}

	function render(){		$storeClassConstruct = $this->initClass(static::StoreClass);
		$modelClass = $storeClassConstruct::ModelClass;
		$modelClassConstruct = $this->initClass($modelClass);

		$this->addRequire($modelClass);
		$this->addRequire(static::StoreClass);

		$this->store = static::StoreClass;
		$this->columns = call_user_func(array($modelClassConstruct, 'createGridColumns'));

		return parent::render();
	}}