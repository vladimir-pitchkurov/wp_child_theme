<?php

function create_posttype()
{
    register_post_type('movie',
        array(
            'labels' => array(
                'name' => __('movie'),
                'singular_name' => __('movie')
            ),
            'public' => true,
            'has_archive' => 'movies',
            'rewrite' => array('slug' => 'movies'),
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                "comments",
                "custom-fields",
            ),
            "taxonomies" => array("country", "ganre", "year_of_movie", "actors"),
        )
    );

    register_taxonomy("ganre", array("movie"), array(
        "label" => __("ganres", ""),
        "labels" => array(
            "name" => __("ganres", ""),
            "singular_name" => __("ganre", ""),
            "menu_name" => __("ganre", ""),
        ),
        "public" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'ganres', 'with_front' => true,),
        "show_admin_column" => false,
        "show_in_quick_edit" => false,
    ));

    register_taxonomy("country", array("movie"), array(
        "label" => __("country", ""),
        "labels" => array(
            "name" => __("country", ""),
            "singular_name" => __("country", ""),
            "menu_name" => __("country", ""),
        ),
        "public" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'country', 'with_front' => true,),
        "show_admin_column" => false,
        "show_in_quick_edit" => false,
    ));

    register_taxonomy("year_of_movie", array("movie"), array(
        "label" => __("year_of_movie", ""),
        "labels" => array(
            "name" => __("year_of_movie", ""),
            "singular_name" => __("year_of_movie", ""),
            "menu_name" => __("year_of_movie", ""),
        ),
        "public" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'year_of_movie', 'with_front' => true,),
        "show_admin_column" => false,
        "show_in_quick_edit" => false,
    ));

    register_taxonomy("actors", array("movie"), array(
        "label" => __("actors", ""),
        "labels" => array(
            "name" => __("actors", ""),
            "singular_name" => __("actors", ""),
            "menu_name" => __("actors", ""),
        ),
        "public" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'actors', 'with_front' => true,),
        "show_admin_column" => false,
        "show_in_quick_edit" => false,
    ));
}

add_action('init', 'create_posttype');

function last_posts($count = 5)
{
    $defaults = array(
        'numberposts' => $count,
        'category' => 0, 'orderby' => 'date',
        'order' => 'DESC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '',
        'post_type' => 'movie',
    );

    $r = wp_parse_args($defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ('attachment' == $r['post_type']) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    $posts = $get_posts->query($r);

    global $post; ?>

    <div class="container">
        <div class="row">

            <?php foreach ($posts as $posti) {
                $post = $posti;
                setup_postdata($post); ?>

                <div class="col-md-4">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('vo_archive-post'); ?>>
                        <header class="entry-header page-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"
                                                       rel="bookmark"><?php the_title(); ?></a>
                            </h2>
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

                                echo '<h5 class="col-md-6"><i class="fa fa-map-marker" aria-hidden="true"></i>Страна:  ' . get_the_term_list($id, 'country', '', ', ', '') . '</h5>';
                                echo '<h5 class="col-md-6"><i class="fa fa-film" aria-hidden="true"></i>Жанр:  ' . get_the_term_list($id, 'ganre', '', ', ', '') . '</h5>';
                                echo '<h5 class="col-md-6"><i class="fa fa-calendar" aria-hidden="true"></i>Дата выхода: ';
                                foreach (get_post_meta($id, 'date') as $item) {
                                    echo $item;
                                };
                                echo '</h5>';
                                echo '<h5 class="col-md-6 "><i class="fa fa-btc" aria-hidden="true"></i>Цена: ';
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
                </div>

            <?php } ?>
        </div>
    </div>
    <?
}

add_shortcode('last_posts', 'last_posts');
