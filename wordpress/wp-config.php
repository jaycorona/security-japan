<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wpc00747222_live_jsc');

/** MySQL database username */
define('DB_USER', 'dba00747222_live_jsc');

/** MySQL database password */
define('DB_PASSWORD', 'E#yDQ$u#Bq#7');

/** MySQL hostname */
define('DB_HOST', '172.21.23.227');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'UtL+BM/u)[=P1O-$Y:rTw[#n}ZPBc$Hjr<-`G]^?-+)v&;Y(=YjYz_}pcwO,jf<;');
define('SECURE_AUTH_KEY',  'V=L(-wHWq[o>$;^z!I{^$zlS=|zPWE/-xN$^geQ)KTS{]&i~jkYc5-m!7$zX}&i&');
define('LOGGED_IN_KEY',    'GpgaqF`+m:AE<]B~hqFa8^0M (?!UVCD-KJHGBKK&,:]{dK:,|{344fl#<AWp8Iw');
define('NONCE_KEY',        ')8$/`L9ySce~4^%, _MXHLTw,K?P5`~^UTO?Pi||%TF!9tHP:~~@naZS}|bOm[u?');
define('AUTH_SALT',        '+*5|8c+|OGiW#1r|l!{rEcCSSKD]|Gg[*;8pjm$-GUQu{j%D=h20{vf=XS_|o(|d');
define('SECURE_AUTH_SALT', '{8>o6%+C04tqBmzY- bw3n[nQu>Zxy-4tL%0g$SV2jZA `{uDgR)/+Fj^mOW}YK;');
define('LOGGED_IN_SALT',   'zA<}-i}vKGM6[v[dbklJpM+iZq5u9s+iM(G{$x)qN>73>Se&(( h@Uz7a}q`|V O');
define('NONCE_SALT',       '[cmKl}p}[*-PFLkh`+R_%,sGA{/)C7|r1 fi_m&b>p|t?W]+<)+KHX`O~CC9IZaQ');


$table_prefix = 'wp_';

define('WPLANG', 'ja');

define('FS_METHOD', 'direct');
define('FS_CHMOD_DIR', 0775);
define('FS_CHMOD_FILE', 0664);
define('WP_AUTO_UPDATE_CORE', false);

define('WP_CACHE', true);




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
