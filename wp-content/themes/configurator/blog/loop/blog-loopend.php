<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//Add pagination here
get_template_part( 'blog/loop/blog', 'pagination' );

echo '</div>';