<?php
/**
 * Name file:   confif
 *
 * Description: file that customizes the theme
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */

/**
 * *** INDEX ***
 *
 * 1 - Theme setup
 * 2 - custom css nav menu
 * 3 - Include Styles and script
 * 4 - Separator Title
 * 5 - Hiden Version WP
 */

/**
 * 1 - Theme setup
 *     Function for perform basic setup, registration and init actions for theme
 */

 // fonction qui vérifie si le 'pekinparis_supports' exixte déjà avant de l'initialiser
 if(!function_exists('pekinparis_supports')){
   function pekinparis_supports(){
     // active le titre => important pour le réferencement
     add_theme_support( "title-tag" );

     // Enable automatic feed links
     add_theme_support( 'automatic-feed-links' );

     // Enable featured image
     add_theme_support('post-thumbnails');

     // dimention image
     add_image_size('post-thumbnail', 350, 215, true);

     // Custom menu areas
     register_nav_menus( array(
       'header' => esc_html__( 'Header', 'En tête du menu' ),
       //'footer' => esc_html__( 'Footer', 'Pied de page' )
     ) );
   }
 }
 add_action('after_setup_theme','pekinparis_supports' );

 /**
 * 2 - Custom css nav menu
 *     nav_menu_css_class: Filters the CSS classes applied to a menu item’s list item element.
 *     nav_menu_link_attributes: Filters the HTML attributes applied to a menu item’s anchor element.
 */
// add_filter(
//     "nav_menu_css_class",
//     function($classes){
//         $classes[] = 'nav-item';
//         return $classes;
//     }
// );
//
// add_filter(
//     "nav_menu_link_attributes",
//     function($attrs){
//         $attrs['class'] = 'nav-link';
//         return $attrs;
//     }
// );

/**
 * 3 - Include Styles and script
 *     Function for runs the scripts and css for theme
 */

 /**
  * 3 - Include Styles and script
  *     Function for runs the scripts and css for theme
  */
 // fonction qui vérifie si 'pekinparis_register_assets' exixte déjà avant de l'initialiser
 if(!function_exists('pekinparis_register_assets')){
     function pekinparis_register_assets(){

         /* SCRIPT ---------------------------------- */

         // cdn JS bootstrap 4.4.1 ---------------------
         wp_register_script(
             'bootstrap',
             'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
             ['popper', 'jquery'],
             '4.4.1', true
         );

         // CDN popper -------------------------------
         wp_register_script(
             'popper',
             'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',
             [],
             '1.16.0', true
         );

         // MY PLUGIN ------------------------------------


         // CDN jQuery -------------------------------
         wp_deregister_script('jquery');
         wp_register_script(
             'jquery',
             'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js',
             [],
             '3.5.1',
             true
         );


         /* STYLE ----------------------------------- */
         // cdn CSS bootstrap 4.4.1 ---------------------
                 wp_register_style(
                     'bootstrap',
                     'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css',
                     [], '4.4.1'
                 );
                 wp_enqueue_style('bootstrap');


         // css custem -------------------------------
         wp_enqueue_style(
             'style',
             get_template_directory_uri().'/style.css',
             [], '1.0.0'
         );
     }
 }
 add_action('wp_enqueue_scripts', 'pekinparis_register_assets');


 /**
  * 4 - Separator Title
  *     Filters the separator for the document title
  */
 if(!function_exists('pekinparis_title_separator')){
     function pekinparis_title_separator(){
         return '|';
     }
 }
 add_filter( 'document_title_separator', 'pekinparis_title_separator');


 /**
  * 5 - Hiden Version WP
  */
 //	Securité : Cacher la verion du WordPress utilisé
 function pekinparis_remove_version_strings( $src ) {
     global $wp_version;
     parse_str(parse_url($src, PHP_URL_QUERY), $query);
     if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
         $src = remove_query_arg('ver', $src);
     }
     return $src;
 }

 add_filter( 'script_loader_src', 'pekinparis_remove_version_strings' );
 add_filter( 'style_loader_src', 'pekinparis_remove_version_strings' );

 // Hide WP version strings from generator meta tag
 function pekinparis_remove_version() {
     return '';
 }

 add_filter('the_generator', 'pekinparis_remove_version');
