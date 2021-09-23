import { useEffect, useRef, useState } from '@wordpress/element'
import classnames from 'classnames'
import { humanizeVariations, fontFamilyToCSSFamily } from './helpers'
import { FixedSizeList as List } from 'react-window'
import WebFontLoader from 'webfontloader'

let loadedFonts = []

const loadGoogleFonts = (font_families) => {
	if (font_families.length === 0) return

	loadedFonts = [...loadedFonts, ...font_families.map(({ family }) => family)]

	const googleFonts = font_families
		.map(({ family }) => family)

	if (googleFonts.length > 0 || typekitFonts.length > 0) {
		WebFontLoader.load({
			...(googleFonts.length > 0
				? {
					google: {
						families: googleFonts,
					},
				}
				: {}),

			classes: false,
			text: 'abcdefghijklmnopqrstuvwxyz',
		})
	}
}

const SingleFont = ({
	data: { linearFontsList, onPickFamily, value },
	index,
	style,
}) => {
	const family = linearFontsList[index]
	return (
		<div
			style={style}
			onClick={() => onPickFamily(family)}
			className={classnames(
				'kmt-typography-single-font',
				{
					active: family.family === value.family,
				}
			)}
			key={family[0]}>
			<span className="kmt-font-name">
				{family.family}
			</span>
			<span
				style={{
					fontFamily: fontFamilyToCSSFamily(family),
				}}
				className="kmt-font-preview">
				Simply dummy text
			</span>
		</div>
	)
}

const FontsList = ({
	value,
	onPickFamily,
	linearFontsList
}) => {
	const listRef = useRef(null)
	const [scrollTimer, setScrollTimer] = useState(null)

	useEffect(() => {

		if (value.family) {
			listRef.current.scrollToItem(
				linearFontsList
					.map(({ family }) => family)
					.indexOf(value.family),
				'start'
			)
		}
	}, [])

	const onScroll = () => {
		scrollTimer && clearTimeout(scrollTimer)

		setScrollTimer(
			setTimeout(() => {
				if (!listRef.current) {
					return
				}
				const [overscanStartIndex] = listRef.current._getRangeToRender()

				const perPage = 25
				const startingPage = Math.ceil(
					(overscanStartIndex + 1) / perPage
				)
				const pageItems = [...Array(perPage)]
					.map((_, i) => (startingPage - 1) * perPage + i)
					.map((index) => linearFontsList[index])
					.filter((s) => !!s)


				loadGoogleFonts(pageItems)
			}, 100)
		)
	}

	useEffect(() => {
		onScroll()
	}, [linearFontsList])

	return (
		<List
			height={290}
			itemCount={linearFontsList.length}
			itemSize={85}
			ref={listRef}
			onScroll={(e) => {
				onScroll()
			}}
			itemData={{
				linearFontsList,
				onPickFamily,
				value,
			}}
			onItemsRendered={({ overscanStartIndex, overscanStopIndex }) => { }}
			className="kmt-typography-fonts">
			{SingleFont}
		</List>
	)
}

export default FontsList