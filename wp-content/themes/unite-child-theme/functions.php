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
            "taxonomies" => array( "country", "ganre", "film_tax", "year_of_movie", "actors" ),
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

    register_taxonomy( "film_tax", array( "movie" ), array(
        "label" => __( "film_tax", "" ),
        "labels" => array(
            "name" => __( "film_tax", "" ),
            "singular_name" => __( "film_tax", "" ),
            "menu_name" => __( "film_tax", "" ),
        ),
        "public" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'film_tax', 'with_front' => true, ),
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



function cptui_register_my_cpts_films() {



    $labels = array(
        "name" => __( "film", "" ),
        "singular_name" => __( "film", "" ),
        "menu_name" => __( "films", "" ),
        "all_items" => __( "films", "" ),
        "add_new" => __( "add film", "" ),
        "add_new_item" => __( "add new film", "" ),
        "edit_item" => __( "edit film", "" ),
        "new_item" => __( "new film", "" ),
        "view_item" => __( "films", "" ),
        "view_items" => __( "films", "" ),
        "search_items" => __( "search films", "" ),
        "not_found" => __( "film is empty or not found", "" ),
        "archives" => __( "films", "" ),
    );

    $args = array(
        "label" => __( "film", "" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => "films",
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "films", "with_front" => true ),
        "query_var" => "films",
        "menu_position" => 6,
        "supports" => array( "title", "editor", "thumbnail", "custom-fields", "comments", "page-attributes", "post-formats", "films" ),
        "taxonomies" => array( "film_country", "film_ganres", "film_tax", "film_date", "film_actors" ),
    );

    register_post_type( "films", $args );
}

add_action( 'init', 'cptui_register_my_cpts_films' );

function cptui_register_my_taxes() {



    $labels = array(
        "name" => __( "film_country", "" ),
        "singular_name" => __( "film_country", "" ),
        "menu_name" => __( "country", "" ),
    );

    $args = array(
        "label" => __( "film_country", "" ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "film_country",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'film_country', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "film_country",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "film_country", array( "films" ), $args );



    $labels = array(
        "name" => __( "film_ganres", "" ),
        "singular_name" => __( "film_ganres", "" ),
        "menu_name" => __( "ganres", "" ),
    );

    $args = array(
        "label" => __( "film_ganres", "" ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "film_ganres",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'film_ganres', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "film_ganres",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "film_ganres", array( "films" ), $args );



    $labels = array(
        "name" => __( "film_tax", "" ),
        "singular_name" => __( "film_tax", "" ),
    );

    $args = array(
        "label" => __( "film_tax", "" ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "film_tax",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'film_tax', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "film_tax",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "film_tax", array( "films" ), $args );



    $labels = array(
        "name" => __( "film_date", "" ),
        "singular_name" => __( "film_date", "" ),
    );

    $args = array(
        "label" => __( "film_date", "" ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "film_date",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'film_date', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "film_date",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "film_date", array( "films" ), $args );


    $labels = array(
        "name" => __( "film_actors", "" ),
        "singular_name" => __( "film_actors", "" ),
    );

    $args = array(
        "label" => __( "film_actors", "" ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "film_actors",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'film_actors', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "film_actors",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "film_actors", array( "films" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes' );

function cptui_register_my_taxes_film_country() {



    $labels = array(
        "name" => __( "film_country", "" ),
        "singular_name" => __( "film_country", "" ),
        "menu_name" => __( "country", "" ),
    );

    $args = array(
        "label" => __( "film_country", "" ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "film_country",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'film_country', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "film_country",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "film_country", array( "films" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_film_country' );
function cptui_register_my_taxes_film_ganres() {



    $labels = array(
        "name" => __( "film_ganres", "" ),
        "singular_name" => __( "film_ganres", "" ),
        "menu_name" => __( "ganres", "" ),
    );

    $args = array(
        "label" => __( "film_ganres", "" ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "film_ganres",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'film_ganres', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "film_ganres",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "film_ganres", array( "films" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_film_ganres' );
function cptui_register_my_taxes_film_tax() {



    $labels = array(
        "name" => __( "film_tax", "" ),
        "singular_name" => __( "film_tax", "" ),
    );

    $args = array(
        "label" => __( "film_tax", "" ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "film_tax",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'film_tax', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "film_tax",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "film_tax", array( "films" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_film_tax' );
function cptui_register_my_taxes_film_date() {



    $labels = array(
        "name" => __( "film_date", "" ),
        "singular_name" => __( "film_date", "" ),
    );

    $args = array(
        "label" => __( "film_date", "" ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "film_date",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'film_date', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "film_date",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "film_date", array( "films" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_film_date' );
function cptui_register_my_taxes_film_actors() {



    $labels = array(
        "name" => __( "film_actors", "" ),
        "singular_name" => __( "film_actors", "" ),
    );

    $args = array(
        "label" => __( "film_actors", "" ),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => false,
        "label" => "film_actors",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'film_actors', 'with_front' => true, ),
        "show_admin_column" => false,
        "show_in_rest" => false,
        "rest_base" => "film_actors",
        "show_in_quick_edit" => false,
    );
    register_taxonomy( "film_actors", array( "films" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_film_actors' );
