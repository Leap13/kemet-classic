import GroupComponent from './group-component';
import ResponsiveSliderComponent from '../responsive-slider/responsive-slider-component';
import ResponsiveSpacingComponent from '../responsive-spacing/responsive-spacing-component';
import SliderComponent from '../slider/slider-component';
import Background from '../Background/background-component';
import ColorComponent from '../color/color-component';
import ResponsiveColorComponent from '../responsive-color/responsive-color-component';

import {
    kemetGetResponsiveColorJs,
    kemetGetResponsiveSliderJs,
    kemetGetResponsiveSpacingJs
} from '../common/responsive-helper';

export const GroupControl = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<GroupComponent control={control} />, control.container[0]);
    },
    ready: function () {
        'use strict';

        var control = this;

        control.registerToggleEvents();
        this.container.on('kmt_settings_changed', control.onOptionChange);

        var lkmt_scroll_top = 0;
        var parentSection = jQuery('.wp-full-overlay-sidebar-content');
        var browser = navigator.userAgent.toLowerCase();
        if (!(browser.indexOf('firefox') > -1)) {
            var parent_width_remove = 6;
        } else {
            var parent_width_remove = 16;
        }

        jQuery('#customize-controls .wp-full-overlay-sidebar-content .control-section').on('scroll', function (event) {
            var $this = jQuery(this);
            // Run sticky js for only open section.
            if ($this.hasClass('open')) {
                var section_title = $this.find('.customize-section-title');
                var scroll_top = $this.scrollTop();
                if (scroll_top > lkmt_scroll_top) {
                    // On scroll down, remove sticky section title.
                    section_title.removeClass('maybe-sticky').removeClass('is-in-view').removeClass('is-sticky');
                    $this.css('padding-top', '');
                } else {
                    // On scroll up, add sticky section title.
                    var parent_width = $this.outerWidth();
                    section_title.addClass('maybe-sticky').addClass('is-in-view').addClass('is-sticky').width(parent_width - parent_width_remove).css('top', parentSection.css('top'));
                    if (!(browser.indexOf('firefox') > -1)) {
                        $this.css('padding-top', section_title.height());
                    }
                    if (scroll_top === 0) {
                        // Remove sticky section heading when scrolled to the top.
                        section_title.removeClass('maybe-sticky').removeClass('is-in-view').removeClass('is-sticky');
                        $this.css('padding-top', '');
                    }
                }
                lkmt_scroll_top = scroll_top;
            }
        });
    },
    registerToggleEvents: function () {

        var control = this;

        /* Close popup when click outside anywhere outside of popup */
        jQuery('.wp-full-overlay-sidebar-content, .wp-picker-container').click(function (e) {
            if (!jQuery(e.target).closest('.kmt-field-settings-modal').length) {
                jQuery('.kmt-adv-toggle-icon.open').trigger('click');
            }
        });

        control.container.on('click', '.kmt-toggle-desc-wrap .kmt-adv-toggle-icon', function (e) {

            e.preventDefault();
            e.stopPropagation();

            var $this = jQuery(this);

            var parent_wrap = $this.closest('.customize-control-kmt-settings-group');
            var is_loaded = parent_wrap.find('.kmt-field-settings-modal').data('loaded');
            var parent_section = parent_wrap.parents('.control-section');

            if ($this.hasClass('open')) {
                parent_wrap.find('.kmt-field-settings-modal').hide();
            } else {
                /* Close popup when another popup is clicked to open */
                var get_open_popup = parent_section.find('.kmt-adv-toggle-icon.open');
                if (get_open_popup.length > 0) {
                    get_open_popup.trigger('click');
                }
                if (is_loaded) {
                    parent_wrap.find('.kmt-field-settings-modal').show();
                } else {
                    var fields = control.params.fields;

                    var $modal_wrap = "</div></div>";;

                    parent_wrap.find('.kmt-field-settings-wrap').append($modal_wrap);
                    parent_wrap.find('.kmt-fields-wrap').attr('data-control', control.params.id);
                    control.kmt_render_field(parent_wrap, fields, control);

                    parent_wrap.find('.kmt-field-settings-modal').show();

                    var device = jQuery("#customize-footer-actions .active").attr('data-device');

                    if ('mobile' == device) {
                        jQuery('.kmt-responsive-btns .mobile, .kmt-responsive-slider-btns .mobile').addClass('active');
                        jQuery('.kmt-responsive-btns .preview-mobile, .kmt-responsive-slider-btns .preview-mobile').addClass('active');
                    } else if ('tablet' == device) {
                        jQuery('.kmt-responsive-btns .tablet, .kmt-responsive-slider-btns .tablet').addClass('active');
                        jQuery('.kmt-responsive-btns .preview-tablet, .kmt-responsive-slider-btns .preview-tablet').addClass('active');
                    } else {
                        jQuery('.kmt-responsive-btns .desktop, .kmt-responsive-slider-btns .desktop').addClass('active');
                        jQuery('.kmt-responsive-btns .preview-desktop, .kmt-responsive-slider-btns .preview-desktop').addClass('active');
                    }
                }
            }

            $this.toggleClass('open');

        });

        control.container.on("click", ".kmt-toggle-desc-wrap > .customizer-text", function (e) {

            e.preventDefault();
            e.stopPropagation();

            jQuery(this).find('.kmt-adv-toggle-icon').trigger('click');
        });
    },
    kmt_render_field: function (wrap, fields, control_elem) {
        var control = this;
        var kmt_field_wrap = wrap.find('.kmt-fields-wrap');
        var fields_html = '';
        var control_types = [];
        var field_values = control.isJsonString(control_elem.params.value) ? JSON.parse(control_elem.params.value) : {};

        if ('undefined' != typeof fields) {
            var clean_param_name = control_elem.params.id.replace('[', '-'),
                clean_param_name = clean_param_name.replace(']', '');

            fields_html += '<div id="' + clean_param_name + '-tabs" class="kmt-group-tabs">';
            fields_html += '<ul class="kmt-group-list">';
            var counter = 0,
                tabs_counter = 0,
                tab_key = '',
                li_class = '';

            _.each(fields, function (value, key) {

                switch (counter) {
                    case 0:
                        li_class = 'active';
                        tab_key = 'normal';
                        break;
                    case 1:
                        tab_key = 'hover';
                        break;
                    default:
                        tab_key = 'active';
                }

                fields_html += '<li class="' + li_class + '"><a href="#tab-' + tab_key + '"><span>' + key + '</span></a></li>';
                counter++;
            });

            fields_html += '</ul>';

            fields_html += '<div class="kmt-tab-content" >';

            _.each(fields, function (fields_data, key) {

                switch (tabs_counter) {
                    case 0:
                        li_class = 'active';
                        tab_key = 'normal';
                        break;
                    case 1:
                        tab_key = 'hover';
                        break;
                    default:
                        tab_key = 'active';
                }

                fields_html += '<div id="tab-' + tab_key + '" class="tab">';

                var result = control.generateFieldHtml(fields_data, field_values);

                fields_html += result.html;

                _.each(result.controls, function (control_value, control_key) {
                    control_types.push({
                        key: control_value.key,
                        value: control_value.value,
                        name: control_value.name
                    });
                });

                fields_html += '</div>';
                tabs_counter++;
            });

            fields_html += '</div></div>';

            kmt_field_wrap.html(fields_html);

            control.renderReactControl(fields, control);

            jQuery("#" + clean_param_name + "-tabs").tabs();

        } else {

            var result = control.generateFieldHtml(fields, field_values);

            fields_html += result.html;

            _.each(result.controls, function (control_value, control_key) {
                control_types.push({
                    key: control_value.key,
                    value: control_value.value,
                    name: control_value.name
                });
            });

            kmt_field_wrap.html(fields_html);

            control.renderReactControl(fields, control);
        }

        _.each(control_types, function (control_type, index) {

            switch (control_type.key) {

                case "kmt-color":
                    kemetGetColor("#customize-control-" + control_type.name)
                    break;
                case "kmt-background":
                    kemetGetBackground("#customize-control-" + control_type.name)
                    break;
                case "kmt-responsive-background":
                    kemetGetResponsiveBgJs(control, "#customize-control-" + control_type.name)
                    break;
                case "kmt-responsive-color":
                    kemetGetResponsiveColorJs(control, "#customize-control-" + control_type.name)
                    break;
                case "kmt-responsive":
                    kemetGetResponsiveJs(control)
                    break;
                case "kmt-responsive-slider":
                    kemetGetResponsiveSliderJs(control)
                    break;
                case "kmt-responsive-spacing":
                    kemetGetResponsiveSpacingJs(control)
                    break;
                case "kmt-font":

                    var googleFontsString = kemet.customizer.settings.google_fonts;
                    control.container.find('.kmt-font-family').html(googleFontsString);

                    control.container.find('.kmt-font-family').each(function () {
                        var selectedValue = jQuery(this).data('value');
                        jQuery(this).val(selectedValue);

                        var optionName = jQuery(this).data('name');

                        // Set inherit option text defined in control parameters.
                        jQuery("select[data-name='" + optionName + "'] option[value='inherit']").text(jQuery(this).data('inherit'));

                        var fontWeightContainer = jQuery(".kmt-font-weight[data-connected-control='" + optionName + "']");
                        var weightObject = AstTypography._getWeightObject(AstTypography._cleanGoogleFonts(selectedValue));

                        control.generateDropdownHtml(weightObject, fontWeightContainer);
                        fontWeightContainer.val(fontWeightContainer.data('value'));

                    });

                    control.container.find('.kmt-font-family').selectWoo();
                    control.container.find('.kmt-font-family').on('select2:select', function () {

                        var value = jQuery(this).val();
                        var weightObject = AstTypography._getWeightObject(AstTypography._cleanGoogleFonts(value));
                        var optionName = jQuery(this).data('name');
                        var fontWeightContainer = jQuery(".kmt-font-weight[data-connected-control='" + optionName + "']");

                        control.generateDropdownHtml(weightObject, fontWeightContainer);

                        var font_control = jQuery(this).parents('.customize-control').attr('id');
                        font_control = font_control.replace('customize-control-', '');

                        control.container.trigger('kmt_settings_changed', [control, jQuery(this), value, font_control]);

                        var font_weight_control = fontWeightContainer.parents('.customize-control').attr('id');
                        font_weight_control = font_weight_control.replace('customize-control-', '');

                        control.container.trigger('kmt_settings_changed', [control, fontWeightContainer, fontWeightContainer.val(), font_weight_control]);

                    });

                    control.container.find('.kmt-font-weight').on('change', function () {

                        var value = jQuery(this).val();

                        name = jQuery(this).parents('.customize-control').attr('id');
                        name = name.replace('customize-control-', '');

                        control.container.trigger('kmt_settings_changed', [control, jQuery(this), value, name]);
                    });

                    break;
            }

        });

        wrap.find('.kmt-field-settings-modal').data('loaded', true);

    },
    getJS: function (control) {

    },
    generateFieldHtml: function (fields_data, field_values) {

        var fields_html = '';
        var control_types = [];




        var new_value = (wp.customize.control('kemet-settings' + fields_data.id + '') ? wp.customize.control('kemet-settings' + fields_data.id + '').params.value : '');
        var control = fields_data.control_type;

        var template_id = "customize-control-" + control + "-content";

        var template = wp.template(template_id);

        var value = new_value || fields_data.default;
        fields_data.value = value;
        var dataAtts = '';
        var input_attrs = '';

        fields_data.label = fields_data.label;

        // Data attributes.
        _.each(fields_data.data_attrs, function (value, name) {
            dataAtts += " data-" + name + " ='" + value + "'";
        });

        // Input attributes
        _.each(fields_data.input_attrs, function (value, name) {
            input_attrs += name + '="' + value + '" ';
        });

        fields_data.dataAttrs = dataAtts;
        fields_data.inputAttrs = input_attrs;

        control_types.push({
            key: control,
            value: value,
            name: fields_data.type
        });



        var control_clean_name = fields_data.type.replace('[', '-');
        control_clean_name = control_clean_name.replace(']', '');

        fields_html += "<li id='customize-control-" + control_clean_name + "' class='customize-control customize-control-" + fields_data.control_type + "' >";

        if (jQuery('#tmpl-' + template_id).length) {
            fields_html += template(fields_data);
        }

        fields_html += '</li>';



        var result = new Object();

        result.controls = control_types;
        result.html = fields_html;

        return result;
    },

    generateDropdownHtml: function (weightObject, element) {

        var currentWeightTitle = element.data('inherit');
        var weightOptions = '';
        var inheritWeightObject = ['inherit'];
        var counter = 0;
        var weightObject = jQuery.merge(inheritWeightObject, weightObject);
        var weightValue = element.val() || '400';
        var selected = '';
        kemetTypo['inherit'] = currentWeightTitle;

        for (; counter < weightObject.length; counter++) {

            if (0 === counter && -1 === jQuery.inArray(weightValue, weightObject)) {
                weightValue = weightObject[0];
                selected = ' selected="selected"';
            } else {
                selected = weightObject[counter] == weightValue ? ' selected="selected"' : '';
            }
            if (!weightObject[counter].includes("italic")) {
                weightOptions += '<option value="' + weightObject[counter] + '"' + selected + '>' + kemetTypo[weightObject[counter]] + '</option>';
            }
        }

        element.html(weightOptions);
    },

    onOptionChange: function (e, control, element, value, name) {

        var control_id = jQuery('.hidden-field-kemet-settings-' + name);
        control_id.val(value);
        let sub_control = wp.customize.control("kemet-settings[" + name + "]");
        sub_control.setting.set(value);
    },

    isJsonString: function (str) {

        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    },
    getFinalControlObject: function (attr, controlObject) {
        if (undefined !== attr.choices && undefined === controlObject.params['choices']) {
            controlObject.params['choices'] = attr.choices;
        }
        if (undefined !== attr.inputAttrs && undefined === controlObject.params['inputAttrs']) {
            controlObject.params['inputAttrs'] = attr.inputAttrs;
        }
        if (undefined !== attr.link && undefined === controlObject.params['link']) {
            controlObject.params['link'] = attr.link;
        }
        if (undefined !== attr.units && undefined === controlObject.params['units']) {
            controlObject.params['units'] = attr.units;
        }
        if (undefined !== attr.linked_choices && undefined === controlObject.params['linked_choices']) {
            controlObject.params['linked_choices'] = attr.linked_choices;
        }
        if (undefined !== attr.title && (undefined === controlObject.params['label'] || '' === controlObject.params['label'] || null === controlObject.params['label'])) {
            controlObject.params['label'] = attr.title;
        }
        if (undefined !== attr.responsive && (undefined === controlObject.params['responsive'] || '' === controlObject.params['responsive'] || null === controlObject.params['responsive'])) {
            controlObject.params['responsive'] = attr.responsive;
        }
        if (undefined !== attr.renderAs && (undefined === controlObject.params['renderAs'] || '' === controlObject.params['renderAs'] || null === controlObject.params['renderAs'])) {
            controlObject.params['renderAs'] = attr.renderAs;
        }

        return controlObject;
    },
    renderReactControl: function (fields, control) {

        const reactControls = {
            'kmt-background': Background,
            'kmt-responsive-color': ResponsiveColorComponent,
            'kmt-color': ColorComponent,
            'kmt-responsive-slider': ResponsiveSliderComponent,
            'kmt-responsive-spacing': ResponsiveSpacingComponent,

        };



        if ('undefined' != typeof fields) {

            _.each(fields, function (fields_data, key) {
                console.log(fields, fields_data, 'fieeeeeeeelds')

                if ('kmt-font' !== fields_data.control_type) {
                    var control_clean_name = fields_data.id.replace('[', '-');
                    control_clean_name = control_clean_name.replace(']', '');
                    console.log(control_clean_name)
                    var selector = '.customize-control-kmt-group' + control_clean_name;
                    console.log(selector, "selectooooooooor")
                    var controlObject = wp.customize.control('kemet-settings' + fields_data.id + '');
                    controlObject = control.getFinalControlObject(fields_data, controlObject);
                    const ComponentName = reactControls[fields_data.control_type];
                    ReactDOM.render(

                        <ComponentName control={controlObject} customizer={wp.customize} />,


                    );
                }


            });
        } else {

            _.each(fields, function (attr, index) {

                if ('kmt-font' !== attr.control_type) {

                    var control_clean_name = attr.id.replace('[', '-');
                    control_clean_name = control_clean_name.replace(']', '');
                    var selector = '#customize-control-' + control_clean_name;
                    var controlObject = wp.customize.control('kemet-settings' + attr.id + '');
                    controlObject = control.getFinalControlObject(attr, controlObject);
                    const ComponentName = reactControls[attr.control_type];
                    ReactDOM.render(
                        <ComponentName control={controlObject} customizer={wp.customize} />
                    );
                }
            });
        }
    }
});