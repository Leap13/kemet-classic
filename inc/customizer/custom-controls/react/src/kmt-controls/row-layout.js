import PropTypes from "prop-types";
import { Fragment, useState, useEffect } from "react";
import Responsive from "../common/responsive";
import { getSettingId } from "../options/options-component";
import Icons from "../common/icons";

const { __ } = wp.i18n;
const { ButtonGroup, Dashicon, Tooltip, Button } = wp.components;

const RowLayoutComponent = (props) => {
    let defaultParams = {
        desktop: {
            5: {
                equal: {
                    tooltip: __("Equal Width Columns", "kemet"),
                    icon: "fivecol",
                },
                "left-five-forty": {
                    tooltip: __("Left Heavy 40/15/15/15/15", "kemet"),
                    icon: "lfiveforty",
                },
                "center-five-forty": {
                    tooltip: __("Center Heavy 15/15/40/15/15", "kemet"),
                    icon: "cfiveforty",
                },
                "right-five-forty": {
                    tooltip: __("Right Heavy 15/15/15/15/40", "kemet"),
                    icon: "rfiveforty",
                },
            },
            4: {
                equal: {
                    tooltip: __("Equal Width Columns", "kemet"),
                    icon: "fourcol",
                },
                "left-forty": {
                    tooltip: __("Left Heavy 40/20/20/20", "kemet"),
                    icon: "lfourforty",
                },
                "center-forty": {
                    tooltip: __("Center Heavy 10/40/40/10", "kemet"),
                    icon: "cfourforty",
                },
                "right-forty": {
                    tooltip: __("Right Heavy 20/20/20/40", "kemet"),
                    icon: "rfourforty",
                },
            },
            3: {
                equal: {
                    tooltip: __("Equal Width Columns", "kemet"),
                    icon: "threecol",
                },
                "left-half": {
                    tooltip: __("Left Heavy 50/25/25", "kemet"),
                    icon: "lefthalf",
                },
                "right-half": {
                    tooltip: __("Right Heavy 25/25/50", "kemet"),
                    icon: "righthalf",
                },
                "center-half": {
                    tooltip: __("Center Heavy 25/50/25", "kemet"),
                    icon: "centerhalf",
                },
                "center-wide": {
                    tooltip: __("Wide Center 20/60/20", "kemet"),
                    icon: "widecenter",
                },
            },
            2: {
                equal: {
                    tooltip: __("Equal Width Columns", "kemet"),
                    icon: "twocol",
                },
                "left-golden": {
                    tooltip: __("Left Heavy 66/33", "kemet"),
                    icon: "twoleftgolden",
                },
                "right-golden": {
                    tooltip: __("Right Heavy 33/66", "kemet"),
                    icon: "tworightgolden",
                },
            },
            1: {
                row: {
                    tooltip: __("Equal Width Columns", "kemet"),
                    icon: "row",
                },
            },
        },
        mobile: {
            5: {
                equal: {
                    tooltip: __("Equal Width Columns", "kemet"),
                    icon: "fivecol",
                },
                row: {
                    tooltip: __("Collapse to Rows", "kemet"),
                    icon: "collapserowfive",
                },
            },
            4: {
                equal: {
                    tooltip: __("Equal Width Columns", "kemet"),
                    icon: "fourcol",
                },
                "two-grid": {
                    tooltip: __("Two Column Grid", "kemet"),
                    icon: "grid",
                },
                row: {
                    tooltip: __("Collapse to Rows", "kemet"),
                    icon: "collapserowfour",
                },
            },
            3: {
                equal: {
                    tooltip: __("Equal Width Columns", "kemet"),
                    icon: "threecol",
                },
                "left-half": {
                    tooltip: __("Left Heavy 50/25/25", "kemet"),
                    icon: "lefthalf",
                },
                "right-half": {
                    tooltip: __("Right Heavy 25/25/50", "kemet"),
                    icon: "righthalf",
                },
                "center-half": {
                    tooltip: __("Center Heavy 25/50/25", "kemet"),
                    icon: "centerhalf",
                },
                "center-wide": {
                    tooltip: __("Wide Center 20/60/20", "kemet"),
                    icon: "widecenter",
                },
                "first-row": {
                    tooltip: __("First Row, Next Columns 100 - 50/50", "kemet"),
                    icon: "firstrow",
                },
                "last-row": {
                    tooltip: __(
                        "Last Row, Previous Columns 50/50 - 100",
                        "kemet"
                    ),
                    icon: "lastrow",
                },
                row: {
                    tooltip: __("Collapse to Rows", "kemet"),
                    icon: "collapserowthree",
                },
            },
            2: {
                equal: {
                    tooltip: __("Equal Width Columns", "kemet"),
                    icon: "twocol",
                },
                "left-golden": {
                    tooltip: __("Left Heavy 66/33", "kemet"),
                    icon: "twoleftgolden",
                },
                "right-golden": {
                    tooltip: __("Right Heavy 33/66", "kemet"),
                    icon: "tworightgolden",
                },
                row: {
                    tooltip: __("Collapse to Rows", "kemet"),
                    icon: "collapserow",
                },
            },
            1: {
                row: {
                    tooltip: __("Single Row", "kemet"),
                    icon: "row",
                },
            },
        },
    };
    const { label, row } = props.params;
    const columns = parseInt(
        wp.customize(getSettingId(row + "-footer-columns")).get(),
        10
    );
    const layouts = props.params.layouts ? props.params.layouts : defaultParams;
    let defaultValue = {
        desktop: "",
        tablet: "",
        mobile: "",
    };
    let value = props.value ? props.value : defaultValue;

    const [state, setState] = useState({
        value,
        columns,
    });
    const [device, setDevice] = useState("desktop");
    const HandleChange = (value) => {
        props.onChange(value);

        let event = new CustomEvent("KemetUpdateFooterColumns", {
            detail: row,
        });
        document.dispatchEvent(event);

        setState((prevState) => ({
            ...prevState,
            value,
        }));
    };

    const onFooterUpdate = () => {
        const newColumns = parseInt(
            wp.customize(getSettingId(row + "-footer-columns")).get(),
            10
        );

        if (state.columns !== newColumns) {
            setState((prevState) => ({
                ...prevState,
                columns: newColumns,
            }));

            let value = state.value;
            if (newColumns === 1) {
                value.desktop = "row";
            } else {
                value.desktop = "equal";
            }
            value.tablet = "";
            value.mobile = "row";

            debounce(() => {
                HandleChange(value);
            }, 200);
        }
    };

    const debounce = (fn, delay) => {
        var timer = null;
        return function () {
            var context = this,
                args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                fn.apply(context, args);
            }, delay);
        };
    };

    const linkColumns = () => {
        document.addEventListener("KemetUpdateFooterColumns", function (e) {
            if (e.detail === row) {
                onFooterUpdate();
            }
        });
    };

    linkColumns();

    const controlMap =
        device === "mobile" || device === "tablet"
            ? layouts["mobile"][columns]
            : layouts[device][columns];

    return (
        <Fragment>
            <Responsive
                onChange={(currentDevice) => setDevice(currentDevice)}
                label={label}
            />
            <ButtonGroup className="kmt-radio-container-control">
                {Object.keys(controlMap).map((item) => {
                    const currentValue = state.value[device]
                        ? state.value[device]
                        : "";

                    return (
                        <Tooltip text={controlMap[item].tooltip}>
                            <Button
                                isTertiary
                                className={
                                    item === currentValue ? "active-radio" : ""
                                }
                                onClick={() => {
                                    let newValue = { ...state.value };
                                    newValue[device] = item;
                                    HandleChange(newValue);
                                }}
                            >
                                {Icons.row[controlMap[item].icon]
                                    ? Icons.row[controlMap[item].icon]
                                    : item}
                            </Button>
                        </Tooltip>
                    );
                })}
            </ButtonGroup>
        </Fragment>
    );
};

RowLayoutComponent.propTypes = {
    control: PropTypes.object.isRequired,
    customizer: PropTypes.func.isRequired,
};

export default React.memo(RowLayoutComponent);
