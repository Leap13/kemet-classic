import PropTypes from "prop-types";
import { useState, useEffect } from "react";
import TabsComponent from '../customizer-options/tabs'
import BuilderComponent from '../customizer-options/layout-builder/builder-component'
import AvailableComponent from '../customizer-options/available'
import BuilderTabs from '../customizer-options/builder-tabs'
import FocusComponent from '../customizer-options/focus'
import RowLayoutComponent from '../customizer-options/row-layout'

let wpOptions = ["custom_logo", "blogname", "blogdescription"];

export const CustomizerOptionComponent = (type) => {
    let OptionComponent;
    switch (type) {
        case 'kmt-tabs':
            OptionComponent = TabsComponent;
            break;
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
    const [isVisible, setVisible] = useState(context);
    let [settingVal, setValue] = useState(value);
    const onChange = (value) => {
        setVisible(value)
    }

    if (option.context) {
        toggleVisible(option.context, onChange)
    }

    const Option = CustomizerOptionComponent(option.type) ? CustomizerOptionComponent(option.type) : OptionComponent(option.type);
    return isVisible && option.type && <div id={optionId} className={`customize-control-${option.type}`}>
        <Option id={optionId} value={settingVal} params={option} control={control} customizer={wp.customize} onChange={(value) => {
            const key = getSettingId(optionId);
            setValue(value);
            wp.customize(key).set(value);
        }} />
    </div>;
}

export const renderOptions = (options) => {
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