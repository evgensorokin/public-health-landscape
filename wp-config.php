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
define('DB_NAME', 'evgen_phl');

/** MySQL database username */
define('DB_USER', 'evgen');

/** MySQL database password */
define('DB_PASSWORD', 'mysql93evgen');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '?^^MPX}y(b>(>uw/5sGPd]h>qn%|ez|^Ae^[`7fY/ 7{b=u^-S|Tn 5+WmJaS8~+');
define('SECURE_AUTH_KEY',  '1lJVku<XT6X<Bp$;,|6LE9z:j+2+3JEN2!72$g!IXtMp=0`_mf_pWs#|J!%i#$b+');
define('LOGGED_IN_KEY',    '*g:^-D8ZwZ;+=XVlcF=-#gfQaBZ`!5);3UG%9RoMbpz#r5Yw+K(/zW?Nu-kWIX|d');
define('NONCE_KEY',        'b~wlG8GB.l-)vS.V{r3 &x//MH`IaVd=iPp4g><%f<+(Ih,PZ2*|sgd/mr}MJMZu');
define('AUTH_SALT',        '#PYZ.HJ3A}Ds.nzW~P -6kD1ABqGaKVDHk$0|<];!Yz(%Wm-]~R0y1{@f|2PiSXJ');
define('SECURE_AUTH_SALT', '{V6N^$+6Hvx`i~~XN=-J?som,B=5ly*!bkt=S.T@nKPT+8j=CK`OJpn-HM=_:Nvu');
define('LOGGED_IN_SALT',   'PxyAAc=Nv#3(#[Rs]6 S] szl+hQS_i>qk``SB%05:X1cL#gLnu&oFo]LyepYE7+');
define('NONCE_SALT',       '}$[3REF4/[&-B|Eq65l!+f};R?ccRi>EeTdu>ol!*Kj|72bxKL-9WaIFC$5;Vv,O');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
