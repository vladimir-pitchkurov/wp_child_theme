<?php get_header(); ?>

<section id="primary" class="content-area col-sm-12 <?php echo of_get_option('site_layout'); ?>">
    <main id="main" class="site-main" role="main">

        <?php if (have_posts()) : ?>
        <div class="container">
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-4">
                        <?php get_template_part('content-movie', get_post_format()); ?>
                    </div>
                <?php endwhile; ?>
                <?php unite_paging_nav(); ?>
                <?php else : ?>
                    <?php get_template_part('content', 'none'); ?>
                <?php endif; ?>
            </div>
        </div>
    </main>
</section>

<?php get_footer(); ?>
