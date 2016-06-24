<?php

// ---------------------------------------------
// Frontpage Content Panel
// ---------------------------------------------
$wp_customize->add_panel( 'juno_front_page_panel', array (
    'title'                 => __( 'Frontpage Content', 'juno' ),
    'description'           => __( 'Customize the appearance of your front page', 'juno' ),
    'priority'              => 10
) );
    
// ---------------------------------------------
// Jumbotron
// ---------------------------------------------
$wp_customize->add_section( 'juno_jumbotron_section', array(
    'title'                 => __( 'Jumbotron', 'juno'),
    'description'           => __( 'Customize the front page Jumbotron', 'juno' ),
    'panel'                 => 'juno_front_page_panel'
) );

    // Jumbotron Visibility Toggle
    $wp_customize->add_setting( 'juno_jumbotron_visibility_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'juno_jumbotron_visibility_toggle', array(
        'type'                  => 'radio',
        'section'               => 'juno_jumbotron_section',
        'label'                 => __( 'Show the Jumbotron section?', 'juno' ),
        'choices'               => array(
            'show'      => __( 'Show', 'juno' ),
            'hide'      => __( 'Hide', 'juno' ),
    ) ) );

    // Slide's Dark Tint Overlay
    $wp_customize->add_setting( 'juno_slider_dark_tint', array (
        'default'               => .25,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_overlay_decimal',
    ) );
    $wp_customize->add_control( 'juno_slider_dark_tint', array(
        'type'                  => 'number',
        'section'               => 'juno_jumbotron_section',
        'label'                 => __( 'Dark Tinted Slide Overlay', 'juno' ),
        'description'           => __( 'Adjust the amount of dark tint to apply to slider images, from 0.0 for no tint to 1.0 for solid black, or anything in between', 'juno' ),
        'input_attrs'           => array(
            'min' => .0,
            'max' => 1.0,
            'step' => .05,
    ) ) );
    
    // Slider Post #1
    $wp_customize->add_setting( 'juno_jumbotron_post_1', array (
        'default'               => null,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_post',
    ) );
    $wp_customize->add_control( 'juno_jumbotron_post_1', array(
        'type'                  => 'select',
        'section'               => 'juno_jumbotron_section',
        'label'                 => __( 'Jumbotron Post #1', 'juno' ),
        'choices'               => juno_all_posts_array(),
    ) );

    // Slider Post #2
    $wp_customize->add_setting( 'juno_jumbotron_post_2', array (
        'default'               => null,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_post',
    ) );
    $wp_customize->add_control( 'juno_jumbotron_post_2', array(
        'type'                  => 'select',
        'section'               => 'juno_jumbotron_section',
        'label'                 => __( 'Jumbotron Post #2', 'juno' ),
        'choices'               => juno_all_posts_array(),
    ) );

    // Slider Post #2
    $wp_customize->add_setting( 'juno_jumbotron_post_3', array (
        'default'               => null,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_post',
    ) );
    $wp_customize->add_control( 'juno_jumbotron_post_3', array(
        'type'                  => 'select',
        'section'               => 'juno_jumbotron_section',
        'label'                 => __( 'Jumbotron Post #3', 'juno' ),
        'choices'               => juno_all_posts_array(),
    ) );

// ---------------------------------------------
// About / Biography Section
// ---------------------------------------------
$wp_customize->add_section( 'juno_biography_section', array(
    'title'                 => __( 'About / Biography Section', 'juno'),
    'description'           => __( 'Customize the front page "About" section', 'juno' ),
    'panel'                 => 'juno_front_page_panel'
) );

    // About / Biography Section Visibility Toggle
    $wp_customize->add_setting( 'juno_bio_visibility_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'juno_bio_visibility_toggle', array(
        'type'                  => 'radio',
        'section'               => 'juno_biography_section',
        'label'                 => __( 'Show the "About" section?', 'juno' ),
        'choices'               => array(
            'show'      => __( 'Show', 'juno' ),
            'hide'      => __( 'Hide', 'juno' ),
    ) ) );

    // About Section - Primary Text
    $wp_customize->add_setting( 'juno_about_section_primary', array (
        'default'               => __( 'Users can input any flavor text they like and it will be output as this large text blurb.', 'juno' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_text',
    ) );
    $wp_customize->add_control( 'juno_about_section_primary', array(
        'type'                  => 'text',
        'section'               => 'juno_biography_section',
        'label'                 => __( 'Primary Text', 'juno' ),
    ) );

    // About Section - Secondary Text
    $wp_customize->add_setting( 'juno_about_section_secondary', array (
        'default'               => __( 'Etiam eget hendrerit elit, in pellentesque enim. Quisque ac laoreet mi. Curabitur id tristique ipsum. Morbi a tortor ut elit pharetra tempor quis vitae nisl. Nam condimentum eros velit.', 'juno' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_text',
    ) );
    $wp_customize->add_control( 'juno_about_section_secondary', array(
        'type'                  => 'text',
        'section'               => 'juno_biography_section',
        'label'                 => __( 'Secondary Text', 'juno' ),
    ) );
    
    // About / Biography Section - Button Visibility Toggle
    $wp_customize->add_setting( 'juno_about_section_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'juno_about_section_toggle', array(
        'type'                  => 'radio',
        'section'               => 'juno_biography_section',
        'label'                 => __( 'Include a button?', 'juno' ),
        'choices'               => array(
            'show'      => __( 'Show', 'juno' ),
            'hide'      => __( 'Hide', 'juno' ),
    ) ) );
    
    // About / Biography Section - Button Link
    $wp_customize->add_setting( 'juno_about_section_button_link', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'juno_about_section_button_link', array(
        'type'                  => 'text',
        'section'               => 'juno_biography_section',
        'label'                 => __( 'Button URL / Link', 'juno' ),
    ) );
    
    // About / Biography Section - Button Label
    $wp_customize->add_setting( 'juno_about_section_button_label', array (
        'default'               => __( 'Show Me More', 'juno' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_text',
    ) );
    $wp_customize->add_control( 'juno_about_section_button_label', array(
        'type'                  => 'text',
        'section'               => 'juno_biography_section',
        'label'                 => __( 'Button Label', 'juno' ),
    ) );
    
    
// ---------------------------------------------
// Subscribe Module
// ---------------------------------------------
$wp_customize->add_section( 'juno_subscribe_section', array(
    'title'                 => __( 'Mailing List CTA', 'juno'),
    'description'           => __( 'Customize the front page Subscribe module', 'juno' ),
    'panel'                 => 'juno_front_page_panel'
) );

    // Mailing List Module Visibility Toggle
    $wp_customize->add_setting( 'juno_subscribe_visibility_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'juno_subscribe_visibility_toggle', array(
        'type'                  => 'radio',
        'section'               => 'juno_subscribe_section',
        'label'                 => __( 'Show the Mailing List CTA?', 'juno' ),
        'choices'               => array(
            'show'      => __( 'Show', 'juno' ),
            'hide'      => __( 'Hide', 'juno' ),
    ) ) );
    
    // Mailing List Title Text
    $wp_customize->add_setting( 'juno_subscribe_title', array (
        'default'               => __( 'Encourage visitors to sign up for your mailing list using this CTA banner!', 'juno' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_text',
    ) );
    $wp_customize->add_control( 'juno_subscribe_title', array(
        'type'                  => 'text',
        'section'               => 'juno_subscribe_section',
        'label'                 => __( 'CTA Title Text', 'juno' ),
    ) );
    
    