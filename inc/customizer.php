<?php
/**
 * Juno Theme Customizer.
 *
 * @package Juno
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function juno_customize_register( $wp_customize ) {
    
    // Resets
    
    /**
     * Use require_once to load the individual files containing the 
     * Customizer settings and controls, grouped by Panel
     */
    
    // Site Identity
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-site-identity-extras.php';
    
    // Front Page
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-front-page.php';

    // Site Header & Footer
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-header-footer.php';
    
    // Jumbotron
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-jumbotron.php';

    // Blog
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-blog.php';
    
    // Single Post / Page
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-single-post.php';
    
    // Site Appearance
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-appearance.php';

    // Extras
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer/settings-extras.php';    
    
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    
}
add_action( 'customize_register', 'juno_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function juno_customize_preview_js() {
	wp_enqueue_script( 'juno_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'juno_customize_preview_js' );

/**
 * Sanitization Functions
 */

function juno_sanitize_integer( $input ) {
    
    return is_numeric( $input ) ? intval( $input ) : '';
    
}

function juno_sanitize_overlay_decimal( $input ) {
    
    return is_numeric( $input ) && $input <= 1.0 && $input >= 0.0 ? $input : '';
    
}

function juno_sanitize_post( $input ) {
    
    $valid_keys = juno_all_posts_array( true );
    
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function juno_sanitize_tab_icon( $input ) {
    
    $valid_keys = juno_link_tab_icons( true );
    
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function juno_sanitize_font( $input ) {
    
    $valid_keys = juno_fonts();
    
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function juno_sanitize_slide_effect( $input ) {
    
    $valid_keys = array(
        'simpleFade'    => __( 'Fade', 'juno' ),
        'scrollLeft'    => __( 'Scroll Left', 'juno' ),
    );
    
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function juno_sanitize_blog_cols( $input ) {
    
    $valid_keys = array(
        '2cols'    => __( '2-Column', 'juno' ),
        '3cols'    => __( '3-Column', 'juno' ),
    );
    
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function juno_sanitize_show_hide( $input ) {
    
    $valid_keys = array(
        'show'      => __( 'Show', 'juno' ),
        'hide'      => __( 'Hide', 'juno' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}
