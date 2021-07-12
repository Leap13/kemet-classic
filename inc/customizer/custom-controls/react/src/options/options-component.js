import PropTypes from "prop-types";
import { useState, useEffect } from "react";
import ColorComponent from '../kmt-controls/color'
import ResponsiveSliderComponent from '../kmt-controls/responsive-slider'
import SliderComponent from '../kmt-controls/slider'
import ResponsiveSpacingComponent from '../kmt-controls/responsive-spacing'
import TabsComponent from '../kmt-controls/tabs'
import SelectComponent from '../kmt-controls/select'
import TitleComponent from '../kmt-controls/title'
import BuilderComponent from '../kmt-controls/layout-builder/builder-component'
import AvailableComponent from '../kmt-controls/available'
import ToggleControlComponent from '../kmt-controls/toggle'
import BuilderTabs from '../kmt-controls/builder-tabs'

const OptionComponent = (type) => {
    let OptionComponent;
    switch (type) {
        case 'kmt-color':
            OptionComponent = ColorComponent;
            break;
        case 'kmt-slider':
            OptionComponent = SliderComponent;
            break;
        case 'kmt-responsive-slider':
            OptionComponent = ResponsiveSliderComponent;
            break;
        case 'kmt-responsive-spacing':
            OptionComponent = ResponsiveSpacingComponent;
            break;
        case 'kmt-tabs':
            OptionComponent = TabsComponent;
            break;
        case 'kmt-select':
            OptionComponent = SelectComponent;
            break;
        case 'kmt-title':
            OptionComponent = TitleComponent;
            break;
        case 'kmt-builder':
            OptionComponent = BuilderComponent;
            break;
        case 'kmt-available':
            OptionComponent = AvailableComponent;
            break;
        case 'kmt-switcher':
            OptionComponent = ToggleControlComponent;
            break;
        case 'kmt-builder-tabs':
            OptionComponent = BuilderTabs;
            break;
    }

    return OptionComponent;
}

export const getSetting = (settingName) => {
    var setting;
    switch (settingName) {
        case "device":
            setting = wp.customize.previewedDevice;
            break;
        default:
            var wpOptions = ["custom_logo"];
            setting = wpOptions.includes(settingName)
                ? settingName
                : KemetCustomizerData.setting.replace(
                    "setting_name",
                    settingName
                );

            setting = wp.customize(setting);
            break;
    }

    return setting;
};

const isDisplay = (rules) => {
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

const SingleOptionComponent = ({ optionId, option, control }) => {
    let context = option.context ? isDisplay(option.context) : true;
    console.log(option);
    const [isVisible, setVisible] = useState(context);

    const onChange = (value) => {
        setVisible(value)
    }

    if (option.context) {
        toggleVisible(option.context, onChange)
    }

    const Option = OptionComponent(option.type);
    return isVisible && option.type && <div id={optionId} className={`customize-control-${option.type}`}>
        <Option id={optionId} params={option} control={control} onChange={(key, value) => {
            key = KemetCustomizerData.setting.replace(
                "setting_name",
                key);
            wp.customize(key).set(value);
        }} />
    </div>;
}

export const renderOptions = (options) => {
    return Object.keys(options).map((optionId) => {
        const controlName = KemetCustomizerData.setting.replace(
            "setting_name",
            optionId);
        let control = wp.customize(controlName);
        let option = options[optionId];

        return <SingleOptionComponent optionId={optionId} option={option} control={control} key={optionId} />;
    })
}

const OptionsComponent = ({ control }) => {
    const { options } = control.params.data;

    return <div className="kmt-options">
        {renderOptions(options)}
    </div>
}

export default OptionsComponent;