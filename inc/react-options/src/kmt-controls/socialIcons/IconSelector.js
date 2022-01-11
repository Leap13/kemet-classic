import React from 'react';
import {
	Button,
	Spinner,
	Icon,
	Popover,
} from '@wordpress/components';
import { useState, lazy, Suspense } from '@wordpress/element';

const IconsContent = lazy(() => import('./IconsContent'));

const IconSelector = ({ value, onIconChoice, icons }) => {
	const [visible, setVisible] = useState(false);

	return (
		<div className="kemet-control-header icon-control">
			
			{icons[value] && (
					<Button
						className="repeater-icon-preview"
						onClick={() => setVisible(!visible)}
					>
						{icons[value]}
					</Button>
			)}
			{!icons[value] && (
				<Button
					className="add-icon-button"
					onClick={() => setVisible(!visible)}
				>
					<Icon icon="plus-alt2" />
				</Button>
			)}
			{visible && (
				<Popover
					position="bottom left"
					onFocusOutside={() => {
						setVisible(!visible);
					}}
				>
					{
						<Suspense fallback={<Spinner />}>
							<IconsContent
								onIconChoice={onIconChoice}
								setVisible={setVisible}
								icons={icons}
							/>
						</Suspense>
					}
				</Popover>
			)}
		</div>
	);
};

export default IconSelector;
