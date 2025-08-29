<?php

namespace HafeeImran\WPInsightSuite\Rest;

class FeedbackEndpoint {

    public function __construct()
    {   
        $this->init_hooks();
    }

    public function init_hooks() {
        add_action('rest_api_init', [$this, 'register_routes'] );
    }

    public function register_routes() {
        register_rest_route(
            'ipff/v1',
            '/feedback',
            array(
                'methods'=> 'POST',
                'callback' => [$this, 'handle_feedback_submission'],
                'permisssion_callback' => [$this, 'feedback_permission_check']
            ),
        );
    }

    public function handle_feedback_submission() {

    }
    
    public function feedback_permission_check() {
        
    }

}