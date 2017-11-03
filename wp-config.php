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
/** MySQL database username */
/** MySQL database password */
/**define( 'DB_NAME', 'id3452839_wp_3abafa503cc487c96c9317fcaf680af1' );
define( 'DB_USER', 'id3452839_wp_3abafa503cc487c96c9317fcaf680af1' );
define( 'DB_PASSWORD', '5b756a3cefb53a8f598a13a41e8f89d0e03a1c7f' );*/

/** MySQL setting in Localhost */

define( 'DB_NAME', 'empleoparamusicos' );
define( 'DB_USER', 'root' ); 
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '}u~Y;gOJ-iX##xEEjA9:_}~p)2vc94U/Zo1iPU2Mh-MoxpObUC!eb1o[ngsZsyS ' );
define( 'SECURE_AUTH_KEY',  'R^D6w;eD/S/m$XC@IfF#M;2R1jK*W`*XS[mx8&F,PMn7iWnqc&Xak@kqkZs/+v.q' );
define( 'LOGGED_IN_KEY',    '(W#_fNR<dM`#ex_[+a/m5I|yXLdjb4=oM&|PYzDvm+Otl4NS:bDC&Cpn+lAc@aV<' );
define( 'NONCE_KEY',        'B::sU,`9iGg9@a:S2DIZ<I?_ YU]6RSJ.}yW;2>K$&qv`A,LGu~v&kKTm#Vr/V~%' );
define( 'AUTH_SALT',        '1D)w(/Ed0Wl]aD!B: q,4e>!m]NutqlMA^}AaJ0)*)Wa_tK>sYP@EI7i|-@GYS}(' );
define( 'SECURE_AUTH_SALT', 'Ou:=`BHb}|9chT{S]dI/(6Wuz}rO~& p# ev<-sw}#X-]Fd/0`<:%4>$5^^.Nmd!' );
define( 'LOGGED_IN_SALT',   'm,$^aH,?B,JX2GH|NnD[@N?.7X{JT#JW<xr[k?Vvw]H<bJrpR7X4HoAK4`$iKJ=p' );
define( 'NONCE_SALT',       ')b)C{F^lqy&$ERXiD?Mh(Fkr@SP4y6nyXH0_+iCnOYY._Tl?afB,fNCfsrrL{3YG' );

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


/**define('WP_HOME','http://localhost/empleoparamusicos');
define('WP_SITEURL','http://localhost/empleoparamusicos');*/

