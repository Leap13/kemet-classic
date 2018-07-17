<?php
/**
 * Kemet Theme Customizer Controls.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpastra.com/
 * @since       Kemet 1.0.0
 */

$control_dir = KEMET_THEME_DIR . 'inc/customizer/custom-controls';

require $control_dir . '/sortable/class-astra-control-sortable.php';
require $control_dir . '/radio-image/class-astra-control-radio-image.php';
require $control_dir . '/slider/class-astra-control-slider.php';
require $control_dir . '/responsive-slider/class-astra-control-responsive-slider.php';
require $control_dir . '/responsive/class-astra-control-responsive.php';
require $control_dir . '/typography/class-astra-control-typography.php';
require $control_dir . '/spacing/class-astra-control-spacing.php';
require $control_dir . '/responsive-spacing/class-astra-control-responsive-spacing.php';
require $control_dir . '/divider/class-astra-control-divider.php';
require $control_dir . '/color/class-astra-control-color.php';
require $control_dir . '/description/class-astra-control-description.php';
require $control_dir . '/background/class-astra-control-background.php';

