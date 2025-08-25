<?php

namespace HafeeImran\WPInsightSuite;

defined('ABSPATH') || exit;

//Comments are added by the author himself to help other developers or learners.


class FeedbackFormShortcode {

    const SHORTCODE = 'insight_feedback_form';

    //This is a constructor that will be called when the object of this class will be created.
    public function __construct() {
        //Hook into WordPress the init action to register the shortcode after the WP is fully loaded but before sending anything to the browser.
        //This keyword is here to tell the compiler to run the register_shorcode function of this class. 
        add_action('init' , [$this, 'register_shortcode']);

    }

    function register_shortcode() {

        //The class scope resolution self:: is used beacuse we are using the class constant static variable declared in this class. self ensures we reference this class's constant.
        add_shortcode( self::SHORTCODE, [$this, 'render'] );
    }

    public function render( $atts = [], $content = null, $tag = '' ) {
        
        //WordPress requires shortcode callback functions to accept 3 parameters ($atts, $content, $tag) for flexibility.
        //Not a strict “requirement” but a best practice.
        $atts = shortcode_atts([
            'title' => '',
            'prompt' => '',
        ], $atts, $tag);
        // Merge user-defined shortcode attributes with defaults for consistency.

        ob_start();
        
        $template = WPIS_PATH . 'templates/feedback-form.php';

        if(file_exists($template)) {
            //We can use this in out template file if we have to. Renaming is for to avoid conflicts.
            $wpis_atts = $atts;
            include $template;
        } else {

            echo '<div class="notice notice-error">Insight Suite: Feedback template missing. </div> ';
        }

        return ob_get_clean();

    }

}
