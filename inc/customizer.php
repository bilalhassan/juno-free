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
    $wp_customize->remove_section( 'header_image' );
    $wp_customize->remove_section( 'background_image' );
    $wp_customize->remove_section( 'colors' );
//    $wp_customize->remove_section( 'static_front_page' );
    
    // Header Bar Panel
    require_once('customizer/panel-header-bar.php');
    
    // Front Page Panel
    require_once('customizer/panel-front-page.php');

    // General Panel
    // require_once('customizer/panel-general.php');
    
    // Blog Panel
    require_once('customizer/panel-blog.php');
    
    // Single Post Panel
    // require_once('customizer/panel-single.php');
    
    // Site Appearance Panel
    require_once('customizer/panel-appearance.php');
    
    // Site Branding Panel
    // require_once('customizer/panel-branding.php');
    
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

function juno_sanitize( $input ) {
    return $input;
}

function juno_sanitize_text( $input ) {
    return sanitize_text_field( $input );
}

function juno_sanitize_post( $input ) {
    return $input;
}

function juno_sanitize_integer( $input ) {
    return intval( $input );
}

function juno_sanitize_overlay_decimal( $input ) {
    return $input > 1.0 || $input < .0 ? null : $input;
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

function juno_sanitize_branding_toggle( $input ) {
    
    $valid_keys = array(
        'logo'        => __( 'Logo', 'juno' ),
        'title'       => __( 'Title', 'juno' ),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}