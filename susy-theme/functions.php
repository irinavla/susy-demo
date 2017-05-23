<?php

function susy_load_scripts () {
    wp_enqueue_style( 'susy-css', get_template_directory_uri() . '/css/styles.css', array() );
    
    //wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', array(), '3.2.1', true );  
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'susy_load_scripts');

add_filter('show_admin_bar', '__return_false');

function susy_custom_logo() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'susy_custom_logo' );

add_theme_support( 'post-thumbnails' );

// Register Navigation Menus
function susy_navigation_menus() {
	$locations = array(
		'header_menu' => __( 'Header Menu', 'susy' ),
	);
	register_nav_menus( $locations );
}
add_action( 'init', 'susy_navigation_menus' );


function susy_custom_excerpt () {
    $output = '';
    global $post;
    $postID = $post->ID;
    $excerpt = wp_trim_words( get_the_content($postID), 30, '' );
    
    $output .= '<div class="entry-excerpt">'. $excerpt . '</div>' . '<a class="more-link susy-btn" href="'. get_permalink($postID) . '">'. __('Read More', 'susy') .'</a>';
    return $output;
}

function susy_posted_meta () {
    $posted_on = human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago ';
    $categories = get_the_category();
    $separator = ', ';
    $output = '';
    $i = 1;
    
    if (!empty($categories)) {
        foreach ($categories as $category) {
        if ($i > 1) : $output .= $separator; endif;
            $output .= '<a href="'. esc_url(get_category_link($category->term_id)) .'" alt="'. esc_attr('View all posts in %s', $category->name) .'">'. esc_html($category->name) .'</a>';
        $i++; 
        }
    }
    echo '<span class="posted-on">Posted <a href="'. esc_url(get_permalink()) .'">' . $posted_on . '</a> in </span><span class="link">'. $output . '</span>';
}
