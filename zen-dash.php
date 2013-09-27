<?php
/**
 * Plugin Name: Zen Dash
 * Plugin URI: http://wpguru.co.uk/2013/09/introducing-zen-dash/
 * Description: Disable dashbaord widgets, menu items and update notifications. Declutter your admin area with Feng Shui magic. Less is more. 
 * Version: 1.1
 * Author: Jay Versluis
 * Author URI: http://wpguru.co.uk
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
	wp_register_script ('zendash-script', plugins_url( '/zen-script.js', __FILE__ ));
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
	$zenstyles = plugins_url ('zen-styles.css', __FILE__);
	wp_enqueue_style( 'zenstyles', $zenstyles );
	
	// have we used this plugin before?
	zendash_used_before();
	
	/////////////////////////////////////////////////////////////////////////////////////
	// SAVING CHANGES - Widgets
	/////////////////////////////////////////////////////////////////////////////////////
	
	// has the user pressed "save changes"?
	if( isset($_POST[ 'SaveChanges' ])) {
	
	// check each checkbox and update values in our database
	// widgets
    if (isset ($_POST[ 'widget1' ])) {
        update_option ('zendash_widget1', 'on');
	} else {
		update_option ('zendash_widget1', 'off');	
		}
		
		if (isset ($_POST[ 'widget2' ])) {
        update_option ('zendash_widget2', 'on');
	} else {
		update_option ('zendash_widget2', 'off');	
		}
		
		if (isset ($_POST[ 'widget3' ])) {
        update_option ('zendash_widget3', 'on');
	} else {
		update_option ('zendash_widget3', 'off');	
		}
		
		if (isset ($_POST[ 'widget4' ])) {
        update_option ('zendash_widget4', 'on');
	} else {
		update_option ('zendash_widget4', 'off');	
		}
		
		if (isset ($_POST[ 'widget5' ])) {
        update_option ('zendash_widget5', 'on');
	} else {
		update_option ('zendash_widget5', 'off');	
		}
		
		if (isset ($_POST[ 'widget6' ])) {
        update_option ('zendash_widget6', 'on');
	} else {
		update_option ('zendash_widget6', 'off');	
		}
		
		if (isset ($_POST[ 'widget7' ])) {
        update_option ('zendash_widget7', 'on');
	} else {
		update_option ('zendash_widget7', 'off');	
		}
		
		if (isset ($_POST[ 'widget8' ])) {
        update_option ('zendash_widget8', 'on');
	} else {
		update_option ('zendash_widget8', 'off');	
		}
		
		// menu items
		if (isset ($_POST[ 'menu1' ])) {
        update_option ('zendash_menu1', 'on');
	} else {
		update_option ('zendash_menu1', 'off');	
		}
		
		if (isset ($_POST[ 'menu2' ])) {
        update_option ('zendash_menu2', 'on');
	} else {
		update_option ('zendash_menu2', 'off');	
		}
		
		if (isset ($_POST[ 'menu3' ])) {
        update_option ('zendash_menu3', 'on');
	} else {
		update_option ('zendash_menu3', 'off');	
		}
		
		if (isset ($_POST[ 'menu4' ])) {
        update_option ('zendash_menu4', 'on');
	} else {
		update_option ('zendash_menu4', 'off');	
		}
		
		if (isset ($_POST[ 'menu5' ])) {
        update_option ('zendash_menu5', 'on');
	} else {
		update_option ('zendash_menu5', 'off');	
		}
		
		if (isset ($_POST[ 'menu6' ])) {
        update_option ('zendash_menu6', 'on');
	} else {
		update_option ('zendash_menu6', 'off');	
		}
		
		if (isset ($_POST[ 'menu7' ])) {
        update_option ('zendash_menu7', 'on');
	} else {
		update_option ('zendash_menu7', 'off');	
		}
		
		if (isset ($_POST[ 'menu8' ])) {
        update_option ('zendash_menu8', 'on');
	} else {
		update_option ('zendash_menu8', 'off');	
		}
		
		if (isset ($_POST[ 'menu9' ])) {
        update_option ('zendash_menu9', 'on');
	} else {
		update_option ('zendash_menu9', 'off');	
		}
		
		if (isset ($_POST[ 'menu10' ])) {
        update_option ('zendash_menu10', 'on');
	} else {
		update_option ('zendash_menu10', 'off');	
		}
		
		// update notifications
		if (isset ($_POST[ 'update1' ])) {
        update_option ('zendash_update1', 'on');
	} else {
		update_option ('zendash_update1', 'off');	
		}
		
		if (isset ($_POST[ 'update2' ])) {
        update_option ('zendash_update2', 'on');
	} else {
		update_option ('zendash_update2', 'off');	
		}
		
		if (isset ($_POST[ 'update3' ])) {
        update_option ('zendash_update3', 'on');
	} else {
		update_option ('zendash_update3', 'off');	
		}
		
		// print a "saved" message on screen
		zendash_settings_saved();
     } // end of save changes
	 
	 
	 // has the user pressed "turn off all widgets"?
	 if (isset($_POST['TurnOffAll'])) {
		 zendash_turnoff_all_widgets();
		 zendash_settings_saved();
	 } // end turn off all
	 
	 // has the user pressed "turn on all widgets"?
	 if (isset($_POST['TurnOnAll'])) {
		 zendash_turnon_all_widgets();
		 zendash_settings_saved();
	 } // end turn on all
	 
	 // has the user pressed "turn off all updates"?
	 if (isset($_POST['TurnOffAllUpdates'])) {
		 zendash_turnoff_all_updates();
		 zendash_settings_saved();
	 } // end turn off all
	 
	 // has the user pressed "turn on all updates"?
	 if (isset($_POST['TurnOnAllUpdates'])) {
		 zendash_turnon_all_updates();
		 zendash_settings_saved();
	 } // end turn on all
	 
	
	
	////////////////////////////////////////////////////////
	// ADMIN PAGE CONTENT
	////////////////////////////////////////////////////////
	
	// display checkboxes for each widget to be killed
	
	// read in database options
	
	// widgets
    $zendash_widget1 = get_option( 'zendash_widget1' );
	$zendash_widget2 = get_option( 'zendash_widget2' );
	$zendash_widget3 = get_option( 'zendash_widget3' );
	$zendash_widget4 = get_option( 'zendash_widget4' );
	$zendash_widget5 = get_option( 'zendash_widget5' );
	$zendash_widget6 = get_option( 'zendash_widget6' );
	$zendash_widget7 = get_option( 'zendash_widget7' );
	$zendash_widget8 = get_option( 'zendash_widget8' );
	
	// menu items
	$zendash_menu1 = get_option( 'zendash_menu1' );
	$zendash_menu2 = get_option( 'zendash_menu2' );
	$zendash_menu3 = get_option( 'zendash_menu3' );
	$zendash_menu4 = get_option( 'zendash_menu4' );
	$zendash_menu5 = get_option( 'zendash_menu5' );
	$zendash_menu6 = get_option( 'zendash_menu6' );
	$zendash_menu7 = get_option( 'zendash_menu7' );
	$zendash_menu8 = get_option( 'zendash_menu8' );
	$zendash_menu9 = get_option( 'zendash_menu9' );
	$zendash_menu10 = get_option( 'zendash_menu10' );
	$zendash_menu11 = get_option( 'zendash_menu11' );
	
	// update notifications
	$zendash_update1 = get_option( 'zendash_update1' );
	$zendash_update2 = get_option( 'zendash_update2' );
	$zendash_update3 = get_option( 'zendash_update3' );
	
	?>
    


<form name="zenform" method="post" action="">
  <div class="wrap">
  <div id="icon-index" class="icon32"><br>
  </div>
  <h2>Zen Dash Options</h2>
  <p>Treat yourself to some Dashboard Feng Shui and get rid of the clutter that's troubling your mind.</p>
    <?php
    // we're using jQuery UI Tabs to group our options
    // http://jqueryui.com/tabs/#default
	
	//////////////////////////////////////
	// TABS MENU
	//////////////////////////////////////
	
	?>
  <div id="tabs">
  <ul>
  <li><a href="#tabs-0">How it works</a></li>
  <li><a href="#tabs-1">Dashboard Widgets</a></li>
  <li><a href="#tabs-2">Menu Items</a></li>
  <li><a href="#tabs-3">Update Notifications</a></li>
  </ul>
  <?php
  //////////////////////////////////
  // Dashboard Widgets Tab
  //////////////////////////////////
  ?>
  <div id="tabs-0">
  <p>Using Zen Dash is really easy:</p>
  <ol>
    <li>select a tab at the top</li>
    <li>toggle the items you (don't) want to see</li>
    <li>hit Save Changes</li>
    <li><a href="<?php get_admin_url( 'index.php/page=zendash' ); ?>">refresh</a> your Admin Area</li>
    </ol>
  <p>Refreshing is very important. If you don't do this, you may not see the changes such as disappearing menu items or update notifications.</p>
  <p>If you have any questions or suggestions, feel free to <a href="http://wpguru.co.uk/2013/09/introducing-zen-dash/" target="_blank">leave a comment on this post</a>.</p>
  <p>&nbsp;</p>
  <p>Thank you for using Zen Dash!</p>
  </div>
  <!-- closing tab 0 -->
  <div id="tabs-1">
  <p>Below is a list of default Dahsboard widgets. <br />
  Note that themes and plugins may add other widgets which Zen Dash cannot remove (yet).</p>
  <table id="widgets" align="center" width="85%" border="0">
    <tr>
      <td width="50%"><div class="slideThree">
          <input type="checkbox" id="right-now" name="widget1" <?php if ($zendash_widget1 == 'on') echo 'checked' ; ?>/>
          <label for="right-now"></label>
        </div>
        <p class="zen-label">Right Now </p></td>
      <td width="50%"><div class="slideThree">
          <input type="checkbox" value="<?php $zendash_widget2; ?>" id="quick-press" name="widget2" <?php if ($zendash_widget2 != 'off') echo 'checked' ; ?>/>
          <label for="quick-press"></label>
        </div>
        <p class="zen-label">Quick Press</p></td>
    </tr>
    <tr>
      <td><div class="slideThree">
          <input type="checkbox" value="<?php $zendash_widget3; ?>" id="recent-comments" name="widget3" <?php if ($zendash_widget3 != 'off') echo 'checked' ; ?>/>
          <label for="recent-comments"></label>
        </div>
        <p class="zen-label">Recent Comments</p></td>
      <td><div class="slideThree">
          <input type="checkbox" value="<?php $zendash_widget4; ?>" id="recent-drafts" name="widget4" <?php if ($zendash_widget4 != 'off') echo 'checked' ; ?>/>
          <label for="recent-drafts"></label>
        </div>
        <p class="zen-label">Recent Drafts</p></td>
    </tr>
    <tr>
      <td><div class="slideThree">
          <input type="checkbox" value="<?php $zendash_widget5; ?>" id="incoming-links" name="widget5" <?php if ($zendash_widget5 != 'off') echo 'checked' ; ?>/>
          <label for="incoming-links"></label>
        </div>
        <p class="zen-label">Incoming Links</p></td>
      <td><div class="slideThree">
          <input type="checkbox" value="<?php $zendash_widget6; ?>" id="wordpress-blog" name="widget6" <?php if ($zendash_widget6 != 'off') echo 'checked' ; ?>/>
          <label for="wordpress-blog"></label>
        </div>
        <p class="zen-label">WordPress Blog</p></td>
    </tr>
    
    <tr>
      <td><div class="slideThree">
          <input type="checkbox" value="<?php $zendash_widget7; ?>" id="plugins" name="widget7" <?php if ($zendash_widget7 != 'off') echo 'checked' ; ?>/>
          <label for="plugins"></label>
        </div>
        <p class="zen-label">Plugins</p>
      </td>
    
    
      <td><div class="slideThree">
          <input type="checkbox" value="<?php $zendash_widget8; ?>" id="other-news" name="widget8" <?php if ($zendash_widget8 != 'off') echo 'checked' ; ?>/>
          <label for="other-news"></label>
        </div>
        <p class="zen-label">Other WordPress News</p></td>
    </tr>
  </table>
  <p>&nbsp; </p>
  <p class="save-button-wrap">
    <input type="submit" name="SaveChanges" class="button-primary" value="Save Changes" />
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="TurnOffAll" class="button-secondary" value="Turn all widgets OFF" />
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="TurnOnAll" class="button-secondary" value="Turn all widgets ON" />
  </p>
</div> <!-- closing tab 1 -->

        <div id="tabs-2">
          <p>This is a list of all WordPress menu items. Note that some plugins may provide their own menu items which Zen Dash cannot disable.</p>
          <p>List all 10, with on/off switches</p>
          <p>add link to this page in footer</p>
          <table width="100%" border="0">
            <tr>
              <td width="25%" class="zen-label">Dashboard</td>
              <td width="25%"><div class="slideThree">
              <input type="checkbox" value="<?php $zendash_menu1; ?>" id="menu1" name="menu1" <?php if ($zendash_menu1 != 'off') echo 'checked' ; ?>/>
              <label for="menu1"></label>
            </div>
              </td>
              <td width="25%" class="zen-label">Appearance</td>
              <td width="25%">
              <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_menu6; ?>" id="menu6" name="menu6" <?php if ($zendash_menu6= 'off') echo 'checked' ; ?>/>
              <label for="menu6"></label>
            </div></td>
            </tr>
            <tr>
              <td class="zen-label">Posts</td>
              <td>
              <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_menu2; ?>" id="menu2" name="menu2" <?php if ($zendash_menu2 != 'off') echo 'checked' ; ?>/>
              <label for="menu2"></label>
            </div></td>
              <td>Plugins</td>
              <td>
              <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_menu7; ?>" id="menu7" name="menu7" <?php if ($zendash_menu7 != 'off') echo 'checked' ; ?>/>
              <label for="menu7"></label>
            </div></td>
            </tr>
            <tr>
              <td>Media</td>
              <td>
              <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_menu3; ?>" id="menu3" name="menu3" <?php if ($zendash_menu3 != 'off') echo 'checked' ; ?>/>
              <label for="menu3"></label>
            </div></td>
              <td>Users</td>
              <td>
              <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_menu8; ?>" id="menu8" name="menu8" <?php if ($zendash_menu8 != 'off') echo 'checked' ; ?>/>
              <label for="menu8"></label>
            </div></td>
            </tr>
            <tr>
              <td>Pages</td>
              <td>
              <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_menu4; ?>" id="menu4" name="menu4" <?php if ($zendash_menu4 != 'off') echo 'checked' ; ?>/>
              <label for="menu4"></label>
            </div></td>
              <td>Tools</td>
              <td>
              <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_menu9; ?>" id="menu9" name="menu9" <?php if ($zendash_menu9 != 'off') echo 'checked' ; ?>/>
              <label for="menu9"></label>
            </div></td>
            </tr>
            <tr>
              <td>Comments</td>
              <td>
              <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_menu5; ?>" id="menu5" name="menu5" <?php if ($zendash_menu5 != 'off') echo 'checked' ; ?>/>
              <label for="menu5"></label>
            </div></td>
              <td>Settings</td>
              <td>
              <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_menu10; ?>" id="menu10" name="menu10" <?php if ($zendash_menu10 != 'off') echo 'checked' ; ?>/>
              <label for="menu10"></label>
            </div></td>
            </tr>
          </table>
          <p>&nbsp;</p>
          <p class="save-button-wrap">
          <input type="submit" name="SaveChanges" class="button-primary" value="Save Changes" />
          </p>
</div> <!-- closing tab 2 -->
        
        <div id="tabs-3">
        <p>Switch off WordPress update notifications for core, themes and plugins</p>
        <table width="100%" border="0">
          <tr>
            <td width="50%">WordPress Core Update Alerts</td>
            <td width="50%">
            <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_update1; ?>" id="update1" name="update1" <?php if ($zendash_update1 != 'off') echo 'checked' ; ?>/>
              <label for="update1"></label>
            </div></td>
          </tr>
          <tr>
            <td>Theme Update Alerts</td>
            <td>
            <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_update2; ?>" id="update2" name="update2" <?php if ($zendash_update2 != 'off') echo 'checked' ; ?>/>
              <label for="update2"></label>
            </div></td>
          </tr>
          <tr>
            <td>Plugin Updates Alerts</td>
            <td><div class="slideThree">
              <input type="checkbox" value="<?php $zendash_update3; ?>" id="update3" name="update3" <?php if ($zendash_update3 != 'off') echo 'checked' ; ?>/>
              <label for="update3"></label>
            </div></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p class="save-button-wrap">
        <input type="submit" name="SaveChanges" class="button-primary" value="Save Changes" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="TurnOffAllUpdates" class="button-secondary" value="Turn all notifications OFF" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="TurnOnAllUpdates" class="button-secondary" value="Turn all notifications ON" />
        </p>
    </div> <!-- closing tab 3 -->
       
</div> <!-- closing tabs group -->
</form> <!-- end of form -->
<p>&nbsp;</p>
<?php

	////////////////////////////////////////////////////////
	// ADMIN FOOTER CONTENT
	////////////////////////////////////////////////////////
?>

<p><em>This plugin was brought to you by</em><br />
<a href="http://wpguru.co.uk" target="_blank"><img src="
<?php 
echo plugins_url('images/guru-header-2013.png', __FILE__);
?>" width="300"></a>
</p>
<p><a href="http://wpguru.co.uk/2013/09/introducing-zen-dash/" target="_blank">Plugin by Jay Versluis</a> | <a href="http://cssdeck.com/labs/css-checkbox-styles" target="_blank">Switches by Kushagara Agarwal</a> | <a href="http://wphosting.tv" target="_blank">WP Hosting</a> | <a href="http://wpguru.co.uk/say-thanks/" target="_blank">Buy me a Coffee</a> ;-)</p>


</div><!-- div wrap close -->
<?php
/////////////////////////////
} // end of main function
/////////////////////////////


// -------------------------


/////////////////////////////
// OTHER FUNCTIONS
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

function zendash_settings_saved () {
	
	// Put a "settings updated" message on the screen ?>
<div class="updated">
  <p><strong>
    Your settings have been saved. <br />
    Please note: You must <a href="<?php get_admin_url( 'index.php/page=zendash' ); ?>">REFRESH this page</a> for your changes to take effect.</strong></p>
</div>
<?php
} // end of settings saved


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
}
add_action ('wp_dashboard_setup', 'zendash_remove_widgets' );

function zendash_remove_menu_items () {
	
	///////////////////////////
	// set or remove menu items
	// as explaiend here: http://codex.wordpress.org/Function_Reference/remove_menu_page
	
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
}
add_action ('admin_menu', 'zendash_remove_menu_items', 999);

// suppress update messages, as explained here:
// http://stackoverflow.com/questions/11821419/wordpress-plugin-notifications/14935077
$zendash_updates = function ($a) {
	global $wp_version;
	return (object) array ('last_checked' => time(), 'version_checked' => $wp_version, );
};
// core updates
if (get_option ('zendash_update1') == 'off') {
	add_filter ('pre_site_transient_update_core', $zendash_updates);
}
// theme updates
if (get_option ('zendash_update2') == 'off') {
	add_filter ('pre_site_transient_update_themes', $zendash_updates);
}
// plugin updates
if (get_option ('zendash_update3') == 'off') {
	add_filter ('pre_site_transient_update_plugins', $zendash_updates);
}

?>
