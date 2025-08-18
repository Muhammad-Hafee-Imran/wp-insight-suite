<?php

function ip_enqueue_css() {
    wp_enqueue_style(
        'ip-public-css',
        plugin_dir_url(__FILE__) . '../assets/css/public.ss',
        array(),
        'all'
    );
}


