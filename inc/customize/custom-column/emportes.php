<?php
/**
 * Name file:   column-suggestion
 *
 * Description: file that customizes the theme
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */


/**
 *  Step 1
 *  [Ajouter les columns]
 */
add_filter(
	'manage_emportes_posts_columns',
	function($columns){
		// var_dump($columns);
		return[
			'cb'    => '<input type="checkbox" />',
			'icon'  => 'Icône',
			'title' => $columns['title'],
			'date'  => $columns['date']
		];
	}
);

/**
 *  Step 2
 *  [Afficher le contenu souhaiter]
 */
add_filter(
	'manage_emportes_posts_custom_column',
	function($column, $postId){
		if ($column === 'icon'){
			if(!empty(get_post_meta($postId, MB_use_faticons::META_KEY, true))){
				?>
                <p>
                    <i class="icon <?php echo get_post_meta(get_the_ID(), MB_use_faticons::META_KEY, true); ?>">
                    </i>
                </p>
				<?php
			} else {
				echo "";
			}
		}
	},
	10,
	2
);