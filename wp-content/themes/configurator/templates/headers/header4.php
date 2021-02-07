<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
 
?>

<div class="overlay-menu-cover">

<header class="header">

	<div class="container">

		<div id="inner-header" class="wrap clearfix">

			<?php 
				if ( is_customize_preview() ) { echo '<div class="customize-logo">'; }
					echo configurator_get_logo(); 
				if ( is_customize_preview() ) { echo '</div>'; }
			?>

			<div id="overlay-menu-wrap">
				<div class="menu-trigger">
					<span class="overlay-menu">menu</span>
				</div>
			</div>

			<div class="overlay overlay-effect">
				<div class="overlay-inner-wrap">
					<div class="overlay-inner">
						<button type="button" class="overlay-close"><i class="xicon ct-close"></i></button>
						<nav class="main-nav" role="navigation">
							<?php 

							configurator_main_nav(); 

							?>
						</nav>

					</div>
				</div>

			</div>

		</div>

	</div>

</header>

</div>
