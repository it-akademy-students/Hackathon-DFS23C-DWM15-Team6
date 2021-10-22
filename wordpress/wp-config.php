<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'it-akademy-2021' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

define('WP_DEFAULT_THEME', 'Divi');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9-?lSVnL8G!}N#D:6PZq}7gp[V]%eEv8/C7IkvwG2eT`Z*>!G_Mv1-XtYvr>&CTs' );
define( 'SECURE_AUTH_KEY',  'oDMkRJ/G5rm{aJ}Lq~]fO*0n(g6.OHg$!gBaC5po~MFJ47RNh]p$F#tI?@QI(aD)' );
define( 'LOGGED_IN_KEY',    'q7R%HNja#b=6C]h.p[<jYmt!uU:qyWj+Ek$%3?=qqq12TGk&oxeJ; m#[z3Zl-}.' );
define( 'NONCE_KEY',        'e636kkkk u0GBg[ntI8J9fj|x{VSZ3L6|ez*v&^taKuz6<&Z*{4){c /S!UQ;zUY' );
define( 'AUTH_SALT',        '+ QKQnRvDO/dtTUJ;yc-gCyNBWh0e{V8^bi8mXercKsARp7Cx/*p.}em-2MC}:f9' );
define( 'SECURE_AUTH_SALT', 'XBjPmMw6MvQ[PjSR0gh)^QE$*.q!S$o8DGR9&eC{Xt|>>P`B2_i,Hz`+=(CpZ*5u' );
define( 'LOGGED_IN_SALT',   'Wi[BB<c[A[@lQg(mFk:8rS#yx*X-&BBX/Fa8}A{C{FSCJ2zOZyRz0_ZuT})6f!Hy' );
define( 'NONCE_SALT',       '%ty4TJ3IpSYm8S_4{aS:`ztt@-0ZvDq11JEW1;^BU*izM?J&Syk7p;Sm@OlsaTL$' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
