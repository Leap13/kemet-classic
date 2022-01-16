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
import kmtEvents from '../common/events'

const OptionComponent = (type) => {
    const options = {
        'kmt-tabs': TabsComponent,
        'kmt-color': KemetColorComponent,
        'kmt-slider': SliderComponent,
        'kmt-spacing': SpacingComponent,
        'kmt-select': SelectComponent,
        'kmt-title': TitleComponent,
        'kmt-switcher': ToggleControlComponent,
        'kmt-text': TextComponent,
        'kmt-editor': EditorComponent,
        'kmt-sortable': SortableComponent,
        'kmt-radio': RadioComponent,
        'kmt-background': BackgroundComponent,
        'kmt-radio-image': RadioImageComponent,
        'kmt-icon-select': IconSelectComponent,
        'kmt-number': NumberComponent,
        'kmt-typography': Typography,
        'kmt-color-palettes': ColorPalettes,
        'kmt-visibility': Visibility,
        'kmt-icon-picker': IconPicker,
        'kmt-border': Border,
        'kmt-readymade-headers': ReadymadeHeaders,
        'kmt-box-shadow': BoxShadow,
        'kmt-notification': NotificationComponent,
    };
    kmtEvents.trigger('kmt:options', options);
    const OptionComponent = options[type];

    return OptionComponent;
}

export default OptionComponent