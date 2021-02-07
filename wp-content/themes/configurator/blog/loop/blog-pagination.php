<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( is_customize_preview() ) { echo '<div class="customize-post-pagination">'; }
    echo configurator_print_pagination();
if ( is_customize_preview() ) { echo '</div>'; }

