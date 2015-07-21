<?php
class WpcCommon {

    public static function instance() {
        static $self = false;
        if ( ! $self ) {
                $self = new WpcCommon();
        }
        return $self;
    }
    
    public function add_wpc_admin_menu () {
        require_once(WPC_PLUGIN_DIR . "wpc-dashboard.php");
        $dashboard = new WpcDashboard();
    }

    public function set_object_cache( $state ) {
        $path = WP_CONTENT_DIR . "/object-cache.php";
        if ( $state ) {
            if (file_exists ($path) ) {
                return false;
            }
            copy(dirname(__FILE__)."/object-cache.php",$path);
        } else {
            if (!file_exists ($path) ) {
                return false;
            }
            unlink($path);
        }
    }

    public function set_advanced_cache( $state ) {
        $path = WP_CONTENT_DIR . "/advanced-cache.php";
        if ( $state ) {
            if (file_exists ($path) ) {
                return false;
            }
            copy(dirname(__FILE__)."/advanced-cache.php",$path);
        } else {
            if (!file_exists ($path) ) {
                return false;
            }
            unlink($path);
        }
    }

    public function set_update_settings() {
        require_once(WPC_PLUGIN_DIR . "/wpc-update-settings.php");
    }
}

$wpc_common = WpcCommon::instance();
$wpc_common->add_wpc_admin_menu();
$wpc_common->set_update_settings();
$wpc_common->set_object_cache(WP_CACHE);
$wpc_common->set_advanced_cache(WP_CACHE);
