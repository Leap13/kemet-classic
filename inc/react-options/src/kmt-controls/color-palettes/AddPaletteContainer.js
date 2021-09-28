import React, { useState } from 'react'
import { animated } from '@react-spring/web'
import PalettePreview from './PalettePreview'
const { __ } = wp.i18n;


export default function AddPaletteContainer({ value, onChange, wrapperProps = {}, handleAddPalette }) {
    const [data, setPaletteData] = useState({
        name: '',
        type: 'light'
    })

    return (
        <animated.div
            className="kmt-option-modal kmt-palettes-modal"
            {...wrapperProps}>
            <PalettePreview
                onClick={() => { }}
                value={value}
                onChange={(v, id) => onChange(v, id)}
                skipModal={true}
            />
            <div className={`kmt-Palette-title-container`}>
                <p for="title">{__('Name ')}</p>
                <input type="text " name="title" id="title" onChange={(e) => setPaletteData({ ...data, name: e.target.value })} />
            </div>
            <div className={`kmt-Palette-type-container`}>
                <p>Type</p>
                <div>
                    <span>Light</span>
                    <input type="radio" id="javascript" name="fav_language" value="JavaScript" checked={data.type === "light"} onClick={() => setPaletteData({ ...data, type: "light" })} />
                    <span>Dark</span>
                    <input type="radio" id="javascript" name="fav_language" value="JavaScript" checked={data.type === "dark"} onClick={() => setPaletteData({ ...data, type: "dark" })} />
                </div>
            </div>
            <button className="kmt-save-palette" disabled={data.name === ""} onClick={(e) => {
                e.preventDefault();
                e.stopPropagation();
                handleAddPalette(data)
            }}>Save Palette</button>
        </animated.div>
    )
}
