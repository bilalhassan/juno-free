<?php

// ---------------------------------------------
// Header Bar Panel
// ---------------------------------------------
$wp_customize->add_panel( 'juno_header_bar_panel', array (
    'title'                 => __( 'Header Bar', 'juno' ),
    'description'           => __( 'Customize the appearance of the header bar', 'juno' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Site Branding
// ---------------------------------------------
$wp_customize->add_section( 'juno_site_branding_section', array(
    'title'                 => __( 'Site Branding', 'juno'),
    'description'           => __( 'Modify the custom branding for your site', 'juno' ),
    'panel'                 => 'juno_header_bar_panel'
) );
    
    // Logo Height
    $wp_customize->add_setting( 'juno_custom_logo_height', array (
        'default'               => 300,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_integer',
    ) );
    $wp_customize->add_control( 'juno_custom_logo_height', array(
        'type'                  => 'number',
        'section'               => 'juno_site_branding_section',
        'label'                 => __( 'Custom Logo Height', 'juno' ),
        'description'           => __( 'Set in pixels. Width will automatically maintain the image aspect ratio.', 'juno' ),
        'input_attrs'           => array(
            'min' => 25,
            'max' => 300,
            'step' => 5,
    ) ) );