<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              melodie
 * @since             1.0.0
 * @package           Sponsor_afupday21
 *
 * @wordpress-plugin
 * Plugin Name:       sponsor_afupday21
 * Description:       Ce plugin a pour fonction d'afficher les sponsors du site.
 * Version:           1.0.0
 * Author:            Melodie
 * Author URI:        melodie
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sponsor_afupday21
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('SPONSOR_AFUPDAY21_VERSION', '1.0.0');


function sponsor_afupday21()
{
	$content = '';
	$content .= '<div class="container-flex"><div class="row justify-content-center"><div class="col-lg-2 col-sm-4 me-auto text-center"><a href="https://yousign.com/" target="_blank"><img loading="lazy" width="160" height="189" src="/wp-content/uploads/2021/10/yousign-site.png" alt title="yousign-site"></a></div>';
	$content .= '<div class="col-lg-2 col-sm-4 me-auto text-center"><a href="https://klaxoon.com/fr/home" target="_blank"><img loading="lazy" width="160" height="189" src="/wp-content/uploads/2021/10/klaxoon-site-1.png" alt title="klaxoon-site" class="wp-image-174"></a></div> ';
	$content .= '<div class="col-lg-2 col-sm-4 me-auto text-center"><a href="https://jolicode.com/" target="_blank"><img loading="lazy" width="160" height="189" src="/wp-content/uploads/2021/10/jolicode-site.png" alt title="jolicode-site" class="wp-image-173"></a></div> ';
	$content .= '<div class="col-lg-2 col-sm-4 me-auto text-center"><a href="https://hiway.fr/" target="_blank"><img loading="lazy" width="160" height="189" src="/wp-content/uploads/2021/10/hiway-Site.png" alt title="hiway-site" class="wp-image-172"></a></div> ';
	$content .= '<div class="col-lg-2 col-sm-4 me-auto text-center"><a href="https://www.blackfire.io/" target="_blank"><img loading="lazy" width="160" height="189"  src="/wp-content/uploads/2021/10/blackfire-site.png" alt title="blackfire-site" class="wp-image-171"></a></div> </div> </div>';

	return $content;
}

function enqueue_style_2()
{
	wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css');
}

add_shortcode('sponsor', 'sponsor_afupday21');
add_action('wp_head', 'enqueue_style_2');
