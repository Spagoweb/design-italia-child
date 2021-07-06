<?php
function spago_theme_enqueue_styles() {

  $parent_handle = 'general-style';
  $theme = wp_get_theme();
  
  wp_enqueue_style( $parent_handle, get_template_directory_uri() . '/style.css',
  	// if the parent theme code has a dependency, copy it to here
    array('lineawesome-icon-min', 'bootstrap-italia-min', 'bootstrap-italia-map', 'bootstrap-italia-icon-font'),  
    $theme->parent()->get('Version')
  );
  wp_enqueue_style( 'child-style', get_stylesheet_uri(),
    array( $parent_handle ),
    $theme->get('Version') // this only works if you have Version in the style header
  );
}
add_action( 'wp_enqueue_scripts', 'spago_theme_enqueue_styles' );
