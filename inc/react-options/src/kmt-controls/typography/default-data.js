export const getDefaultFonts = ({ isDefault }) => {
  const systemFontsList = { ...KmtFontFamilies[`system`] };
  if (isDefault) {
    delete systemFontsList.Default;
  }
  let systemFonts = Object.entries(systemFontsList).map((familyValue) => ({
    family: familyValue[0],
    variations: [],
    source: "system",
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
    source: "google",
    all_variations: familyValue[1][0]

  }))

  let customFonts = Object.entries(KmtFontFamilies[`custom`]).map((family) => ({
    family: family[0],
    variations: [],
    source: "custom",
    all_variations: family[1].variations

  }))

  return {
    system: systemFonts,
    google: googleFonts,
    custom: customFonts

  }

}
