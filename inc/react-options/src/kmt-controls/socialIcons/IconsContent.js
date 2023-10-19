import { Button, TextControl, Tooltip } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { useState } from '@wordpress/element';

const IconsContent = ({ onIconChoice, setVisible, icons }) => {
	const [searchValue, setSearchValue] = useState('');

	const transformIcons = (tempIcons) => {
		return Object.entries(tempIcons).map(([iconName, iconSVG]) => {
			return (
				<Tooltip className="tooltip" text={iconName} key={iconName}>
					<Button
						className="icon-button"
						onClick={() => {
							onIconChoice(iconName);
							setVisible(false);
							setSearchValue('');
						}}
					>
						{iconSVG}
					</Button>
				</Tooltip>
			);
		});
	};

	const filterOptions = () => {
		const tempIcons = {};
		for (const [iconName, svg] of Object.entries(icons)) {
			if (iconName.indexOf(searchValue) > -1) {
				tempIcons[iconName] = svg;
			}
		}
		return tempIcons;
	};

	const iconsToShow = transformIcons(filterOptions());

	return (
		<div className="icons-popover-content">
			<TextControl
				placeholder={__('Search', 'kemet')}
				value={searchValue}
				type="search"
				onChange={setSearchValue}
				className="icons-popover-header"
			/>
			<div className="icons-container">{iconsToShow}</div>
		</div>
	);
};

export default IconsContent;