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
define( 'DB_NAME', 'barcode' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'H;7Hk]a0%hS26T+`7nH @AajChGoSK|yh_%XMmdmLSIx4h&hEg3c/D-nK-IeDo;+' );
define( 'SECURE_AUTH_KEY',  '6JgCTn7Ym9_b@5%Q%dKL.[!PZ*7:dP`2~+ CQ*SvC#rlHZ>L4mWrl9mLevS5yW3S' );
define( 'LOGGED_IN_KEY',    'Mgi}a 1*u&H67[1p+-9J!sFkjE`2o,:+`GH7T1Qp.I+*j=gL(9}k*<8qskRVFFc!' );
define( 'NONCE_KEY',        'B`9J-y{dCRYH?2XWuR`h%(C c^JW$!5(U+`,FyWRggMAw=n#=GL3$>t@scP8zY:S' );
define( 'AUTH_SALT',        'rb$.zY<w|c;7{XF]]o3?(=25kL0Az7kfQ7&9!}r!&*DZ7+id=j_pv1KqK,2UJ?MI' );
define( 'SECURE_AUTH_SALT', 'eTFYA)O?Q`j!7AQ:nCL%:mMfvz]BS*S>g[b1yO)i7! }dbwck)!F7FeZw93VL{13' );
define( 'LOGGED_IN_SALT',   '&4B[;FRh4M*VTGZ5<N(SS]Jw:}:T|[e f#P<lTf!LqV8DzNOzG=ns-}]y,!N$%)K' );
define( 'NONCE_SALT',       '[jVL/M<2e!JglG5hot0}g@Z TIv|Oyz<>nS9y%!%#vA{5,wbjkk4vc4Tpc,1Bcj2' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
