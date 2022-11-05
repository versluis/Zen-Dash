<?php
/**
 * Plugin Name: Zen Dash
 * Plugin URI: http://wpguru.co.uk/2013/09/introducing-zen-dash/
 * Description: Disable dashbaord widgets, menu items and update notifications. Declutter your admin area with Feng Shui magic. Less is more. 
 * Version: 1.7 Beta
 * Author: Jay Versluis
 * Author URI: https://wpguru.co.uk
 * License: GPL2
 */
 
/*  Copyright 2013  Jay Versluis (email support@wpguru.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Add a new submenu under DASHBOARD
function wpguru_zendash() {
	// using array to create admin page so we can call JS on it
	// explained here: http://codex.wordpress.org/Function_Reference/wp_enqueue_script
	// and here: http://pippinsplugins.com/loading-scripts-correctly-in-the-wordpress-admin/
	global $zendash_admin_page;
	$zendash_admin_page = add_submenu_page ('index.php', __('Zen Dash', 'zendash'), __('Zen Dash', 'zendash'), 'administrator', 'zendash', 'zendash');
}
add_action('admin_menu', 'wpguru_zendash');

// register our JS file
function zendash_admin_init () {
	wp_register_script ('zendash-script', plugins_url( '/scripts/zen-script.js', __FILE__ ));
}
add_action ('admin_init', 'zendash_admin_init');

// now load the scripts we need
function zendash_admin_scripts ($hook) {
	global $zendash_admin_page;
	if ($hook != $zendash_admin_page) {
		return;	
	}
	wp_enqueue_script ('jquery-ui-tabs');
	wp_enqueue_script ('zendash-script');
}
// and make sure it loads with our custom script
add_action('admin_enqueue_scripts', 'zendash_admin_scripts');



// display the admin page
function zendash () {
	
// check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient privileges to access this page. Sorry!') );
    }	
	
	// link some styles to the admin page
	$zenstyles = plugins_url ('scripts/zen-styles.css', __FILE__);
	wp_enqueue_style( 'zenstyles', $zenstyles );
	
	// have we used this plugin before?
	zendash_used_before();
	
	/////////////////////////////////////////////////////////
	// ADMIN INCLUDES
	include plugin_dir_path(__FILE__).'includes/admin-save-changes.php';
	include plugin_dir_path(__FILE__).'includes/admin-read-options.php';
	include plugin_dir_path(__FILE__).'includes/admin-create-switches.php';
	include plugin_dir_path(__FILE__).'includes/admin-footer.php';
	
	/////////////////////////////
    } // end of main function
    /////////////////////////////

	///////////////////////////////////////////////////////////
	// FUNCTION INCLUDES
	include plugin_dir_path(__FILE__).'includes/zendash-functions.php';
	include plugin_dir_path(__FILE__).'includes/zendash-removes.php';



?>
