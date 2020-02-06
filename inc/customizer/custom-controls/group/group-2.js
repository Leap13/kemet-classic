(function ($) { 
    wp.customize.controlConstructor['kmt-group'] = wp.customize.Control.extend({

        ready: function () {

            var control = this,
                fields = control.params.group;

            _.each(fields, function (attr, index) {
                //console.log(fields_data);
                new_value = (wp.customize.control('astra-settings[' + attr.id + ']') ? wp.customize.control('astra-settings[' + attr.id + ']').params.value : '');
                var control = attr.type;
                var template_id = "customize-control-" + control + "-content";
                var template = wp.template(template_id);
                var value = new_value || attr.default;
                attr.value = value;
                
                var control_clean_name = attr.id.replace('[', '-');
                control_clean_name = control_clean_name.replace(']', '');

                fields_html += "<li id='customize-control-" + control_clean_name + "' class='customize-control customize-control-" + attr.type + "' >";
                fields_html += template(attr);
                fields_html += '</li>';

            });

            var result = new Object();

            result.controls = control_types;
            result.html = fields_html;

            console.log(fields_html);
        }
    });
 })(jQuery);