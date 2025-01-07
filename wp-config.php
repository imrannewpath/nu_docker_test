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

if (getenv('DB_NAME')) {
   define( 'DB_NAME', getenv('DB_NAME') );
}

if (getenv('DB_USER')) {
   /** MySQL database username */
   define( 'DB_USER', getenv('DB_USER') );
}

if (getenv('DB_PASSWORD')) {
   /** MySQL database password */
   define( 'DB_PASSWORD', getenv('DB_PASSWORD') );
}

if (getenv('DB_HOST')) {
   /** MySQL hostname */
   define( 'DB_HOST', getenv('DB_HOST') );
}

/** Database Charset to use in creating database tables. */
if (getenv('DB_CHARSET')) {
   define('DB_CHARSET', getenv('DB_CHARSET'));
} else {
   define('DB_CHARSET', 'utf8mb4');
}

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
define('AUTH_KEY',         'H#usfl&E)MTA*t.I^#:yGa6q cH86,XM?EjGCZ*8|$Kgz];U1~ Z;^%qe=+d{-?p');
define('SECURE_AUTH_KEY',  'Ti!9:`Y5c_6zpo@nqLo/3|f3[*iEs.Y_^WkqAFd3(X$m bo3;t+TyWcT~cfs&]F,');
define('LOGGED_IN_KEY',    'tm=_G:8vrU4Lh)*zMcYw^*CK]7$6EG%<c_<4V$<B#RD1z./u}Db}=W)#S)-Y{TIf');
define('NONCE_KEY',        'h.QJtt89rro_{TfIN<->+%RKVOo% /PZ41E4!,Du~aBb>B6&Sj[R@%u#:y$y-UJk');
define('AUTH_SALT',        'MDu#7beeRp~2[zQ,nfD8,XVz_Bl`fcAfbgYDh:+Rq-klfiK&||[*0s;z)XPTqp{7');
define('SECURE_AUTH_SALT', '(V?gtFMu3~kpQAFfK^p$vie;V/P+MV#e6#$140v&|d:jvcVh9{Lv9}EIPtM0(@xr');
define('LOGGED_IN_SALT',   'sw@lZs(d/>J|Q5Ulu,SSRYUDx. B%bum;Ma `RC-,XYN)s8+*wM]jn,/zWlhZ|M8');
define('NONCE_SALT',       'Xgy%k?t(-E wR}M<dkLTl6iQLO)LQNUs^,)fs @%~`fHZ7$W/PP]5qGm]IQKl`f2');

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

define('WP_DEBUG', getenv('WP_DEBUG') ?? false);
define('SCRIPT_DEBUG', getenv('SCRIPT_DEBUG') ?? false);
define( 'WP_DEBUG_LOG', getenv('WP_DEBUG_LOG') ?? false);
	
define('WP_ALLOW_REPAIR', true);

define('WP_MEMORY_LIMIT', '512M');
define('FS_METHOD', 'direct');

//define('FORCE_SSL_ADMIN', false);
// in some setups HTTP_X_FORWARDED_PROTO might contain 
// a comma-separated list e.g. http,https
// so check for https existence

/* Theme and plugin editor */
//define('DISALLOW_FILE_EDIT', true);

/* Revisions */
define('WP_POST_REVISIONS', 30);

/* Multisite */
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
if (getenv('SITE_BASE_URL')) {
   define('DOMAIN_CURRENT_SITE', getenv('SITE_BASE_URL'));
}
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
define( 'FORCE_SSL_ADMIN', false );

if (getenv('SITE_USES_HTTPS')) {
   $schema = 'https://';
} else {
   $schema = 'http://';
}

if (getenv('SITE_BASE_URL')) {
   define('WP_HOME', $schema . getenv('SITE_BASE_URL'));
   define('WP_SITEURL',$schema . getenv('SITE_BASE_URL'));
}



/* Mailgun */

/* WP MAIL SMTP */

/* Auto Update */
define( 'WP_AUTO_UPDATE_CORE', false );

/* SMTP */

define( 'ALLOW_UNFILTERED_UPLOADS', true ); 


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');