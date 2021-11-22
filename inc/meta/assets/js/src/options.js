import {
    useEffect, useContext
} from '@wordpress/element'
import OptionsContext from './store/options-context';
import kmtEvents from '../../../../react-options/src/common/events';

export const isDisplay = (rules) => {
    const { values } = useContext(OptionsContext);
    if (!values) {
        return;
    }
    var relation = undefined != rules.relation ? rules.relation : "AND",
        isVisible = "AND" === relation ? true : false;
    _.each(rules, function (rule, ruleKey) {
        if ("relation" == ruleKey) {
            return;
        }
        var boolean = false,
            operator = undefined != rule.operator ? rule.operator : "=",
            ruleValue = rule.value;
        var settingValue = values[rule.setting];
        switch (operator) {
            case "in_array":
                boolean = ruleValue.includes(settingValue);
                break;

            case "contain":
                boolean = settingValue.includes(ruleValue);
                break;

            case ">":
                boolean = settingValue > ruleValue;
                break;

            case "<":
                boolean = settingValue < ruleValue;
                break;

            case ">=":
                boolean = settingValue >= ruleValue;
                break;

            case "<=":
                boolean = settingValue <= ruleValue;
                break;

            case "not_empty":
                boolean =
                    typeof settingValue !== "undefined" &&
                    undefined !== settingValue &&
                    null !== settingValue &&
                    "" !== settingValue;
                break;

            case "!=":
                boolean = settingValue !== ruleValue;
                break;

            default:
                boolean = settingValue == ruleValue;
                break;
        }
        isVisible =
            "OR" === relation ? isVisible || boolean : isVisible && boolean;
    });

    return isVisible;
};

const SingleOptionComponent = ({ optionId, option }) => {
    const { values, onChange } = useContext(OptionsContext);
    const value = values[optionId];
    const { OptionComponent } = window.KmtOptionComponent;
    const Option = OptionComponent(option.type);

    return option.type && <div id={optionId} className={`customize-control-${option.type}`}>
        <Option id={optionId} value={value} params={option} onChange={(newVal) => {
            onChange(newVal, optionId)
        }} />
    </div>;
}

const RenderOptions = ({ options }) => {
    return Object.keys(options).map((optionId) => {
        let option = options[optionId];
        let isVisible = option.context ? isDisplay(option.context) : true;

        return isVisible && <SingleOptionComponent optionId={optionId} option={option} key={optionId} />;
    })
}

export const OptionsComponent = ({ options }) => {
    useEffect(() => {
        kmtEvents.trigger("KemetInitOptionsMeta");
    }, []);
    return <div className="kmt-options">
        <RenderOptions options={options} />
    </div>
}

kmtEvents.on("KemetInitOptionsMeta", () => {
    kemetGetResponsiveJs();
    jQuery(document).mouseup(function (e) {
        var container = jQuery(document);
        var colorWrap = container.find('.kemet-color-picker-wrap');
        var resetBtnWrap = container.find('.kmt-color-btn-reset-wrap');

        // If the target of the click isn't the container nor a descendant of the container.
        if (colorWrap.has(e.target).length === 0 && resetBtnWrap.has(e.target).length === 0) {
            container.find('.components-button.kemet-color-icon-indicate.open').click();
        }
    });
})


function kemetGetResponsiveJs() {
    'use strict';

    let device = 'desktop'
    if (
        wp.data &&
        wp.data.select &&
        wp.data.select('core/edit-post') &&
        wp.data.select('core/edit-post').__experimentalGetPreviewDeviceType
    ) {
        device = wp.data
            .select('core/edit-post')
            .__experimentalGetPreviewDeviceType()
            .toLowerCase()
    }

    jQuery(document).find('.kmt-responsive-control-btns > li').removeClass('active');
    jQuery(document).find('.kmt-responsive-control-btns > li.' + device).addClass('active');

    jQuery(document).find('.kmt-responsive-control-btns button i').on('click', function (event) {
        event.preventDefault();
        let device = jQuery(this).parent('button').attr('data-device');

        if ('desktop' == device) {
            device = 'tablet';
        } else if ('tablet' == device) {
            device = 'mobile';
        } else {
            device = 'desktop';
        }

        jQuery(document).find('.kmt-responsive-control-btns > li').removeClass('active');
        jQuery(document).find('.kmt-responsive-control-btns > li.' + device).addClass('active');
    });
}