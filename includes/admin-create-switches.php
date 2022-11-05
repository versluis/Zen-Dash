<?php
///////////////////////////////////
// CREATE THOSE SWITCHES
///////////////////////////////////

// display checkboxes for each widget to be killed
	
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
  <li><a href="#tabs-4">Footer Links</a></li>
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
  <p>Refreshing is very important. If you don't do this, you may not see  changes such as disappearing menu items or update notifications.  </p>
  <p>If you have any questions or suggestions, feel free to <a href="http://wpguru.co.uk/2013/09/introducing-zen-dash/" target="_blank">leave a comment on this post</a>.</p>
  <p>&nbsp;</p>
  <p>Thank you for using Zen Dash!</p>
  </div><!-- closing tab 0 -->
  
  <div id="tabs-1">
  <p>Below is a list of default Dahsboard widgets. <br />
  Note that themes and plugins may add other widgets which Zen Dash cannot remove.</p>
  <table id="widgets" align="center" width="85%" border="0">
    <tr>
      <td width="50%"><div class="slideThree">
          <input type="checkbox" id="right-now" name="widget1" <?php if ($zendash_widget1 == 'on') echo 'checked' ; ?>/>
          <label for="right-now"></label>
        </div>
        <p class="zen-label">At a Glance</p></td>
      <td width="50%"><div class="slideThree">
          <input type="checkbox" value="<?php $zendash_widget2; ?>" id="quick-press" name="widget2" <?php if ($zendash_widget2 != 'off') echo 'checked' ; ?>/>
          <label for="quick-press"></label>
        </div>
        <p class="zen-label">Quick Draft</p></td>
    </tr>
    <tr>
      <td><div class="slideThree">
          <input type="checkbox" value="<?php $zendash_widget9; ?>" id="activity" name="widget9" <?php if ($zendash_widget9 != 'off') echo 'checked' ; ?>/>
          <label for="activity"></label>
        </div>
        <p class="zen-label">Activity</p></td>
      <td><div class="slideThree">
          <input type="checkbox" value="<?php $zendash_widget6; ?>" id="wordpress-blog" name="widget6" <?php if ($zendash_widget6 != 'off') echo 'checked' ; ?>/>
          <label for="wordpress-blog"></label>
        </div>
        <p class="zen-label">WordPress News</p></td>
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
          <p>This is a list of all WordPress menu items. <br />
          Note that some plugins may provide their own menu items which Zen Dash cannot disable.</p>
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
              <input type="checkbox" value="<?php $zendash_menu6; ?>" id="menu6" name="menu6" <?php if ($zendash_menu6 != 'off') echo 'checked' ; ?>/>
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
            
            <?php
			// only show the Jetpack option if the plugin is active
			// @since 1.5
			if (class_exists ('Jetpack')) {
			?>
            <tr>
              <td>Jetpack Menu</td>
              <td>
              <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_menu11; ?>" id="menu11" name="menu11" <?php if ($zendash_menu11 != 'off') echo 'checked' ; ?>/>
              <label for="menu11"></label>
            </div></td>
              <td></td>
              <td>
            </td>
            </tr>
            
            <?php 
			} // end Jetpack option 
			?>
            
          </table>
          <p>&nbsp;</p>
          <p class="save-button-wrap">
          <input type="submit" name="SaveChanges" class="button-primary" value="Save Changes" />
          </p>
</div> <!-- closing tab 2 -->
        
        <div id="tabs-3">
        <p>Switch off WordPress update notifications for core, themes and plugins.</p>
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
    
    <div id="tabs-4">
        <p>Toggle Footer Notes at the very bottom of your admin screen.        </p>
        <table width="100%" border="0">
          <tr>
            <td width="50%">WordPress Attribution</td>
            <td width="50%">
            <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_footer_wordpress; ?>" id="footer1" name="footer1" <?php if ($zendash_footer_wordpress != 'off') echo 'checked' ; ?>/>
              <label for="footer1"></label>
            </div></td>
          </tr>
          <tr>
            <td>Zendash Options Link</td>
            <td>
            <div class="slideThree">
              <input type="checkbox" value="<?php $zendash_footer_shortcut; ?>" id="footer2" name="footer2" <?php if ($zendash_footer_shortcut != 'off') echo 'checked' ; ?>/>
              <label for="footer2"></label>
            </div></td>
          </tr>
          <tr>
            <td>WordPress Version</td>
            <td><div class="slideThree">
              <input type="checkbox" value="<?php $zendash_footer_version; ?>" id="footer3" name="footer3" <?php if ($zendash_footer_version != 'off') echo 'checked' ; ?>/>
              <label for="footer3"></label>
            </div></td>
          </tr>
      </table>
        <p>&nbsp;</p>
        <p class="save-button-wrap">
        <input type="submit" name="SaveChanges" class="button-primary" value="Save Changes" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="TurnOffAllFooter" class="button-secondary" value="Turn all footer notes OFF" />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="TurnOnAllFooter" class="button-secondary" value="Turn all footer notes ON" />
        </p>
    </div> <!-- closing tab 4 -->
       
</div> <!-- closing tabs group -->
</form> <!-- end of form -->
<p>&nbsp;</p>
<?php