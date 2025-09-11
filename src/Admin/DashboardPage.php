<?php

namespace HafeeImran\WPInsightSuite\Admin;

defined('ABSPATH') || exit;

class DashboardPage {

    public function __construct()
    {
        add_action('admin_menu', [$this, 'insight_admin_menu'] );
    }

    public function insight_admin_menu() {
        add_menu_page(
            'Insigh Suite',
            'Insight Dashboard',
            'manage_options',
            'feedback-form',
            [$this, 'insight_callback']

        );
    }

    public function insight_callback() {
        echo '<div id="wis-admin-root"></div>';
    }
}