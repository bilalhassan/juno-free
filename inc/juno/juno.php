<?php

/**
 * Enqueue scripts and styles.
 */
function juno_scripts() {
    
    wp_enqueue_style( 'juno-style', get_stylesheet_uri() );

    // Load Fonts from array
    $fonts = juno_fonts();

    // Primary Font Enqueue
    if( array_key_exists ( get_theme_mod( 'juno_font_primary', 'Rajdhani, sans-serif'), $fonts ) ) :
        wp_enqueue_style('juno-font-primary', '//fonts.googleapis.com/css?family=' . $fonts[ get_theme_mod( 'juno_font_primary', 'Montserrat, sans-serif' ) ], array(), JUNO_VERSION );
    endif;

    // Secondary Font Enqueue
    if( array_key_exists ( get_theme_mod( 'juno_font_secondary', 'Abel, sans-serif'), $fonts ) ) :
        wp_enqueue_style('juno-font-secondary', '//fonts.googleapis.com/css?family=' . $fonts[ get_theme_mod( 'juno_font_secondary', 'Abel, sans-serif' ) ], array(), JUNO_VERSION );
    endif;

    // Body Font Enqueue
    if( array_key_exists ( get_theme_mod( 'juno_font_body', 'Roboto Condensed, sans-serif'), $fonts ) ) :
        wp_enqueue_style('juno-font-body', '//fonts.googleapis.com/css?family=' . $fonts[ get_theme_mod( 'juno_font_body', 'Lato, sans-serif' ) ], array(), JUNO_VERSION );
    endif;
    
    wp_enqueue_style( 'juno-bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', array(), JUNO_VERSION );
    wp_enqueue_style( 'juno-animate', get_template_directory_uri() . '/inc/css/animate.css', array(), JUNO_VERSION );
    wp_enqueue_style( 'juno-font-awesome', get_template_directory_uri() . '/inc/css/font-awesome.min.css', array(), JUNO_VERSION );
    wp_enqueue_style( 'juno-slick-nav', get_template_directory_uri() . '/inc/css/slicknav.min.css', array(), JUNO_VERSION );
    wp_enqueue_style( 'juno-camera-style', get_template_directory_uri() . '/inc/css/camera.css', array(), JUNO_VERSION );
    wp_enqueue_style( 'juno-main-style', get_template_directory_uri() . '/inc/css/style.css', array(), JUNO_VERSION );

    wp_enqueue_script( 'juno-camera-script', get_template_directory_uri() . '/inc/js/camera.min.js', array('jquery'), JUNO_VERSION, true );
    wp_enqueue_script( 'juno-slick-nav-script', get_template_directory_uri() . '/inc/js/jquery.slicknav.min.js', array('jquery'), JUNO_VERSION, true );
    wp_enqueue_script( 'juno-main-script', get_template_directory_uri() . '/inc/js/custom.js', array('jquery', 'jquery-masonry'), JUNO_VERSION, true );
    
    // wp_enqueue_script( 'juno-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    // wp_enqueue_script( 'juno-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
}
add_action( 'wp_enqueue_scripts', 'juno_scripts' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function juno_widgets_init() {
    
    register_sidebar( array(
            'name'          => esc_html__( 'Left Sidebar', 'juno' ),
            'id'            => 'sidebar-left',
            'description'   => esc_html__( 'Add widgets here.', 'juno' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
            'name'          => esc_html__( 'Right Sidebar', 'juno' ),
            'id'            => 'sidebar-right',
            'description'   => esc_html__( 'Add widgets here.', 'juno' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
            'name'          => esc_html__( 'Footer', 'juno' ),
            'id'            => 'sidebar-footer',
            'description'   => esc_html__( 'Add widgets here.', 'juno' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
            'name'          => esc_html__( 'Homepage A', 'juno' ),
            'id'            => 'sidebar-front-a',
            'description'   => esc_html__( 'Add widgets here.', 'juno' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
            'name'          => esc_html__( 'Homepage B', 'juno' ),
            'id'            => 'sidebar-front-b',
            'description'   => esc_html__( 'Add widgets here.', 'juno' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
            'name'          => esc_html__( 'Homepage C', 'juno' ),
            'id'            => 'sidebar-front-c',
            'description'   => esc_html__( 'Add widgets here.', 'juno' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'juno_widgets_init' );

/**
 * Inject custom CSS in the header to handle certain theme mods.
 * 
 */
function juno_custom_css() { ?>

    <style type="text/css">
        
        /* ---------- FONT SIZES ---------- */
        
        body {
             font-size: <?php echo esc_attr( get_theme_mod( 'juno_font_body_size', '14') ); ?>px; 
        }
                
        #site-branding a {
             font-size: <?php echo esc_attr( get_theme_mod( 'juno_title_font_size', '36') ); ?>px; 
        }
        
        ul#primary-menu > li > a,
        .slicknav_nav a {
             font-size: <?php echo esc_attr( get_theme_mod( 'juno_nav_menu_font_size', '10') ); ?>px; 
        }
        
        /* ---------- FONT FAMILIES ---------- */
        
        h1,h2,h3,h4,h5,h6 {
            font-family: <?php echo esc_attr( get_theme_mod( 'juno_font_primary', 'Montserrat, sans-serif' ) ); ?>;
        }
        
        ul#primary-menu a
        {
            /* font-family: <?php echo esc_attr( get_theme_mod( 'juno_font_secondary', 'Abel, sans-serif' ) ); ?>; */
        }
        
        body {
            font-family: <?php echo esc_attr( get_theme_mod( 'juno_font_body', 'Lato, sans-serif' ) ); ?>;
        }
        
        /* ---------- THEME COLORS ---------- */
        
        
    </style>
    
    <?php 
    
    if ( get_theme_mod( 'juno_css', false ) ) :
    
        echo '<style type="text/css">' . get_theme_mod( 'juno_css', false ) . '</style>';

    endif;
    
}
add_action('wp_head', 'juno_custom_css');

/**
 * Returns all available fonts as an array
 * 
 * @return array of fonts
 */
function juno_fonts(){
    
    $font_family_array = array(
        
        'Abel, sans-serif'                                  => 'Abel',
        'Dosis, sans-serif'                                 => 'Dosis:200,300,400',
        'Open Sans, sans-serif'                             => 'Open+Sans:300,400italic,400',
        'Impact, Charcoal, sans-serif'                      => 'Impact',
        'Lucida Console, Monaco, monospace'                 => 'Lucida Console',
        'Lucida Sans Unicode, Lucida Grande, sans-serif'    => 'Lucida Sans Unicode',
        'MS Sans Serif, Geneva, sans-serif'                 => 'MS Sans Serif',
        'MS Serif, New York, serif'                         => 'MS Serif',
        'Palatino Linotype, Book Antiqua, Palatino, serif'  => 'Palatino Linotype',
        'Voltaire, sans-serif'                              => 'Voltaire',
        'Bangers, cursive'                                  => 'Bangers',
        'Lobster Two, cursive'                              => 'Lobster+Two',
        'Josefin Sans, sans-serif'                          => 'Josefin+Sans:300,400,600,700',
        'Montserrat, sans-serif'                            => 'Montserrat:400,700',
        'Poiret One, cursive'                               => 'Poiret+One',
        'Source Sans Pro, sans-serif'                       => 'Source+Sans+Pro:200,400,600',
        'Lato, sans-serif'                                  => 'Lato:100,300,400,700,900,300italic,400italic',
        'Raleway, sans-serif'                               => 'Raleway:200,400,300,500,700',
        'Shadows Into Light, cursive'                       => 'Shadows+Into+Light',
        'Orbitron, sans-serif'                              => 'Orbitron',
        'PT Sans Narrow, sans-serif'                        => 'PT+Sans+Narrow',
        'Lora, serif'                                       => 'Lora',
        'Oswald, sans-serif'                                => 'Oswald:300',
        'Titillium Web, sans-serif'                         => 'Titillium+Web:400,200,300,600,700,200italic,300italic,400italic,600italic,700italic',
        'Teko, sans-serif'                                  => 'Teko:300,400,600',
        'Roboto, sans-serif'                                => 'Roboto:100,300,400,500',
        'Roboto Condensed, sans-serif'                      => 'Roboto+Condensed:400,300,700',
        'Economica, sans-serif'                             => 'Economica:400,700',
        'Rajdhani, sans-serif'                              => 'Rajdhani:300,400,500,600',
        
    );
    
    return $font_family_array;
}