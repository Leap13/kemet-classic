(function ($) { 
    wp.customize.controlConstructor['kmt-group'] = wp.customize.Control.extend({

        ready: function () {

            var control = this,
                fields_html = '';
                fields = control.params.group;

            _.each(fields, function (attr, index) {
                
                new_value = (wp.customize.control('kemet-settings[' + attr.id + ']') ? wp.customize.control('kemet-settings[' + attr.id + ']').params.value : '');
                var type = attr.type;
                var template_id = "customize-control-" + type + "-content";
                var template = wp.template(template_id);
                var value = new_value || attr.default;
                attr.value = value;
                var control_clean_name = attr.id.replace('[', '-');
                control_clean_name = control_clean_name.replace(']', '');
                fields_html += "<li id='customize-control-" + control_clean_name + "' class='customize-control customize-control-" + attr.type + "' >";
                fields_html += template(attr);
                fields_html += '</li>';

                control.container.find('.model-list').append(fields_html);

            });

            //console.log(fields_html);
        }
    });
 })(jQuery);