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

    wp_enqueue_script( 'juno-jquery-easing', get_template_directory_uri() . '/inc/js/jquery.easing.1.3.js', array('jquery'), JUNO_VERSION, true );
    wp_enqueue_script( 'juno-jquery-mobile', get_template_directory_uri() . '/inc/js/jquery.mobile.customized.min.js', array('jquery'), JUNO_VERSION, true );
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
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="col-sm-12">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
            'name'          => esc_html__( 'Right Sidebar', 'juno' ),
            'id'            => 'sidebar-right',
            'description'   => esc_html__( 'Add widgets here.', 'juno' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="col-sm-12">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
            'name'          => esc_html__( 'Footer', 'juno' ),
            'id'            => 'sidebar-footer',
            'description'   => esc_html__( 'Add widgets here.', 'juno' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
    ) );
    
    register_sidebar( array(
            'name'          => esc_html__( 'Homepage A', 'juno' ),
            'id'            => 'sidebar-front-a',
            'description'   => esc_html__( 'Add widgets here.', 'juno' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="col-sm-4">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
            'name'          => esc_html__( 'Homepage B', 'juno' ),
            'id'            => 'sidebar-front-b',
            'description'   => esc_html__( 'Add widgets here.', 'juno' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="col-sm-4">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
    ) );
    
    register_sidebar( array(
            'name'          => esc_html__( 'Homepage C', 'juno' ),
            'id'            => 'sidebar-front-c',
            'description'   => esc_html__( 'Add widgets here.', 'juno' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="col-sm-4">',
            'after_widget'  => '</div></section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
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

/**
 * Returns all posts as an array
 * 
 * @return array of posts
 */
function juno_all_posts_array() {
    
    $posts = get_posts( array(
        'post_type'        => 'post',
        'posts_per_page'   => -1,
        'post_status'      => 'publish',
        'orderby'          => 'title',
        'order'            => 'ASC',
    ));

    $posts_array = array();

    foreach ( $posts as $post ) :
        
        if ( ! empty( $post->ID ) ) :
            $posts_array[ $post->ID ] = $post->post_title;
        endif;
        
    endforeach;
    
    return $posts_array;
    
}

/**
 * Render the jumbotron.
 */
function juno_render_jumbotron() { ?>
    
    <div id="jumbotron-section" class="container-fluid">
        
        <div class="row">
            
            <div class="col-sm-12">
                
                <div id="camera_slider" class="camera_wrap">

                    <?php if ( ! is_null( get_theme_mod( 'juno_jumbotron_post_1', null ) ) ) : ?>
                        <div class="camera_lime_skin" data-src="<?php echo has_post_thumbnail( get_theme_mod( 'juno_jumbotron_post_1', null ) ) ? get_the_post_thumbnail_url( get_theme_mod( 'juno_jumbotron_post_1', null ) ) : get_template_directory_uri() . '/inc/images/blog-post-default-bg.jpg' ; ?>">

                            <div class="camera_caption wow fadeIn">
                                <a href="<?php echo get_the_permalink( get_theme_mod( 'juno_jumbotron_post_1', null ) ); ?>">
                                    <?php echo get_the_title( get_theme_mod( 'juno_jumbotron_post_1', null ) ); ?>
                                </a>
                            </div>

                        </div>
                    <?php endif; ?>

                    <?php if ( ! is_null( get_theme_mod( 'juno_jumbotron_post_2', null ) ) ) : ?>
                        <div class="camera_lime_skin" data-src="<?php echo has_post_thumbnail( get_theme_mod( 'juno_jumbotron_post_2', null ) ) ? get_the_post_thumbnail_url( get_theme_mod( 'juno_jumbotron_post_2', null ) ) : get_template_directory_uri() . '/inc/images/blog-post-default-bg.jpg' ; ?>">

                            <div class="camera_caption wow fadeIn">
                                <a href="<?php echo get_the_permalink( get_theme_mod( 'juno_jumbotron_post_2', null ) ); ?>">
                                    <?php echo get_the_title( get_theme_mod( 'juno_jumbotron_post_2', null ) ); ?>
                                </a>
                            </div>

                        </div>
                    <?php endif; ?>

                    <?php if ( ! is_null( get_theme_mod( 'juno_jumbotron_post_3', null ) ) ) : ?>
                        <div class="camera_lime_skin" data-src="<?php echo has_post_thumbnail( get_theme_mod( 'juno_jumbotron_post_3', null ) ) ? get_the_post_thumbnail_url( get_theme_mod( 'juno_jumbotron_post_3', null ) ) : get_template_directory_uri() . '/inc/images/blog-post-default-bg.jpg' ; ?>">

                            <div class="camera_caption wow fadeIn">
                                <a href="<?php echo get_the_permalink( get_theme_mod( 'juno_jumbotron_post_3', null ) ); ?>">
                                    <?php echo get_the_title( get_theme_mod( 'juno_jumbotron_post_3', null ) ); ?>
                                </a>
                            </div>

                        </div>
                    <?php endif; ?>

                </div>
                
            </div>
            
        </div>
        
    </div>

<?php }
add_action( 'juno_jumbotron', 'juno_render_jumbotron' );

/**
 * Render the about / biography section.
 */
function juno_render_bio() { ?>
    
    <div id="about-section" class="container">
        
        <div class="row">
            
            <div class="col-sm-5">
                
                <h2 id="about-primary">
                    <?php echo esc_html( get_theme_mod( 'juno_about_section_primary', __( 'Users can input any flavor text they like and it will be output as this large text blurb.', 'juno' ) ) ); ?>
                </h2>
                
                <hr class="accent-divider">
                
                <p id="about-secondary">
                    <?php echo esc_html( get_theme_mod( 'juno_about_section_secondary', __( 'Etiam eget hendrerit elit, in pellentesque enim. Quisque ac laoreet mi. Curabitur id tristique ipsum. Morbi a tortor ut elit pharetra tempor quis vitae nisl. Nam condimentum eros velit.', 'juno' ) ) ); ?>
                </p>
                
                <?php if ( get_theme_mod( 'juno_about_section_button_toggle', 'show' ) == 'show' ) : ?>
                
                    <a class="accent-button" href="<?php echo get_theme_mod( 'juno_about_section_button_link', '' ) != '' ? esc_url( get_theme_mod( 'juno_about_section_button_link', '' ) ) : ''; ?>">
                        <?php echo get_theme_mod( 'juno_about_section_button_label', '' ) != '' ? esc_html( get_theme_mod( 'juno_about_section_button_label', '' ) ) : __( 'Show Me More', 'juno' ); ?>
                    </a>
                
                <?php endif; ?>
                
            </div>
            
            <div class="col-sm-1"></div>
            
            <div id="about-feature-a" class="col-sm-3">
                
                <h6 class="feature-title">
                    <?php echo esc_html( get_theme_mod( 'juno_about_feature_title_a', __( 'Small Feature A', 'juno' ) ) ); ?>
                </h6>
                
                <p class="feature-body">
                    <?php echo esc_html( get_theme_mod( 'juno_about_feature_body_a', __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam iaculis, massa eget efficitur volutpat, turpis justo laoreet risus, sit amet viverra diam leo non turpis. Donec quis hendrerit arcu. In hac habitasse platea dictumst. Curabitur suscipit dignissim mi, vitae efficitur lectus. Etiam dictum turpis ac scelerisque porta. Morbi cursus neque sed iaculis porta. Nulla facilisi. Etiam tincidunt, orci ac pellentesque iaculis, mauris elit ultrices augue, ac tempus augue lorem in quam.', 'juno' ) ) ); ?>
                </p>
                
            </div>
            
            <div id="about-feature-b" class="col-sm-3">
                
                <h6 class="feature-title">
                    <?php echo esc_html( get_theme_mod( 'juno_about_feature_title_b', __( 'Small Feature B', 'juno' ) ) ); ?>
                </h6>
                
                <p class="feature-body">
                    <?php echo esc_html( get_theme_mod( 'juno_about_feature_body_b', __( 'Mauris semper eleifend sem, scelerisque cursus augue pulvinar eu. In hac habitasse platea dictumst. Aenean dapibus, quam a hendrerit placerat, elit dolor hendrerit ante, non scelerisque nisi justo id orci. Curabitur efficitur purus orci, sed suscipit lacus sollicitudin ac. Nullam turpis purus, hendrerit vitae dapibus id, rutrum efficitur sem. Integer consequat lacinia quam id gravida. Pellentesque pharetra nisl at lectus semper, commodo lobortis neque vulputate. Nunc accumsan erat lectus, eu condimentum mauris egestas vitae.', 'juno' ) ) ); ?>
                </p>
                
            </div>
            
        </div>
        
    </div>

<?php }
add_action( 'juno_bio', 'juno_render_bio' );

/**
 * Render the homepage subscribe CTA area.
 */
function juno_render_subscribe_module() { ?>
    
    <div id="subscribe-module" class="container-fluid">
        
        <div class="row">
            
            <div class="col-sm-12">
                
                <div class="container">
                    
                    <div class="row">
            
                        <div class="col-sm-6">

                            <h2 id="subscribe-blurb">
                                <?php echo esc_html( get_theme_mod( 'juno_subscribe_title', __( 'Encourage visitors to sign up for your mailing list using this CTA banner!', 'juno' ) ) ); ?>
                            </h2>

                        </div>

                        <div class="col-sm-6">

                            <?php // TODO: Incorporate actual mailing list form shortcodes. ?>
                            <form>
                                <input type="email" name="user_email" placeholder="E-mail" />
                                <input type="submit" />
                            </form>
                            
                        </div>

                    </div>
                    
                </div>
                
            </div>
            
        </div>
       
    </div>

<?php }
add_action( 'juno_subscribe', 'juno_render_subscribe_module' );

/**
 * Render the homepage widget areas.
 */
function juno_render_homepage_widget_areas() { ?>
    
    <!-- Homepage Area A -->
    <?php if ( get_theme_mod( 'juno_toggle_widget_area_a', 'on' ) == 'on' ) : ?>
    
        <?php if ( ! is_active_sidebar( 'sidebar-front-a' ) ) : ?>

            <div class="container-fluid area-a">
                
                <div class="row">
                    
                    <div class="col-sm-12">
                        
                        <div class="container">
                            
                            <section class="front-page-widget area-a">

                                <div class="row">

                                    <div class="col-sm-12">

                                        <h6 class="default-text">
                                            <?php _e( 'Homepage A Widget Area', 'juno' ); ?>
                                        </h6>
                                        <div class="textwidget">
                                            <p class="default-text"><?php _e( 'You can enable/disable this widget area from Customizer - Frontpage - Homepage Widget A. This is a widget placeholder, and you can add any widget to it from Customizer - Widgets.', 'juno' ); ?></p>
                                        </div>

                                    </div>

                                </div>

                            </section>
                            
                        </div>
                        
                    </div>
                    
                </div>
    
            </div>

        <?php else : ?>

            <?php get_sidebar( 'front_a' ); ?>

        <?php endif; ?>
    
    <?php endif; ?>

    <!-- Homepage Area B -->
    <?php if ( get_theme_mod( 'juno_toggle_widget_area_b', 'on' ) == 'on' ) : ?>
    
        <?php if ( ! is_active_sidebar( 'sidebar-front-b' ) ) : ?>

            <div class="container-fluid area-b">
                
                <div class="row">
                    
                    <div class="col-sm-12">
                        
                        <div class="container">
                            
                            <section class="front-page-widget area-b">

                                <div class="row">

                                    <div class="col-sm-12">

                                        <h6 class="default-text">
                                            <?php _e( 'Homepage B Widget Area', 'juno' ); ?>
                                        </h6>
                                        <div class="textwidget">
                                            <p class="default-text"><?php _e( 'You can enable/disable this widget area from Customizer - Frontpage - Homepage Widget B. This is a widget placeholder, and you can add any widget to it from Customizer - Widgets.', 'juno' ); ?></p>
                                        </div>

                                    </div>

                                </div>

                            </section>
                            
                        </div>
                        
                    </div>
                    
                </div>
    
            </div>

        <?php else : ?>

            <?php get_sidebar( 'front_b' ); ?>

        <?php endif; ?>
    
    <?php endif; ?>
    
    <!-- Homepage Area C -->
    <?php if ( get_theme_mod( 'juno_toggle_widget_area_c', 'on' ) == 'on' ) : ?>
    
        <?php if ( ! is_active_sidebar( 'sidebar-front-c' ) ) : ?>

            <div class="container-fluid area-c">
                
                <div class="row">
                    
                    <div class="col-sm-12">
                        
                        <div class="container">
                            
                            <section class="front-page-widget area-c">

                                <div class="row">

                                    <div class="col-sm-12">

                                        <h6 class="default-text">
                                            <?php _e( 'Homepage C Widget Area', 'juno' ); ?>
                                        </h6>
                                        <div class="textwidget">
                                            <p class="default-text"><?php _e( 'You can enable/disable this widget area from Customizer - Frontpage - Homepage Widget C. This is a widget placeholder, and you can add any widget to it from Customizer - Widgets.', 'juno' ); ?></p>
                                        </div>

                                    </div>

                                </div>

                            </section>
                            
                        </div>
                        
                    </div>
                    
                </div>
    
            </div>

        <?php else : ?>

            <?php get_sidebar( 'front_c' ); ?>

        <?php endif; ?>
    
    <?php endif; ?>

<?php }
add_action( 'juno_homepage_widget_areas', 'juno_render_homepage_widget_areas' );

/**
 * Render the homepage social bararea.
 */
function juno_render_social_module() { ?>
    
    <div id="social-module" class="container-fluid">
        
        <div class="row">
            
            <div class="col-sm-12">
                
                <div class="container">
                    
                    <div class="row">
            
                        <div class="col-sm-12">

                            <?php if ( get_theme_mod( 'juno_social_message_toggle', 'show' ) == 'show' ) : ?>
                                <div id="social-message">
                                    <?php echo esc_html( get_theme_mod( 'juno_social_message', __( 'Stay Connected','juno') ) ); ?>
                                </div>
                            <?php endif; ?>
                            
                            <div id="social-container">

                                <?php if ( get_theme_mod( 'juno_social_icon_facebook_url', '#' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'juno_social_icon_facebook_url', '#' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-facebook"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'juno_social_icon_twitter_url', '#' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'juno_social_icon_twitter_url', '#' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-twitter"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'juno_social_icon_google_url', '#' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'juno_social_icon_google_url', '#' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-google-plus"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'juno_social_icon_linkedin_url', '#' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'juno_social_icon_linkedin_url', '#' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-linkedin"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'juno_social_icon_behance_url', '#' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'juno_social_icon_behance_url', '#' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-behance"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'juno_social_icon_instagram_url', '#' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'juno_social_icon_instagram_url', '#' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-instagram"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'juno_social_icon_pinterest_url', '#' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'juno_social_icon_pinterest_url', '#' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-pinterest-p"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'juno_social_icon_youtube_url', '#' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'juno_social_icon_youtube_url', '#' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-youtube-play"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                                <?php if ( get_theme_mod( 'juno_social_icon_vimeo_url', '#' ) != '' ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'juno_social_icon_vimeo_url', '#' ) ); ?>">
                                        <div class="social-bubble">
                                            <i class="fa fa-vimeo"></i>
                                        </div>
                                    </a>
                                <?php endif; ?>

                            </div>
                            
                        </div>

                    </div>
                    
                </div>
                
            </div>
            
        </div>
       
    </div>

<?php }
add_action( 'juno_social', 'juno_render_social_module' );


/**
 * Determine the width of columns based on left and right sidebar settings.
 */
function juno_main_width() {
    
    if( is_active_sidebar('sidebar-left') && is_active_sidebar('sidebar-right') ) :
        $width = 6;
    elseif( is_active_sidebar('sidebar-left') || is_active_sidebar('sidebar-right') ) :
        $width = 9;
    else:
        $width = 12;
    endif;
    
    return $width;

}