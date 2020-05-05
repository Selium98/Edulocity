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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'eduocity_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '%iGNDX%YF{d(Gm[SSh<fi`z^aLA~Ugx`-})5X%Jun@=S#K9+.G0x47]$/SKW>uo/' );
define( 'SECURE_AUTH_KEY',  '/^It_?I2zP44[H+Y1Q%Q3]cQcIp>=eyfMs#b}S!?int}Qb#Fu>*W$M*QZ[h4^Yqb' );
define( 'LOGGED_IN_KEY',    's-uBFhfd)qy&/A?`coH3QA)Ykvu4)qk 5w58/=L>B8}B{$:v2(*;;}WgT~+&G#+Q' );
define( 'NONCE_KEY',        'b-Y#fQZ36&je?LQYIg0$?#4+wj7%3_%->iz[^]rNqYsYn[2BC|&A/$Xbb;WDk]T}' );
define( 'AUTH_SALT',        'Na6LZi2g*T<MbvNXmX8|dj=>F[ishh@!,!T`PNo^YUs4Yx!?W#e~8A Hom|5zWx%' );
define( 'SECURE_AUTH_SALT', '|Diyg{s7S!p|I+{<?z=OXGem)n2OW}&)?kT3ax~yXoY~Y^FOPZw-%mY: Lo~i3_h' );
define( 'LOGGED_IN_SALT',   '6T~v@Ki7q&r<h2r?{:XP*#udv-y:E{^iXfS:SA4n)pO[z.!bED?PMMpyw&n~>_Ws' );
define( 'NONCE_SALT',       '1hg(1+s:_n-]/#q@M wS #S%r&4k#xEY%l:-lrT]n;>ideoGR2~0q^Bb{68cRC^d' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
