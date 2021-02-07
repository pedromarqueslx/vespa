<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
 
?>
<div class="pix-menu-align-left">

	<header class="header">

		<div class="container">

			<div id="inner-header" class="wrap clearfix">

				<nav class="main-nav">
					<?php configurator_main_nav(); ?>
				</nav>

				<?php 
					if ( is_customize_preview() ) { echo '<div class="customize-logo">'; }
						echo configurator_get_logo(); 
					if ( is_customize_preview() ) { echo '</div>'; }
				?>

				<div class="pix-menu">
					<div class="pix-menu-trigger">
						<span class="mobile-menu"><?php esc_html_e( 'Menu', 'configurator' ); ?></span>
					</div>
				</div>

				<div class="widget-right">
					<?php echo configurator_print_header_element(); ?>
				</div>

			</div>

		</div>

	</header>

</div>