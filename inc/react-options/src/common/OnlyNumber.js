const OnlyNumberValue = ({
    classNames,
    value,
    onChange,
    step,
    choiceID,
    id
}) => (
    <input
        type="text"
        value={value}
        className={classNames}
        data-id={choiceID}
        data-element-connect={id}
        onKeyDown={(e) => {
            if (

                [46, 8, 9, 27, 13, 110, 190, 27].indexOf(e.keyCode) > -1 ||

                (e.keyCode == 65 && e.ctrlKey === true) ||

                e.keyCode == 109 ||
                e.keyCode == 189 ||
                e.keyCode == 173 ||

                (e.keyCode == 67 && e.ctrlKey === true) ||

                (e.keyCode == 88 && e.ctrlKey === true) ||

                (e.keyCode >= 35 &&
                    e.keyCode <= 39 &&
                    e.keyCode !== 38 &&
                    e.keyCode !== 40)
            ) {
                return
            }

            let valueForComputation = ''

            if (value.toString().trim().length === 0) {
                valueForComputation = 0
            } else {
                let maybeValue = parseFloat(value)

                if (maybeValue || maybeValue === 0) {
                    valueForComputation = maybeValue
                }
            }

            let actualStep = e.shiftKey ? step * 10 : step

            if (e.keyCode === 38 && value !== '') {
                onChange(valueForComputation + actualStep, true)
            }

            if (e.keyCode === 40 && value !== '') {
                onChange(valueForComputation - actualStep, true)

            }

            if (
                (e.shiftKey || e.keyCode < 48 || e.keyCode > 57) &&
                (e.keyCode < 96 || e.keyCode > 105)
            ) {
                e.preventDefault()
            }
        }}
        onChange={({ target: { value } }) => onChange(value)}
    />)



export default OnlyNumberValue
