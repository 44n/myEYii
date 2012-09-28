/*!
 * Ext JS Library 4.0
 * Copyright(c) 2006-2011 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */

Ext.define('Desktop.Window', {
    extend: 'Ext.ux.desktop.Module',    
	
	id:'',
	specialId:'defult',	
	menuTitle: 'menuTitle',
	windowTitle: 'windowTitle',
	
	windowWidth: 740,
	windowHeight: 480,
	
	windowResizable: true,
	
	windowMaximizable: true,
	windowMinimizable: true,	
	windowClosable: true,
	
	windowModal: false,
	
	
	
	
	
	icon: '/ext/desktop/images/icons/default/16/application-blue.png',
	iconCls:'',

    init : function(){
		this.id = this.$className + "_" + this.specialId;
		this.launcher = {
            text: this.menuTitle,
            icon: this.icon
        };
		
		this.on({render: function(){alert(1);}});
    },

    createWindow : function(){
        var desktop = this.app.getDesktop();        
		var win = desktop.getWindow(this.id);
        if(!win){
            win = desktop.createWindow({
                id: this.id,
                title: this.windowTitle,
				menuTitle: this.menuTitle,
                
				icon: this.icon,
				iconCls:this.iconCls,
				
				width:this.windowWidth,
                height:this.windowHeight,
				
				resizable: this.windowResizable,
				maximizable: this.windowMaximizable,
				minimizable: this.windowMinimizable,
				closable: this.windowClosable,				
				
				modal: this.windowModal,
                
                animCollapse:false,
                border:false,
                constrainHeader:true,

                layout: 'fit',
                items: this.createBodyItems()
            });
        }
        return win;
    },
	
	createBodyItems: function(){
		return [];
	},
});
