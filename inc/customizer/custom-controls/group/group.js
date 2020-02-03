/**
 * File group.js
 *
 * Handles Group
 *
 * @package Kemet
 */
(function ($) {

    
    var api = wp.customize;
    
    wp.customize.controlConstructor['kmt-group'] = wp.customize.Control.extend({
        
        ready: function () {

            'use strict';

            var control = this;

            control.getChlilderns();

        },

        hasChild: function () {

            var check = false;

            var control = this;

            if (!_.isUndefined(KmtGroups[control.id])) {
                check = true;
            }

            return check;
        },

        getChlilderns: function () {

            var control = this;
            var test = api.get();
            var model = control.container.find('.kmt-group-model');

            $.each(KmtGroups[control.id], function (index , val) {
                
                var parentControl = control.getControlId(val);

                //api.control(val).container.prependTo($(model))
                //api.control(val).container.find('div').hide();
                //api.control(val).container.remove();
                console.log();
            });
        },

        getControlId: function(control){

            var id = '#customize-control-' + control.replace(/\[/g, "-").replace(/\]/g, "");
            
            return id;
        }
    });

})(jQuery);
