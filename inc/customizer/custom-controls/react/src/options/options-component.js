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
import TextComponent from '../kmt-controls/text'
import EditorComponent from '../kmt-controls/editor'
import FocusComponent from '../kmt-controls/focus'
import SortableComponent from '../kmt-controls/sortable'

let wpOptions = ["custom_logo", "blogname", "blogdescription"];

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
        case 'kmt-text':
            OptionComponent = TextComponent;
            break;
        case 'kmt-editor':
            OptionComponent = EditorComponent;
            break;
        case 'kmt-focus-button':
            OptionComponent = FocusComponent;
            break;
        case 'kmt-sortable':
            OptionComponent = SortableComponent;
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

const SingleOptionComponent = ({ optionId, option, control }) => {
    let context = option.context ? isDisplay(option.context) : true;
    const [isVisible, setVisible] = useState(context);

    const onChange = (value) => {
        setVisible(value)
    }

    if (option.context) {
        toggleVisible(option.context, onChange)
    }

    const Option = OptionComponent(option.type);
    return isVisible && option.type && <div id={optionId} className={`customize-control-${option.type}`}>
        <Option id={optionId} params={option} control={control} customizer={wp.customize} onChange={(key, value) => {
            key = getSettingId(key);
            wp.customize(key).set(value);
        }} />
    </div>;
}

export const renderOptions = (options) => {
    return Object.keys(options).map((optionId) => {
        const controlName = getSettingId(optionId);
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