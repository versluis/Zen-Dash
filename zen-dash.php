<?php
/**
 * Plugin Name: Zen Dash
 * Plugin URI: http://wpguru.co.uk
 * Description: Disable info boxes and declutter your dashboard with Feng Shui magic. Less is more. 
 * Version: 1.0
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

// Hook for adding admin menu
add_action('admin_menu', 'wpguru_zendash');

// link some styles to the admin page
$zenstyles = plugins_url ('zen-styles.css', __FILE__);
wp_enqueue_style( 'zenstyles', $zenstyles );


// action function for above hook
function wpguru_zendash() {

// Add a new submenu under DASHBOARD
add_dashboard_page('Zen Dash', 'Zen Dash', 'administrator', 'zendash', 'zendash');
}

// display the admin page
function zendash () {
	
//must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient privileges to access this page. Sorry!') );
    }	
	
	// have we used this plugin before?
	// zendash_used_before();
	
	/////////////////////////////////////////////////////////////////////////////////////
	// SAVING CHANGES
	/////////////////////////////////////////////////////////////////////////////////////
	
	// has the user pressed "save changes"?
	if( isset($_POST[ 'SaveChanges' ])) {
	
	// check each checkbox and update values in our database
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
		
		zendash_settings_saved();
     } // end of save changes
	 
	
	 // has the user pressed "turn off all"?
	 if (isset($_POST['TurnOffAll'])) {
		 zendash_turnoff_all();
		 zendash_settings_saved();
	 } // end turn off all
	 
	 // has the user pressed "turn on all"?
	 if (isset($_POST['TurnOnAll'])) {
		 zendash_turnon_all();
		 zendash_settings_saved();
	 } // end turn on all
	 
	
	
	////////////////////////////////////////////////////////
	// ADMIN PAGE CONTENT
	////////////////////////////////////////////////////////
	
	// display checkboxes for each widget to be killed
	
	// read in database options
    $zendash_widget1 = get_option( 'zendash_widget1' );
	$zendash_widget2 = get_option( 'zendash_widget2' );
	$zendash_widget3 = get_option( 'zendash_widget3' );
	$zendash_widget4 = get_option( 'zendash_widget4' );
	$zendash_widget5 = get_option( 'zendash_widget5' );
	$zendash_widget6 = get_option( 'zendash_widget6' );
	$zendash_widget7 = get_option( 'zendash_widget7' );
	$zendash_widget8 = get_option( 'zendash_widget8' );
	?>
<!-- this line is for DreamWeaver -->
<link href="zen-styles.css" rel="stylesheet" type="text/css">
<form name="zenform" method="post" action="">
  <input type="hidden" name="zendash_hidden" value="Y">
  <div class="wrap">
  <div id="icon-index" class="icon32"><br>
  </div>
  <h2>Zen Dash Options</h2>
  <p>Treat yourself to some Dashboard Feng Shui and get rid of the clutter that's troubliung your mind.</p>
  <p>Below is a list of default Dahsboard widgets. Green means the widget is active, grey means it's disabled.</p>
  <table width="75%" border="0">
    <tr>
      <td width="49%"><div class="slideThree">
          <input type="checkbox" id="right-now" name="widget1" <?php if ($zendash_widget1 == 'on') echo 'checked' ; ?>/>
          <label for="right-now"></label>
        </div>
        <p class="zen-label">Right Now </p></td>
      <td width="51%"><div class="slideThree">
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
      </div>
    
      </td>
    
    
      <td><div class="slideThree">
          <input type="checkbox" value="<?php $zendash_widget8; ?>" id="other-news" name="widget8" <?php if ($zendash_widget8 != 'off') echo 'checked' ; ?>/>
          <label for="other-news"></label>
        </div>
        <p class="zen-label">Other WordPress News</p></td>
    </tr>
  </table>
  <p>&nbsp; </p>
  <p>
    <input type="submit" name="SaveChanges" class="button-primary" value="Save Changes" />
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="TurnOffAll" class="button-secondary" value="Turn them all OFF" />
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" name="TurnOnAll" class="button-secondary" value="Turn them all ON" />
  </p>
</form>
<p>&nbsp;</p>
</div>
<!-- div wrap close -->
<?php
	
	
	
} // end of main function

function zendash_used_before () {
	
	// checks if we have values in the database - if not, we'll create them
	$zendash_test = get_option('zendash_widget1');
	if ($zendash_test == '') {
	zendash_turnon_all();
	}
	
} // end of zendash_used_before

function zendash_turnon_all () {
	
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

function zendash_turnoff_all () {
	
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

function zendash_settings_saved () {
	
	// Put a "settings updated" message on the screen ?>
<div class="updated">
  <p><strong>
    <?php _e('Your settings have been saved. Check out our Dashboard!', 'zendash' ); ?>
    </strong></p>
</div>
<?php
zendash_toggle_widgets();
} // end of settings saved

function zendash_toggle_widgets() {
	
	// check if a widget should be active or nor
}

?>
