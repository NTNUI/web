<?php
function my_theme_enqueue_styles() {

    $parent_style = 'shapely-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/*
function shapely_child_exclude_page_templates() {
		unset( $post_templates['page-templates/full-width.php'] );
		unset( $post_templates['page-templates/no-sidebar.php'] );
		unset( $post_templates['page-templates/sidebar-left.php'] );
		unset( $post_templates['page-templates/sidebar-right.php'] );

	return $post_templates;
}

add_action( 'theme_page_templates', 'shapely_child_exclude_page_templates' );
*/
function add_adobe_fonts() {
  wp_enqueue_script( 'adobe_edge_web_fonts', '//use.edgefonts.net/open-sans.js' );
}

add_action( 'wp_enqueue_scripts', 'add_adobe_fonts' );

// Get rid of the current one by removing filter
function child_theme_setup() {
	// override parent theme's 'more' text for excerpts
	remove_filter( 'excerpt_more', 'travelify_continue_reading' );
}
add_action( 'after_setup_theme', 'child_theme_setup' );

// Add new filter to change Read More button text. || klassen som lagde orginal knapp class="more-link"
add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
return '<br><a class="" href="' . get_permalink() . '">Les mer</a>';
}


//START HER
if (function_exists('register_sidebar')){
    register_sidebar(array('name'=>'Single Post Sidebar',
      'id' => 'sidebar-single',
      'before_widget' => '<div id="%1$s" class="widget-area %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));
 
    // Dynamic Widgets
    $myPages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'page' AND post_status = 'publish'"); 
 
    foreach ($myPages as $q ){
      $id = 'sidebar-'.$q->ID;
      $namePref = "Parent - ";
      if ($q->post_parent != 0){ 
        $namePref = "Child - ";
      } 
      $sbtitle = $namePref . $q->post_title;
      if ($sbtitle && function_exists('register_sidebar')){
        register_sidebar(array(
          'id' => $id, 
          'name'          => $sbtitle ,
          'before_widget' => '<div id="%1$s" class="widget-area %2$s">', 
          'after_widget' => '</div>', 
          'before_title' => '<h3>', 
          'after_title' => '</h3>'
        ));
      }
    }
  }
?>
