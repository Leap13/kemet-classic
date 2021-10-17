import classnames from 'classnames'
import OnlyNumberValue from '../common/OnlyNumber'
import _ from 'underscore'

const round = (value) => Math.round(value * 10) / 10

const NumberComponent = ({ value, params, onChange }) => {
    let { min, max, label } = params
    let step = 1;
    let defaultValue = 1

    return (
        <div className={`kmt-number-control__Wrapper`}>
            <div className={`kmt-number-container`}>
                <header>
                    <span className="customize-control-title kmt-control-title">{label}</span>
                </header>
                <div
                    className={classnames('kmt-option-number', {
                        [`kmt-reached-limits`]:
                            parseFloat(value) === parseInt(min) ||
                            parseFloat(value) === parseInt(max),
                    })}
                >
                    <a
                        className={classnames('kmt-minus', {
                            ['kmt-disabled']:
                                parseFloat(value) === parseInt(min),
                        })}
                        onClick={() =>
                            onChange(
                                round(
                                    Math.min(
                                        Math.max(
                                            parseFloat(value) - parseFloat(step),
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
                                parseFloat(value) === parseInt(max),
                        })}
                        onClick={() =>
                            onChange(

                                Math.min(
                                    Math.max(
                                        parseFloat(value) + parseFloat(step),
                                        min
                                    ),
                                    max
                                )

                            )
                        }
                    />
                    <OnlyNumberValue
                        value={value}
                        step={step}
                        onChange={(val) => onChange(val)} />
                </div>
            </div >
            <div className="kmt-btn-reset-wrap">
                <button
                    className="kmt-reset-btn "
                    disabled={
                        JSON.stringify(value) ===
                        JSON.stringify(defaultValue)
                    }
                    onClick={(e) => {
                        e.preventDefault();
                        onChange(defaultValue);
                    }}
                ></button>
            </div>
        </div>
    )
}

export default NumberComponent