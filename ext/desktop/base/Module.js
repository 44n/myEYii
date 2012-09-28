/*!
 * Ext JS Library 4.0
 * Copyright(c) 2006-2011 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */

Ext.define('Ext.ux.desktop.Module', {
    mixins: {
        observable: 'Ext.util.Observable'
    },
	
	isModule: true,

    constructor: function (app) {
		this.app = app;
        this.mixins.observable.constructor.call(this, {});
        this.init();
    },

    init: Ext.emptyFn
});
