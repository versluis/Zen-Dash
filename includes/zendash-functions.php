<?php
/////////////////////////////
// ZEN DASH
// Various Functions
/////////////////////////////

function zendash_used_before () {
	
	// @since 1.1
	// if we don't have a version number, switch on everything
	$zendash_version = get_option ('zendash_version');
	if ($zendash_version == '') {
		update_option ('zendash_version', '1.1');
		zendash_turnon_all_widgets ();
		zendash_turnon_all_menus ();
		zendash_turnon_all_updates ();
		zendash_turnon_all_footer ();
	}
	
	if ($zendash_version == '1.1') {
		// switch on Jetpack menu if upgrading
		update_option ('zendash_version', '1.4');
		update_option ('zendash_menu11', 'on');
	}
	
} // end of zendash_used_before

function zendash_turnon_all_widgets () {
	
	// set all values to ON
	update_option ( 'zendash_widget1', 'on' );
	update_option ( 'zendash_widget2', 'on' );
	update_option ( 'zendash_widget3', 'on' );
	update_option ( 'zendash_widget4', 'on' );
	update_option ( 'zendash_widget5', 'on' );
	update_option ( 'zendash_widget6', 'on' );
	update_option ( 'zendash_widget7', 'on' );
	update_option ( 'zendash_widget8', 'on' );
	update_option ( 'zendash_widget9', 'on' );		
	
} // end of turnon_all

function zendash_turnoff_all_widgets () {
	
	// set all values to OFF
	update_option ( 'zendash_widget1', 'off' );
	update_option ( 'zendash_widget2', 'off' );
	update_option ( 'zendash_widget3', 'off' );
	update_option ( 'zendash_widget4', 'off' );
	update_option ( 'zendash_widget5', 'off' );
	update_option ( 'zendash_widget6', 'off' );
	update_option ( 'zendash_widget7', 'off' );
	update_option ( 'zendash_widget8', 'off' );	
	update_option ( 'zendash_widget9', 'off' );	

} // end of turnoff_all

function zendash_turnon_all_menus () {
	
	// turns on all menu items
	update_option( 'zendash_menu1', 'on' );
	update_option( 'zendash_menu2', 'on' );
	update_option( 'zendash_menu3', 'on' );
	update_option( 'zendash_menu4', 'on' );
	update_option( 'zendash_menu5', 'on' );
	update_option( 'zendash_menu6', 'on' );
	update_option( 'zendash_menu7', 'on' );
	update_option( 'zendash_menu8', 'on' );
	update_option( 'zendash_menu9', 'on' );
	update_option( 'zendash_menu10', 'on' );
	update_option( 'zendash_menu11', 'on' );
}

function zendash_turnon_all_updates () {
	
	// turns on all update notifications
	update_option( 'zendash_update1', 'on' );
	update_option( 'zendash_update2', 'on' );
	update_option( 'zendash_update3', 'on' );
}

function zendash_turnoff_all_updates () {
		
	// turns on all update notifications
	update_option( 'zendash_update1', 'off' );
	update_option( 'zendash_update2', 'off' );
	update_option( 'zendash_update3', 'off' );
}

function zendash_turnon_all_footer () {
	
	// turns on all links in the admin footer
	update_option( 'zendash_footer_wordpress', 'on' );
	update_option( 'zendash_footer_shortcut', 'on' );
	update_option( 'zendash_footer_version', 'on' );
}

function zendash_turnoff_all_footer () {
	
	// turns off all links in the admin footer
	update_option( 'zendash_footer_wordpress', 'off' );
	// update_option( 'zendash_footer_shortcut', 'off' );
	update_option( 'zendash_footer_version', 'off' );
}

function zendash_settings_saved () {
	
	// Put a "settings updated" message on the screen ?>
<div class="updated">
  <p><strong>
    Your settings have been saved. <br />
    Please note: You must <a href="<?php get_admin_url( 'index.php/page=zendash' ); ?>">REFRESH this page</a> for your changes to take effect.</strong></p>
</div>
<?php
} // end of settings saved