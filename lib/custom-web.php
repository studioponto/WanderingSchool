<?php
/**
 * Custom Web functions
 */



/**
 * Hide ACF menu item from the admin menu
 */

add_filter('acf/settings/show_admin', '__return_false');


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
* Highlight menu taxonomies
**/

function custom_active_item_classes($classes = array(), $menu_item = false){            
        global $post;
        $classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'active' : '';
        return $classes;
    }
add_filter( 'nav_menu_css_class', 'custom_active_item_classes', 10, 2 );