import classnames from 'classnames'
const { __ } = wp.i18n;

const InlineVisibility = ({ choices, value, onChange }) => {
    const TransformToArray = choices =>
        Array.isArray(choices)
            ? choices
            : Object.keys(choices).reduce(
                (current, choice) => [
                    ...current,
                    {
                        key: choice,
                        value: choices[choice]
                    }
                ],
                []
            )
    return (
        <ul
            className="kmt-visibility-option kmt-devices kmt-buttons-group"
        >
            {TransformToArray(choices).map(
                ({ key, value: val }) => (
                    <li
                        className={classnames(
                            {
                                active: value[key],
                            },
                            `kmt-${key}`
                        )}
                        onClick={() =>
                            onChange({
                                ...value,
                                [key]: value[key]
                                    ? Object.values(value).filter((v) => v)
                                        .length === 1
                                        ? true
                                        : false
                                    : true,
                            })
                        }
                        key={key}
                    />
                )
            )}
        </ul>
    )
}



const Visibility = ({
    params,
    value,
    onChange,
}) => {
    let defaultValue = { desktop: true, tablet: false, mobile: false }

    return (
        <div className={`kmt-visibility-container`}>
            <header>

                <span className="customize-control-title kmt-control-title">{params.label}</span>
            </header>
            <div className={`kmt-visibility-wrapper`}>
                <InlineVisibility
                    value={value}
                    onChange={onChange}
                    choices={params.choices}
                />
                <div className={`kmt-btn-reset-wrap`}>
                    <button
                        className="kmt-reset-btn "
                        disabled={
                            JSON.stringify(value) ===
                            JSON.stringify(defaultValue)
                        }
                        onClick={(e) => {
                            e.preventDefault();
                            let resetValue = JSON.parse(
                                JSON.stringify(defaultValue)
                            );
                            if (undefined === resetValue || "" === resetValue) {
                                resetValue = "unset";
                            }
                            onChange(resetValue);
                        }}
                    ></button>
                </div>
            </div>
        </div>
    )



}
export default Visibility

