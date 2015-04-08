<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bonobo');

/** MySQL database username */
define('DB_USER', 'greg_mysql');

/** MySQL database password */
define('DB_PASSWORD', 'Mq9882cr');

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
define('AUTH_KEY',         'in4qDbypR=QS|HhD_lOeQ{z^7-vEGjp(nm86h4,7T=~`7[_:Cjl%.]d*>oZy9Vc-');
define('SECURE_AUTH_KEY',  'Q.]FPl]71aEfq;meZ/Y4RE-{ia&/MWynnGtq2)Ap0pu;~h}/vYwZ0ki_qv-kKc=0');
define('LOGGED_IN_KEY',    'J?-<<,|FlvgqrGz|=OL0$Q,|]j8An7XK@TR|CA]e-,NW1,q K8;[x:$F%omiJ#+l');
define('NONCE_KEY',        '47b}{7-e::#nO9/|6XsVzmEV{#|K>!coIY~@zwVGX=+$ZX-{$J1]sp4|83LKm&:N');
define('AUTH_SALT',        'b72O)l)k&!<.BW#rE7(A7K3|:|-[r< 1t%d^{Hwyd.+MqZAV;zY>j8Jr0c0H?-<q');
define('SECURE_AUTH_SALT', 'm8Uh/?Bc}]L)YA!)B#;hIlqS5Q~NGHWj@]pd%FW#-z}+m~Yka-CR-7wtcJ)y$F&l');
define('LOGGED_IN_SALT',   ']WF7%hEjTxH^6mr$j`d<eRof,-5H-uE?q79JnNG%(<@IyY)6MHS0M[Q(l?iTUE[@');
define('NONCE_SALT',       'MB*zc{gj%|vY}z&[X9`Eped{;,ybP#HnMI(&BPe^S({=Nwu +YiB%`%DCw+lta/R');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

require_once(ABSPATH . 'wp-settings.php');
define('FTP_HOST', 'cs2055.mojohost.com');
define('FTP_USER', 'blockent_ftp');
define('FTP_PASS', 'j0eQ5tG9ABBIXuA5');