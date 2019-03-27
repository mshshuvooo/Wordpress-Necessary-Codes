<?php 


if (!defined('ABSPATH')) die('-1');
// Class started
class THEMENAMEVCExtendAddonClass {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'THEMENAMEIntegrateWithVC' ) );
    }
 
    public function THEMENAMEIntegrateWithVC() {
        // Checks if Visual composer is not installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            add_action('admin_notices', array( $this, 'THEMENAMEShowVcVersionNotice' ));
            return;
        }
 
        // visual composer addons.
        //include THEMENAME_ACC_PATH. '/vc-addons/vc-slide.php';
    }
    
    // show visual composer version
    public function THEMENAMEShowVcVersionNotice() {
        $theme_data = wp_get_theme();
        echo '
        <div class="notice notice-warning">
          <p>'.sprintf(__('<strong>%s</strong> recommends <strong><a href="'.site_url().'/wp-admin/themes.php?page=tgmpa-install-plugins" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'bright-crazycafe'), $theme_data->get('Name')).'</p>
        </div>';
    }
}
// Finally initialize code
new THEMENAMEVCExtendAddonClass();







?>