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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         '$?>Nmi1Owt4GD|ms^;_r:!2j/JW<9j;4K%M)k!|1{H :(YOwn6(I*Gf#H)AJJPQc' );
define( 'SECURE_AUTH_KEY',  'Wrc|f7-|&%h8oTmBy=McMF%P]N=hG}z!Gb45v17(3}Y<*E->bf/T^- 4P]1O,[Ec' );
define( 'LOGGED_IN_KEY',    '[D./)/)zP#K`:UV%jIm(ybB[WLA~;>|ntJM#kk>myPhd1oc|qk}VIEs?pcQIf^KF' );
define( 'NONCE_KEY',        'z.^HA4-NFR@wuX?/TW=<QE^HOU8Yrv??ayBrO fUuw[~/--^xG^aYg^BHeF%RIAv' );
define( 'AUTH_SALT',        'd,z4bl#fvEP J7J;]<4@Ws.Se7>#D-s!K/%K_.E/F>4d7MIi _~F:&s/eoOV7$e<' );
define( 'SECURE_AUTH_SALT', '^2S$HoIBp$ro`y `sXO&(cWhcR`TOlsz[l`2WB =Xtkr!~{#QQ()w~5HEeB:AS$A' );
define( 'LOGGED_IN_SALT',   'XRk3_W/l0<$LO>nyFm{*}[IutSo~F bvLWK=Oftu:pBloEO2>J#lSV*S|#IWpoPB' );
define( 'NONCE_SALT',       '):DX|2ClfnOXu68sRBYu=rEg42q>O+Y}_^3@jYjZ$tu>Th$n/lS%_(&?>5x3cvjV' );

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
