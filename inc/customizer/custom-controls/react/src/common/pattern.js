import {
    Fragment,

} from '@wordpress/element'
import classnames from 'classnames'
import { __ } from '@wordpress/i18n';

export const patternsList = [
    {
        id: 'type-1',
        title: __('Hideout', 'blocksy'),
        src: '../../../patterns/hideout.svg',
    },

    {
        id: 'type-2',
        title: __('Triangles', 'blocksy'),
        src: '../../../patterns/triangles.svg',
    },

    {
        id: 'type-3',
        title: __('Bubbles', 'blocksy'),
        src: '../../../patterns/bubbles.svg',
    },

    {
        id: 'type-4',
        title: __('Wiggle', 'blocksy'),
        src: '../../../patterns/wiggle.svg',
    },

    {
        id: 'type-5',
        title: __('Polka Dots', 'blocksy'),
        src: '../../../patterns/polka-dots.svg',
    },

    {
        id: 'type-6',
        title: __('Overlaping Circles', 'blocksy'),
        src: '../../../patterns/overlaping-circles.svg',
    },

    {
        id: 'type-7',
        title: __('Texture', 'blocksy'),
        src: '../../../patterns/texture.svg',
    },

    {
        id: 'type-8',
        title: __('Diagonal Lines', 'blocksy'),
        src: '../../../patterns/diagonal-lines.svg',
    },

    {
        id: 'type-9',
        title: __('Rain', 'blocksy'),
        src: '../../../patterns/rain.svg',
    },

    {
        id: 'type-10',
        title: __('Stripes', 'blocksy'),
        src: '../../../patterns/stripes.svg',
    },

    {
        id: 'type-11',
        title: __('Diagonal Stripes', 'blocksy'),
        src: '../../../patterns/diagonal-stripes.svg',
    },

    {
        id: 'type-12',
        title: __('Intersecting Circles', 'blocksy'),
        src: '../../../patterns/intersecting-circles.svg',
    },

    {
        id: 'type-13',
        title: __('Bank Note', 'blocksy'),
        src: '../../../patterns/bank-note.svg',
    },

    {
        id: 'type-14',
        title: __('Zig Zag', 'blocksy'),
        src: '../../../patterns/zig-zag.svg',
    },


]



const PatternPicker = () => {
    return (
        <Fragment>
            <img src='../s' />
            <ul className="ct-patterns-list">
                {patternsList.map((singlePattern) => (
                    <li
                        onClick={() =>
                            console.log('pattern')
                        }
                        key={singlePattern.id}
                        title={singlePattern.title}>


                        <img src={singlePattern.src} />
                    </li>
                ))}
            </ul>

        </Fragment>
    )
}

export default PatternPicker
