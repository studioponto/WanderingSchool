<?php
/**
 * Custom Web functions
 */



/**
 * Hide ACF menu item from the admin menu
 */

//add_filter('acf/settings/show_admin', '__return_false');


/** remove img sizes  ***/
function paulund_remove_default_image_sizes( $sizes) {
    unset( $sizes['medium']);
    unset( $sizes['large']);
     
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'paulund_remove_default_image_sizes');


/** home**/
if( function_exists('acf_add_options_page') ) {

    $page = acf_add_options_page(array(
        'page_title'    => 'Homepage Settings',
        'menu_title'    => 'Homepage',
        'menu_slug'     => 'homepage-settings',
        'capability'    => 'edit_posts',
        'redirect'  => false,
        'position' => 3
    ));

    $page2 = acf_add_options_page(array(
        'page_title'    => 'Website Settings',
        'menu_title'    => 'Website Settings',
        'menu_slug'     => 'website-settings',
        'capability'    => 'edit_posts',
        'redirect'  => false
    ));


}


/**
* exclude pages from admin
**/
add_filter( 'parse_query', 'exclude_pages_from_admin' );
function exclude_pages_from_admin($query) {
    global $pagenow,$post_type;
    if (is_admin() && $pagenow=='edit.php' && $post_type =='page') {
        $query->query_vars['post__not_in'] = array();
    }
}



/**
* Change name of Posts
**/
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Projects';
    $submenu['edit.php'][5][0] = 'Projects';
    $submenu['edit.php'][10][0] = 'Add Project';
    echo '';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Projects';
    $labels->singular_name = 'Project';
    $labels->add_new = 'Add Project';
    $labels->add_new_item = 'Add Project';
    $labels->edit_item = 'Edit Project';
    $labels->new_item = 'New Project';
    $labels->view_item = 'View Project';
    $labels->search_items = 'Search Projects';
    $labels->not_found = 'No Projects found';
    $labels->not_found_in_trash = 'No Projects found in Trash';
    $labels->all_items = 'All Projects';
    $labels->menu_name = 'Projects';
    $labels->name_admin_bar = 'Projects';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );


/**
* Add participants
**/

/* custom post news events*/
function participants_init() {
    register_post_type(
        'participants',
        array(
            'label' => __('Participants'),
            'singular_label' => __('Participant'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => true,
            'query_var' => true,
            'show_in_nav_menus' => true,
            'menu_position' => 5,
            'supports' => array('title', 'thumbnail'),
            'has_archive'   => true,
            'yarpp_support' => true,
            '_builtin' => false, // It's a custom post type, not built in!
        )
    );
}
add_action('init', 'participants_init');


/**
* Add events
**/

/* custom post news events*/
function events_init() {
    register_post_type(
        'events',
        array(
            'label' => __('Events'),
            'singular_label' => __('Event'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => true,
            'query_var' => true,
            'show_in_nav_menus' => true,
            'menu_position' => 5,
            'supports' => array('title', 'thumbnail'),
            'has_archive'   => true,
            'yarpp_support' => true,
            '_builtin' => false, // It's a custom post type, not built in!
        )
    );
}
add_action('init', 'events_init');


/**
* Add room
**/

/* custom post news events*/
function rooms_init() {
    register_post_type(
        'rooms',
        array(
            'label' => __('Rooms'),
            'singular_label' => __('Room'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => true,
            'query_var' => true,
            'show_in_nav_menus' => true,
            'menu_position' => 5,
            'supports' => array('title', 'thumbnail'),
            'has_archive'   => true,
            'yarpp_support' => true,
            '_builtin' => false, // It's a custom post type, not built in!
        )
    );
}
add_action('init', 'rooms_init');



/**
* Highlight menu taxonomies
**/

function custom_active_item_classes($classes = array(), $menu_item = false){            
        global $post;
        $classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'active' : '';
        return $classes;
    }
add_filter( 'nav_menu_css_class', 'custom_active_item_classes', 10, 2 );