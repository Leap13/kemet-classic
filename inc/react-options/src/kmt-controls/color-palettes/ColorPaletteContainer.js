import React from 'react'
import AddPaletteContainer from './AddPaletteContainer'
import ColorPalettesModal from './ColorPalettesModal'

export default function ColorPaletteContainer(props) {
    return (
        <div>
            {props.currentView === "add" ? <AddPaletteContainer {...props} /> : <ColorPalettesModal {...props} />}
        </div>
    )
}
