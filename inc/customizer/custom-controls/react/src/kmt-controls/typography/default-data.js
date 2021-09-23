export const getDefaultFonts = () => {

	let systemFonts = Object.entries(KmtFontFamilies[`system`]).map((familyValue) => ({
		family: familyValue[0],
		variations: [],
		all_variations: [
			'n1',
			'i1',
			'n2',
			'i2',
			'n3',
			'i3',
			'n4',
			'i4',
			'n5',
			'i5',
			'n6',
			'i6',
			'n7',
			'i7',
			'n8',
			'i8',
			'n9',
			'i9'
		]

	}))
	let googleFonts = Object.entries(KmtFontFamilies[`google`]).map((familyValue) => ({
		family: familyValue[0],
		variations: [],
		all_variations: familyValue[1][0]

	}))
	return [systemFonts.concat(googleFonts)]

}
