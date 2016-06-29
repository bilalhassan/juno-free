<?php

// ---------------------------------------------
// Site Appearance Panel
// ---------------------------------------------
$wp_customize->add_panel( 'juno_appearance_panel', array (
    'title'                 => __( 'Appearance', 'juno' ),
    'description'           => __( 'Customize your site colors, fonts and other appearance settings', 'juno' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Fonts
// ---------------------------------------------
$wp_customize->add_section( 'juno_fonts_section', array(
    'title'                 => __( 'Fonts', 'juno'),
    'description'           => __( 'Customize the fonts in use on your site', 'juno' ),
    'panel'                 => 'juno_appearance_panel'
) );

    // Primary Font Family
    $wp_customize->add_setting( 'juno_font_primary', array (
        'default'               => 'Montserrat, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_text'
    ) );
    $wp_customize->add_control( 'juno_font_primary', array(
        'type'                  => 'select',
        'section'               => 'juno_fonts_section',
        'label'                 => __( 'Primary Font', 'juno' ),
        'description'           => __( 'Select the primary font of the theme', 'juno' ),
        'choices'               => juno_fonts()
    ) );

    // Secondary Font Family
    $wp_customize->add_setting( 'juno_font_secondary', array (
        'default'               => 'Abel, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_text'
    ) );
    $wp_customize->add_control( 'juno_font_secondary', array(
        'type'                  => 'select',
        'section'               => 'juno_fonts_section',
        'label'                 => __( 'Secondary Font', 'juno' ),
        'description'           => __( 'Select the secondary font of the theme', 'juno' ),
        'choices'               => juno_fonts()
    ) );

    // Body Font Family
    $wp_customize->add_setting( 'juno_font_body', array (
        'default'               => 'Lato, sans-serif',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_text'
    ) );
    $wp_customize->add_control( 'juno_font_body', array(
        'type'                  => 'select',
        'section'               => 'juno_fonts_section',
        'label'                 => __( 'Body Font', 'juno' ),
        'description'           => __( 'Set the font family for the body content of the site', 'juno' ),
        'choices'               => juno_fonts()
    ) );

    // Site Title Font Size
    $wp_customize->add_setting( 'juno_title_font_size', array (
        'default'               => 36,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_integer',
    ) );
    $wp_customize->add_control( 'juno_title_font_size', array(
        'type'                  => 'number',
        'section'               => 'juno_fonts_section',
        'label'                 => __( 'Site Title Font Size', 'juno' ),
        'description'           => __( 'Adjust the font size of the site title in pixels', 'juno' ),
        'input_attrs'           => array(
            'min' => 18,
            'max' => 64,
            'step' => 2,
    ) ) );
    
    // Font Size for Navigation Menu
    $wp_customize->add_setting( 'juno_nav_menu_font_size', array (
        'default'               => 10,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_integer',
    ) );
    $wp_customize->add_control( 'juno_nav_menu_font_size', array(
        'type'                  => 'number',
        'section'               => 'juno_fonts_section',
        'label'                 => __( 'Navigation Menu Font Size', 'juno' ),
        'description'           => __( 'Adjust the font size of the navigation menu items in pixels', 'juno' ),
        'input_attrs'           => array(
            'min' => 8,
            'max' => 22,
            'step' => 2,
    ) ) );
    
    // Body Font Size
    $wp_customize->add_setting( 'juno_font_body_size', array (
        'default'               => 14,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_integer',
    ) );
    $wp_customize->add_control( 'juno_font_body_size', array(
        'type'                  => 'number',
        'section'               => 'juno_fonts_section',
        'label'                 => __( 'Body Text Font Size', 'juno' ),
        'description'           => __( 'Adjust the font size of most generic text content in pixels', 'juno' ),
        'input_attrs'           => array(
            'min' => 10,
            'max' => 36,
            'step' => 2,
    ) ) );