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
define('DB_NAME', 'bloggamybonob_wp');

/** MySQL database username */
define('DB_USER', 'bloggamybonob_wp');

/** MySQL database password */
define('DB_PASSWORD', 'mmqAVYNmsnI9');

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
define('AUTH_KEY',         'iEb8jp7CMZ8MA9SjGbeERTPQUDVwpJU0fXugOAq1oAybHPtfKf051aTjEGDhXuSelfaRg4ZaCAifZZCsflw9zvtl58zscDPB0Bvu');
define('SECURE_AUTH_KEY',  'x5EsAcVr84eX9ZNINy9h7reA3fg5Z0xAObCjY8v34zYY2pJ8D6pOKSdZr69RTIPyWnPMeDlP7a9YNWuZQD8GRMaUZyDe5y7qOhND');
define('LOGGED_IN_KEY',    'cZqxKQEtU5NEUq771oNT6fCCeL6LNlzmg9v4bI01YzkltELiD84jvDWcNXZxrrV25I06DsMW3u0I3ctm3jbjthIRyVDviPyfQEl8');
define('NONCE_KEY',        'F2AV2jFj6bDU6HdQiLYxsG5zqOgjYH0tozgeq2zQ6ObxCyPdBvb6oPPQwPE46owm3ooZWZlK3sxsWpanacONI2o1806SOS5M9Msn');
define('AUTH_SALT',        'jRPWh2ZgEnuvtQazBxaSXQsLvZrj8Z4yAtXCjmyUlckSbDvqYFcXSkYpMvv6BszzVKApFOqmh6dV7f0K1WCT364U1CviuJ0Hzbs3');
define('SECURE_AUTH_SALT', 'wrSFrgFYZdf1Gqa28pHV3IFylW2C72TmHUAxZRtxhhN3UysLz0PFg2xvdAuavsQAxdHKVIejHLxwKUjKQVs4MoeGnsl3vHedDugW');
define('LOGGED_IN_SALT',   'R7t6TKovzl5va6G3uPraDUms2U99nyNUArFmWiEZjOF8dh9LhW5n0Fh2HMsd7u43zURFYZMaqA2T17FXpRTLfH5f34ykeCaSHwwS');
define('NONCE_SALT',       'xvH5tWis5vjdlgP8RjWAQPuR3XfaCPPFMaTfQ7COfFq80MV2IQSvuDN5wexPKtDAWYytLXtxVOnlMtYh76LHf7jwD8eqM63DXmer');

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
define('FTP_HOST', 'localhost');
define('FTP_USER', 'bloggamyadmin');
define('FTP_PASS', 'B&8bIB#@!&BO&*C*');
