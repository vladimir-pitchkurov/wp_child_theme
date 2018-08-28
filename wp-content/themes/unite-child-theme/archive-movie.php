<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package unite
 */

get_header(); ?>

<section id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
    <main id="main" class="site-main" role="main">

        <?php if ( have_posts() ) : ?>


            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <h1>IN ARCHIVE_MOVIE</h1>
                <?php
                /* Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'content-movie', get_post_format() );
                ?>
                <h1>IN ARCHIVE_MOVIE :: after</h1>

            <?php endwhile; ?>

            <?php unite_paging_nav(); ?>

        <?php else : ?>

            <?php get_template_part( 'content', 'none' ); ?>

        <?php endif; ?>

    </main><!-- #main -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
