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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3pUoF09AjRmJoIbwQ/Ho1QNGHRc1TptW6vyyuJFtVfr0Vtta/GTmQii906MswZJ7Yz1PQDf4mA1fdXFC06fnTg==');
define('SECURE_AUTH_KEY',  'lyGXNHlp4Gs/pBL56YZLOUz1p+wm3PQMGBki72HeSVK3vDiWlzqIhIi6krCUVUpfbkxVp4hDR8B8BPbnCyyP/Q==');
define('LOGGED_IN_KEY',    'EDNFHyONMN+dD01gEJCxXX7nleppRLXKbxIg3uegrrC6XUJMvMfxXC/ODUyIp4SnaAwyzPjwkkjrmjxsmiykJQ==');
define('NONCE_KEY',        '6Q/m9NPfthYWVCkrjVlK0uXmME6cVdFT91LFmEGi4Kr6hQYJd3fnjIjFUbuWagq9zAw4+sgomEV4sVzDS3AUMw==');
define('AUTH_SALT',        '0MyHXsvbbn4I8gyRsLGWkzTi6oVKDMqYnfAvjrJtX32z57Jbqd+A88ZyFqXpCUfs43BaL8m7iottg+MdyWMXRA==');
define('SECURE_AUTH_SALT', '9tWIXmR9v3duBKM3L+Ct33cXAGLH9Fg018LgI6odoI5YIJKM6BekM8W33o4Lb9lot5hjRC+57Ot0sEvuQomtLA==');
define('LOGGED_IN_SALT',   'Bqx5yt9iwNvONkjwkJLqPFr2YD+SMHjAccs4ohZmov3DEkfogXYG6sMbh9EVYnTYcl6BCmAHZkCPWD3OR54ZAA==');
define('NONCE_SALT',       'j082VgvhrC80oIyLYU00uCYcvbtNyo0k6tAUwJAV9WZwJJ5CKy8+G4+a4jwxaQUBO8K459s27KOY7Q/x0QRTAQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
