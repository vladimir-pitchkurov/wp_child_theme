<?php

function create_posttype() {
    register_post_type( 'movie',
        array(
            'labels' => array(
                'name' => __( 'movie' ),
                'singular_name' => __( 'movie' )
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
            "taxonomies" => array( "country", "ganre","year_of_movie", "actors" ),
        )
    );

    register_taxonomy( "ganre", array( "movie" ), array(
        "label" => __( "ganres", "" ),
        "labels" => array(
            "name" => __( "ganres", "" ),
            "singular_name" => __( "ganre", "" ),
            "menu_name" => __( "ganre", "" ),
        ),
        "public" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'ganres', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_quick_edit" => false,
    ));

    register_taxonomy( "country", array( "movie" ), array(
        "label" => __( "country", "" ),
        "labels" => array(
            "name" => __( "country", "" ),
            "singular_name" => __( "country", "" ),
            "menu_name" => __( "country", "" ),
        ),
        "public" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'country', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_quick_edit" => false,
    ));

    register_taxonomy( "year_of_movie", array( "movie" ), array(
        "label" => __( "year_of_movie", "" ),
        "labels" => array(
            "name" => __( "year_of_movie", "" ),
            "singular_name" => __( "year_of_movie", "" ),
            "menu_name" => __( "year_of_movie", "" ),
        ),
        "public" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'year_of_movie', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_quick_edit" => false,
    ));

    register_taxonomy( "actors", array( "movie" ), array(
        "label" => __( "actors", "" ),
        "labels" => array(
            "name" => __( "actors", "" ),
            "singular_name" => __( "actors", "" ),
            "menu_name" => __( "actors", "" ),
        ),
        "public" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'actors', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_quick_edit" => false,
    ));
}
add_action( 'init', 'create_posttype' );



