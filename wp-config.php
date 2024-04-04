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
define( 'DB_NAME', 'wpplugin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Z`8)lnH/4R9S3]~J0Oo#T~0{>U4`?sbOVA9TsFp[D!qKJ^|62?Kbo!I_H-4I+G{[' );
define( 'SECURE_AUTH_KEY',  'UO7G/VBrvUSVd*jylzO!u[@rGq:m)rVqKIvi]H%f67Z;zv^jK[!;MKF9RU$M-$P6' );
define( 'LOGGED_IN_KEY',    '<6Bfcu.E{?()/]=50}#m2zwC.{@2_!*3`Q$}(%Jk~P1D(Qg xeRMR&$:^$y+[QP>' );
define( 'NONCE_KEY',        '2)O+]6!-%TBik+ffz1AJnfW.nPg!N;ER!SE;*Gx@K2&`6b~IXLy YDz6ms}c-fl&' );
define( 'AUTH_SALT',        'PS~bEzTIl`^h.hGH_m&f67xpP%.S0lYIexu*W{6o5dej_Ojk2adfn;=!XDqxr5HX' );
define( 'SECURE_AUTH_SALT', 'SB9]e()Tc]H]C[O<$#a]W[-h$zoYJ1t})NfnSwr$B]3LTEq-[MMVFVcI`*)FO;O.' );
define( 'LOGGED_IN_SALT',   ']w7lP_=dJlJv@/v*gCzy7Bk/Rjki1!MQ%23rbuKmi^M]qSPt`Z$b^{VxU 3gcnTk' );
define( 'NONCE_SALT',       'AA##gFDh#s4yGHZ?@#VXXx.mjKF8R63)+R=`Q&pQ2WHm]|#`dtx[C!F}QTS,h$y#' );

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
define( 'WP_DEBUG', true );
define( 'FS_METHOD', 'direct' );
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
