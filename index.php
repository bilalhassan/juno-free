<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Juno
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div id="front-page-content" class="container">
              
                <div class="row">

                    <div id="archive-blog" class="col-sm-12">

                        <?php if ( get_theme_mod( 'juno_blog_title_toggle', 'show' ) == 'show' ) : ?> 

                            <header>
                                <h1 class="page-title">
                                    <?php echo esc_html( get_theme_mod( 'juno_blog_title', __('Here\'s some stuff you might like!', 'juno' ) ) ); ?>
                                </h1>
                                <hr class="accent-divider">
                            </header>

                        <?php endif; ?>

                        <div class="row">

                            <?php if ( have_posts() ) : ?>

                                <div class="juno-blog-content">

                                    <div id="masonry-blog-wrapper">

                                        <div class="grid-sizer"></div>
                                        <div class="gutter-sizer"></div>

                                        <?php

                                        /* Start the Loop */
                                        while ( have_posts() ) : the_post();

                                            get_template_part( 'template-parts/content', 'blog' );

                                        endwhile;

                                        ?>

                                    </div><!-- #masonry-blog-wrapper -->

                                    <div class="pagination-links">
                                        <?php echo paginate_links(); ?>
                                    </div>

                                </div><!-- #juno-blog-content -->

                            <?php else :

                                get_template_part( 'template-parts/content', 'none' );

                            endif; ?>

                        </div>

                    </div>

                </div>

            </div>
            
        </main><!-- #main -->
        
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
