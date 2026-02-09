<?php
if ( ! function_exists( 'thm_year_shortcode' ) ) {
    add_shortcode('year', 'thm_year_shortcode');

    function thm_year_shortcode() {
        return date('Y');
    }
}