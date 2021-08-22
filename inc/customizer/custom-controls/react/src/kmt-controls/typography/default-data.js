export const getDefaultFonts = (isDefault) => {
	let sytemFonts = Object.entries(KmtFontFamilies[`system`]).map((familyValue) => ({
		family: familyValue[0],
		variations: [],
		all_variations: familyValue.variants

	}))
	let googleFonts = Object.entries(KmtFontFamilies[`google`]).map((familyValue) => ({
		family: familyValue[0],
		variations: [],
		all_variations: familyValue[1][0]

	}))
	return [googleFonts.concat(sytemFonts)]

}
