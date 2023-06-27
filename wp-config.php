<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'easy-manage' );

/** Database username */
define( 'DB_USER', 'easy-manage' );

/** Database password */
define( 'DB_PASSWORD', 'easy-manage' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&C!@Y)B2NQc+B#Er!iyU=la|4GrFvg[4Ieq=}oWJ2qk%!?^rYi/0yU;_zOc{<[Xw' );
define( 'SECURE_AUTH_KEY',  '}Z]j;6O-gk4UB1Zq.-h6/F^h3:tNzaf;makyzoA<if,&>VGT;{rQxXISv3#^[Mka' );
define( 'LOGGED_IN_KEY',    'bCjh.qO#M;FvGIy:Mog}5)uN9*xB}FtAIj,AXG1dXG^B*^83:g8/A*ky,M*GbefF' );
define( 'NONCE_KEY',        'crb6`WEFjw+y%H0_1zfYxtuRSdG/z[ _8#<{q8hI2GX(0ckd_q)BlnlA9f}JV?m ' );
define( 'AUTH_SALT',        'DOL4C%$U9S-_Avt,nlz%$[l( Tk?#kG7tdmbWSl/jRATlL{=*^7r]bopUxKz7r4!' );
define( 'SECURE_AUTH_SALT', 'k~~Bhh%`Ug?IYri5}dZ&>%HVbX8e5z~CwNKm1FeUgz3^Z`AmI0Yy]cN5G!y@=6,E' );
define( 'LOGGED_IN_SALT',   '_/&=>_CbiYcj*#m@9{uYtT!LrYgS$y[Y^;874 `1eM#JPsq/;e&{1NJ~.!aqfiPI' );
define( 'NONCE_SALT',       '6t^xe}[*DqK)xBj3 |nS~(eK}V@aXh=WJ[qD72wA3iBFJZl|ORu!f_3]n]  e&r:' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
// define('WP_DEBUG_LOG', true);
// define('WP_DEBUG_DISPLAY', false);

define('JWT_AUTH_SECRET_KEY', 'dfghjnbgygvbnm');

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
