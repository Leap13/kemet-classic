import { useState } from "@wordpress/element";
import OutsideClickHandler from "../common/outside-component";
import classnames from "classnames";
import ColorComponent from "./color";
const { __ } = wp.i18n;
const clamp = (min, max, value) => Math.max(min, Math.min(max, value));
const Border = ({ value, onChange, params }) => {
    let { secondColor, label } = params;
    const [isOpen, setIsOpen] = useState(false);
    let defaultValue = {
        secondColor: true,
        style: "none",
        width: "",
        color: "",
        secondColor: "",
    };
    value = value ? value : defaultValue;

    const [state, setState] = useState(value);
    const handleChangeComplete = (color, id) => {
        let colorValue = state;
        if (typeof color === "string") {
            colorValue[id] = color;
        } else if (
            undefined !== color.rgb &&
            undefined !== color.rgb.a &&
            1 !== color.rgb.a
        ) {
            colorValue[id] = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
        } else {
            colorValue[id] = color.hex;
        }
        setState(colorValue);
        onChange({ ...colorValue });
    };

    return (
        <div className={`kmt-border-container`}>
            <header>
                <span className="customize-control-title">{label}</span>
            </header>
            <div className={`kmt-border__wrapper`}>
                <div className={classnames("kmt-option-border")}>
                    <div
                        className={classnames("kmt-value-changer", {
                            ["active"]: isOpen,
                            ["kmt-disabled"]: value.style === "none",
                        })}
                    >
                        <input
                            type="number"
                            value={value.width}
                            onChange={({ target: { value: width } }) => {
                                setState({
                                    ...value,
                                    width: width,
                                });
                                onChange({
                                    ...value,
                                    width: width,
                                });
                            }}
                        />

                        <span className="kmt-value-divider"></span>

                        <span
                            className="kmt-current-value"
                            data-style={value.inherit ? "none" : value.style}
                            onClick={() => setIsOpen(!isOpen)}
                        >
                            {value.style === "none" ? value.style : null}
                        </span>
                        <OutsideClickHandler
                            disabled={!isOpen}
                            onOutsideClick={() => {
                                if (!isOpen) return;
                                setIsOpen(false);
                            }}
                        >
                            <ul className="kmt-styles-list">
                                {["solid", "dashed", "dotted", "none"]
                                    .reduce(
                                        (current, el, index) => [
                                            ...current.slice(
                                                0,
                                                index % 2 === 0 ? undefined : -1
                                            ),
                                            ...(index % 2 === 0
                                                ? [[el]]
                                                : [
                                                    [
                                                        current[
                                                        current.length - 1
                                                        ][0],
                                                        el,
                                                    ],
                                                ]),
                                        ],
                                        []
                                    )
                                    .map((group) =>
                                    (
                                        <li key={group[0]}>
                                            {group.map((style) => (
                                                <span
                                                    className={classnames({
                                                        active:
                                                            style === value.style,
                                                    })}
                                                    key={style}
                                                    onClick={() => {
                                                        setState({
                                                            ...value,
                                                            style,
                                                        });
                                                        onChange({
                                                            ...value,
                                                            style,
                                                        });
                                                        setIsOpen(false);
                                                    }}
                                                    data-style={style}
                                                >
                                                    {style === "none"
                                                        ? __("None", "kemet")
                                                        : null}
                                                </span>
                                            ))}
                                        </li>
                                    ))}
                            </ul>
                        </OutsideClickHandler>
                    </div>
                    {value.style !== "none" && <>
                        <ColorComponent
                            onChangeComplete={(colorValue) =>
                                handleChangeComplete(colorValue, 'color')
                            }
                            picker={{
                                id: "default",
                                title: __("Initial", "kemet"),
                            }}
                            value={{ default: value.color }}
                        />

                        {secondColor && (
                            <ColorComponent
                                onChangeComplete={(colorValue) =>
                                    handleChangeComplete(colorValue, 'secondColor')
                                }
                                picker={{
                                    id: "default",
                                    title: __("Hover", "kemet"),
                                }}
                                value={{ default: value.secondColor }}
                            />
                        )}
                    </>}
                </div>
                <div className="kmt-btn-reset-wrap">
                    <button
                        className="kmt-reset-btn "
                        disabled={
                            JSON.stringify(defaultValue) ===
                            JSON.stringify(value)
                        }
                        onClick={(e) => {
                            e.preventDefault();
                            setState({ ...defaultValue });
                            onChange({ ...defaultValue });
                        }}
                    ></button>
                </div>
            </div>
        </div>
    );
};

export default Border;
