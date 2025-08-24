<?php

defined('ABSPATH') || exit;

class Insight_Suite_Assets {

    public function __construct() {
        
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_css']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_js']);
    }

    function enqueue_frontend_css() {

        wp_enqueue_style(
            'ip_frontend_css',
            plugin_dir_url(__FILE__) . '../assets/css/public.css',
            array(),
            WPIS_VERSION,
            'all'
        );
    }

    function enqueue_frontend_js() {
        wp_enqueue_script(
            'ip_frontend_js',
            plugin_dir_url(__FILE__) . '../assets/js/public-widget.js',
            array(),
            WPIS_VERSION,
            true
        );
    }
}