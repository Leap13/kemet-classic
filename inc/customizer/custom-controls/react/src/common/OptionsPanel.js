import {
	createElement,
	Component,
	Fragment,
	memo,
	useMemo
} from '@wordpress/element'
import { SlotFillProvider } from '@wordpress/components'

import { flattenOptions } from './helpers/get-value-from-input'

const OptionsPanel = props => {
	let {
		options,
		value,
		onChange, // default | customizer
		purpose = 'default',
		hasRevertButton = true,
		renderOptions = null,
		parentValue
	} = props

	if (renderOptions) {
		return renderOptions({
			value,
			onChange
		})
	}

	const renderingChunks = useMemo(() => {
		const localOptions = flattenOptions(options)

		return [
			...(localOptions.__KMT_KEYS_ORDER__
				? Object.keys(localOptions.__KMT_KEYS_ORDER__)
					.map(orderKey => parseInt(orderKey, 10))
					.sort((a, b) => a - b)
					.map(
						orderKey => localOptions.__KMT_KEYS_ORDER__[orderKey]
					)
				: Object.keys(localOptions))
		]
			.filter(id => id !== '__k_KEYS_ORDER__')
			.map(id => ({
				...localOptions[id],
				id
			}))
			.reduce((chunksHolder, currentOptionDescriptor, index) => {
				if (chunksHolder.length === 0) {
					return [[currentOptionDescriptor]]
				}

				let lastChunk = chunksHolder[chunksHolder.length - 1]

				if (
					((lastChunk[0].options &&
						lastChunk[0].type === currentOptionDescriptor.type) ||
						currentOptionDescriptor.type === 'kmt-tab-group' ||
						currentOptionDescriptor.type === 'kmt-tab-group-sync') &&
					/**
					 * Do not group rendering chunks for boxes
					 */
					currentOptionDescriptor.type !== 'box' &&
					/**
					 * Do not group rendering chunks for kmt-popup's
					 */
					currentOptionDescriptor.type !== 'kmt-popup'
				) {
					return [
						...chunksHolder.slice(0, -1),
						[...lastChunk, currentOptionDescriptor]
					]
				}

				return [...chunksHolder, [currentOptionDescriptor]]
			}, [])
	}, [options])

	return (
		<SlotFillProvider>
			{renderingChunks.map(renderingChunk => {
				/**
				 * We are dealing with a container
				 */
				if (
					renderingChunk[0].options ||
					renderingChunk[0].type === 'kmt-tab-group-sync'
				) {
					return (
						<GenericContainerType
							key={renderingChunk[0].id}
							value={value}
							parentValue={parentValue}
							renderingChunk={renderingChunk}
							onChange={onChange}
							purpose={purpose}
							hasRevertButton={hasRevertButton}
						/>
					)
				}

				/**
				 * We have a regular option type here
				 */
				return (
					<GenericOptionType
						hasRevertButton={hasRevertButton}
						purpose={purpose}
						key={renderingChunk[0].id}
						id={renderingChunk[0].id}
						value={value[renderingChunk[0].id]}
						values={value}
						option={renderingChunk[0]}
						onChangeFor={(id, newValue) => onChange(id, newValue)}
						onChange={newValue =>
							onChange(renderingChunk[0].id, newValue)
						}
					/>
				)
			})}
		</SlotFillProvider>
	)
}

export default OptionsPanel
