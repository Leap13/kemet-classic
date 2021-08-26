import classnames from 'classnames'

const round = (value) => Math.round(value * 10) / 10

const NumberComponent = (props) => {
    let value = props.value;
    const parsedValue = value
    console.log(props, "Props")
    let { min, max } = props.params;
    let step = 1;
    return (
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
            <input type="number" value={parsedValue}
                step={step}
                onChange={(value) =>
                    _.isNumber(parseFloat(value))
                        ? props.onChange(
                            round(
                                Math.min(
                                    Math.max(
                                        value,
                                        min || -Infinity
                                    ),
                                    max || Infinity
                                )
                            )
                        )
                        : parseFloat(value)
                            ? props.onChange(
                                round(
                                    Math.min(
                                        parseFloat(value),
                                        max || Infinity
                                    )
                                )
                            )
                            : props.onChange(round(value))
                } />
        </div>
    )
}

export default NumberComponent
