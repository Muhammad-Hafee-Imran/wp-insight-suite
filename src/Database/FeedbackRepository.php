<?php

namespace HafeeImran\WPInsightSuite\Database;

defined('ABSPATH') || exit;

class FeedbackRepository
{
    protected $wpdb;
    protected $table;
    

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $this->wpdb->prefix . 'insight_suite_feedback';
    }

    public function insertFeedback($name, $email, $feedback_message, $type)
    {

        $result = $this->wpdb->insert(
            $this->table,
            array(
                'name' => $name,
                'email' => $email,
                'feedback_message' => $feedback_message,
                'type' => $type,
                'created_at' => current_time('mysql'),
            ),
            array(
                '%s',
                '%s',
                '%s',
                '%s',
                '%s'
            )
        );

        if ($result===false) {
            return [
                'success' => false,
                'error' => $this->wpdb->last_error,
            ];
        }

        return [
            'success' => true,
            'insert_id' => $this->wpdb->insert_id,
        ];
    }
}
