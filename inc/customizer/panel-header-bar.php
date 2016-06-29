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

    // Logo or Title Branding Toggle
    $wp_customize->add_setting( 'juno_branding_toggle', array (
        'default'               => 'title',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_branding_toggle',
    ) );
    $wp_customize->add_control( 'juno_branding_toggle', array(
        'type'                  => 'radio',
        'section'               => 'juno_site_branding_section',
        'label'                 => __( 'Display a Logo or the Site Title for branding?', 'juno' ),
        'choices'               => array(
            'logo'        => __( 'Logo', 'juno' ),
            'title'       => __( 'Title', 'juno' ),
    ) ) );

    // Site Logo
    $wp_customize->add_setting( 'juno_branding_logo', array (
        'default'               => get_template_directory_uri() . '/inc/images/juno.png',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'juno_branding_logo', array (
        'mime_type'             => 'image',
        'settings'              => 'juno_branding_logo',
        'section'               => 'juno_site_branding_section',
        'label'                 => __( 'Site Logo', 'juno' ),
    ) ) );
