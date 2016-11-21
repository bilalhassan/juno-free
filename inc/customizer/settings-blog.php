<?php

// ---------------------------------------------
// Blog Panel
// ---------------------------------------------
$wp_customize->add_panel( 'juno_blog_panel', array (
    'title'                 => __( 'Blog', 'juno' ),
    'description'           => __( 'Customize the appearance of the Blog', 'juno' ),
    'priority'              => 10
) );

// ---------------------------------------------
// Layout Section
// ---------------------------------------------

$wp_customize->add_section( 'juno_blog_layout_section', array (
    'title'                 => __( 'Layout', 'juno' ),
    'description'           => __( 'Customize the layout of your blog template', 'juno' ),
    'panel'                 => 'juno_blog_panel',
) );

    // Blog Section Title Toggle
    $wp_customize->add_setting( 'juno_blog_title_toggle', array (
        'default'               => 'show',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_show_hide',
    ) );
    $wp_customize->add_control( 'juno_blog_title_toggle', array(
        'type'                  => 'radio',
        'section'               => 'juno_blog_layout_section',
        'label'                 => __( 'Show Blog Roll Title?', 'juno' ),
        'choices'               => array(
            'show'      => __( 'Show', 'juno' ),
            'hide'      => __( 'Hide', 'juno' ),
    ) ) );

    // Blog Section Title
    $wp_customize->add_setting( 'juno_blog_title', array (
        'default'               => __( 'Blog', 'juno' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_text',
    ) );
    $wp_customize->add_control( 'juno_blog_title', array(
        'type'                  => 'text',
        'section'               => 'juno_blog_layout_section',
        'label'                 => __( 'Blog Roll Title', 'juno' ),
    ) );
    
    // Corner Hover Tab Color
    $wp_customize->add_setting( 'juno_blog_hover_tab_color', array (
        'default'               => '#999999',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_color',
    ) );
    $wp_customize->add_control( 
	new WP_Customize_Color_Control( $wp_customize, 'juno_blog_hover_tab_color', array(
            'label'      => __( 'Blog Item - Hover Tab Color', 'juno' ),
            'section'    => 'juno_blog_layout_section',
            'settings'   => 'juno_blog_hover_tab_color',
	) ) 
    );     
    
    // Corner Hover Tab Icon
    $wp_customize->add_setting( 'juno_blog_hover_tab_icon', array (
        'default'               => 'fa fa-share',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'juno_sanitize_tab_icon',
    ) );
    $wp_customize->add_control( 'juno_blog_hover_tab_icon', array(
        'type'                  => 'select',
        'section'               => 'juno_blog_layout_section',
        'label'                 => __( 'Blog Item - Hover Tab Icon', 'juno' ),
        'choices'               => juno_link_tab_icons(),
    ) );
