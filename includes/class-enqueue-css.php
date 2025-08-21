<?php


add_action('wp_enqueue_scripts','ip_enqueue_css');

function ip_enqueue_css() {
    
    wp_enqueue_style(
        'ip-public-css',//This is the name of the file. 
        plugin_dir_url(__FILE__) . '../assets/css/public.css',//Its the path.
        array(),//If I need to load anything before this function.
        'all'
    );
}


