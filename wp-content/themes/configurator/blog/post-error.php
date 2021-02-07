<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if( is_search () ) : ?>

	<article id="post-not-found">

		<header class="article-header">
			<h1><?php echo esc_html_e( 'Oops, Search Result Not Found!', 'configurator' ); ?></h1>
		</header> <!-- .article-header -->

		<section>
			<p><?php echo esc_html_e( 'Uh Oh. Something is missing. Try double checking things.', 'configurator' ); ?></p>
		</section>

	</article> <!-- #post-not-found -->

<?php else: ?>

	<article id="post-not-found">
		<header class="article-header">
			<h1><?php esc_html_e( 'Oops!', 'configurator' ); ?></h1>
			<p><?php esc_html_e( 'Seems like that page can\'t be found.', 'configurator' ); ?></p>
		</header>
		<section>
			<p><?php esc_html_e( 'Please feel free to browse the rest of our site.', 'configurator' ); ?></p>
			<p><a href="<?php echo esc_url(home_url( '/' ) ) ?>" class="btn"><?php echo esc_html__( 'Back to Home', 'configurator' ); ?></a></p>
		</section>
	</article>

<?php endif; ?>