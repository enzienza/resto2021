<?php
/**
 * Name file: cartes
 *
 * Description: This file create a custom post type for manage of "cartes"
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */

function CPT_cartes(){
	/**
	 * définir les options du label
	 * @var array
	 */
	$labels = array(
		'name'               => __('Cartes', 'cartes'),
		'singular_name'      => __('Carte', 'cartes'),
		'menu_name'          => __('Cartes', 'cartes'),
		'name_admin_bar'     => __('Carte', 'cartes'),
		'add_new'            => __('Ajouter', 'cartes'),
		'add_new_item'       => __('Ajouter une carte', 'cartes'),
		'new_item'           => __('Nouvelle carte', 'cartes'),
		'edit_item'          => __('Éditer une carte', 'cartes'),
		'view_item'          => __('Voir la carte', 'cartes'),
		'all_items'          => __('Toutes les cartes', 'cartes'),
		'search_items'       => __('Rechercher parmi les cartes', 'cartes'),
		'not_found'          => __('Pas de carte trouvées', 'cartes'),
		'not_fount_in_trash' => __('Pas de carte dans la corbeille', 'cartes'),
	);

	/**
	 * définir les option de rewrite
	 * @var array
	 */
	$rewrite = array(
		'slug'         => 'cartes',
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
	// $iconSVG = data:image/svg+xml;base64,' . base64_encode();


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
		'has_archive'       => true,
		'show_in_rest'      => true,              // oui => / editeur Gutemberg
		//'show_in_rest'      => false,             // non => / editeur Gutemberg
		'show_in_menu'      => true,
		'query_var'         => true,
		'show_in_nav_menus' => false,
		'capability_type'   => 'post',
		'menu_position'     => 7,
		'menu_icon'         => 'dashicons-images-alt',
		//'menu_icon'         => $iconSVG,
	);


	register_post_type('cartes', $args);

}

add_action('init', 'CPT_cartes');