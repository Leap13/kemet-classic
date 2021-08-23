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

    return (
        <div
            className={classnames('kmt-option-number', {
                [`kmt-reached-limits`]:
                    parseFloat(value) === parseInt(option.min) ||
                    parseFloat(value) === parseInt(option.max),
            })}
            {...(attr || {})}>
            <a
                className={classnames('kmt-minus', {
                    ['kmt-disabled']:
                        parseFloat(value) === parseInt(option.min),
                })}
                onClick={() =>
                    onChange(
                        round(
                            Math.min(
                                Math.max(
                                    parseFloat(value) - parseFloat(step),
                                    option.min || -Infinity
                                ),
                                option.max || Infinity
                            )
                        )
                    )
                }
            />

            <a
                className={classnames('kmt-plus', {
                    ['kmt-disabled']:
                        parseFloat(value) === parseInt(option.max),
                })}
                onClick={() =>
                    onChange(
                        round(
                            Math.min(
                                Math.max(
                                    parseFloat(value) + parseFloat(step),
                                    option.min || -Infinity
                                ),
                                option.max || Infinity
                            )
                        )
                    )
                }
            />
            <input type="number" value={value}
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
