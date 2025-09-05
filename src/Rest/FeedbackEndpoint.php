<?php

namespace HafeeImran\WPInsightSuite\Rest;

use HafeeImran\WPInsightSuite\Database\FeedbackRepository;
use WP_Error;
use WP_REST_Request;
use WP_REST_Response;

class FeedbackEndpoint
{

    public function __construct()
    {
        $this->init_hooks();
    }

    public function init_hooks()
    {
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    public function register_routes()
    {
        register_rest_route(
            'insight-suite/v1',
            '/feedback',
            array(
                'methods' => 'POST',
                'callback' => [$this, 'handleFeedbackSubmission'],
                'permission_callback' => [$this, 'feedbackPermissionCheck'],
            ),
        );
    }

    public function feedbackPermissionCheck(WP_REST_Request $request)
    {
        $nonce = $request->get_header('X-WP-Nonce');
        if (wp_verify_nonce($nonce, 'insight_suite')) {
            return true;
        }
        return new WP_Error('invalid_nonce', 'Invalid Nonce', array('status' => 403));
    }

    public function handleFeedbackSubmission(WP_REST_Request $request)
    {

        $data = $request->get_json_params();

        if (!isset($data['name']) || empty($data['name'])) {
            return new WP_Error('empty_name', 'Empty Name', array('status' => 400));
        } else {
            $name = sanitize_text_field($data['name']);
        }

        if (!isset($data['email']) || empty($data['email'])) {
            return new WP_Error('empty_email', 'Empty Email', array('status' => 400));
        } else {
            $email = sanitize_email($data['email']);

            if (empty($email)) {
                return new WP_Error('invalid_email', 'Invalid Email', ['status' => 400]);
            }
        }

        if (!isset($data['feedback']) || empty($data['feedback'])) {
            return new WP_Error('empty_feedback', 'Empty Feedback', array('status' => 400));
        } else {
            $feedback = sanitize_textarea_field($data['feedback']);
        }

        if (!isset($data['type']) || empty($data['type'])) {
            return new WP_Error('empty_type', 'Empty Type', array('status' => 400));
        } else {
            $type = sanitize_text_field($data['type']);
        }

        $repository =  new FeedbackRepository();

        $result = $repository->insertFeedback($name, $email, $feedback, $type);

        if ($result['success'] === false) {
            return new WP_Error(
                'db_insert_error',
                'DB Insertion Failed: ' . $result['error'],
                array('status' => 500)
            );
        }


        return new WP_REST_Response([
            'success' => $result['success'],
            'message' => 'Feedback received successfully.',
            'feedback_id' => $result['insert_id'],
        ],201);
    }

}
