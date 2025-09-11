<?php

namespace HafeeImran\WPInsightSuite\Admin;

defined('ABSPATH') || exit;

class AdminInsightSuite {
    public function __construct()
    {
        $this->init_admin_components();
    }

    public function init_admin_components() {
        new DashboardPage();
        new AdminAssets();
    }
}