<?php

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
            
            if (isset ($_POST[ 'widget9' ])) {
            update_option ('zendash_widget9', 'on');
        } else {
            update_option ('zendash_widget9', 'off');	
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
            
            if (isset ($_POST[ 'menu11' ])) {
            update_option ('zendash_menu11', 'on');
        } else {
            update_option ('zendash_menu11', 'off');	
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
            
            // footer links
            if (isset ($_POST[ 'footer1' ])) {
            update_option ('zendash_footer_wordpress', 'on');
        } else {
            update_option ('zendash_footer_wordpress', 'off');	
            }
            
            if (isset ($_POST[ 'footer2' ])) {
            update_option ('zendash_footer_shortcut', 'on');
        } else {
            update_option ('zendash_footer_shortcut', 'off');	
            }
            
            if (isset ($_POST[ 'footer3' ])) {
            update_option ('zendash_footer_version', 'on');
        } else {
            update_option ('zendash_footer_version', 'off');	
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
         
         // has the user pressed "turn off all updates"?
         if (isset($_POST['TurnOffAllFooter'])) {
             zendash_turnoff_all_footer();
             zendash_settings_saved();
         } // end turn off all
         
         // has the user pressed "turn on all updates"?
         if (isset($_POST['TurnOnAllFooter'])) {
             zendash_turnon_all_footer();
             zendash_settings_saved();
         } // end turn on all
         