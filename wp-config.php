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
define('DB_NAME', 'cgthink1_cjthink');

/** MySQL database username */
define('DB_USER', 'cgthink1');

/** MySQL database password */
define('DB_PASSWORD', 'Cgth1nk3r!!');

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
define('AUTH_KEY',         '*5c6dj,4y ;M$ED,SMJ|OU}oV{=9.Pkkgm;s34upN;!;N6/8}M&O0.HIJ|kV]$K+');
define('SECURE_AUTH_KEY',  'IfTTw@<_TX@B3[&cckL/5eZ&XJe2AFBz=JC,.eGh2|8c71Rp)1Q+SEM;B-IbJ(pJ');
define('LOGGED_IN_KEY',    'BBo-wo0?HpvL.gp|17OINBi|N6qls50CJ&9HSZ!eO7 f:BgNv>NR[,9fe)J?+9?,');
define('NONCE_KEY',        '6{_fGg`rHa;((]q(h&%TSmeXs?)iH:gLw=h&@8v$diR|Unf.,#=`G%T1)@@IYS{D');
define('AUTH_SALT',        'p=^6wDxCN4&FG6C$V:rG}dbc+;CLN)DHE@Dc2qqdyrSVn<0:7stN$0f4^ >-]n j');
define('SECURE_AUTH_SALT', '(N[4J8R_GFNPQhs1NTgX*Ji[`qB?ajfy!zf2gZ>3e`;dGIs6gm(}jhxB_2q^20 (');
define('LOGGED_IN_SALT',   'sWDX9ti4qZdZM5CWhnJCg(9$JY?2b~r=HiMd],/H:Yn,!mlc(V+=g*Kr5oWVVUpO');
define('NONCE_SALT',       'i-vDtFA+)*=]cY|Y9?pbDd[Z45*D%)D)I)fp,+rsIDS;H?IBj#U~,TbSd<_0Vp`J');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
