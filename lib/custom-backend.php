<?php
/**
 * Custom Backend functions
 */

/**
* Add Dashboard Widget
**/
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Eternal Torche', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<p><a href="http://dirtyartdepartment.com/" target="_blank">DAD</a></p>';
}


/**
* Remove Update Core
**/
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
/**
* Replace Howdy
**/
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Logged in as', $my_account->title );            
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );
/**
* Clean Adminbar
**/
function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-site');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );
/**
* clear Edito menu
**/
function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}

add_action('_admin_menu', 'remove_editor_menu', 1);
/**
* clear admin colours
**/
function admin_color_scheme() {
   global $_wp_admin_css_colors;
   $_wp_admin_css_colors = 0;
}
add_action('admin_head', 'admin_color_scheme');
/**
* Custom Login
**/
function my_custom_login_logo() {
    echo '<style type="text/css">
    body.login {
        background-color: #ececec;
        font-family:Arial !important;
    }
    h1 a {
        background-image:url('.get_bloginfo('template_url').'/assets/img/logo.svg) !important;
        background-size: 200px !important;
        width:100% !important;
        height: 80px !important;
    }
    .login form {
        background:transparent !important;
        border:0px !important;
        -moz-box-shadow: rgba(200,200,200,0) 0 0px 0px 0px;
        -webkit-box-shadow: rgba(255, 255, 255, 0) 0 0px 0px 0px;
        box-shadow: rgba(200, 200, 200, 0) 0 0px 0px 0px;
    }
    .login form .input,
    .login input[type="text"] {
        background:#fff !important;
    }
    .login #nav a,
    .login #backtoblog a {
        color:#000 !important;
        text-shadow: none !important;
    }
    .login #nav a:hover,
    .login #backtoblog a:hover {
        color:#444 !important;
    }
    input.button-primary,
    button.button-primary,
    a.button-primary {
        border-color: #000 !important;
        background: #000 !important;
        color:#33ffff !important;
        text-shadow: rgba(0, 0, 0, 0) 0 0px 0 !important;
        -webkit-box-shadow: inset 0 0px 0 rgba(120,200,230,0.0) !important;
        box-shadow: inset 0 0px 0 rgba(120,200,230,0.0) !important;
        width:100%;
        text-transform:uppercase;
        font-size:20px;
        letter-spacing:0.1em;
        height:37px !important;
            padding: 4px 12px 7px !important;
    }
    .forgetmenot {display:none !important;}
    input.button-primary:hover,
    button.button-primary:hover,
    a.button-primary:hover {
        border-color: #444 !important;
        background: #444 !important;
        color:#33ffff !important;
        text-shadow: rgba(0, 0, 0, 0) 0 0px 0 !important;
    }
    .login label {
        color: #000 !important;
        font-size: 14px;
    }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');
/**
* Custom Login LogoURL
**/
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return '#';
}
/**
* Custom Footer
**/
// Custom WordPress Footer
function remove_footer_admin () {
    echo 'DAD &copy; 2015-';
    echo date("Y");
}
add_filter('admin_footer_text', 'remove_footer_admin');
function change_footer_version() {
  return '';
}
add_filter( 'update_footer', 'change_footer_version', 9999 );
/**
* Clear Dashboard
**/
// Create the function to use in the action hook
function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
        remove_action( 'welcome_panel', 'wp_welcome_panel' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );

/**
* Remove Pages
**/
add_action( 'admin_menu', 'remove_links_menu' );
function remove_links_menu() {
    remove_menu_page('link-manager.php'); // Links
    remove_menu_page('tools.php'); // Tools
    //remove_menu_page('edit.php'); // Blogs
    //remove_menu_page('options-general.php'); // options-general
    remove_menu_page('plugins.php'); // Plugins
    remove_submenu_page( 'index.php', 'update-core.php' );
    remove_submenu_page( 'themes.php', 'themes.php?page=admin-bar' );
    //remove_submenu_page( 'themes.php', 'widgets.php' );
    remove_submenu_page( 'themes.php', 'customize.php' );
    remove_submenu_page( 'themes.php', 'themes.php' );
    //remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
    //remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
    //remove_menu_page('themes.php'); // Themes 
    //remove_menu_page('edit.php?post_type=page'); // pages
    remove_menu_page('edit-comments.php'); // comments  
    //remove_menu_page('upload.php'); // comments  
}

/**
* Default no link
**/
function wpb_imagelink_setup() {
$image_set = get_option( 'image_default_link_type' );
    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'wpb_imagelink_setup', 10);
