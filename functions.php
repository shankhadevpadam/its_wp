<?php
/**
 * Monolith Child theme functions
 */

// Reorder parent css
function monolith_reorder_child_css() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

add_action( 'wp_enqueue_scripts', 'monolith_reorder_child_css', 101 );