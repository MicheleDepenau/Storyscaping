<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	$parenthandle = 'astra-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	$theme        = wp_get_theme();
	wp_enqueue_style( $parenthandle,
		get_template_directory_uri() . '/style.css',
		array(),  // If the parent theme code has a dependency, copy it to here.
		$theme->parent()->get( 'Version' )
	);
	wp_enqueue_style( 'astrachildtheme-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parenthandle ),
		$theme->get( 'Version' ) // This only works if you have Version defined in the style header.
	);

	/* Dette er henvisningen til min scriptfil som er lavet til forsøg 1 med scroll back to top
	wp_enqueue_script( 'myscript',  get_stylesheet_directory_uri() . '/script.js', array(), null, true);
    */
}