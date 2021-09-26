import React from 'react'
import { animated } from '@react-spring/web'
import PalettePreview from './PalettePreview'
const { __ } = wp.i18n;


export default function AddPaletteContainer({ value, onChange, wrapperProps = {} }) {
    return (
        <animated.div
            className="kmt-option-modal kmt-palettes-modal"
            {...wrapperProps}>
            <PalettePreview
                onClick={() => { }}
                value={value}
                onChange={(v, id) => onChange(v, id)}
                skipModal={false}
            />
            <div className={`kmt-Palette-title-container`}>
                <label for="title">{__('Name ')}</label>
                <input type="text " name="title" />
            </div>
        </animated.div>
    )
}
