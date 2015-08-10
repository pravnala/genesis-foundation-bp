<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Legado' );
define( 'CHILD_THEME_URL', '' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
// add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
// add_theme_support( 'genesis-footer-widgets', 3 );

//* Load additional assets
add_action('wp_enqueue_scripts', 'enqueue_assets');
function enqueue_assets()
{
	//** Google Fonts
  wp_register_style('gfonts', 'http://fonts.googleapis.com/css?family=Prata|Lato:400,700,900|Source+Sans+Pro:400,600,700', array(), null);
  // wp_register_style('gfonts', '//fonts.googleapis.com/css?family=Raleway:500,600,700,400|Montserrat:400,700|Open+Sans:400,600', array(), null);
  // note: use local font-awesome assets during dev, switch to cdn on live
  // wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), null);
  // wp_register_style('font-awesome', get_stylesheet_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css');

  //** Foundation
  wp_register_script('modernizr', get_stylesheet_directory_uri() . '/bower_components/modernizr/modernizr.js', array(), null, false);
  wp_deregister_script('jquery');
  // JQuery CDN
  // wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', array(), null, true);
  // Use minified jquery file with foundation
  wp_register_script('jquery', get_stylesheet_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array(), null, true);
  wp_register_script('foundation-js', get_stylesheet_directory_uri() . '/bower_components/foundation/js/foundation.min.js', array('modernizr', 'jquery'), null, true);
  wp_register_script('app-js', get_stylesheet_directory_uri() . '/js/app.js', array('foundation-js'), null, true);

  wp_register_style('app-css', get_stylesheet_directory_uri() . '/css/app.css', array('gfonts'), null);

  wp_enqueue_style('app-css');
  wp_enqueue_style('gfonts');
  //wp_enqueue_style('font-awesome');
  //wp_enqueue_style('main-css');
  wp_enqueue_script('foundation-js');
  wp_enqueue_script('app-js');
}

/**
 * Note: using WP-SCSS could be very slow during development
 * used foundation libsass grunt to natively compile SASS instead.
 * Settings below could still be used as fallback on production.
 */

//* WP-SCSS settings
// if( class_exists('scssc') &&
// 	// Compilation dir should be on theme root
// 	$css_dir_setting === '/' &&
// 	// Enqueue should be turned off
// 	!isset($wpscss_options['enqueue'])
// ) {
// 	//* Remove default style.css
// 	remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
// 	//* Manually enqueue compiled CSS
// 	add_action( 'wp_enqueue_scripts', 'enqueue_scss' );
// 	function enqueue_scss() {
// 		$handle   = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';
// 		$scss_ver = filemtime( get_stylesheet_directory() . '/main.css' );
// 		wp_enqueue_style( $handle, get_stylesheet_directory_uri().'/main.css', array(), $scss_ver  );
// 	}
// }

//* Responsive Nav
// add_action( 'genesis_after_header', 'responsive_nav_control', 9 );
// function responsive_nav_control() {
// 	$iconBar = '<span class="icon-bar-group">' . str_repeat('<span class="icon-bar"></span>', 3) . '</span>';
// 	$out = '<div class="nav-primary text-center">';
// 		$out .= '<button type="button" id="main-menu-control" data-toggle="collapse" data-target="#main-menu-collapse">';
// 			$out .= "{$iconBar} Menu";
// 		$out .= '</button>';
// 	$out .= '</div>';
// 	echo $out;
// }
// add_filter( 'genesis_do_nav', 'responsive_nav_wrap', 10, 3 );
// function responsive_nav_wrap($nav_output, $nav, $args) {
// 	return '<div id="main-menu-collapse" class="collapse navbar-collapse">' . $nav_output . '</div>';
// }

//* Add splash area below header specified by custom field 'splash'
// add_action( 'genesis_after_header', 'splash_section' );
// function splash_section() {
// 	$splash = get_post_meta(get_the_ID(), 'splash_section', true);
// 	if($splash) {
// 		echo do_shortcode($splash);
// 	}
// }

//** Unhook/relocate sections as needed for the theme
// Remove site title
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
// Remove site description
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );
// Remove default Genesis footer
remove_action( 'genesis_footer', 'genesis_do_footer' );

// TODO: Check if ideal for foundation template
//* Conditional html element classes
remove_action( 'genesis_doctype', 'genesis_do_doctype' );
add_action( 'genesis_doctype', 'child_do_doctype' );
function child_do_doctype() {
?><!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes( 'html' ); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes( 'html' ); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes( 'html' ); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes( 'html' ); ?>> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- Prevent scaling in HDPI, iPhone devices -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
}

//* Custom widgetized footer
// genesis_register_sidebar( array(
// 	'id'            => 'footer-widgets',
// 	'name'          => __( 'Footer', 'tcn' ),
// 	'description'   => __( 'Main footer area', 'tcn' ),
// ) );
// add_action('genesis_footer_output', 'widgetized_footer');
// function widgetized_footer() {
// 	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'footer-widgets' ) ) {}
// }

//* Widget title hiding
add_filter( 'widget_title', 'remove_widget_title' );
function remove_widget_title( $widget_title ) {
	if ( substr ( $widget_title, 0, 1 ) == '!' )
		return;
	else
		return ( $widget_title );
}

//* Favicon
add_filter( 'genesis_pre_load_favicon', 'custom_favicon' );
function custom_favicon() {
	return CHILD_URL . '/images/favicon.ico';
}

//* Remove Edit post link
add_filter( 'edit_post_link', '__return_false' );

//* Register Menus
function register_menus() {
  register_nav_menus( array(
    'primary_navigation_menu' => 'Topbar Menu',
    //'footer_menu' => 'Footer Menu',
  ) );
}
add_action( 'init', 'register_menus' );

//** Use Foundation top bar
// require_once(get_stylesheet_directory() . '/functions/menu.php');
// require_once(get_stylesheet_directory() . '/functions/menu-walker.php');

function include_foundation_topbar() {
    require(CHILD_DIR.'/sections/topbar.php');
}
remove_action( 'genesis_header', 'genesis_header_markup_open' );
remove_action( 'genesis_header', 'genesis_header_markup_close' );
add_action('genesis_before_header', 'include_foundation_topbar');

// Add active class to menu item for current page
add_filter('nav_menu_css_class' , 'active_nav_class' , 10 , 2);
function active_nav_class($classes, $item){
  if( in_array('current_page_item', $classes) ){
         $classes[] = 'active ';  // your new class
  }
  return $classes;
}

//** Inner Page content
// Remove genesis loop from default location and replace in inner page template
remove_action( 'genesis_loop', 'genesis_do_loop' );
require_once(get_stylesheet_directory() . '/functions/inner-content.php');

// Add custom footer
function do_legado_footer() {
   require(CHILD_DIR.'/sections/footer.php');
}
add_action('genesis_footer', 'do_legado_footer');

//* DEPRECATED: Remove post titles using conditional tags
/*add_action( 'get_header', 'hide_post_titles' );
function hide_post_titles() {
    $hide_titles = array(1234);
    if(is_front_page() || is_page($hide_titles)) {
        remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
    }
}*/

