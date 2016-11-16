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
        'default'               => .5,
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
        'choices'               => juno_all_posts_array( true ),
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
        'choices'               => juno_all_posts_array( true ),
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
        'choices'               => juno_all_posts_array( true ),
    ) );

// ---------------------------------------------
// Featured Post Section
// ---------------------------------------------
$wp_customize->add_section( 'juno_featured_post_section', array(
    'title'                 => __( 'Featured Post Section', 'juno'),
    'description'           => __( 'Customize the front page "Featured Post" section', 'juno' ),
    'panel'                 => 'juno_front_page_panel'
) );

    // Featured Post Section Visibility Toggle
    $wp_customize->add_setting( 'juno_featured_post_visibility_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'juno_featured_post_visibility_toggle', array(
        'type'                  => 'radio',
        'section'               => 'juno_featured_post_section',
        'label'                 => __( 'Show the "Featured Post" section?', 'juno' ),
        'choices'               => array(
            'show'      => __( 'Show', 'juno' ),
            'hide'      => __( 'Hide', 'juno' ),
    ) ) );
    
    // Featured Post Section Post
    $wp_customize->add_setting( 'juno_featured_post_post', array (
        'default'               => null,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_post',
    ) );
    $wp_customize->add_control( 'juno_featured_post_post', array(
        'type'                  => 'select',
        'section'               => 'juno_featured_post_section',
        'label'                 => __( '"Featured Post" section - Post', 'juno' ),
        'description'           => __( 'Select a Post or Page. The title and content will be drawn in automatically.', 'juno' ),
        'choices'               => juno_all_posts_array( true ),
    ) );
    
    // Featured Post Section - Button Label
    $wp_customize->add_setting( 'juno_featured_post_section_button_label', array (
        'default'               => __( 'Show Me More', 'juno' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_text',
    ) );
    $wp_customize->add_control( 'juno_featured_post_section_button_label', array(
        'type'                  => 'text',
        'section'               => 'juno_featured_post_section',
        'label'                 => __( 'Button Label', 'juno' ),
    ) );
   
// ---------------------------------------------
// Color Banner Section
// ---------------------------------------------
$wp_customize->add_section( 'juno_color_banner_section', array(
    'title'                 => __( 'Colored Widget Area', 'juno'),
    'description'           => __( 'Customize the front page Colored widget area', 'juno' ),
    'panel'                 => 'juno_front_page_panel'
) );

    // Color Banner Section Visibility Toggle
    $wp_customize->add_setting( 'juno_color_banner_visibility_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'juno_color_banner_visibility_toggle', array(
        'type'                  => 'radio',
        'section'               => 'juno_color_banner_section',
        'label'                 => __( 'Show the Colored widget area?', 'juno' ),
        'choices'               => array(
            'show'      => __( 'Show', 'juno' ),
            'hide'      => __( 'Hide', 'juno' ),
    ) ) );
    
// ---------------------------------------------
// Social Section
// ---------------------------------------------
$wp_customize->add_section( 'juno_social_section', array(
    'title'                 => __( 'Social Links', 'juno'),
    'description'           => __( 'Customize the front page Social Link section', 'juno' ),
    'panel'                 => 'juno_front_page_panel'
) );

    // Social Section Visibility Toggle
    $wp_customize->add_setting( 'juno_social_visibility_toggle', array (
        'default'               => 'hide',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'juno_social_visibility_toggle', array(
        'type'                  => 'radio',
        'section'               => 'juno_social_section',
        'label'                 => __( 'Show the Social Links section?', 'juno' ),
        'choices'               => array(
            'show'      => __( 'Show', 'juno' ),
            'hide'      => __( 'Hide', 'juno' ),
    ) ) );

    // Social Section Message Visibility Toggle
    $wp_customize->add_setting( 'juno_social_message_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'juno_social_message_toggle', array(
        'type'                  => 'radio',
        'section'               => 'juno_social_section',
        'label'                 => __( 'Include a title message?', 'juno' ),
        'choices'               => array(
            'show'      => __( 'Show', 'juno' ),
            'hide'      => __( 'Hide', 'juno' ),
    ) ) );
    
    // Social Message Text
    $wp_customize->add_setting( 'juno_social_message', array (
        'default'               => __( 'Stay Connected', 'juno' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_text',
    ) );
    $wp_customize->add_control( 'juno_social_message', array(
        'type'                  => 'text',
        'section'               => 'juno_social_section',
        'label'                 => __( 'Title message text', 'juno' ),
    ) );
    
    // Facebook URL
    $wp_customize->add_setting( 'juno_social_icon_facebook_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'juno_social_icon_facebook_url', array(
        'type'                  => 'text',
        'section'               => 'juno_social_section',
        'label'                 => __( 'Facebook', 'juno' ),
    ) );
    
    // Twitter URL
    $wp_customize->add_setting( 'juno_social_icon_twitter_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'juno_social_icon_twitter_url', array(
        'type'                  => 'text',
        'section'               => 'juno_social_section',
        'label'                 => __( 'Twitter', 'juno' ),
    ) );
    
    // Google+ URL
    $wp_customize->add_setting( 'juno_social_icon_google_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'juno_social_icon_google_url', array(
        'type'                  => 'text',
        'section'               => 'juno_social_section',
        'label'                 => __( 'Google+', 'juno' ),
    ) );
    
    // LinkedIn URL
    $wp_customize->add_setting( 'juno_social_icon_linkedin_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'juno_social_icon_linkedin_url', array(
        'type'                  => 'text',
        'section'               => 'juno_social_section',
        'label'                 => __( 'LinkedIn', 'juno' ),
    ) );
    
    // Behance URL
    $wp_customize->add_setting( 'juno_social_icon_behance_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'juno_social_icon_behance_url', array(
        'type'                  => 'text',
        'section'               => 'juno_social_section',
        'label'                 => __( 'Behance', 'juno' ),
    ) );
    
    // Instagram URL
    $wp_customize->add_setting( 'juno_social_icon_instagram_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'juno_social_icon_instagram_url', array(
        'type'                  => 'text',
        'section'               => 'juno_social_section',
        'label'                 => __( 'Instagram', 'juno' ),
    ) );
    
    // Pinterest URL
    $wp_customize->add_setting( 'juno_social_icon_pinterest_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'juno_social_icon_pinterest_url', array(
        'type'                  => 'text',
        'section'               => 'juno_social_section',
        'label'                 => __( 'Pinterest', 'juno' ),
    ) );
    
    // YouTube URL
    $wp_customize->add_setting( 'juno_social_icon_youtube_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'juno_social_icon_youtube_url', array(
        'type'                  => 'text',
        'section'               => 'juno_social_section',
        'label'                 => __( 'YouTube', 'juno' ),
    ) );
    
    // Vimeo URL
    $wp_customize->add_setting( 'juno_social_icon_vimeo_url', array (
        'default'               => '',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'juno_social_icon_vimeo_url', array(
        'type'                  => 'text',
        'section'               => 'juno_social_section',
        'label'                 => __( 'Vimeo', 'juno' ),
    ) );