<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Juno
 */

?>

<div class="blog-roll-item">

    <article data-link="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>" id="post-<?php esc_attr( the_ID() ); ?>" <?php post_class(); ?>>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="image">
                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                    <?php esc_html( the_post_thumbnail( 'medium' ) ); ?>
                </a>
            </div>
        <?php endif; ?>
        
        <div class="inner">

            <h6 class="post-category">
                <?php 
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                    }
                ?>
            </h6>
            
            <h3 class="post-title">
                <a href="<?php echo esc_url( get_the_permalink() ); ?>">
                    <?php esc_html( the_title() ); ?>
                </a>
            </h3>
            
            <hr>
            
            <div class="post-content">
                <?php echo wp_trim_words( strip_tags( get_the_content() ), 50 ); ?>
            </div>

            <?php if ( get_theme_mod( 'juno_blog_show_date', 'show' ) == 'show' || get_theme_mod( 'juno_blog_show_author', 'show' ) == 'show' ) : ?>
                <h5 class="post-meta">
                    <?php echo get_theme_mod( 'juno_blog_show_date', 'show' ) == 'show' ? juno_posted_on() : ''; ?>
                    <?php if ( get_theme_mod( 'juno_blog_show_author', 'show' ) == 'show' ) : ?>    
                    by <span class="post-author"><?php esc_html( the_author_posts_link() ); ?></span>
                    <?php endif; ?>
                </h5>
            <?php endif; ?>
            
            <div class="image-corner" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/inc/images/blog-corner-skin-1.png' ); ?>);"></div>
            <a href="<?php the_permalink() ?>">
                <i class="fa fa-external-link icon"></i>
            </a>
            
        </div>

    </article>

</div>