import React from 'react'
import { animated } from '@react-spring/web'
import PalettePreview from './PalettePreview'
const { __ } = wp.i18n;


export default function AddPaletteContainer({ value, onChange, wrapperProps = {}, handleAddPalette }) {
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
                <p for="title">{__('Name ')}</p>
                <input type="text " name="title" id="title" />
            </div>
            {/* <div className={`kmt-Palette-type-container`}>
                <p>Type</p>
                <div>
                    <input type="radio" id="html" name="fav_language" value="HTML" />
                    <label for="html"> <input type="radio" id="css" name="fav_language" value="CSS" />HTML</label>

                    <label for="css"> <input type="radio" id="javascript" name="fav_language" value="JavaScript" />CSS</label>

                    <label for="javascript">JavaScript</label>
                </div>
            </div> */}
            <button className="kmt-save-palette" onClick={(e) => {
                e.preventDefault();
                e.stopPropagation();
                handleAddPalette()
            }}>Save Palette</button>
        </animated.div>
    )
}
