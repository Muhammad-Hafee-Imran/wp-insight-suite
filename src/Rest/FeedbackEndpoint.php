<?php

namespace HafeeImran\WPInsightSuite\Rest;

use WP_Error;
use WP_REST_Request;
use WP_REST_Response;

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
                'methods' => 'POST',
                'callback' => [$this,'handle_feedback_submission'],
                'permission_callback' => [$this, 'feedback_permission_check'],
            ),
        );
    }

    public function feedback_permission_check(WP_REST_Request $request) {
        $nonce = $request->get_header('X-WP-Nonce');
        if (wp_verify_nonce($nonce, 'insight_suite')) {
            return true;
        }
        return new WP_Error('invalid_nonce' , 'Invalid Nonce' , array('status' => 403));
    }

    public function handle_feedback_submission(WP_REST_Request $request) {

        $data = $request->get_json_params();

        if (!isset($data['name']) || empty($data['name'])) {
            return new WP_Error( 'empty_name', 'Empty Name', array('status' => 400) );
        } else {
            $name = sanitize_text_field($data['name']);
        }

        if (!isset($data['email']) || empty($data['email'])) {
            return new WP_Error( 'empty_email', 'Empty Email', array('status' => 400) );
        } else {
            $email = sanitize_text_field($data['email']);
        }

        if (!isset($data['feedback']) || empty($data['feedback'])) {
            return new WP_Error( 'empty_feedback', 'Empty Feedback', array('status' => 400) );
        } else {
            $feedback = sanitize_text_field($data['feedback']);
        }

        if (!isset($data['type']) || empty($data['type'])) {
            return new WP_Error( 'empty_type', 'Empty Type', array('status' => 400) );
        } else {
            $type = sanitize_text_field($data['type']);
        }

        global $wpdb;

        $table_name = $wpdb->prefix . 'insight_suite_feedback';

        $wpdb->insert (
            $table_name,
            array(
                'name' => $name,
                'email' => $email,
                'feedback_message' => $feedback,
                'type' => $type,
                'created_at' => current_time('mysql'),
            )
        );

        $response = new WP_REST_Response([
            'success' => true,
            'message' => 'Feedback received successfully.'
        ], 200);

        return $response;

        

    }
}