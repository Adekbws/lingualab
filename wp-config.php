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
define('DB_NAME', 'baza23124_lingualab');

/** MySQL database username */
define('DB_USER', 'admin23124_lingualab');

/** MySQL database password */
define('DB_PASSWORD', '7Iyj4Qp1HX456814');

/** MySQL hostname */
define('DB_HOST', '23124.m.tld.pl');

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
define('AUTH_KEY',         'SjA34)WT7w@23Bw{p{r^8D* 1(0s.vDP|vgxK~eX,k6fD.P%<&1F8m1Q$M[ofPUp');
define('SECURE_AUTH_KEY',  'AA*e^i]0mIg^_F{Vj_JVb<OWR|gsL=el_>*h/<Tq:8xM{f}q7H{5L^g6*akjga-@');
define('LOGGED_IN_KEY',    'zvTS*K;vMU@lRUG%bE,J$_N_uIus,D]}^Mt!ljFk#Ws2%u0>kIvLZw]rj8k+$pw_');
define('NONCE_KEY',        '6BSG5$U%$gspZiCbTaA#Wb3r>87VI-H}qp}y>F0d@L:m8{1S )x+|jeP(g(Rb)?L');
define('AUTH_SALT',        'XL3kZD9ZJu~F8K.>{!:>.^|3mB?5A82@Gr*X 0:mdg|a5.M1Y?VgX*NxtRbUmn7G');
define('SECURE_AUTH_SALT', ')z$o#X%1H[_:/k`o0iE!xx:K,wh~1Z(cURN1w9t(03+be2h!_8LW1j&+(jv%IjR(');
define('LOGGED_IN_SALT',   '{ bTT|-y|oEi7ypN6zlO`lyHKV>F@.ws(#mTb{4hNfGNb.ob^eFMpH!5&PzS>ynF');
define('NONCE_SALT',       '3.B--gFrJ[:}WFWPV` @vUI_F#^~c@Uf2~oMcD6S!asWvTF+}aM/8se}{%c8k,_,');

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
