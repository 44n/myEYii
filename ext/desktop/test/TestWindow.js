Ext.define('Test.TestWindow', {
    extend: 'Desktop.Window',

	requires: [
        'Ext.panel.Panel'
    ],
	
	specialId:'defult',	
	menuTitle: 'TestWindow',
	windowTitle: 'TestWindow - Testing functional',
	
	windowWidth: 800,
	windowHeight: 600,
	
	windowResizable: false,
	
	windowMaximizable: false,
	windowMinimizable: false,	
	windowClosable: false,
	windowModal: true,
	
	
	icon: '/ext/desktop/images/icons/default/16/application-blue.png',
	iconCls:'',

 
	createBodyItems: function(){
		return [
					Ext.create('Ext.panel.Panel', {
						html: 'Test text',
					})
		];
	},
});