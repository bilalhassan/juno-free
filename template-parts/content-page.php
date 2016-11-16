<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Juno
 */

?>

<div id="single-page-container" class="container">

    <div class="row">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="col-sm-12">
                
                <div id="single-image-container" class="<?php echo has_post_thumbnail() ? '' : esc_attr( 'no-header-img' ); ?>" style="background-image: url(<?php echo has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ) : ''; ?>);">

                    <div id="single-title-box" class="<?php echo has_post_thumbnail() ? '' : esc_attr( 'no-header-img' ); ?>">

                        <h2 class="entry-title"><?php the_title(); ?></h2>

                    </div>

                </div>
                
            </div>
            
            <?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
                <div class="sidebar-container col-sm-3">

                    <?php get_sidebar( 'left' ); ?>

                </div>
            <?php endif; ?>
            
            <div class="col-sm-<?php echo esc_attr( juno_main_width() ); ?>">
            
                <div class="row">

                    <div class="col-sm-12">

                        <div class="entry-content">

                            <?php the_content(); ?>

                            <?php
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'juno' ),
                                    'after'  => '</div>',
                                ) );
                            ?>

                        </div><!-- .entry-content -->

                        <?php the_post_navigation(); ?>

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

