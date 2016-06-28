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
        'default'               => __( 'Smartcat', 'juno' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_text',
    ) );
    $wp_customize->add_control( 'juno_footer_copyright', array(
        'type'                  => 'text',
        'section'               => 'juno_footer_section',
        'label'                 => __( 'Footer Copyright Name', 'juno' ),
    ) );    

// ---------------------------------------------
// Smartcat Branding Section
// ---------------------------------------------
$wp_customize->add_section( 'juno_smartcat_branding_section', array (
    'title'                 => __( 'Smartcat Branding', 'juno' ),
    'description'           => __( 'Use the settings below to set the visibility of the Smartcat branding', 'juno' ),
    'panel'                 => 'juno_branding_panel',
) );

// ---------------------------------------------
// juno_smartcat_branding_section
// ---------------------------------------------
    $wp_customize->add_setting( 'juno_smartcat_branding', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_show_hide'
    ) );
    $wp_customize->add_control( 'juno_smartcat_branding', array(
        'label'   => __( '"Designed by Smartcat"', 'juno' ),
        'section' => 'juno_smartcat_branding_section',
        'type'    => 'radio',
        'choices'    => array(
            'show'              => __( 'Show', 'juno' ),
            'hide'              => __( 'Hide', 'juno' ),
        )
    ));