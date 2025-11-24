<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hairnic_db' );

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
define( 'AUTH_KEY',         'W3%m%~GLi!]UZHoGl)P<!TQ(@]2!ll*=lcVdaAFgxlkP@o?[I_=1F-E7h26KB6)H' );
define( 'SECURE_AUTH_KEY',  'YXD*R]&$`1&+XkJI5Qi@PtOoC=:=8lLo2fm&|tMf[2yhLo:AQ`/)qVMCHP1K%T^I' );
define( 'LOGGED_IN_KEY',    'ed@b7S3P&#S@EF,]RVk$J9~zb%/?7L?1/+0wFG x+8.<@H?nQ[8BBS/PO!O*?whL' );
define( 'NONCE_KEY',        '5n%-DkJ8${;P 1~$_3`_?WFfnHpVZK/9A[F@%|qic!5Vb%RS>n4by#_w=4@.1W/z' );
define( 'AUTH_SALT',        ',Lt_?mO VEebnzRC `yt]yGRZ<s-zsmzb-,]s 19|!A@NPxp]Pf>%U}j{e.P5ms<' );
define( 'SECURE_AUTH_SALT', ':C=U1cgtTQfKt_g>z-$={B>ukYvxKfWB5WXwJqnR96CPz{`8f%F#/@,4im%w1Z35' );
define( 'LOGGED_IN_SALT',   '6S}W%9?p:G8]^yaQMMuUH)5n#,aN{:)MUxZC8s%I=JD|4c6aIt8~{[~5kGQMQ~Sg' );
define( 'NONCE_SALT',       'd5w$u7Lixd.9+!!m~L(}WC]Ikd@SAK+_n?+[6L{EY{)+1r`M 3+9X}8|]iWPVbZO' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
