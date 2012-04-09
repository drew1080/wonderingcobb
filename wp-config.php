<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wonderi4_wrd1');

/** MySQL database username */
define('DB_USER', 'wonderi4_wrd1');

/** MySQL database password */
define('DB_PASSWORD', 'Q0fbVC1K7N');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '|fO{tRa>!Ac&]-GN<3xZ)Xadov(c:,3tQ5zga|;aS9?BXgO~]Na3u)f-I2m[6g)+');
define('SECURE_AUTH_KEY',  '|4;fZ]XIb+-s`dpMU(Rkazkw^jK:iNdE>vsP4LRI-#Q2LC?>{tO!o6@8-`cPt]d-');
define('LOGGED_IN_KEY',    'I2^$Y5joZp|3WBcD*Q}|H)E1|+Dq^iW?^1^5S?T~slvxdfK_*G6@aqY9Nw9|Wdt3');
define('NONCE_KEY',        'ZH=iPP[eT2AbtaSqdP-+s7MyS*.N:go@,mP21 I1;L4)yUOv<1WsPR!6K<W{v$7-');
define('AUTH_SALT',        '|F2P.-JhR$AAic8e,:kkuy`G^|xE)/YRxjHx:xS~J8[EY{o.X-oI~ztEwb! 01dU');
define('SECURE_AUTH_SALT', 'dhO_7/5lR/-d:m6xjYdvNBDT%ta}k,q1<u_#afA;(@P~j@-Z3{qP_1?6$lms.<l5');
define('LOGGED_IN_SALT',   '5}U++ H(CEFL35Ygz5tCY@YO_HYVVu6sve=0m`R(1EA-/-l|[qc[I=|DQAn`sAg3');
define('NONCE_SALT',       '|k%|1~r`hj(lM&?fwr=W,+vbh(?FVew7]#ZZ<c!d5&oSG]sv1IW}VPCiL]I3}LyU');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
