<?php
/**
 * Plugin name: Insight Suite.
 * Description: A modern WordPress plugin that collects, analyzes, and displays user feedback and content engagement metrics.
 * Version: 1.0.0
 * Author: Muhammad Hafee Imran
 */

defined('ABSPATH') || exit;

define('WPIS_VERSION','0.1.0');//These are constants. Name and value.
define('WPIS_PATH', plugin_dir_path(__FILE__));
define('WPIS_URL', plugin_dir_url(__FILE__));


//Only here for some time till I switch to the Composer autoload.
require_once WPIS_PATH . 'includes/class-feedback-form-shortcode.php';

add_action('plugins_loaded', function () {
    new Insight_Suite_Feedback_Form();
});


require_once plugin_dir_path(__FILE__) . 'includes/class-insight-suite-assets.php';

add_action('plugins_loaded', function() {
    new Insight_Suite_Assets();
} );
