<?php

add_action('wp_enqueue_scripts', 'ip_enqueue_js');

function ip_enqueue_js() {
    wp_enqueue_script(
        'ip-js',
        plugin_dir_url(__FILE__) . '../assets/js/public-widget.js',
        array(),
        '1.0.0',
        true
    );
}