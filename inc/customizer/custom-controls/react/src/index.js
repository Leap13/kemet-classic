import { coreControl } from "./core/control";
import { BuilderControl } from "./layout-builder/control";
import { AvailableControl } from "./available/control";
import { TabsControl } from "./tabs/control";
import { FocusButtonControl } from "./focus-button/control.js";
import { radioImageControl } from './radio-image/control';
import { titleControl } from './title/control'
import { sliderControl } from './slider/control'
import { responsiveSliderControl } from './responsive-slider/control'
import { responsiveSpacingControl } from './responsive-spacing/control'
//import { sortableControl } from './sortable/control'
import { iconSelect } from './icon-select/control'
//import { colorComponent } from './color/control'
//import { toggleControl } from './Toggle/control'


wp.customize.controlConstructor["kmt-builder"] = BuilderControl;
wp.customize.controlConstructor["kmt-available"] = AvailableControl;
wp.customize.controlConstructor["kmt-tabs"] = TabsControl;
wp.customize.controlConstructor["kmt-focus-button"] = FocusButtonControl;
wp.customize.controlConstructor["kmt-radio-image"] = radioImageControl;
wp.customize.controlConstructor['kmt-title'] = titleControl;
wp.customize.controlConstructor['kmt-slider'] = sliderControl;
wp.customize.controlConstructor['kmt-responsive-slider'] = responsiveSliderControl;
wp.customize.controlConstructor['kmt-responsive-spacing'] = responsiveSpacingControl;
//wp.customize.controlConstructor['kmt-sortable'] = sortableControl;
wp.customize.controlConstructor['kmt-icon-select'] = iconSelect;
//wp.customize.controlConstructor['kmt-color'] = colorComponent;
//wp.customize.controlConstructor['kmt-toggle'] = toggleControl

import { Base } from "./customizer";
