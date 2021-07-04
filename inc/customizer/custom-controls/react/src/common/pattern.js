import { Fragment } from '@wordpress/element'
import { __ } from '@wordpress/i18n';

export const patternsList = [
    {
        id: 'type-1',
        title: __('Hideout'),
        url: 'https://image.freepik.com/free-vector/seamless-round-geometric-pattern_53876-100764.jpg',
    },

    {
        id: 'type-2',
        title: __('Triangles'),
        url: 'https://image.freepik.com/free-vector/abstract-geometric-islamic-background_1217-829.jpg',
    },

    {
        id: 'type-3',
        title: __('Bubbles'),
        url: 'https://image.freepik.com/free-vector/flat-arabic-pattern-background_79603-1826.jpg',
    },
    {
        id: 'type-6',
        title: __('Overlaping Circles'),
        url: 'https://image.freepik.com/free-photo/islamic-new-year-pattern-background_23-2148950279.jpg',
    },

    {
        id: 'type-1',
        title: __('Hideout'),
        url: 'https://image.freepik.com/free-vector/seamless-round-geometric-pattern_53876-100764.jpg',
    },

    {
        id: 'type-2',
        title: __('Triangles'),
        url: 'https://image.freepik.com/free-vector/abstract-geometric-islamic-background_1217-829.jpg',
    },

    {
        id: 'type-3',
        title: __('Bubbles'),
        url: 'https://image.freepik.com/free-vector/flat-arabic-pattern-background_79603-1826.jpg',
    },
    {
        id: 'type-6',
        title: __('Overlaping Circles'),
        url: 'https://image.freepik.com/free-photo/islamic-new-year-pattern-background_23-2148950279.jpg',
    },

    {
        id: 'type-11',
        title: __('Diagonal Stripes'),
        url: '../../../patterns/diagonal-stripes.svg',
    },

    {
        id: 'type-1',
        title: __('Hideout'),
        url: 'https://image.freepik.com/free-vector/seamless-round-geometric-pattern_53876-100764.jpg',
    },

    {
        id: 'type-2',
        title: __('Triangles'),
        url: 'https://image.freepik.com/free-vector/abstract-geometric-islamic-background_1217-829.jpg',
    },

    {
        id: 'type-3',
        title: __('Bubbles'),
        url: 'https://image.freepik.com/free-vector/flat-arabic-pattern-background_79603-1826.jpg',
    },
    {
        id: 'type-6',
        title: __('Overlaping Circles'),
        url: 'https://image.freepik.com/free-photo/islamic-new-year-pattern-background_23-2148950279.jpg',
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