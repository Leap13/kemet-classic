import KemetColorComponent from './kmt-color'
import SliderComponent from './slider'
import SpacingComponent from './spacing'
import SelectComponent from './select'
import TitleComponent from './title'
import ToggleControlComponent from './toggle'
import TextComponent from './text'
import EditorComponent from './editor'
import SortableComponent from './sortable'
import RadioComponent from './radio'
import BackgroundComponent from './background'
import IconSelectComponent from './icon-select'
import RadioImageComponent from './radio-image'
import Typography from './typography';
import ColorPalettes from './color-pallet';
import NumberComponent from './number';
import Visibility from './visibility'
import IconPicker from "./icon";
import Border from "./border";
import ReadymadeHeaders from './readymade-headers'
import TabsComponent from './tabs'
import BoxShadow from './box-shadow';
import NotificationComponent from './notification'

const OptionComponent = (type) => {
    let OptionComponent;
    switch (type) {
        case 'kmt-tabs':
            OptionComponent = TabsComponent;
            break;
        case 'kmt-color':
            OptionComponent = KemetColorComponent;
            break;
        case 'kmt-slider':
            OptionComponent = SliderComponent;
            break;
        case 'kmt-spacing':
            OptionComponent = SpacingComponent;
            break;
        case 'kmt-select':
            OptionComponent = SelectComponent;
            break;
        case 'kmt-title':
            OptionComponent = TitleComponent;
            break;
        case 'kmt-switcher':
            OptionComponent = ToggleControlComponent;
            break;
        case 'kmt-text':
            OptionComponent = TextComponent;
            break;
        case 'kmt-editor':
            OptionComponent = EditorComponent;
            break;
        case 'kmt-sortable':
            OptionComponent = SortableComponent;
            break;
        case 'kmt-radio':
            OptionComponent = RadioComponent;
            break;
        case 'kmt-background':
            OptionComponent = BackgroundComponent;
            break;
        case 'kmt-radio-image':
            OptionComponent = RadioImageComponent;
            break;
        case 'kmt-icon-select':
            OptionComponent = IconSelectComponent;
            break;
        case 'kmt-typography':
            OptionComponent = Typography;
            break;
        case 'kmt-color-palettes':
            OptionComponent = ColorPalettes;
            break;
        case 'kmt-number':
            OptionComponent = NumberComponent;
            break;
        case "kmt-visibility":
            OptionComponent = Visibility;
            break;
        case "icon-picker":
            OptionComponent = IconPicker;
            break;
        case "kmt-border":
            OptionComponent = Border;
            break;
        case "kmt-readymade-headers":
            OptionComponent = ReadymadeHeaders;
            break;
        case "kmt-box-shadow":
            OptionComponent = BoxShadow;
            break;
        case "kmt-notification":
            OptionComponent = NotificationComponent;
            break;
    }

    return OptionComponent;
}

export default OptionComponent