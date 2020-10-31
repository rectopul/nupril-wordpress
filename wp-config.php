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

define('WP_DEBUG', false);
ini_set('display_errors', 0);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'new_nupill');

/** MySQL database username */
define('DB_USER', 'new_nupill');

/** MySQL database password */
define('DB_PASSWORD', 'D*JTFsi62mNFa');

/** MySQL hostname */
define('DB_HOST', 'new_nupill.mysql.dbaas.com.br');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',          ';|A9,uFU83sFA2PBeQ)f<YUC%^dId@9TBd]?n1y7n%5`JDo}ouLp>c1B0I^>PA~e');
define('SECURE_AUTH_KEY',   'r5JyUgJbh1*;a8zMO,DJElcBl1~Ce%(iW>vn%N^g@f$m&} &0N2<>2P0o8q#6Z!w');
define('LOGGED_IN_KEY',     '`CB;F[r,dHmmpQK2AMdL/:uslMrsy}6#ch>}}KJ0%/#K^6A,,&r#dfwt,S~H_0|M');
define('NONCE_KEY',         'I9AN)}2)nRm*(2V1@^ty/Z)(6JDzqK4Cn}jjtmW@$U}0-e%ndL&rB#@_=7W;djW0');
define('AUTH_SALT',         'j{`gL?J%gnF|T0:yR<+JyF&I.F.5PvkRYp^Jzbj2a=/nSQd2WG`+iCR7T2dPLV7i');
define('SECURE_AUTH_SALT',  'QX^0(GG*|8|yq2/bDv/IkDEFE1WB{xq]q,g1,.#61$]3E5$do.K$F;V_sA)t(M/-');
define('LOGGED_IN_SALT',    '(A,+)<awIE+qLAgKZ{Lb{L,PZfQ{+d;4.}DsWk{rrGsgu3<2b,kvOq>r7I9qjBsA');
define('NONCE_SALT',        'nN2<oRd{]qk!|p1ER{{ot1OXE6j(!./m6zY+q1QdpZJaOf*nNhh*v)]8m|*}G2KD');
define('WP_CACHE_KEY_SALT', 'aQH3>=/(_ WnlBZY{53CRT^4~4ZpBH&CO!T*ZHgo>Q[jwPtGT(F1eT2G_fZ@ws.N');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wordpress_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
