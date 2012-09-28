


Ext.define('Desktop.StartBlockMenu', {
    extend: 'Ext.ux.desktop.Module',
	
	isModule: false,
	
	menuTitle: "",
	
	icon: '/ext/desktop/images/icons/default/16/application-blue.png',
	iconCls:'',
	
	constructor: function (app) {
		this.app = app;
		this.mixins.observable.constructor.call(this, {});
        this.init();				
    },

    init : function() {
        this.launcher = {
            text: this.menuTitle,
            iconCls: this.iconCls,
			icon: this.icon,
            handler: function() {
                return false;
            },
            menu: {
                items: this.getItems()
            }
        };      
    },
	
	getModules:function(){return [];},
	

	
	getItems:function(){
		var me = this;
		var items = [];
		Ext.each(me.app.activateModules(me.getModules()), function (module) {
			module.app = me.app;
			if(module.isModule){
				var item = {
					text: module.menuTitle,
					iconCls:module.iconCls,
					icon:module.icon,
					handler : function(){				
						var win = this.createWindow();
						win.show();
					},
					scope: module,               
				};
				items.push(item);
			}else{
				items.push(module.launcher);
			}
			
        });
		return items;	
	}
});