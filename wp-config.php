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
define('DB_NAME', 'cancapital_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'J?B<Ryh2kIg7Oo-J^wS,7o).nTuSg,hG%AgA1QZgAi^}WJH49{5%)2Ww6+H*axaK');
define('SECURE_AUTH_KEY',  ':+<*lohzESl2f#|hM)oXMdPY-6?-!-lt3C|||%-;I|)$SWhK2 Um- g?s|xH-F-Q');
define('LOGGED_IN_KEY',    'naQI)1U&WTGH&{&/-8I`VbGVxFNkXDxI!-u<.yp5Z#cAC]4O6A{kt~+P(L+AC`i7');
define('NONCE_KEY',        '@Ky]#n?PSpV$(:GW7 occs@xd6os,6^!DEmNK+*vXD)]~ RlVM :QD]&t34h#P0R');
define('AUTH_SALT',        '%G>#,T}97!ggpy,V~UG2n^3!e=5O|/co+ NGxfF|aB+*)Yn6d.Wh%tF w]Y@~cD&');
define('SECURE_AUTH_SALT', '?.u6etd[wnZ&0mmu4_-h.ZsAiFG*G5JRLcJ~wg|MF{i(b,;&FWJH5(RW1l_c8c<I');
define('LOGGED_IN_SALT',   'qH0s>osQrVoYjy.]3rt3AJY^9d*+`{yRERCmezpT-<37v*wo0r{pHqRT7D#>1pu;');
define('NONCE_SALT',       '_ flxzU/E)Td5+O5t)9w5A{T)nNDX}B:bl!&Q0no|o*j|=a;ag*mWgBIel|(0yz6');

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
