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
define( 'DB_NAME', 'learning_wp' );

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
define( 'AUTH_KEY',         'bF}-LX5B:P8LSG]e:+2vBu5/U?@nC 7BvAtP~Wh)Ud9bR$Er.v+Y6Lu<.>8W?go<' );
define( 'SECURE_AUTH_KEY',  'lnrs(i9|v{ORs.*Ln9le`X%DO]:9tz%&CRDW+e>Ls{P+b9zGoJw*!h+Q$_,ZSxLv' );
define( 'LOGGED_IN_KEY',    'x1S9>@h3|=y).CQI XH=>A~Y>k+B>iLsfj:Um3{iKE18MN43_sm5^us%J0WC9DNZ' );
define( 'NONCE_KEY',        '8%rD?i3.;%FSIA2OC#yM|HoAyf-VX~o9 n/H d>o8DS5rNa(9I?!+rBg(4vK3vT4' );
define( 'AUTH_SALT',        '7I_<DsScw*rq-JA+nKAxTP*G[oM!>$OM:$d^+aYb4-qjRX|TND<>3C3nqivl$]!H' );
define( 'SECURE_AUTH_SALT', 'K=1vFgOn-uKK!>#q|^qQ]2oQf<s4A;Z6Tx),br8t:zN@64+^jnrl.pbqa= rpw9A' );
define( 'LOGGED_IN_SALT',   'aWPji-GxhIGGtz~MuG|?ETN4Koy+AG__8:LNMRHc4U#aJ6 gaKrZ}oVQm07Ret[&' );
define( 'NONCE_SALT',       'CtxCq~3_4Pk0/V!?+lnImL23~`wGc1fUWu%FxH,>-] ^C!Ju]@ 67M6c(H(3!:%V' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_25w';

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
