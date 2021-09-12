import { ColorPicker } from "@wordpress/components";

const ColorPickerIris = ({ value: { color }, onChange }) => {
    return (
        <div>
            <ColorPicker
                color={color}
                onChangeComplete={(val) => onChange(val)}
            />
        </div>
    );
};

export default ColorPickerIris;
