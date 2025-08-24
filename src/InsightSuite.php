<?php

namespace InsightSuite;

defined('ABSPATH') || exit;

class InsightSuite {
    public function __construct()
    {
        $this->init_components();    
    }

    private function init_components() {

        new FeedbackFormShortcode();
        new Assets();

    }


}