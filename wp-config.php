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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gotrading_db' );

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
define( 'AUTH_KEY',         'wOe:vO=(un?vf8d(Y:DN^cWQx8LTL;s;V>s[g6{n~nc:,$a`.|!cf[./I~*0Z2y^' );
define( 'SECURE_AUTH_KEY',  'G~4Or 8aUt0pkXbt:nT+kS^2SH.]Mh<LHiRt/MW+Osy$)fHKd;.3GK,boh,6qDpT' );
define( 'LOGGED_IN_KEY',    '6easZrqI:.K}1F?&qAkH>9x;na^K^&;f-6!G.RxwU6d{1SZTCyiO|Ik0HU}K-Hpt' );
define( 'NONCE_KEY',        'a9>qDv3J9n2!@L.v|Rt)M0B?5IS?o!z5RVQZ3>:)4V:D`Tn<G4ztx:0|2x~!vNY3' );
define( 'AUTH_SALT',        '<(;3<$f,ph la0]9*w%sEmn&0sxoblQ0U@_`TPmXfP`S~iAr+4nH$EXW`-L|mL2[' );
define( 'SECURE_AUTH_SALT', 'a/Mk_]})>!Y[u>5W.NS{%MG#]*O LgAlk&Rke4N%wTF%>cP3o>#|pcN!V/::X=[=' );
define( 'LOGGED_IN_SALT',   'M@9rl;=bOYXk?* uj]53_YtZET!mEfD]62sD1WUr_mq7*(x@yG.y/zw t65n;{sI' );
define( 'NONCE_SALT',       ':{qAb!QW~w1.u`>:t;)1#A-Em|1=fvbuf8Bzf#n<aVz=4M.R!]irs$Lkhy93{?rd' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
