<?php

// ---------------------------------------------
// Theme Branding Panel
// ---------------------------------------------
$wp_customize->add_panel( 'juno_branding_panel', array (
    'title'                 => __( 'Theme Branding', 'juno' ),
    'description'           => __( 'Customize the theme branding', 'juno' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Footer
// ---------------------------------------------
$wp_customize->add_section( 'juno_footer_section', array(
    'title'                 => __( 'Footer Copyright', 'juno'),
    'description'           => __( 'Customize the copyright blurb in the footer of your site', 'juno' ),
    'panel'                 => 'juno_branding_panel'
) );

    // Footer Copyright Text
    $wp_customize->add_setting( 'juno_footer_copyright', array (
        'default'               => __( 'Your Company Name', 'juno' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_text',
    ) );
    $wp_customize->add_control( 'juno_footer_copyright', array(
        'type'                  => 'text',
        'section'               => 'juno_footer_section',
        'label'                 => __( 'Footer Copyright Name', 'juno' ),
    ) );    

