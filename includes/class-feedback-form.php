<?php
add_shortcode( 'insight_suite', 'callback_insight_suite');

function callback_insight_suite()
{
    ob_start();//Using this as a good practice. It means it turns on a bucket to catch the output.
    $file_path = require_once plugin_dir_path(__FILE__) . '../templates/feedback-form.php';
    if (file_exists($file_path)) {
        include($file_path);// Output is captured in the buffer but not being sent to the browser.
    } else {
        echo 'Feedback Form file is not found';
    }
    return ob_get_clean();//Fetches everything that is currently in the buffer as a string and then cleans the buffer.
}