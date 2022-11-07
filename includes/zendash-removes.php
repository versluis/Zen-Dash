<?php
/////////////////////////////////////////
// ZEN DASH
// Remove Functions
/////////////////////////////////////////

function zendash_remove_widgets() {
	
	/////////////////////////////////////////////////////
	// set or remove all unwanted widgets from Dashboard

	global$wp_meta_boxes; 
	
	// right now
	if (get_option ('zendash_widget1') == 'off') {
	unset ($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	}
	// recent comments
	if (get_option ('zendash_widget3') == 'off') {
	unset ($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	}
	// incoming links
	if (get_option ('zendash_widget5') == 'off') {
	unset ($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	}
	// plugins
	if (get_option ('zendash_widget7') == 'off') {
	unset ($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	}
	// quick press
	if (get_option ('zendash_widget2') == 'off') {
	unset ($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	}
	// recent drafts
	if (get_option ('zendash_widget4') == 'off') {
	unset ($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	}
	// WordPress blog
	if (get_option ('zendash_widget6') == 'off') {
	unset ($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	}
	// other news
	if (get_option ('zendash_widget8') == 'off') {
	unset ($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	}
	// activity - since @1.3
	if (get_option ('zendash_widget9') == 'off') {
	unset ($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	}
	
}
add_action ('wp_dashboard_setup', 'zendash_remove_widgets' );

function zendash_remove_menu_items () {
	
	////////////////////////////////////////////////////////////////////
	// set or remove menu items
	// as explaiend here: https://developer.wordpress.org/reference/functions/remove_menu_page/
	
	// Dashboard
	if (get_option ('zendash_menu1') == 'off') {
	remove_menu_page('index.php');
	}
	// Posts
	if (get_option ('zendash_menu2') == 'off') {
	remove_menu_page('edit.php');
	}
	// Media
	if (get_option ('zendash_menu3') == 'off') {
	remove_menu_page('upload.php');
	}
	// Pages
	if (get_option ('zendash_menu4') == 'off') {
	remove_menu_page('edit.php?post_type=page');
	}
	// Comments
	if (get_option ('zendash_menu5') == 'off') {
	remove_menu_page('edit-comments.php');
	}
	// Appearamce
	if (get_option ('zendash_menu6') == 'off') {
	remove_menu_page('themes.php');
	}
	// Plugins
	if (get_option ('zendash_menu7') == 'off') {
	remove_menu_page('plugins.php');
	}
	// Users
	if (get_option ('zendash_menu8') == 'off') {
	remove_menu_page('users.php');
	}
	// Tools
	if (get_option ('zendash_menu9') == 'off') {
	remove_menu_page('tools.php');
	}
	// Settings
	if (get_option ('zendash_menu10') == 'off') {
	remove_menu_page('options-general.php');
	}
	// Jetpack
	if (class_exists( 'Jetpack' ) && get_option ('zendash_menu11') == 'off') {
	remove_menu_page('jetpack');
	}

	// PLUGINS
	
	// BluBrry
	if (get_option ('zendash_plugins_tab1') == 'off') {
		remove_menu_page('admin.php?page=powerpressadmin_basic');
		// echo ("PowerPress should be off");
	}
	// Crowdsignal
	if (get_option ('zendash_plugins_tab2') == 'off') {
		remove_menu_page('admin.php?page=wp-bruiser-settings');
		// echo ("PowerPress should be off");
	}
	// YouTube
	if (get_option ('zendash_plugins_tab3') == 'off') {
		remove_menu_page('admin.php?page=youtube-my-preferences');
		// echo ("PowerPress should be off");
	}
	// WP Dark Mode
	if (get_option ('zendash_plugins_tab4') == 'off') {
		remove_menu_page('admin.php?page=wp-dark-mose-settings');
		// echo ("PowerPress should be off");
	}
	// WPBruiser
	if (get_option ('zendash_plugins_tab5') == 'off') {
		remove_menu_page('admin.php?page=wp-bruiser-settings');
		// echo ("PowerPress should be off");
	}
	// remove_menu_page('admin.php?page=youtube-my-preferences');
}
add_action ('admin_init', 'zendash_remove_menu_items', 999);



// suppress update messages, as explained here:
// http://stackoverflow.com/questions/11821419/wordpress-plugin-notifications/14935077
// http://wordpress.stackexchange.com/questions/60309/how-to-disable-plugin-update-notification-for-a-specific-plugin-in-multisite

// core updates
if (get_option ('zendash_update1') == 'off') {
	remove_action('load-update-core', 'wp_update_core');
	add_filter ('pre_site_transient_update_core', '__return_null');
}
// theme updates
if (get_option ('zendash_update2') == 'off') {
	remove_action('load-update-core.php', 'wp_update_themes');
	add_filter ('pre_site_transient_update_themes', '__return_null');
}
// plugin updates
if (get_option ('zendash_update3') == 'off') {
	remove_action('load-update-core.php', 'wp_update_plugins');
	add_filter ('pre_site_transient_update_plugins', '__return_null');
}


// add Zen Dash shortcut to admin toolbar, as explained here: 
// http://codex.wordpress.org/Function_Reference/add_node

// will confuse WordPress - sets all menu items to point to Dashboard
// needs fixing
/*
function zendash_toolbar_shortcut( $wp_admin_bar ) {
	$zendash_admin_url = admin_url( 'index.php/index.php?page=zendash' );
	$args = array(
		'id'    => 'zendash_toolbar',
		'title' => 'Zen Dash',
		'href'  => $zendash_admin_url,
		'meta'  => array( 'class' => 'zendash-shortcut' )
	);
	$wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'zendash_toolbar_shortcut', 999 );
*/

// admin footer options
// as explained here: http://blog.interruptedreality.com/2011/wordpress-change-admin-footer/

function zendash_footer_shortcut ($default) {
	
	if (get_option ('zendash_footer_shortcut') == 'on' && get_option ('zendash_footer_wordpress') == 'on' ) {
		return $default . ' Change <a href="' . admin_url( 'index.php/index.php?page=zendash' ) . '">Zen Dash Options</a>';
	} 
	
	if (get_option ('zendash_footer_shortcut') == 'on' && get_option ('zendash_footer_wordpress') == 'off' ) {
		return 'Change <a href="' . admin_url( 'index.php/index.php?page=zendash' ) . '">Zen Dash Options</a>';
	} 
	
	if (get_option ('zendash_footer_shortcut') == 'off' && get_option ('zendash_footer_wordpress') == 'on' ) {
		return $default;
	} 
	
	if (get_option ('zendash_footer_shortcut') == 'off' && get_option ('zendash_footer_wordpress') == 'off' ) {
		return '';
	} 
}
add_filter ('admin_footer_text', 'zendash_footer_shortcut');

// remove WordPress version
function zendash_footer_version ($default) {
	if (get_option ('zendash_footer_version') == 'off') {
		return '';
	} else {
		return $default;
	}
}
add_filter ('update_footer', 'zendash_footer_version', 999);