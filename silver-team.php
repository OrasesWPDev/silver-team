<?php
/**
 * Plugin Name: Silver Team
 * Plugin URI: https://github.com/OrasesWPDev/silver-team
 * Description: A WordPress plugin for Silver Team functionality
 * Version: 1.0.0
 * Requires at least: 5.3
 * Requires PHP: 7.2
 * Author: Orases
 * Author URI: https://orases.com
 * Text Domain: silver-team
 * Domain Path: /languages
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI: https://github.com/OrasesWPDev/silver-team
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('SILVER_TEAM_VERSION', '1.0.0');
define('SILVER_TEAM_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SILVER_TEAM_PLUGIN_URL', plugin_dir_url(__FILE__));

// LOGGING CONTROL - Set to true to enable logging
define('SILVER_TEAM_DEBUG', true);

// Require main plugin class
require_once SILVER_TEAM_PLUGIN_DIR . 'includes/class-silver-team.php';

// Initialize the plugin on WordPress init
add_action('plugins_loaded', function() {
    Silver_Team::get_instance();
});