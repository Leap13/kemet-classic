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

            var $this = this;

            var values = api.get();

            _.each(values, function (value, id) {
                                
                if ($this.hasChild(id)) {
                    
                    $this.getChlilderns(id);
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
            var $this = this;
            $.each(KmtGroups[parentControl] , function (index, val) {
                var subControlId = api.control(val);
                //Move Control Content To Group
                var subControl = api.control(val).container,
                    attr_class = 'sub-' + subControl.attr('class'),
                    attr_id = 'sub-' + subControl.attr('id');
                
                $($(subControl).children()).wrap("<li id='" + attr_id + "' class='" + attr_class + "' data-control='" + val + "'></li>");
                $(subControl).children().appendTo($(model));
                subControl.hide();

                switch (subControlId.params.type) {
                    
                    case 'kmt-responsive-slider':
                        
                        //Save Value on Input Change
                        $('.kmt-group-model ul li#' + attr_id).on('input change', 'input[type=range]', function () {
                            var value = jQuery(this).val(),
                                input_number = jQuery(this).closest('.input-field-wrapper').find('.kmt-responsive-range-value-input');
                            input_number.val(value);
                            $this.initResponsiveSlider('#' + attr_id , val);
                        });

                        // Save changes.
                        $('.kmt-group-model ul li#' + attr_id).on('input change', 'input[type=number]', function () {
                            var value = jQuery(this).val();
                            input_number = jQuery(this).closest('.input-field-wrapper').find('input[type=range]');
                            input_number.val(value);
                            $this.initResponsiveSlider('#' + attr_id, val);
                        });

                        //Get Unit Attrs
                        $('.kmt-group-model ul li#' + attr_id).on('click', '.kmt-slider-responsive-units .single-unit', function () {

                            var unit = jQuery(this);
                            var control = $('.kmt-group-model ul li#' + attr_id);
                            if (unit.hasClass('active')) {
                                return false;
                            }
                            var unit_value = unit.attr('data-unit'),
                                unit_min = unit.attr('data-min'),
                                unit_max = unit.attr('data-max'),
                                unit_step = unit.attr('data-step'),
                                device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');

                            unit.siblings().removeClass('active');
                            unit.addClass('active');
                            $(control).find('.input-field-wrapper.' + device + ' .kmt-responsive-range-' + device + '-input ,.input-field-wrapper.' + device + ' input[type=range]').attr('min', unit_min);
                            $(control).find('.input-field-wrapper.' + device + ' .kmt-responsive-range-' + device + '-input ,.input-field-wrapper.' + device + ' input[type=range]').attr('max', unit_max);
                            $(control).find('.input-field-wrapper.' + device + ' .kmt-responsive-range-' + device + '-input ,.input-field-wrapper.' + device + ' input[type=range]').attr('step', unit_step);
                            $(control).find('.input-field-wrapper.' + device + ' .kmt-responsive-range-' + device + '-input ,.input-field-wrapper.' + device + ' input[type=range]').val('');

                            $(control).find('.kmt-slider-unit-wrapper .kmt-slider-' + device + '-unit').val(unit_value);

                            // Update value on change.
                            $this.initResponsiveSlider('#' + attr_id, val);
                        });

                        $('.kmt-group-model ul li.sub-customize-control').find('.customize-control-notifications-container').remove();

                        $this.initResponsiveTrigger('.kmt-group-model ul li');

                        break;
                    case 'kmt-font-family': 

                        $('.kmt-group-model ul li#' + attr_id).find('select').selectWoo(
                            {
                                width: '100%'
                            }
                        );

                        $('.kmt-group-model ul li#' + attr_id).on('change', 'select', function () {
                            var select = $(this),
                                link = select.data('customize-setting-link'),
                                weight = select.data('connected-control');

                            var fontFamilyContainer = $('.kmt-group-model ul li#sub-' + api.control(link).container.attr('id'));
                            var fontWeightContainer = $('.kmt-group-model ul li#sub-' + api.control(weight).container.attr('id'));

                            $this.setFontWeightOptions(fontFamilyContainer, fontWeightContainer);
                            
                        });

                        
                        break;
                    case 'kmt-font-weight':

                        $('.kmt-group-model ul li#' + attr_id).find('select').each(function () {
                            var select = $(this),
                                weight = select.data('customize-setting-link'),
                                family = select.data('connected-control');

                            var fontFamilyContainer = $('.kmt-group-model ul li#sub-' + api.control(family).container.attr('id'));
                            var fontWeightContainer = $('.kmt-group-model ul li#sub-' + api.control(weight).container.attr('id'));

                            $this.setFontWeightOptions(fontFamilyContainer, fontWeightContainer);
                        });
                        
                        $('.kmt-group-model ul li#' + attr_id).on('change', 'select', function () {
                            var value = $(this).val();

                            api.control(val).setting.set(value);
                        });
                        break;
                    case 'kmt-responsive-slider':

                        // Save changes.
                        $('.kmt-group-model ul li#' + attr_id).on('input change', 'input[type=number]', function () {
                            var value = jQuery(this).val();
                            jQuery(this).closest('.wrapper').find('input[type=range]').val(value);
                            control.setting.set(value);
                        });

                        break;
                    case 'kmt-select':

                        $('.kmt-group-model ul li#' + attr_id).on('change', 'select', function () {
                            var value = $(this).val();

                            api.control(val).setting.set(value);
                        });

                        break;    
                           
                }
            });
            
            
        },
        setFontWeightOptions: function (select, fontWeightContainer){
            var i = 0,
                fontValue = select.find('select').val(),
                selected = '',
                weightSelect = $(fontWeightContainer).find('select'),
                currentWeightTitle = weightSelect.data('inherit'),
                weightValue = weightSelect.val(),
                inheritWeightObject = ['inherit'],
                weightObject = ['400', '600'],
                weightOptions = '',
                weightMap = kemetTypo;

                if (fontValue == 'inherit') {
                    weightValue = weightSelect.val();
                }
                var fontValue = KmtTypography._cleanGoogleFonts(fontValue);

                if (fontValue == 'inherit') {
                    weightObject = ['400', '500', '600', '700'];
                } else if ('undefined' != typeof KmtFontFamilies.system[fontValue]) {
                    weightObject = KmtFontFamilies.system[fontValue].weights;
                } else if ('undefined' != typeof KmtFontFamilies.google[fontValue]) {
                    weightObject = KmtFontFamilies.google[fontValue][0];
                    weightObject = Object.keys(weightObject).map(function (k) {
                        return weightObject[k];
                    });
                } else if ('undefined' != typeof KmtFontFamilies.custom[fontValue.split(',')[0]]) {
                    weightObject = KmtFontFamilies.custom[fontValue.split(',')[0]].weights;
                }

                weightObject = $.merge(inheritWeightObject, weightObject)
                weightMap['inherit'] = currentWeightTitle;
                for (; i < weightObject.length; i++) {

                    if (0 === i && -1 === $.inArray(weightValue, weightObject)) {
                        weightValue = weightObject[0];
                        selected = ' selected="selected"';
                    } else {
                        selected = weightObject[i] == weightValue ? ' selected="selected"' : '';
                    }
                    if ('undefined' != typeof weightMap[weightObject[i]]) {
                        weightOptions += '<option value="' + weightObject[i] + '"' + selected + '>' + weightMap[weightObject[i]] + '</option>';
                    }
                }

                weightSelect.html(weightOptions);
        },
        initResponsiveSlider: function( controlContainer , control ){

            'use strict';

            var newValue = {
                'desktop': '',
                'tablet': '',
                'mobile': '',
                'desktop-unit': 'px',
                'tablet-unit': 'px',
                'mobile-unit': 'px',
            };

            // Set the Slider container.
            $(controlContainer).find('.kmt-responsive-range-value-input').each(function () {
                var responsive_input = jQuery(this),
                    item = responsive_input.data('id'),
                    item_value = responsive_input.val();
                
                newValue[item] = item_value;

            });
            $(controlContainer).find('.kmt-slider-unit-wrapper .kmt-slider-unit-input').each(function () {
                var slider_unit = jQuery(this),
                    device = slider_unit.attr('data-device'),
                    device_val = slider_unit.val(),
                    name = device + '-unit';

                newValue[name] = device_val;
            });
            api.control(control).setting.set(newValue);
        },

        initResponsiveTrigger: function (wrap) {

            $(wrap).find('.kmt-responsive-control-btns button').on('click', function (event) {

                var device = jQuery(this).attr('data-device');
                if ('desktop' == device) {
                    device = 'tablet';
                } else if ('tablet' == device) {
                    device = 'mobile';
                } else {
                    device = 'desktop';
                }

                jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
            });

        },
        getControlId: function(control){

            var id = '#sub-customize-control-' + control.replace(/\[/g, "-").replace(/\]/g, "");
            
            return id;
        }
    }
    $(function () { KmtGroupControl.ready(); });
    $(function(){
        var modelButton = $('.model-button');
        $(modelButton).click(function(){
            $(this).toggleClass('open');
            $(this).parent().parent().parent().find('.kmt-group-model').toggleClass('open');
        });
    });
})(jQuery);
