<!--<h1>I am here? content-movie</h1>-->

<article id="post-<?php the_ID(); ?>" <?php post_class('vo_archive-post'); ?>>
    <header class="entry-header page-header">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        <?php if (of_get_option('single_post_image', 1) == 1) :
            the_post_thumbnail('unite-featured', array('class' => 'thumbnail'));
        endif; ?>
    </header>
    <?php if (is_search()) : ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
            <p><a class="btn btn-primary read-more"
                  href="<?php the_permalink(); ?>">
                    <?php _e('Continue reading', 'unite'); ?>
                    <i class="fa fa-chevron-right"></i></a>
            </p>
        </div>
    <?php else : ?>
        <div class="entry-content">

            <?php if (of_get_option('blog_settings') == 1 || !of_get_option('blog_settings')) : ?>
                <?php the_content(__('Continue reading <i class="fa fa-chevron-right"></i>', 'unite')); ?>
            <?php elseif (of_get_option('blog_settings') == 2) : ?>
                <?php the_excerpt(); ?>
            <?php endif; ?>

            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'unite'),
                'after' => '</div>',
            ));
            ?>
        </div>
    <?php endif; ?>

    <footer class="entry-meta">
        <?php if ('post' == get_post_type()) : // Hide category and tag text for pages on Search ?>
            <?php
            $categories_list = get_the_category_list(__(', ', 'unite'));
            if ($categories_list && unite_categorized_blog()) :
                ?>
                <span class="cat-links"><i class="fa fa-folder-open-o"></i>
                    <?php printf(__(' %1$s', 'unite'), $categories_list); ?>
			</span>
            <?php endif; ?>

            <?php
            $tags_list = get_the_tag_list('', __(', ', 'unite'));
            if ($tags_list) :
                ?>
                <span class="tags-links"><i class="fa fa-tags"></i>
                    <?php printf(__(' %1$s', 'unite'), $tags_list); ?>
			</span>
            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <?php $post = get_post();
            $id = get_the_ID();

            echo '<h5 class="col-md-6">Страна:  ' . get_the_term_list($id, 'country', '', ', ', '') . '</h5>';
            echo '<h5 class="col-md-6">Жанр:  ' . get_the_term_list($id, 'ganre', '', ', ', '') . '</h5>';
            echo '<h5 class="col-md-6">Дата выхода: ';
            foreach (get_post_meta($id, 'date') as $item) {
                echo $item;
            };
            echo '</h5>';
            echo '<h5 class="col-md-6">Цена: ';
            foreach (get_post_meta($id, 'price') as $item) {
                echo $item;
            };
            echo '</h5>';

            ?>
        </div>
        <?php if (!post_password_required() && (comments_open() || '0' != get_comments_number())) : ?>
            <span class="comments-link"><i
                        class="fa fa-comment-o"></i><?php comments_popup_link(__('Leave a comment', 'unite'), __('1 Comment', 'unite'), __('% Comments', 'unite')); ?></span>
        <?php endif; ?>

        <?php edit_post_link(__('Edit', 'unite'), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>'); ?>
    </footer>
</article>
