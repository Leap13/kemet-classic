<?php
/**
 * View General
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2018, Kemet
 * @link        http://wpkemet.com/
 * @since       Kemet 1.0.0
 */

?>

<div class="kmt-container kmt-welcome">
		<div id="poststuff">
			<div id="post-body" class="columns-2">
				<div id="post-body-content">
					<!-- All WordPress Notices below header -->
					<h1 class="screen-reader-text"> <?php esc_html_e( 'Kemet', 'kemet' ); ?> </h1>
						<?php do_action( 'kemet_welcome_page_content_before' ); ?>

						<?php do_action( 'kemet_welcome_page_content' ); ?>

						<?php do_action( 'kemet_welcome_page_content_after' ); ?>
				</div>
				<div class="postbox-container kmt-sidebar" id="postbox-container-1">
					<div id="side-sortables">
						<?php do_action( 'kemet_welcome_page_right_sidebar_before' ); ?>

						<?php do_action( 'kemet_welcome_page_right_sidebar_content' ); ?>

						<?php do_action( 'kemet_welcome_page_right_sidebar_after' ); ?>
					</div>
				</div>
			</div>
			<!-- /post-body -->
			<br class="clear">
		</div>


</div>