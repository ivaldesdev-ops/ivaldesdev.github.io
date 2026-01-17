<?php
define('WP_CACHE', true); // Added by SpeedyCache

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gjwlqwts_wp958' );

/** Database username */
define( 'DB_USER', 'gjwlqwts_wp958' );

/** Database password */
define( 'DB_PASSWORD', '9T.0p2!43S' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'avzsnfc2cforzzklikthyuuwefpqubpb0oppe8xus9xp0b3ethcgpiqn2nsc6cx4' );
define( 'SECURE_AUTH_KEY',  'ahwkbv3iwk1jhzqes3nuliarmv4ljrghip8z3r5gfdi6a4q2cwjkdfv4hdynhfol' );
define( 'LOGGED_IN_KEY',    'uxxyrulxyd53xw2lwkbxerk0z9rqh1oetmfhw3z2psylcagexbmsxl2m8dvxz3f5' );
define( 'NONCE_KEY',        'wgucvirrd9dmglzg0jxah9ybsipiljdmagj6t8t0yuj95j5gpzpqxttj3gztw7fa' );
define( 'AUTH_SALT',        'dwdmr06yy6q2raqgssmo9tnvrcaxnnuomyzgigrs3wqfwjin0iozcqhus9btkwal' );
define( 'SECURE_AUTH_SALT', 'y2wo6gkdhsgf7b98ivnhritcrg75i3udbubhlaw4c3v8chzmu1d45tmysjairnj1' );
define( 'LOGGED_IN_SALT',   'y0gxdbeqbku1ts5s7osvwxm9vkhdetkmaq4oxy8bfbmf2cpoxe4sazxdewm5kxla' );
define( 'NONCE_SALT',       'ows7yvazqr0lwhpjavpqcfncwbg85rq4uokktvxrbojctcoxvdnoimbppgepmzh5' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp4h_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
