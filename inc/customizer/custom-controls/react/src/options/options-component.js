import { useState } from "react";
import ColorComponent from '../kmt-controls/color'
import ResponsiveSliderComponent from '../kmt-controls/responsive-slider'
import SliderComponent from '../kmt-controls/slider'
import ResponsiveSpacingComponent from '../kmt-controls/responsive-spacing'
import SelectComponent from '../kmt-controls/select'
import TitleComponent from '../kmt-controls/title'

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
        case 'kmt-select':
            OptionComponent = SelectComponent;
            break;
        case 'kmt-title':
            OptionComponent = TitleComponent;
            break;
    }

    return OptionComponent;
}

const getSetting = (settingName) => {
    var setting;
    switch (settingName) {
        case "device":
            setting = wp.customize.previewedDevice;
            break;
        case "tab":
            setting = wp.customize.state("kemetTab");
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
    }

    return setting;
};

const isDisplay = (rules) => {
    const [visible, setVisible] = useState(true);
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


    const setActiveState = () => {
        setVisible(false)
    };

    if (undefined != setting) {
        setting.bind(setActiveState);
    }

    return visible;
};

export const renderOptions = (options) => {
    return Object.keys(options).map((optionId) => {
        const controlName = KemetCustomizerData.setting.replace(
            "setting_name",
            optionId);
        let control = wp.customize(controlName);
        let option = options[optionId];
        let display = option.context ? isDisplay(option.context) : true;

        if (option.type && display) {
            const Option = OptionComponent(option.type);
            return <li id={optionId} className={`customize-control-${option.type}`}>
                <Option id={optionId} params={option} control={control} onChange={(key, value) => {
                    key = KemetCustomizerData.setting.replace(
                        "setting_name",
                        key);
                    wp.customize(key).set(value);
                }} />
            </li>;
        }
    })
}

const OptionsComponent = ({ control }) => {
    const { options } = control.params.data;

    return <ul className="kmt-options">
        {renderOptions(options)}
    </ul>
}

export default OptionsComponent;