import classnames from 'classnames'

const round = (value) => Math.round(value * 10) / 10

const NumberComponent = (props) => {
    let value = props.value;
    const parsedValue = value
    let { min, max, label } = props.params
    let step = 1;
    let defaultValue = ''

    return (
        <div className={`kmt-number-container`}>
            <header>
                <div className="kmt-btn-reset-wrap">
                    <button
                        className="kmt-reset-btn "
                        disabled={
                            JSON.stringify(value) ===
                            JSON.stringify(defaultValue)
                        }
                        onClick={(e) => {
                            e.preventDefault();
                            props.onChange(defaultValue);
                        }}
                    ></button>
                </div>
                <span className="customize-control-title kmt-control-title">{label}</span>
            </header>
            <div
                className={classnames('kmt-option-number', {
                    [`kmt-reached-limits`]:
                        parseFloat(parsedValue) === parseInt(min) ||
                        parseFloat(parsedValue) === parseInt(max),
                })}
            >
                <a
                    className={classnames('kmt-minus', {
                        ['kmt-disabled']:
                            parseFloat(parsedValue) === parseInt(min),
                    })}
                    onClick={() =>
                        props.onChange(
                            round(
                                Math.min(
                                    Math.max(
                                        parseFloat(parsedValue) - parseFloat(step),
                                        min
                                    ),
                                    max
                                )
                            )
                        )
                    }
                />

                <a
                    className={classnames('kmt-plus', {
                        ['kmt-disabled']:
                            parseFloat(parsedValue) === parseInt(max),
                    })}
                    onClick={() =>
                        props.onChange(
                            round(
                                Math.min(
                                    Math.max(
                                        parseFloat(parsedValue) + parseFloat(step),
                                        min
                                    ),
                                    max
                                )
                            )
                        )
                    }
                />
                <input type="number"
                    value={value}
                    step={step}
                    max={max}
                    min={min}
                    onChange={() =>
                        props.onChange(
                            event.target.value
                        )

                    } />
            </div>
        </div >
    )
}

export default NumberComponent