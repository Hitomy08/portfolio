<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'strs20250818_wp');

/** Database username */
define('DB_USER', 'strs20250818_pw');

/** Database password */
define('DB_PASSWORD', 'pass.star01');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/EDdo0SL3x@Gd,clfn]T;c*O: Q}BN(4JHBU#Zbq7g{Q(Y}&s6j>}#b[3SbDJx.L');
define('SECURE_AUTH_KEY',  'Gi1!8TwQ7,{JBy}m;Nl#U%s](Cr|-rR(T>Va/Exqp~%,F?:PVw=zu<f*dE;!g@T}');
define('LOGGED_IN_KEY',    'JTVPy8Qd]N`<<oOAle]Phk{Q*M(ueS;SL8cE.qC<S>/c9ZD8>AAN_G)AWvAQ)7_+');
define('NONCE_KEY',        '?XkbpG>dp6OZXKq^S}}up-+,-}?Xg|THhnwZ[6kD#?1~~$_Z~zZswAmXQM[46H,+');
define('AUTH_SALT',        'Ci[4?JZl<M#XXC,xw *g!wT/WUw&RRI5Zt|#n|(rvZ0&0Y8o-)<cl-N?RTT@QsY2');
define('SECURE_AUTH_SALT', 'k2y~<1,Z`s`H{YJPWHa!~!`p1Mgbf+:p_j>w BvA-.rY#Pe5$&tu@pGxN+kVY?*D');
define('LOGGED_IN_SALT',   'h#y}S$:R5!Xtn~^YVgHjg& %z7.J!92]wAz+HBi&%52u%5-=}~HV&wt]{+cnm!72');
define('NONCE_SALT',       '5QpI}FVy~E;YucH:$`prAC QvB+ TWI6ac[wJDO{Y@:YLchM&)%?&2J_I?4k4hXr');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'su_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);
define('WP_DISABLE_FATAL_ERROR_HANDLER', true); // 一時的に有効化（原因追跡後は削除/false推奨）
define('WP_DEBUG_LOG', __DIR__ . '/wp-content/debug.log'); // 出力先を明示
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/wp-content/php-error.log'); // PHP標準ログも併用
/* Add any custom values between this line and the "stop editing" line. */


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
