<?php



namespace HafeeImran\WPInsightSuite\Database;
defined('ABSPATH') || exit;

class FeedbackTable {
    public function __construct()
    {
        $this->create_db_table();
    }

    private function create_db_table() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'insight_suite_feedback';
        //charset = character set (like utf8mb4) this part controls what characters can be stored and 
        //collate stands for collation like how those characters are compared and sorted e.g if a = A
        //utf8mb4 is a character set of mysql and it can store any univode character (emojis,letters,digits) 
        $charset_collate = $wpdb->get_charset_collate();

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    
        $sql = "CREATE TABLE $table_name (
        /* Column name or Variable name | Input type | Condition */
        id mediumint NOT NULL AUTO_INCREMENT,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        name varchar(100) NOT NULL,
        email varchar(50) NOT NULL,
        feedback_message text NOT NULL,
        type text NOT NULL,
        PRIMARY KEY (id)
        
        )$charset_collate ";

        dbDelta($sql);  
    }
}