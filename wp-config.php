<?php
/**
 * In dieser Datei werden die Grundeinstellungen für WordPress vorgenommen.
 *
 * Zu diesen Einstellungen gehören: MySQL-Zugangsdaten, Tabellenpräfix,
 * Secret-Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es auf der {@link http://codex.wordpress.org/Editing_wp-config.php
 * wp-config.php editieren} Seite im Codex. Die Informationen für die MySQL-Datenbank bekommst du von deinem Webhoster.
 *
 * Diese Datei wird von der wp-config.php-Erzeugungsroutine verwendet. Sie wird ausgeführt, wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
 * und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
 * Man kann aber auch direkt in dieser Datei alle Eingaben vornehmen und sie von wp-config-sample.php in wp-config.php umbenennen und die Installation starten.
 *
 * @package WordPress
 */

// INIT SET {

	ini_set( 'memory_limit', '256M' );

// }

// DEFINE {

	define('WP_MEMORY_LIMIT', '256M');
	define( 'EMPTY_TRASH_DAYS', 90 ); 
	define( 'WP_POST_REVISIONS', 10 );

// }

// MySQL {

	if ( stristr( $_SERVER['SERVER_ADDR'], '127.0.0.1' ) || $_SERVER['SERVER_ADDR'] === '::1' ) {

		// Local

		define('DB_NAME', 'jivamukti');
		define('DB_USER', 'root');
		define('DB_PASSWORD', 'tZ6R7jf9sA20Lkg6dAe6bH1K8xS4Qe');
		define('DB_HOST', 'localhost');

		define('WP_DEBUG', false);
	}

	elseif ( stristr( $_SERVER['SERVER_NAME'], '{put new staging domain here}' ) ) {

		// Staging

		define('DB_NAME', 'Jivamukti_wordpress');
		define('DB_USER', 'Jivamukti_wordpress');
		define('DB_PASSWORD', 'gp3U(<HSdJ');
		define('DB_HOST', '54.238.147.77');

		define('WP_DEBUG', false );
	}

	elseif ( stristr( $_SERVER['SERVER_NAME'], 'jivamukti.johannheyne.de' ) ) {

		// Staging

		define('DB_NAME', 'DB2786788');
		define('DB_USER', 'U2786788');
		define('DB_PASSWORD', 'jTwtMvtfFGkta8CxX4Mi4-nzvGh+3di4KR7eWzWgN');
		define('DB_HOST', 'rdbms.strato.de');

		define('WP_DEBUG', false );
	}

	else {

		// Production

		define('DB_NAME', 'jivamukti_wordpress');
		define('DB_USER', 'jivamukti_wordpress');
		define('DB_PASSWORD', 'gp3U(<HSdJ');
		define('DB_HOST', 'localhost');

		define('WP_DEBUG', false );
	}

	define('DB_CHARSET', 'utf8' );
	define('DB_COLLATE', '' );

// }

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden KEY in eine beliebige, möglichst einzigartige Phrase. 
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service} kannst du dir alle KEYS generieren lassen.
 * Bitte trage für jeden KEY eine eigene Phrase ein. Du kannst die Schlüssel jederzeit wieder ändern, alle angemeldeten Benutzer müssen sich danach erneut anmelden.
 *
 * @seit 2.6.0
 */
define('AUTH_KEY',		   '6s0}#rZ?.>7J}O`~C$~b-jW[e$Q2P6|Ke9H0T*]F~qkj0ljo]^Dny+f8*,e).)[2');
define('SECURE_AUTH_KEY',  '[3|`a8 v[ c+mn;w~Ocl!7Jtjwl:H-DKN[Yh5c2zr J4p!!<d-%G=mct9>e&VhIn');
define('LOGGED_IN_KEY',	   '[a|AHYN+@D<>L? JfuF|;1jS1|mGQZe Hx35fLxsmo5He:vx=T(0^1gif+ykuwX~');
define('NONCE_KEY',		   'wbuc-YaaEML9O5h{|9Ts&+80,,rBxAcNqIwi_Y[i2VtYT#35T9dONavImS9[ j!)');
define('AUTH_SALT',		   '}B67a[Vr7O-s+a& s0 OjrJD@JR+}S]?``GZS;naCc %|Bp2w_mpQ${<pd!#8!D^');
define('SECURE_AUTH_SALT', 'l!KyDwH!f9xNzexvlj}.Y>Xm=A*4)+wjKXHF]pVS(5Yv{H.ywL>`%bA+kFdP|Dl+');
define('LOGGED_IN_SALT',   'aIZylmq7rU^M;z]8Ut`CX(U?CyaK*[f-VU:]G%f%efETAg)@|CBfG]!GVjV`zy{z');
define('NONCE_SALT',	   '<MY@6Eh))]e(K41w(48#ee04,&y3O|dooAfzxj`VSzj`jU>kwNmN#EO!P+uX~4uk');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 *	Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 *	verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
 */
$table_prefix  = 'jivamukti_';

/**
 * WordPress Sprachdatei wird nicht mehr benötigt seit Version 4.1
 *
 * Hier kannst du einstellen, welche Sprachdatei benutzt werden soll. Die entsprechende
 * Sprachdatei muss im Ordner wp-content/languages vorhanden sein, beispielsweise de_DE.mo
 * Wenn du nichts einträgst, wird Englisch genommen.
 *
 * define('WPLANG', 'de_DE');
*/

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
######define('FS_METHOD','direct');
