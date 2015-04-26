<?php

// Register fitvids script
add_action( 'wp_enqueue_scripts', 'mono_enqueue_scripts' );
function mono_enqueue_scripts() {
	
	wp_enqueue_script( 'mono-jquery', get_stylesheet_directory_uri() . '/js/jquery-1.9.1.min.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'mono-fitvids-script', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'mono-fitvids', get_stylesheet_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '1.0.0', true );

}

//* Add video embed function to pages and posts
add_action( 'genesis_entry_content', 'embed_video', 10 );

function embed_video() {
	$rows = get_field( 'embeded_video' );  //this is the ACF instruction to get everything in the repeater field
	
	if ( is_single() || is_page() ) {
		
		if($rows) {
			echo '<div class="video">';
			
			foreach($rows as $row) {	
					echo '' . $row['embeding_code']. '';
					echo '' . $row['comment']. '';
			}
			
			echo '</div>';
		}
	}
}