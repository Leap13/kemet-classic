import _ from 'underscore'
import classnames from 'classnames'

const round = (value) => Math.round(value * 10) / 10

const NumberComponent = ({
    value,
    option,
    option: { attr, step = 1, markAsAutoFor },
    device,
    onChange,
}) => {
    const parsedValue =
        markAsAutoFor && markAsAutoFor.indexOf(device) > -1 ? 'auto' : value
    return (
        <div
            className={classnames('ct-option-number', {
                [`ct-reached-limits`]:
                    parseFloat(parsedValue) === parseInt(option.min) ||
                    parseFloat(parsedValue) === parseInt(option.max),
            })}
            {...(attr || {})}>
            <a
                className={classnames('ct-minus', {
                    ['ct-disabled']:
                        parseFloat(parsedValue) === parseInt(option.min),
                })}
                onClick={() =>
                    onChange(
                        round(
                            Math.min(
                                Math.max(
                                    parseFloat(parsedValue) - parseFloat(step),
                                    option.min || -Infinity
                                ),
                                option.max || Infinity
                            )
                        )
                    )
                }
            />

            <a
                className={classnames('ct-plus', {
                    ['ct-disabled']:
                        parseFloat(parsedValue) === parseInt(option.max),
                })}
                onClick={() =>
                    onChange(
                        round(
                            Math.min(
                                Math.max(
                                    parseFloat(parsedValue) + parseFloat(step),
                                    option.min || -Infinity
                                ),
                                option.max || Infinity
                            )
                        )
                    )
                }
            />
            <input type="number" value={parsedValue}
                step={step}
                onChange={(value) =>
                    _.isNumber(parseFloat(value))
                        ? onChange(
                            round(
                                Math.min(
                                    Math.max(
                                        value,
                                        option.min || -Infinity
                                    ),
                                    option.max || Infinity
                                )
                            )
                        )
                        : parseFloat(value)
                            ? onChange(
                                round(
                                    Math.min(
                                        parseFloat(value),
                                        option.max || Infinity
                                    )
                                )
                            )
                            : onChange(round(value))
                } />
        </div>
    )
}

export default NumberComponent
