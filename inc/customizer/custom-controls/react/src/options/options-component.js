import PropTypes from "prop-types";
import { useState, useEffect } from "react";
import BuilderComponent from '../customizer-options/layout-builder/builder-component'
import AvailableComponent from '../customizer-options/available'
import BuilderTabs from '../customizer-options/builder-tabs'
import FocusComponent from '../customizer-options/focus'
import RowLayoutComponent from '../customizer-options/row-layout'
import ClearCacheButton from '../customizer-options/clear-cache-button'

let wpOptions = ["custom_logo", "blogname", "blogdescription", "woocommerce_shop_page_display", "woocommerce_category_archive_display", "woocommerce_default_catalog_orderby"];

export const CustomizerOptionComponent = (type) => {
    let OptionComponent;
    switch (type) {
        case 'kmt-builder':
            OptionComponent = BuilderComponent;
            break;
        case 'kmt-available':
            OptionComponent = AvailableComponent;
            break;
        case 'kmt-builder-tabs':
            OptionComponent = BuilderTabs;
            break;
        case 'kmt-focus-button':
            OptionComponent = FocusComponent;
            break;
        case 'kmt-row-layout':
            OptionComponent = RowLayoutComponent;
            break;
        case 'kmt-clear-cache':
            OptionComponent = ClearCacheButton;
            break;
    }

    return OptionComponent;
}

export const getSettingId = (id) => {
    const setting = wpOptions.includes(id)
        ? id
        : KemetCustomizerData.setting.replace(
            "setting_name",
            id
        );

    return setting;
}

export const getSetting = (settingName) => {
    let setting;
    switch (settingName) {
        case "device":
            setting = wp.customize.previewedDevice;
            break;
        default:
            setting = getSettingId(settingName);

            setting = wp.customize(setting);
            break;
    }

    return setting;
};

export const isDisplay = (rules) => {
    let setting = '';
    var relation = undefined != rules.relation ? rules.relation : "AND",
        isVisible = "AND" === relation ? true : false;
    _.each(rules, function (rule, ruleKey) {
        if ("relation" == ruleKey) {
            return;
        }
        var boolean = false,
            operator = undefined != rule.operator ? rule.operator : "=",
            ruleValue = rule.value;
        setting = getSetting(rule.setting);
        var settingValue = setting.get();
        switch (operator) {
            case "in_array":
                boolean = ruleValue.includes(settingValue);
                break;
            case 'object_contain':
                boolean = Object.values(settingValue).includes(ruleValue);
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

const toggleVisible = (rules, onChange) => {
    _.each(rules, function (rule) {
        let setting = getSetting(rule.setting);
        if (undefined != setting) {
            setting.bind(() => {
                onChange(isDisplay(rules));
            });
        }
    });
}

const SingleOptionComponent = ({ value, optionId, option, control }) => {
    const { OptionComponent } = window.KmtOptionComponent;
    let context = option.context ? isDisplay(option.context) : true;
    const extraProps = {};
    const [isVisible, setVisible] = useState(context);
    let [settingVal, setValue] = useState(value);
    const onChange = (value) => {
        setVisible(value)
    }

    if (option.context) {
        toggleVisible(option.context, onChange)
    }

    if (option.type === 'kmt-tabs') {
        extraProps.renderOptions = renderOptions;
    }

    const Option = CustomizerOptionComponent(option.type) ? CustomizerOptionComponent(option.type) : OptionComponent(option.type);
    const divider = option.divider ? ' has-divider' : '';
    return isVisible && option.type && <div id={optionId} className={`kmt-customize-control customize-control-${option.type}${divider}`}>
        <Option id={optionId} value={settingVal} {...extraProps} params={option} control={control} customizer={wp.customize} onChange={(value) => {
            const key = getSettingId(optionId);
            setValue(value);
            wp.customize(key).set(value);
        }} />
    </div>;
}

const sortProperties = (obj, sortedBy, isNumericSort, reverse) => {
    sortedBy = sortedBy || 1; // by default first key
    isNumericSort = isNumericSort || false; // by default text sort
    reverse = reverse || false; // by default no reverse

    var reversed = (reverse) ? -1 : 1;

    var sortable = [];
    for (var key in obj) {
        if (obj.hasOwnProperty(key)) {
            sortable.push([key, obj[key]]);
        }
    }
    if (isNumericSort)
        sortable.sort(function (a, b) {
            return reversed * (a[1][sortedBy] - b[1][sortedBy]);
        });
    else
        sortable.sort(function (a, b) {
            var x = a[1][sortedBy].toLowerCase(),
                y = b[1][sortedBy].toLowerCase();
            return x < y ? reversed * -1 : x > y ? reversed : 0;
        });
    const newObject = sortable.reduce((obj, ent) => { obj[ent[0]] = ent[1]; return obj; }, /** @type {Any} */({}));
    return newObject; // array in format [ [ key1, val1 ], [ key2, val2 ], ... ]
}

export const renderOptions = (options) => {
    options = sortProperties(options, 'priority', true, false);
    return Object.keys(options).map((optionId) => {
        const controlName = getSettingId(optionId);
        let control = wp.customize(controlName);
        let value = control && control.get();
        let option = options[optionId];

        return <SingleOptionComponent value={value} optionId={optionId} option={option} control={control} key={optionId} />;
    })
}

const OptionsComponent = ({ control }) => {
    const { options } = control.params.data;

    return <div className="kmt-options">
        {renderOptions(options)}
    </div>
}

export default OptionsComponent;