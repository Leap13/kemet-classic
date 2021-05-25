import { coreControl } from "./core/control";
import { BuilderControl } from "./layout-builder/control.js";

wp.customize.controlConstructor["kmt-builder"] = BuilderControl;

import { Base } from "./customizer";
