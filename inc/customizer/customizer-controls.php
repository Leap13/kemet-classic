<?php
/**
 * Kemet Theme Customizer Controls.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.0
 */

$control_dir = KEMET_THEME_DIR . 'inc/customizer/custom-controls';

require $control_dir . '/sortable/class-kemet-control-sortable.php';
require $control_dir . '/radio-image/class-kemet-control-radio-image.php';
require $control_dir . '/slider/class-kemet-control-slider.php';
require $control_dir . '/responsive-slider/class-kemet-control-responsive-slider.php';
require $control_dir . '/responsive/class-kemet-control-responsive.php';
require $control_dir . '/typography/class-kemet-control-typography.php';
require $control_dir . '/spacing/class-kemet-control-spacing.php';
require $control_dir . '/responsive-spacing/class-kemet-control-responsive-spacing.php';
require $control_dir . '/divider/class-kemet-control-divider.php';
require $control_dir . '/color/class-kemet-control-color.php';
require $control_dir . '/description/class-kemet-control-description.php';
require $control_dir . '/background/class-kemet-control-background.php';

