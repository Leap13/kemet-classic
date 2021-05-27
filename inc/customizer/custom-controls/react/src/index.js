import { coreControl } from "./core/control";
import { BuilderControl } from "./layout-builder/control";
import { AvailableControl } from "./available/control";

wp.customize.controlConstructor["kmt-builder"] = BuilderControl;
wp.customize.controlConstructor["kmt-available"] = AvailableControl;

import { Base } from "./customizer";
