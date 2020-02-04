/**
 * File group.js
 *
 * Handles Group
 *
 * @package Kemet
 */
(function ($) {

    
    var api = wp.customize;

    KmtGroupControl = {
        
        ready: function () {

            'use strict';

            var control = this;

            var values = api.get();

            _.each(values, function (value, id) {
                var sub_control = api.control(id);
                    
                if (control.hasChild(id)) {

                    control.getChlilderns(id);

                }                
            });
            
            
        },

        hasChild: function (control_id) {

            var check = false;

            if ('undefined' != typeof KmtGroups[control_id]) {
                check = true;
            }

            return check;
        },

        getChlilderns: function (parentControl) {
            var parentContainer = api.control(parentControl);
            var model = parentContainer.container.find('.kmt-group-model ul');
            var icon = parentContainer.container.find('.dashicons-edit');

            $.each(KmtGroups[parentControl], function (index, val) {
                var subControl = api.control(val).container;
                var attr_id = subControl.attr('id');
                var attr_class = subControl.attr('class');
                
                $($(subControl).children()).wrap("<li id='" + attr_id +"' class='" + attr_class +"'></li>");
                
                $(subControl).children().prependTo($(model));
                
            });
            
        },

        getControlId: function(control){

            var id = '#customize-control-' + control.replace(/\[/g, "-").replace(/\]/g, "");
            
            return id;
        }
    }
    $(function () { KmtGroupControl.ready(); });
})(jQuery);
