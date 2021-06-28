import { element } from 'prop-types'
import React from 'react'

export default function OptionContainer({ label, options, value, onChange }) {
    let htmlContent = []
    for (const [key, item] of Object.entries(options)) {
        htmlContent.push(<li onClick={() => onChange(key)}>
            {item}
        </li>)
    }
    return (
        <div classNane='kmt-control'>
            <header><label>{label}</label></header>
            <section>
                <ul className='kmt-radio-option kmt-buttons-group'>
                    {htmlContent.map(elem => elem)}
                </ul>
            </section>
        </div>
    )
}
