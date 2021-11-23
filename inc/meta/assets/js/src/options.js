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