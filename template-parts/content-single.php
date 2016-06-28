<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Juno
 */

?>

<div id="single-post-container" class="container">

    <div class="row">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
                <div class="sidebar-container col-sm-3">

                    <?php get_sidebar( 'left' ); ?>

                </div>
            <?php endif; ?>
            
            <div class="col-sm-<?php echo juno_main_width(); ?>">
                
                <div class="row">
            
                    <div class="col-sm-12">

                        <div id="single-image-container" style="background-image: url(<?php echo has_post_thumbnail() ? esc_url( the_post_thumbnail_url( 'large' ) ) : get_template_directory_uri() . '/inc/images/blog-post-default.jpg'; ?>);">

                            <div id="single-title-box">

                                <h2 class="entry-title"><?php the_title(); ?></h2>

                                <h6 class="post-meta">
                                    <?php echo get_theme_mod( 'juno_blog_show_date', 'show' ) == 'show' ? juno_posted_on() : ''; ?>
                                    <?php if ( get_theme_mod( 'juno_blog_show_author', 'show' ) == 'show' ) : ?>    
                                    by <span class="post-author"><?php the_author_posts_link(); ?></span>
                                    <?php endif; ?>
                                </h6>

                            </div>

                        </div>

                    </div>

                    <div class="col-sm-12">

                        <div class="entry-content">

                            <?php the_content(); ?>

                            <?php
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newstand' ),
                                    'after'  => '</div>',
                                ) );
                            ?>

                        </div><!-- .entry-content -->

                        <?php the_post_navigation(); ?>

                    </div>
                    
                    <div class="col-sm-12">
                        
                        <?php 
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                            endif;
                        ?>
                        
                    </div>
            
                </div>
                    
            </div>
            
            <?php if ( is_active_sidebar( 'sidebar-right' ) ) : ?>
                <div class="sidebar-container col-sm-3">

                    <?php get_sidebar( 'right' ); ?>

                </div>
            <?php endif; ?>
            
        </article>
        
    </div>
    
</div>
