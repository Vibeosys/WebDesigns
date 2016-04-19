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
define('DB_NAME', 'lndscap');

/** MySQL database username */
define('DB_USER', 'dev');

/** MySQL database password */
define('DB_PASSWORD', 'dev');

/** MySQL hostname */
define('DB_HOST', '192.168.1.6');

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
define('AUTH_KEY',         '__:SCmbHG-!KAO:=Msh+IjI#{&2e,-<Ftb)2S,IX^QMOB][twIetgC*Iv<W,<$JQ');
define('SECURE_AUTH_KEY',  'UIh|e>JO!ZL/C%`vE)T|NOTBbrgLTh~%^1;,CE<1w} p8$l/ePK^s!6V}3f%/(re');
define('LOGGED_IN_KEY',    'H~K=+?cDCHnt&2W:uUd7_^#06SP2,lN<^AFJ>K4*~^E)^GpYpSGaEW2H,S^/4Gi5');
define('NONCE_KEY',        'v_/yO;F0{(.9 #S..C.sB0pd;%1V8<j.wVG-47`$h-fRCQuSVXz_P>myswh]4?,i');
define('AUTH_SALT',        '}`P;1*Ydl5a|-w@JK[EGB),g9lSxD.m$J|oam+LfKc& gMq(MxsPuZd&[]kD.5J;');
define('SECURE_AUTH_SALT', 'elBj)lPk81w?:/0]F@.wi#inXr.n0i@Gfkx_(ZpgSiug3:R)e0}&)off)90o!30j');
define('LOGGED_IN_SALT',   'A6e.,;tM1r9K(cIUxp)4Y}&cLue%5EZmO_Qx^U2wa&dJVd{7Aj Jz}$YYP_ln^?f');
define('NONCE_SALT',       '`)bJ;^gegnTDd r;P<P`F~(oc|8Fs;S|u-<3GM`XM%TNa3 BhfJ|E`6;Ti[?[|,X');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ls_';

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
