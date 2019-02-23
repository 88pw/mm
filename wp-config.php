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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rolstqaf_mtkn' );

/** MySQL database username */
define( 'DB_USER', 'rolstqaf_mtkn' );

/** MySQL database password */
define( 'DB_PASSWORD', 'dbkanri00' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'ICh{E07mbFpc?f)(^vL:?Hg%kPOC6dn]Zd^X:wk4EOgyZ#jC;^;~rg*Ti};SVM/k' );
define( 'SECURE_AUTH_KEY',   'l0#uE:f.oX0 9Y7 xuLUIkgb;56pQc+-Sa_oi[4r-kHoXJE{|{]`]ayl12=w4Myc' );
define( 'LOGGED_IN_KEY',     'd>~s@`fV!][?>;~H483~P~&)^j5`0VK5,Inx{:4bhMQ^8Y6aO07/C^l0A@|.B]Nk' );
define( 'NONCE_KEY',         '-T+;T#Nmmr%${mhLAC{*0Jiqm~/F!mi>^]60VCRB=2e@xit`>1RW&1FD9;y`rFlY' );
define( 'AUTH_SALT',         '1}&=auI~&NPMmrAE^bb`0cHvwjzU&e j< @Oa5#2kznubnPa6Fnhe!vCZTJ1SvPr' );
define( 'SECURE_AUTH_SALT',  'WF$$EUi`=xfN}&c[RPVD5apP4Es49l*V=<*5T|>0-y9 +.wn48L1MiYf5C-ZyB7M' );
define( 'LOGGED_IN_SALT',    '@~; 9!t3r9D7Gvg;HIhk-7Fq#@($6?OpBAA^LU~/:/YMM*2T$c1[lpKl51K(iiAg' );
define( 'NONCE_SALT',        'MOD-dy6)W%;6}h4=&40yRile>nw0tDT_3T<Q*GvTA,#tP5zZ5_0Xn- ]R5:KnL*&' );
define( 'WP_CACHE_KEY_SALT', 'U%1=v=I9SG0L} klJUs#:^ku)I|P2b:DRwhA]pR05`dKpH6PTzt=WZ]=a5C$]dg1' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
