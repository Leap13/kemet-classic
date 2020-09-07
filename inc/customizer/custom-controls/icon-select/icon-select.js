/**
 * File icon-select.js
 *
 * Handles Icon Select
 *
 * @package Wiz
 */
wp.customize.controlConstructor['wiz-icon-select'] = wp.customize.Control.extend({

    ready: function () {

        'use strict';

        var control = this;

        // Change the value
        this.container.on('change', 'input', function () {
            control.setting.set(jQuery(this).val());
        });

    }

});