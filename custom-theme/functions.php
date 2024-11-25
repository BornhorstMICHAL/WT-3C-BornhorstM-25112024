<?php
add_action( 'wp_enqueue_scripts', 'grand_sunrise_enqueue_styles' );

function grand_sunrise_enqueue_styles() {
	wp_enqueue_style( 
		'grand-sunrise-parent-style', 
		get_parent_theme_file_uri( 'style.css' )
	);
}


add_filter( 'the_content', 'filter_bad_words' );
add_filter( 'wp_insert_post_data', 'filter_bad_words_before_save', '99', 2 );

function filter_bad_words( $content ) {
    $bad_words = array( 'slovo1', 'slovo2', 'slovo3' ); 

    foreach ( $bad_words as $word ) {
        $pattern = '/\b' . preg_quote( $word, '/' ) . '\b/i';
        $content = preg_replace( $pattern, '****', $content );
    }

    return $content;
}

function filter_bad_words_before_save( $data, $postarr ) {
    if ( isset( $data['post_content'] ) ) {
        $data['post_content'] = filter_bad_words( $data['post_content'] );
    }
    return $data;
}

?>