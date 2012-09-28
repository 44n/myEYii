/*!
 * Ext JS Library 4.0
 * Copyright(c) 2006-2011 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */

Ext.define('Desktop.App', {
    extend: 'Ext.ux.desktop.App',

    requires: [
        'Ext.window.MessageBox',

        'Ext.ux.desktop.ShortcutModel',        

		'Desktop.Window',
        'Desktop.Settings'
    ],
	
	userName: '',

    init: function() {
        // custom logic before getXYZ methods get called...

        this.callParent();

        // now ready...
    },
	
	openWindow:function(className, specialId){
		var me = this;
		var newClassName = "TMP_" + className + "_" + specialId;
		Ext.require(className);
		var body = {
			/*'extend': className,*/
			'specialId': specialId
		};
		
		Ext.define(newClassName, body, function(){
			console.log(this);
			var module = Ext.create(newClassName,me);
			var win = module.createWindow();	
			win.show();
		});
		
		/*var module = Ext.create(newClassName,me);*/
		
		/*var win = module.createWindow();	
		win.show();*/
	},
	
	getModules : function(){
        return [];
    }, 

    getDesktopConfig: function () {
        var me = this, ret = me.callParent();

        return Ext.apply(ret, {
            //cls: 'ux-desktop-black',

            contextMenuItems: [
                { text: 'Change Settings', handler: me.onSettings, scope: me }
            ],

            shortcuts: Ext.create('Ext.data.Store', {
                model: 'Ext.ux.desktop.ShortcutModel',
                data: [
                    /*{ name: 'shortcutName', iconCls: 'shortcutIcon', module: 'shortcutWindow' },*/                   
                ]
            }),

            wallpaper: '',
            wallpaperStretch: false
        });
    },

    // config for the start menu
    getStartConfig : function() {
        var me = this, ret = me.callParent();

        return Ext.apply(ret, {
            title: me.userName,
            iconCls: 'user',
            height: 300,
            toolConfig: {
                width: 100,
                items: [
                    {
                        text:'Settings',
                        iconCls:'settings',
                        handler: me.onSettings,
                        scope: me
                    },
                    '-',
                    {
                        text:'Logout',
                        iconCls:'logout',
                        handler: me.onLogout,
                        scope: me
                    }
                ]
            }
        });
    },

    getTaskbarConfig: function () {
        var ret = this.callParent();

        return Ext.apply(ret, {
            quickStart: [
                /*{ name: 'shortcutName', iconCls: 'shortcutIcon', module: 'shortcutWindow' },*/ 			
            ],
            trayItems: [
                { xtype: 'trayclock', flex: 1 }
            ]
        });
    },

    onLogout: function () {
        Ext.Msg.confirm('Logout', 'Are you sure you want to logout?');
    },

    onSettings: function () {
        var dlg = new Desktop.Settings({
            desktop: this.desktop
        });
        dlg.show();
    }
});
