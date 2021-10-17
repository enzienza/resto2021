<?php
/**
 * Name file: emportes
 *
 * Description: This file create a custom post type for manage of "emportes"
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */

function CPT_emportes(){
	/**
	 * définir les options du label
	 * @var array
	 */
	$labels = array(
		'name'               => __('emportés', 'emportes'),
		'singular_name'      => __('Emporté', 'emportes'),
		'menu_name'          => __('Emportés', 'emportes'),
		'name_admin_bar'     => __('Emporté', 'emportes'),
		'add_new'            => __('Ajouter', 'emportes'),
		'add_new_item'       => __('Ajouter une emporté', 'emportes'),
		'new_item'           => __('Nouvelle emporté', 'emportes'),
		'edit_item'          => __('Éditer une emporté', 'emportes'),
		'view_item'          => __('Voir la emporté', 'emportes'),
		'all_items'          => __('Toutes les emportés', 'emportes'),
		'search_items'       => __('Rechercher parmi les emportés', 'emportes'),
		'not_found'          => __('Pas de emporté trouvées', 'emportes'),
		'not_fount_in_trash' => __('Pas de emporté dans la corbeille', 'emportes'),
	);

	/**
	 * définir les option de rewrite
	 * @var array
	 */
	$rewrite = array(
		'slug'         => 'emportes',
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
                          d="M510.454,501.419L399.563,6.665c-0.06-0.256-0.23-0.444-0.316-0.7c-0.135-0.443-0.306-0.874-0.512-1.289     c-0.145-0.273-0.247-0.546-0.418-0.853c-0.207-0.298-0.432-0.583-0.674-0.853c-0.261-0.323-0.546-0.625-0.853-0.905     c-0.215-0.213-0.443-0.412-0.683-0.597c-0.309-0.187-0.628-0.358-0.956-0.512c-0.399-0.202-0.812-0.373-1.237-0.512     c-0.23-0.068-0.393-0.23-0.631-0.29c-0.077,0-0.145,0-0.213,0c-0.351-0.05-0.704-0.078-1.058-0.085     C391.713,0.128,391.491,0,391.235,0c-0.221,0.033-0.441,0.079-0.657,0.137c-0.284-0.018-0.569-0.018-0.853,0     c-0.324-0.066-0.652-0.112-0.981-0.137H118.629c-7.845-0.017-15.258,3.589-20.087,9.771L64.963,52.437     c-6.058,7.7-7.19,18.182-2.916,26.998c4.274,8.816,13.206,14.419,23.003,14.431h23.356L1.884,490.505     c-1.376,5.12-0.294,10.588,2.927,14.798s8.216,6.685,13.517,6.697h483.994c4.432-0.079,8.066-3.538,8.363-7.962     c0.021-0.361,0.021-0.723,0-1.084C510.656,502.437,510.579,501.922,510.454,501.419z M85.05,76.8     c-3.278,0.043-6.279-1.836-7.671-4.804c-1.473-2.933-1.096-6.456,0.964-9.011l33.587-42.667c1.612-2.059,4.084-3.259,6.699-3.251     h252.587L326.723,73.54c-1.613,2.064-4.088,3.267-6.707,3.26H85.05z M18.328,494.933l107.75-401.067h193.937     c7.853,0.022,15.276-3.584,20.113-9.771l34.739-44.134L265.052,494.933H18.328z M382.702,80.213V438.46l-98.33,49.161     L382.702,80.213z M307.915,494.933l83.174-41.591l77.235,41.591H307.915z M399.768,438.613V85.615l89.984,401.476     L399.768,438.613z"
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
		'menu_position'     => 8,
		//'menu_icon'         => 'dashicons-images-alt',
		'menu_icon'         => $iconSVG,
	);


	register_post_type('emportes', $args);

}

add_action('init', 'CPT_emportes');