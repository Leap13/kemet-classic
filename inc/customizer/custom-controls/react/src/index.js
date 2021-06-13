import { coreControl } from "./core/control";
import { BuilderControl } from "./layout-builder/control";
import { AvailableControl } from "./available/control";
import { TabsControl } from "./tabs/control";
import { FocusButtonControl } from "./focus-button/control.js";
import { radioImageControl } from './radio-image/control';

wp.customize.controlConstructor["kmt-builder"] = BuilderControl;
wp.customize.controlConstructor["kmt-available"] = AvailableControl;
wp.customize.controlConstructor["kmt-tabs"] = TabsControl;
wp.customize.controlConstructor["kmt-focus-button"] = FocusButtonControl;
wp.customize.controlConstructor["kmt-radio-image"] = radioImageControl;

import { Base } from "./customizer";
