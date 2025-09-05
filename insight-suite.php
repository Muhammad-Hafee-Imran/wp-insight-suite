<?php
/**
 * Plugin name: Insight Suite.
 * Description: A modern WordPress plugin that collects, analyzes, and displays user feedback and content engagement metrics.
 * Version: 0.1.0
 * Author: Muhammad Hafee Imran
 * Text Domain: wp-insight-suite
 */

use HafeeImran\WPInsightSuite\Database\FeedbackTable;
use HafeeImran\WPInsightSuite\InsightSuite;

defined('ABSPATH') || exit;

define('WPIS_VERSION','0.1.0');//See its purpose and benefits.
define('WPIS_PATH', plugin_dir_path(__FILE__));
define('WPIS_URL', plugin_dir_url(__FILE__));

require_once WPIS_PATH . 'vendor/autoload.php';

add_action('plugins_loaded', function() {
    new InsightSuite();
});

register_activation_hook(__FILE__, function() {
    new FeedbackTable();
});

