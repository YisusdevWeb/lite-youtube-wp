<?php
/*
 * Plugin Name: Youtube Lite Wordpress 
 * Description: Añade shortcode para mostrar videos optimizados 
 * Version: 1.0.0
 * Author: enlaweb.co
 * Author URI: https://enlaweb.co/
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: add shorcode videos optimizados for yisus_dev
*/


if (!defined('ABSPATH')) {
  exit;
}

if (!defined('YLW_PLUGIN_URL')) {
  define('YLW_PLUGIN_URL', plugin_dir_url(__FILE__));
}

if (!defined('YLW_NS')) {
  define('YLW_NS', 'Youtube_lite_wordpress');
}

// Include settings 
include 'includes/wp_settings_page.php';

// Include taxonomy
include 'includes/taxonomies/wp_tax_category.php';
include 'includes/taxonomies/settings/wp_admin_filter.php';

// Include enqueue scripts functions
include 'includes/wp_enqueue_scripts.php';

// Include shortcode functions
include 'includes/wp_shortcode.php';
include  'includes/settings/wp_settings_shorcode.php';
