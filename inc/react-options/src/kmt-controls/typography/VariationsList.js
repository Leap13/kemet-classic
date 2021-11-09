import { useRef, useEffect } from '@wordpress/element'
import classnames from 'classnames'
import { convertVariations, findFontFamily } from './helpers'
import { animated } from '@react-spring/web'

const VariationsList = ({ value, onChange, typographyList, props }) => {
	const selectedFontFamily = findFontFamily(
		value.family,
		typographyList
	)
	const parentElement = useRef(null);

	useEffect(() => {
		if (!selectedFontFamily) {
			return
		}

		parentElement.current.scrollTop =
			(
				parentElement.current.children[
				selectedFontFamily.all_variations.indexOf(value.variation)
				] || parentElement.current.children[0]
			).offsetTop - parentElement.current.offsetTop;
	}, [selectedFontFamily])

	return (
		<animated.ul
			style={props}
			className="kmt-typography-variations"
			ref={parentElement}
		>
			{selectedFontFamily &&
				selectedFontFamily.all_variations.map((variation) => (
					<li
						onClick={() =>
							onChange({
								...value,
								variation,
							})
						}
						className={classnames({
							active: variation === value.variation,
						})}
						key={variation}


					>
						<span
							className="kmt-variation-name"
							data-variation={variation}

						>
							{convertVariations(variation)}
						</span>

					</li>
				))
			}
		</animated.ul >
	)
}

export default VariationsList