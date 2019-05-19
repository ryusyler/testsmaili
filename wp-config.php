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
define( 'DB_NAME', 'testsmaili_db' );

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
define( 'AUTH_KEY',         'K:Y~}ct]M|KlU(Rj[k#YhBu-FUY#2N@L:O;>#lb[d]K[N)DF{i*Xrnm+?iH!)_I)' );
define( 'SECURE_AUTH_KEY',  'Grvgi+Z6d5*}OJ6<I+_;%FUF!9}?qcWu73AR0`0s_kwmV*DSpg?$>Xo63/Daip_d' );
define( 'LOGGED_IN_KEY',    'W]vN7]msz6BngZa_+C^bL:CIPd~%mdDlrxh?,R2#52,]xf=>HI;_8/%!S%g/wBhr' );
define( 'NONCE_KEY',        '8],(yN]V@A.c$Vt-01}<TMB0-wNc~LsUYT)x5MYj0L!#rTCf0o=7D7K{5u-;t!U>' );
define( 'AUTH_SALT',        'gKRE&cvh_dDbn>/CEzn0{5L0ub-{2-hWt)[krfyzP9JcVg:? qf_>EV3&D!@XUM}' );
define( 'SECURE_AUTH_SALT', '^qtK09Pq(jYNKJ%PO<Av(P%dvhUpMg(Yb&~N?OI]90%].z^vSclxh;J_6vCpkKVU' );
define( 'LOGGED_IN_SALT',   ']t8)9O $&DMEn/m=+zmIFfbaoo>m 3T@l:)8uF{RaOy7J;F$z)Fs)#;, gy{lVuy' );
define( 'NONCE_SALT',       'zq>?zs]AW&_$16F>8],99VBa5U(s>nk`^wvvJZnt,2F!^U>_4{YC57Q:&c$qwsy_' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
