import { useEffect, useRef, useState } from '@wordpress/element'
import classnames from 'classnames'
import { fontFamilytoCss } from './helpers'
import WebFontLoader from 'webfontloader'
import { __ } from '@wordpress/i18n';

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
const SingleFont = ({ family, onPickFamily, value }) => {
	return (
		<div

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
					fontFamily: fontFamilytoCss(family),
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
			listRef.current.querySelector('.active').scrollIntoView({
				behavior: 'smooth',
				block: 'nearest',

			});
		}
	}, [])


	const onScroll = () => {
		scrollTimer && clearTimeout(scrollTimer)

		setScrollTimer(
			setTimeout(() => {
				if (!listRef.current) {
					return
				}
				let overscanStartIndex = Math.ceil(listRef.current.scrollTop / 85);

				const perPage = 25
				const startingPage = Math.ceil(
					(overscanStartIndex + 1) / perPage
				)
				const pageItems = [...Array(perPage)]
					.map((_, i) => (startingPage - 1) * perPage + i)
					.map((index) => linearFontsList[index])
					.filter((s) => !!s)
				loadGoogleFonts(pageItems)
			}, 10)
		)
	}

	useEffect(() => {
		onScroll()
	}, [linearFontsList])

	let systemFonts = linearFontsList.filter((family) => family.source === "system")
	let customFonts = linearFontsList.filter((family) => family.source === "custom")
	let googleFonts = linearFontsList.filter((family) => family.source === "google")
	return (
		<div>
			<ul ref={listRef} className="kmt-typography-fonts" onScroll={onScroll} >
				<div>
					<div className={`kmt-fonts-source`}>{__('System Fonts', "kemet")}</div>
					<ul>
						{systemFonts.map((family) => SingleFont({ family, onPickFamily, value }))}
					</ul>
					{customFonts.length > 1 && (<><div className={`kmt-fonts-source`}>{__('Custom Fonts', "kemet")}</div>
						<ul>
							{customFonts.map((family) => SingleFont({ family, onPickFamily, value }))}
						</ul></>)}
					<div className={`kmt-fonts-source`}>{__('Google  Fonts', "kemet")}</div>
					<ul>
						{googleFonts.map((family) => SingleFont({ family, onPickFamily, value }))}
					</ul>
				</div>
			</ul>
		</div>
	)
}

export default FontsList
