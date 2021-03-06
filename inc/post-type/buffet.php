<?php
/**
 * Name file: buffets
 *
 * Description: This file create a custom post type for manage of "buffets"
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */

function CPT_buffets(){
	/**
	 * définir les options du label
	 * @var array
	 */
	$labels = array(
		'name'               => __('Buffets', 'buffets'),
		'singular_name'      => __('Buffet', 'buffets'),
		'menu_name'          => __('Buffets', 'buffets'),
		'name_admin_bar'     => __('Buffet', 'buffets'),
		'add_new'            => __('Ajouter', 'buffets'),
		'add_new_item'       => __('Ajouter une buffet', 'buffets'),
		'new_item'           => __('Nouvelle buffet', 'buffets'),
		'edit_item'          => __('Éditer une buffet', 'buffets'),
		'view_item'          => __('Voir la buffet', 'buffets'),
		'all_items'          => __('Toutes les buffets', 'buffets'),
		'search_items'       => __('Rechercher parmi les buffets', 'buffets'),
		'not_found'          => __('Pas de buffet trouvées', 'buffets'),
		'not_fount_in_trash' => __('Pas de buffet dans la corbeille', 'buffets'),
	);

	/**
	 * définir les option de rewrite
	 * @var array
	 */
	$rewrite = array(
		'slug'         => 'buffets',
		//'with_front'   => true,
		//'hierarchical' => false,
	);

	/**
	 * définir les option de supports
	 * @var array
	 */
	$supports = array(
		'title',           // titre
		'editor',          // editeur
		//'thumbnail',       // image à la une
		//'author',          // auteur du post
		//'excerpt',         // extrait
		//'comments'         // commentaires autorisé
	);

	/**
	 * définir l'icon SVG
	 * @var array
	 */
	 $iconSVG = 'data:image/svg+xml;base64,' . base64_encode(
        '<svg width="36px" height="34px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                    <path fill="black" 
                          d="M24,480H488a8.00008,8.00008,0,0,0,8-8V424a8.00008,8.00008,0,0,0-8-8H456V304h32a8.00008,8.00008,0,0,0,8-8V248a8.00008,8.00008,0,0,0-8-8h-.022A39.79015,39.79015,0,0,0,496,216a8.00008,8.00008,0,0,0-8-8H476.94409l10.21118-20.42236a7.99984,7.99984,0,1,0-14.31054-7.15528L464,198.11182V88h24a8.00008,8.00008,0,0,0,8-8V40a8.00008,8.00008,0,0,0-8-8H24a8.00008,8.00008,0,0,0-8,8V80a8.00008,8.00008,0,0,0,8,8H48v64.80493A40.068,40.068,0,0,0,16,192V296a8.00008,8.00008,0,0,0,8,8H56V416H24a8.00008,8.00008,0,0,0-8,8v48A8.00008,8.00008,0,0,0,24,480Zm416-64H344V304h96ZM248.80493,304a39.83418,39.83418,0,0,0,7.217,16H184V304ZM256,384h-.022l.022-.02795.022.02795Zm-70.62891-48h61.25782A24.04166,24.04166,0,0,1,224,352H208A24.04166,24.04166,0,0,1,185.37109,336ZM256,351.97205l.022.02795H255.978ZM326.62891,336A24.04166,24.04166,0,0,1,304,352H288a24.04166,24.04166,0,0,1-22.62891-16h61.25782ZM185.37109,368h61.25782A24.04166,24.04166,0,0,1,224,384H208A24.04166,24.04166,0,0,1,185.37109,368Zm80,0h61.25782A24.04166,24.04166,0,0,1,304,384H288A24.04166,24.04166,0,0,1,265.37109,368ZM304,320H288a24.04166,24.04166,0,0,1-22.62891-16h61.25782A24.04166,24.04166,0,0,1,304,320ZM185.37109,400h61.25782A24.04166,24.04166,0,0,1,224,416H208A24.04166,24.04166,0,0,1,185.37109,400ZM256,415.97205l.022.02795H255.978ZM265.37109,400h61.25782A24.04166,24.04166,0,0,1,304,416H288A24.04166,24.04166,0,0,1,265.37109,400ZM456,240H440a24.04166,24.04166,0,0,1-22.62891-16h61.25782A24.04166,24.04166,0,0,1,456,240Zm-203.05566,0-13.78907-27.57764A7.99869,7.99869,0,0,0,232,208H216a7.99869,7.99869,0,0,0-7.15527,4.42236L195.05566,240H192V200h64v40Zm-17.88868,0H212.94434l8-16h6.11132Zm-62.11132,0-13.78907-27.57764A7.99869,7.99869,0,0,0,152,208H136a7.99869,7.99869,0,0,0-7.15527,4.42236L115.05566,240H112V200h64v40Zm-17.88868,0H132.94434l8-16h6.11132Zm-62.11132,0L79.15527,212.42236A7.99869,7.99869,0,0,0,72,208H56a7.99869,7.99869,0,0,0-7.15527,4.42236L35.05566,240H32V200H96v40Zm-17.88868,0H52.94434l8-16h6.11132Zm20.91651-80H96V88H416V208H388.94409l10.21118-20.42236a7.99984,7.99984,0,1,0-14.31054-7.15528L371.05591,208H336V160a8.00008,8.00008,0,0,0-8-8H308.94409l10.21118-20.42236a7.99984,7.99984,0,1,0-14.31054-7.15528L291.05591,152H264a8.00008,8.00008,0,0,0-8,8v.022A39.79015,39.79015,0,0,0,232,152H216a39.96326,39.96326,0,0,0-32,16.028A39.96326,39.96326,0,0,0,152,152H136a39.96326,39.96326,0,0,0-32,16.028A40.35053,40.35053,0,0,0,95.97217,160Zm158.65674,24H193.37109A24.04166,24.04166,0,0,1,216,168h16A24.04166,24.04166,0,0,1,254.62891,184Zm-80,0H113.37109A24.04166,24.04166,0,0,1,136,168h16A24.04166,24.04166,0,0,1,174.62891,184ZM272,192V168h23.96c.01123.00006.02271.00195.03418.00195L296.02246,168H320v72H272Zm65.37109,32h61.25782A24.04166,24.04166,0,0,1,376,240H360A24.04166,24.04166,0,0,1,337.37109,224ZM448,208H432V88h16ZM32,48H480V72H32ZM80,88v64.80493A40.02741,40.02741,0,0,0,72,152H64V88ZM56,168H72a24.04166,24.04166,0,0,1,22.62891,16H33.37109A24.04166,24.04166,0,0,1,56,168ZM32,256H480v32H32Zm40,48h96V416H72ZM32,432H480v32H32Z"
                    />
              </svg>'
 	);


	/**
	 * définir les arguments du custom post type
	 * @var array
	 */
	$args = array(
		'labels'            => $labels,
		'rewrite'           => $rewrite,
		'supports'          => $supports,
		'public'            => true,
		'hierarchical'      => false,
		//'hierarchical'      => true,              // parent / child
		//'has_archive'       => true,              // c'est une archive => archive-{$post-type}
		'has_archive'       => false,               // c'est une page => page-{$post-type}
		'show_in_rest'      => true,                // oui => / editeur Gutemberg
		//'show_in_rest'      => false,             // non => / editeur Gutemberg
		'show_in_menu'      => true,
		'query_var'         => true,
		'show_in_nav_menus' => false,
		'capability_type'   => 'post',
		'menu_position'     => 6,
		//'menu_icon'         => 'dashicons-images-alt',
		'menu_icon'         => $iconSVG,
	);


	register_post_type('buffets', $args);

}

add_action('init', 'CPT_buffets');