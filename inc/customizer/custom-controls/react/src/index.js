import { coreControl } from "./core/control";
import { BuilderControl } from "./layout-builder/control";
import { AvailableControl } from "./available/control";
import { TabsControl } from "./tabs/control";

wp.customize.controlConstructor["kmt-builder"] = BuilderControl;
wp.customize.controlConstructor["kmt-available"] = AvailableControl;
wp.customize.controlConstructor["kmt-tabs"] = TabsControl;

import { Base } from "./customizer";
