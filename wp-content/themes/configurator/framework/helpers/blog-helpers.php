<?php

//Like Comment Link
if( !function_exists( 'configurator_meta' ) ){

    function configurator_meta( $meta ) {

        $output = '';
        
        switch ( $meta ) {
            case 'author':
                global $post;
                $author_id = $post->post_author;
                $output .= '<span class="author">'. esc_html__( 'By', 'configurator' );
                    $output .= ' <a href="'. esc_url( get_author_posts_url( $author_id ) ).'">'. esc_html( get_the_author_meta( 'display_name', $author_id ) ) .'</a>';
                $output .= '</span>';
            break;

            case 'comment':
                $output .= '<span class="comment">';
                    $output .= ' <a href="'. esc_url( get_comments_link() ).'">'. esc_html__( 'Comments:', 'configurator' );
                        $output .= ' <span>'. esc_html( get_comments_number() ) .'</span>';
                    $output .= '</a>';
                $output .= '</span>';
            break;

            case 'date':
                $output .= '<span class="date">';
                    $output .= '<a href="'. esc_url( get_month_link( get_the_time('Y'), get_the_time('m') ) ).'">';
                        $output .= esc_html( get_the_time( get_option('date_format') ) );
                    $output .= '</a>';
                $output .= '</span>';
            break;

            case 'category':
                $category = get_the_category();
                if( !empty( $category ) ) {
                    $output .= '<span class="category">';
                         $output .= '<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) .'">'. esc_html( $category[0]->cat_name ) .'</a>';
                    $output .= '</span>';
                }
            break;
            
            default:
            break;
        }

        return $output;
    }
}

//Post Category
if( !function_exists( 'configurator_post_category' ) ){

    function configurator_post_category( $type = 'single' ){ //single or multiple
        $output = '';
        if( $type == 'single' ){
            $category = get_the_category();
            if( !empty( $category ) ) {
                $output = '<p class="category"><a href="' . esc_url( get_category_link( $category[0]->term_id ) ) .'">'. esc_html( $category[0]->cat_name ) .'</a></p>';
            }
        }
        else{
            $category = get_the_category_list(', ');
            if( !empty( $category ) ) {
                $output = '<p class="category">'. $category .'</p>';
            }
            
        }

        return $output;
    }
}

// Search Form
function configurator_wpsearch( $form ) {

    $search_text = get_theme_mod( 'search_text', esc_html__( 'Search', 'configurator' ) );

    $form = '<form method="get" class="searchform" action="' . esc_url( home_url( '/' ) ) . '" >
        <input type="text" value="' . esc_attr( get_search_query() ) . '" name="s" class="s" placeholder="' . esc_attr( $search_text ) . '" />
        <button type="submit" class="searchsubmit">'. esc_attr( $search_text ) .'</button>
    </form>';
    return $form;
}

// Social share
if( !function_exists( 'configurator_author_box' ) ) {
    function configurator_author_box() {

        global $post;

        $userdata = get_user_meta( $post->post_author );
        $name = $userdata['nickname'][0];
        $description = $userdata['description'][0];

        $author_box = '<aside class="author-details clearfix">';

            $author_box .= '<div class="author-image">'. get_avatar( get_the_author_meta( 'email' ), 100 ) .'</div>';

            $author_box .= '<div class="details">';
                $author_box .= '<h4 class="authorName">'. esc_html( $name ) .'</h4>';
                $author_box .= '<p>'. esc_html( $description ) .'</p>';
            $author_box .= '</div>';  

        $author_box .= '</aside>';

        return $author_box;
    }
}

//Comment Layout
function configurator_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; ?>
    <li id="comment-<?php esc_attr( comment_ID() ); ?>" <?php comment_class('cf'); ?>>
        <article class="cf">
            <header class="comment-author vcard">

                <?php 
                    $comment_author_email = get_comment_author_email();
                    echo get_avatar( $comment, 85 );
                ?>
            </header>

            <?php if ($comment->comment_approved == '0') : ?>
                <div class="alert alert-info">
                    <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'configurator' ) ?></p>
                </div>
            <?php endif; ?>

            <section class="comment_content cf">
                <div class="comment_author_details">
                    <?php printf( '<cite class="fn">%1$s</cite>', get_comment_author_link() ); ?>
                    <?php printf( '%1$s', edit_comment_link(esc_html__( 'Edit', 'configurator' )) ); ?>
                    <?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>   
                    <time datetime="<?php echo esc_attr( comment_time('Y-m-j') ); ?>"><a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>"><?php comment_time( esc_html__( 'F jS, Y', 'configurator' ) ); ?> </a></time>
                </div>

                <?php comment_text() ?>

                
            </section>
     
        </article>
  <?php // </li> is added by WordPress automatically 

}

function configurator_excerpt_more($more) {
        return '...';
    }
add_filter('excerpt_more', 'configurator_excerpt_more');

//New Excerpt
function configurator_excerpt_length( $length ) {  

    $prefix = ( isset($_POST['values'] ) ) ? $_POST['values']['prefix'] : configurator_get_prefix();

    //Shorten Blog Content
    $content_limit = get_theme_mod( $prefix.'content_limit', '40' );
    
    return $content_limit;
}
add_filter( 'excerpt_length', 'configurator_excerpt_length', 999 );
