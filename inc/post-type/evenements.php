<?php
/**
 * Name file: evenements
 *
 * Description: This file create a custom post type for manage of "evenements"
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */

function CPT_evenements(){
	/**
	 * définir les options du label
	 * @var array
	 */
	$labels = array(
		'name'               => __('Événements', 'evenements'),
		'singular_name'      => __('Événement', 'evenements'),
		'menu_name'          => __('Événements', 'evenements'),
		'name_admin_bar'     => __('Événement', 'evenements'),
		'add_new'            => __('Ajouter', 'evenements'),
		'add_new_item'       => __('Ajouter une événement', 'evenements'),
		'new_item'           => __('Nouvelle événement', 'evenements'),
		'edit_item'          => __('Éditer une évenement', 'evenements'),
		'view_item'          => __('Voir l\' événement', 'evenements'),
		'all_items'          => __('Toutes les événements', 'evenements'),
		'search_items'       => __('Rechercher parmi les événements', 'evenements'),
		'not_found'          => __('Pas d\' événement trouvées', 'evenements'),
		'not_fount_in_trash' => __('Pas d\' événement dans la corbeille', 'evenements'),
	);

	/**
	 * définir les option de rewrite
	 * @var array
	 */
	$rewrite = array(
		'slug'         => 'evenements',
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
		'thumbnail',       // image à la une
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
                          d="m451.908 152.407v-61.509h-60v-90.888l-391.908 149.722 10.707 28.024 351.201-134.17v47.312h-60v61.509c-34.192 6.968-60 37.271-60 73.491v120c0 36.931 26.393 67.498 60 74.463v91.537h30v-30h30v30h30v-30h30v30h30c0-20.444 0-70.71 0-91.537 33.592-6.961 60-37.517 60-74.463v-120c0-36.219-25.808-66.522-60-73.491zm-120-31.509h90v30h-90zm0 331v-30h90v30zm150-106c0 24.935-20.607 46-45 46h-120c-24.393 0-45-21.065-45-46v-120c0-24.813 20.187-45 45-45h120c24.813 0 45 20.187 45 45z"
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
		'menu_position'     => 9,
		//'menu_icon'         => 'dashicons-images-alt',
		'menu_icon'         => $iconSVG,
	);


	register_post_type('evenements', $args);

}

add_action('init', 'CPT_evenements');