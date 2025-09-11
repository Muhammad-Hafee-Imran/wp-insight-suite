<?php

namespace HafeeImran\WPInsightSuite\Admin;

defined('ABSPATH') || exit;

class AdminAssets {

    public function __construct() {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_js']);
    }

    public function enqueue_admin_js() {
        wp_enqueue_script(
            'wpis_admin_js',
            WPIS_URL . 'build/index.js',
            array('wp-element'),
            WPIS_VERSION,
            true
        );
    }


}