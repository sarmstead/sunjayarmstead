<?php
function my_theme_enqueue_styles() {
 
    $parent_style = 'divi-style';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Change "project" slug to "work"

function et_projects_custom_slug( $slug ) {
    $slug = array( 'slug' => 'work' );

    return $slug;
}
add_filter( 'et_project_posttype_rewrite_args', 'et_projects_custom_slug', 10, 2 );

// Call filterable portfolio with excerpts added

function divi_child_theme_setup() {
    if ( ! class_exists('ET_Builder_Module') ) {
        return;
    }
    get_template_part( 'custom-modules/cfwpm' );
    $cfwpm = new Custom_ET_Builder_Module_Filterable_Portfolio();
    remove_shortcode( 'et_pb_filterable_portfolio' );
    add_shortcode( 'et_pb_filterable_portfolio', array($cfwpm, '_shortcode_callback') );
}
add_action( 'wp', 'divi_child_theme_setup', 9999 );

?>