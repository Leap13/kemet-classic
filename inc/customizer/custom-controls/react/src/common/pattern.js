import { Fragment } from '@wordpress/element'
import { __ } from '@wordpress/i18n';

export const patternsList = [
    {
        id: 'type-1',
        title: __('Hideout'),
        url: '../../../patterns/hideout.svg',
    },

    {
        id: 'type-2',
        title: __('Triangles'),
        url: '../../../patterns/triangles.svg',
    },

    {
        id: 'type-3',
        title: __('Bubbles'),
        url: '../../../patterns/bubbles.svg',
    },

    {
        id: 'type-4',
        title: __('Wiggle'),
        url: '../../../patterns/wiggle.svg',
    },

    {
        id: 'type-5',
        title: __('Polka Dots'),
        url: '../../../patterns/polka-dots.svg',
    },

    {
        id: 'type-6',
        title: __('Overlaping Circles'),
        url: '../../../patterns/overlaping-circles.svg',
    },

    {
        id: 'type-7',
        title: __('Texture'),
        url: '../../../patterns/texture.svg',
    },

    {
        id: 'type-8',
        title: __('Diagonal Lines'),
        url: '../../../patterns/diagonal-lines.svg',
    },

    {
        id: 'type-9',
        title: __('Rain'),
        url: '../../../patterns/rain.svg',
    },

    {
        id: 'type-10',
        title: __('Stripes'),
        url: '../../../patterns/stripes.svg',
    },

    {
        id: 'type-11',
        title: __('Diagonal Stripes'),
        url: '../../../patterns/diagonal-stripes.svg',
    },

    {
        id: 'type-12',
        title: __('Intersecting Circles'),
        url: '../../../patterns/intersecting-circles.svg',
    },

    {
        id: 'type-13',
        title: __('Bank Note'),
        url: '../../../patterns/bank-note.svg',
    },

    {
        id: 'type-14',
        title: __('Zig Zag'),
        url: '../../../patterns/zig-zag.svg',
    },


]



const PatternPicker = ({ onSelectImage }) => {
    return (
        <Fragment>
            <ul className="ct-patterns-list">
                {patternsList.map((singlePattern) => (
                    <li
                        onClick={(singlePattern) => onSelectImage(singlePattern)
                        }
                        key={singlePattern.id}
                        title={singlePattern.title}>


                        <img src={singlePattern.url} />
                    </li>
                ))}
            </ul>

        </Fragment>
    )
}

export default PatternPicker
