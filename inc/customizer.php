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
    
    // Header Bar
    require_once('customizer/settings-site-identity-extras.php');
    
    // Front Page
    require_once('customizer/settings-front-page.php');

    // General
    require_once('customizer/settings-general.php');
    
    // Blog
    require_once('customizer/settings-blog.php');
    
    // Site Appearance
    require_once('customizer/settings-appearance.php');
    
    // Site Branding
    require_once('customizer/settings-branding.php');
    
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
function juno_sanitize_text( $input ) {
    
    return sanitize_text_field( $input );
    
}

function juno_sanitize_color( $input ) {
    
    return sanitize_hex_color( $input );
    
}

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

function juno_sanitize_font( $input ) {
    
    $valid_keys = juno_fonts();
    
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