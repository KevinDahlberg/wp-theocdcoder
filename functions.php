<?php
/**
 * enqueue scripts and styles
 */

function theme_scripts() {
  wp_enqueue_style ('stylesheet', get_stylesheet_uri() );

  //adds the JS file that queries the DB
  wp_enqueue_script ('queries', get_template_directory_uri() . '/src/queries.js', array('jquery'), 1.0, false);

  //adds the compiled react file
  wp_enqueue_script ('bundle', get_template_directory_uri() . '/assets/bundle.js', array(), 1.0, true);

  //makes various wordpress settings available for use in the JS
  wp_localize_script('queries', 'WPsettings', array(
			'root' => esc_url_raw( rest_url() )
		));

}
add_action( 'wp_enqueue_scripts', 'theme_scripts');

?>
