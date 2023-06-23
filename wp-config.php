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
define( 'DB_NAME', 'task14' );

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
define( 'AUTH_KEY',         '}_Mc-XOs#K+-`DY(S#Ta2W8h{wZcZv*I>;*13FCvb150%H_F4qO|X]R]t`8_8#V]' );
define( 'SECURE_AUTH_KEY',  'xm4]Yg_c(r@0i>q~a}%t+5m{>L9E;_!i5+K`/ Bc).Zc4X_m~(QU`40-efqm/:ny' );
define( 'LOGGED_IN_KEY',    'X]Sm)U`Bl~tUk(],lw+`&Z!T7e|<tu63Q2;4KHJ/vA98k^0mV9t[lC4~3zptwzR4' );
define( 'NONCE_KEY',        'W`9zW=i50&C @4E6V3=.Zdp3!Q-KaQOaKzY%nm-kRfLR?ZuYP@j9o54YgT)DH7ab' );
define( 'AUTH_SALT',        '>-HON~R0SE/fa3_gUC63AOP<x5<ta()sHVg0&8|a9<$m~/Zpp{6xhUVY%Q|i1JLW' );
define( 'SECURE_AUTH_SALT', 'rj>r4CSJ7!E?{.:Mcxff32*A5T^xmSwKI0Mqp#]QaMB2!I#eLbY.5anu)DV1{UX$' );
define( 'LOGGED_IN_SALT',   '19i;qNS mvP*WDz2STLDmz@wm2P|cF.4(R~E PDE@}snt;?}p6u(K(m ;d@b$zn,' );
define( 'NONCE_SALT',       'm>fHy#h)X2-}Q6Jt-.O[,C1!x`<4 SqqF2ufBjd;%4p4H/Q;.(l7#=51WDuHe0RU' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
