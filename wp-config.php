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
define('DB_NAME', 'mtulode6_mtulode');

/** MySQL database username */
define('DB_USER', 'mtulode6_mtulode');

/** MySQL database password */
define('DB_PASSWORD', ']P[83ES5WD');

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
define('AUTH_KEY',         'bhcsjxxcbjeyw6qwgqc4mixp5zvoc1rmhuswno4a1xaxtone4l8jsdnxvjwdyrvb');
define('SECURE_AUTH_KEY',  'ewl03awfsuqg3z48clexdpjft20rxxyqriir0ojbwhhlj4btvdhvkv5bpii2wsoc');
define('LOGGED_IN_KEY',    'dcoimbu9dtlvmjybqg7r8uqkwfhxbejy2yozja2uyldvyedsftyuau2a8t6mrqop');
define('NONCE_KEY',        's65faxexmeulsxh9tckuci5pqlava1zhknhwrp5lhgbakgbwnps1meys56eap12m');
define('AUTH_SALT',        'knd1nx3wqnkxz8zkbaetcbnyvg1k35wto2snxkl0ngmzc4vmgpps9mhdkigxbtqd');
define('SECURE_AUTH_SALT', 'mlqjvkcfjgvhgzxpxm3lvlnjgdeeoyi1bhrdftpv1yo32rhsyoyukcnxozo6zmyw');
define('LOGGED_IN_SALT',   'q30hoihqgpwiidv85fvbbghxjisbyvyrj16oidea7xkhyienk90p0aqyxiw33yr1');
define('NONCE_SALT',       'cd8o2fgt3hr0p0qiwe2hhsqhgjby5mkyyw2snhzshlnctccwa8exykeegq2lgkeg');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lode_';

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
define( 'WP_MEMORY_LIMIT', '128M' );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

# Disables all core updates. Added by SiteGround Autoupdate:
define( 'WP_AUTO_UPDATE_CORE', false );
