<?php

namespace InsightSuite;

defined('ABSPATH') || exit;

class Assets {

    public function __construct() {
        
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_css']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_js']);
    }

    function enqueue_frontend_css() {

        wp_enqueue_style(
            'wpis_frontend_css',
            WPIS_URL . 'assets/css/public.css',
            array(),
            WPIS_VERSION,
            'all'
        );
    }

    function enqueue_frontend_js() {
        
        wp_enqueue_script(
            'wpis_frontend_js',
            WPIS_URL . 'assets/js/public-widget.js',
            array(),
            WPIS_VERSION,
            true
        );
    }
}