import {

    useRef,
    useContext,
    useState,
} from '@wordpress/element'
import SinglePicker from './color-picker/single-picker'
import OutsideClickHandler from './react-outside-click-handler'
import { normalizeCondition, matchValuesWithCondition } from 'match-conditions'

const ColorComponent = (props) => {
    let value = props.value;

    let responsiveBaseDefault = {
        'desktop': {},
        'tablet': {},
        'mobile': {}
    }
    let { pickers, responsive } = props.params;
    let baseDefault = responsive ? responsiveBaseDefault : {};
    pickers.map(({ id }) => {
        if (responsive) {
            baseDefault['desktop'][id] = '';
            baseDefault['tablet'][id] = '';
            baseDefault['mobile'][id] = '';
        } else {
            baseDefault[id] = '';
        }
    })
    baseDefault = props.params.default ? props.params.default : baseDefault;

    let defaultValue = props.params.default ? props.params.default : baseDefault;
    value = value ? value : defaultValue;
    const [{ isPicking, isTransitioning }, setState] = useState({
        isPicking: null,
        isTransitioning: null,
    })

    const containerRef = useRef()
    const modalRef = useRef()

    return (
        <OutsideClickHandler
            useCapture={false}
            display="inline-block"
            disabled={!isPicking}
            wrapperProps={{
                ref: containerRef,
            }}
            className="kmt-color-picker-container"
            additionalRefs={[modalRef]}
            onOutsideClick={() => {
                setState(({ isPicking }) => ({
                    isPicking: null,
                    isTransitioning: isPicking,
                }))
            }}>
            {pickers.map((picker) => (
                <SinglePicker
                    containerRef={containerRef}
                    picker={picker}
                    key={picker.id}
                    isPicking={isPicking}
                    modalRef={modalRef}
                    isTransitioning={isTransitioning}
                    onPickingChange={(isPicking) =>
                        setState({
                            isTransitioning: picker.id,
                            isPicking,
                        })
                    }
                    stopTransitioning={() =>
                        setState((state) => ({
                            ...state,
                            isTransitioning: false,
                        }))
                    }
                    onChange={props.onChange}
                    value={value[picker.id]}
                />
            ))}
        </OutsideClickHandler>
    )
}

export default ColorComponent
