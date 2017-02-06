<?php

/*
  Plugin Name: Admin examples
  Description: This plugin shows several examples how can you make one or more settings page for your plugin. Only for developers.
  Version: 0.1
  Author: Varga Dániel
  Author URI: https://eworks.hu
  License: GPLv2 or later
 */


/* 
 * Sources:
 *  - https://premium.wpmudev.org/blog/creating-wordpress-admin-pages/
 *  - https://code.tutsplus.com/tutorials/the-wordpress-settings-api-part-1-what-it-is-why-it-matters--wp-24060
 *  - https://code.tutsplus.com/tutorials/the-wordpress-settings-api-part-2-sections-fields-and-settings--wp-24619
 */

// INCLUDE EXAMPLES
include plugin_dir_path(__FILE__) .  "examples/ex1-fields-in-existing-page.php";




/*** ADMIN MENU HOOK ***/
add_action('admin_menu', 'admin_examples_admin_menu' );
function admin_examples_admin_menu() {
    // top level
    add_menu_page('Top Level Menu Example', 'Top Level Menu', 'manage_options', 'top-level-menu-example', 'admin_examples_top_level', 'dashicons-admin-generic', 6);
    
    // sub menu item
    add_submenu_page( 'top-level-menu-example', 'Sub Level Menu Example', 'Sub Level Menu', 'manage_options', 'sub-level-menu-example', 'admin_examples_sub_level' );
    
    // sub menu item under settings
    add_options_page('Sub Settings Menu Example', 'Sub Settings Menu', 'manage_options', 'sub-settings-menu-example', 'admin_examples_sub_settings');
}




/*** PAGE CALLBACKS ***/
function admin_examples_top_level() {
    echo '<div class="wrap">' .
         '  <h1>Top level content</h1>' .
         '</div>';
}
function admin_examples_sub_level() {
    echo '<div class="wrap">' .
         '  <h1>Sub level content</h1>' .
         '</div>';
}
function admin_examples_sub_settings() {
    echo '<div class="wrap">' .
         '  <h1>Sub settings level content</h1>' .
         '</div>';
}