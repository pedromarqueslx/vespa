<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : configurator_get_prefix();

$type = get_theme_mod( $prefix.'style', 'normal' );

/*
 * If you want add any blog style, Check condition here
 */

// For: List Style
if( 'list' == $type ){ ?>

    <div class="entry-content">
        <?php        
            echo '<h3 class="title">'. configurator_print_post_title() .'</h3>';
            
            echo '<div class="blog-meta">';
                if ( is_customize_preview() ) { echo '<div class="customize-post-meta">'; }
                    echo configurator_print_post_meta();
                if ( is_customize_preview() ) { echo '</div>'; }
            echo '</div>';

            if ( is_customize_preview() ) { echo '<div class="customize-post-link-btn">'; }
                echo configurator_print_link_btn(); 
            if ( is_customize_preview() ) { echo '</div>'; }
        ?> 
        
    </div>

<?php }

// For: Normal & Normal Split Style
else { ?>

    <div class="entry-content">
        <?php    
        
            echo '<h3 class="title">'. configurator_print_post_title() .'</h3>';

            echo '<div class="blog-meta">';
                if ( is_customize_preview() ) { echo '<div class="customize-post-meta">'; }
                    echo configurator_print_post_meta();
                if ( is_customize_preview() ) { echo '</div>'; }
            echo '</div>';

            the_excerpt();

            if ( is_customize_preview() ) { echo '<div class="customize-post-link-btn">'; }
                echo configurator_print_link_btn(); 
            if ( is_customize_preview() ) { echo '</div>'; }         
        ?> 
        
    </div>
<?php }