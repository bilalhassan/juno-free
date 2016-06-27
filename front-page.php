<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Juno
 */
get_header();
$front = get_option( 'show_on_front' ); ?>

<div id="primary" class="content-area">
    
    <main id="main" class="site-main" role="main">
       
        <?php if ( $front != 'posts' ) : ?>

            <?php if ( get_theme_mod( 'juno_jumbotron_visibility_toggle', 'show' )  == 'show' ) { do_action( 'juno_jumbotron' ); } ?>
        
            <?php if ( get_theme_mod( 'juno_bio_visibility_toggle', 'show' )        == 'show' ) { do_action( 'juno_bio' ); } ?>
            
            <?php if ( get_theme_mod( 'juno_subscribe_visibility_toggle', 'show' )  == 'show' ) { do_action( 'juno_subscribe' ); } ?>
            
            <?php do_action( 'juno_homepage_widget_areas' ); ?>
        
            <?php if ( get_theme_mod( 'juno_social_visibility_toggle', 'show' )  == 'show' ) { do_action( 'juno_social' ); } ?>
        
        <?php endif; ?>
         
        <div id="front-page-content" class="container">

            <div class="row">

                <div id="front-page-blog" class="col-sm-12">

                    <div class="row">

                        <?php if ( have_posts() ) : ?>

                            <?php if ( is_home() && !is_front_page() ) : ?>

                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>

                            <?php endif; ?>
                        
                            <?php if ( $front == 'posts' && get_theme_mod( 'juno_blog_title_toggle', 'show' ) == 'show' ) : ?> 

                                <div class="col-sm-12">
                                    <header>
                                        <h1 class="page-title">
                                            <?php echo esc_html( get_theme_mod( 'juno_blog_title', __('Here\'s some stuff you might like!', 'juno' ) ) ); ?>
                                        </h1>
                                        <hr class="accent-divider">
                                    </header>
                                </div>
                                <div class="clear"></div>
                        
                            <?php endif; ?>

                            <?php echo $front == 'posts' ? '<div class="juno-blog-content"><div id="masonry-blog-wrapper"><div class="grid-sizer"></div><div class="gutter-sizer"></div>' : ''; ?>

                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php
                                    if ( $front == 'posts' ) :
                                        get_template_part( 'template-parts/content-blog', get_post_format() );
                                    else:
                                        get_template_part( 'template-parts/content-page-home', get_post_format() );
                                    endif;
                                ?>

                            <?php endwhile; ?>

                            <?php echo $front == 'posts' ? '</div></div>' : ''; ?>

                            <?php if ( $front == 'posts' ) : ?>
                                <div class="col-sm-12">
                                    <div>
                                        <div class="pagination-links"> 
                                            <?php echo paginate_links(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        <?php else : ?>

                            <?php get_template_part('template-parts/content', 'none'); ?>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>
            
    </main><!-- #main -->
    
</div><!-- #primary -->

<?php get_footer(); ?>      