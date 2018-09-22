<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wpcoba');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[p`1^cjT>S_2/Xhxkbo8GP0-8K7Zzj:{aCnqqRSJJX=J:x*Zv`E=ft=OLDM8pr33');
define('SECURE_AUTH_KEY',  '-NO!{C_+c?}&o|~O8dD?9s%Uhfw.pHu!dfL<px<%5<,$HCKL+@ dU_VSO|[:sPTS');
define('LOGGED_IN_KEY',    'bh-urjx^_yU>7-ss_1f^P`]xk*!gco$p@oghIOVy%cUM[>(WBU1J@$A<Z8ses5u9');
define('NONCE_KEY',        '3(3Uayirhu;3B-at%$,B(*c/  )v{SS&8BGNZfr%<#m2{0[p`B!pv$r@q1x%L.8|');
define('AUTH_SALT',        ' u{}w-,{CWQx;c}qx}BEnH[MHGQ?8G+5XR[lY9EaNs0]y>=6,4mN;YdVs`;cTla8');
define('SECURE_AUTH_SALT', '& >[f4S-=S,H[iWj3Qm8=f$;Ey]p|87<bm!Yb0T48zp9OIN(&/:f:bEIrLy4)Yl1');
define('LOGGED_IN_SALT',   '~P7.lhDl5zcnoLcaJ|zbdTY>$t^@lO(OW.}0@d{1ReA!H5<90)}Tu%7a/8mM4m(v');
define('NONCE_SALT',       'q`!X%1;b0W3s8eXL!46:_4)zvm:5%>ciyYC3W?aSn}`Q#-cd@NG}F!YPOv-!jN>:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
