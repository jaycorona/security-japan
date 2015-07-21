<?php
require WPC_PLUGIN_DIR . 'common/encryption.php';
require WPC_PLUGIN_DIR . 'common/util.php';
if(basename($_SERVER["SCRIPT_NAME"]) == basename(__FILE__)) exit;

define('CPANEL_BASE_URL', 'https://cp.wpcloud.jp');
define('CPANEL_STG_PLUGIN_URL', CPANEL_BASE_URL . '/WPPlugin');
define('TOKEN_FORMAT', 'Y/m/d H:i:s');
define('TOKEN_LIMIT', '+ 1 hour');
define('TOKEN_TIMEZONE', 'Asia/Tokyo');
define('TOKEN_DELIMITER', '|');

global $wpdb;

// get key
$key = $wpdb->get_var($wpdb->prepare("SELECT meta_value FROM $wpdb->usermeta WHERE user_id = %d AND meta_key = %s;", 0, 'wpc_key'));
if (empty($key))
{
	$key = Util::generateKey(30);
	$wpdb->insert( 'wp_usermeta', array( 'user_id' => 0, 'meta_key' => 'wpc_key', 'meta_value' => $key ), array( '%d', '%s', '%s' ) );
}

// get unique key
$ukey = $wpdb->get_var($wpdb->prepare("SELECT meta_value FROM $wpdb->usermeta WHERE user_id = %d AND meta_key = %s;", 0, 'wpc_ukey'));
if (empty($ukey))
{
	$ukey = Util::generateKey(30);
	$wpdb->insert( 'wp_usermeta', array( 'user_id' => 0, 'meta_key' => 'wpc_ukey', 'meta_value' => $ukey ), array( '%d', '%s', '%s' ) );
}

// create token.
$dtz=date_default_timezone_get();
date_default_timezone_set(TOKEN_TIMEZONE);
$expiration_date = date(TOKEN_FORMAT, strtotime(TOKEN_LIMIT));
date_default_timezone_set($dtz);
$token = Encryption::encrypt($ukey . TOKEN_DELIMITER . $expiration_date, $key);
$id = DB_NAME;

$data = array(
	  'id'    => $id
	, 'token' => $token
);

$parameter = http_build_query($data);
$iframe_url =  CPANEL_STG_PLUGIN_URL . '?' . $parameter;
	
// load scripts
wp_enqueue_style( 'gmo-wpcloud-settings-style', WPC_PLUGIN_URL . '/pages/css/common/style.css' , array(), WPC_PLUGIN_VERSION );
wp_enqueue_script( 'gmo-wpcloud-settings-script', WPC_PLUGIN_URL . '/pages/js/common/frame.js' , array(), WPC_PLUGIN_VERSION );
?>
<iframe id="gmo-wpcloud-settings" src="<?php echo $iframe_url;?>"></iframe>