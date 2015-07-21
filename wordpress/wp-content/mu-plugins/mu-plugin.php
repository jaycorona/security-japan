<?php
/*
  Plugin Name: WPCloud Plugin
  Plugin URI: http://wpcloud.jp/
  Description: WPCloud original plugin
  Author: WPCloud
  Version: 1.0.0
 */


define( 'WPC_PLUGIN_BASE', __FILE__ );

$plugin_datas = get_file_data( WPC_PLUGIN_BASE, array( 'Version' => 'Version' ) );
define( 'WPC_PLUGIN_VERSION', $plugin_datas['Version'] );

if(is_multisite()) {
	define('WPC_PLUGIN_URL', network_site_url('/wp-content/mu-plugins/wpcloud-common'));
} else {
	define( 'WPC_PLUGIN_URL', content_url('/mu-plugins/wpcloud-common') );
}

define( 'WPC_PLUGIN_DIR', dirname(__FILE__) . "/wpcloud-common/" );
require_once(WPC_PLUGIN_DIR . "wpc-plugin.php");
