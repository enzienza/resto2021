<?php
/**
 * Name file :   tab-content
 * Description : Load the 'tab-content' part of the template on the pages
 *               ==> this content is linked a 'nav-tabs'
 *               ==> each tab-content for pages: buffet, carte, emporter
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<div
	class="tab-pane fade container"
	id="<?php $title = sanitize_title(get_the_title()); echo $title;?>"
	role="tabpanel"
	aria-labelledby="tab-<?php $title = sanitize_title(get_the_title()); echo $title;?>"
>
	<div class="">
		<?php the_content(); ?>
	</div>
</div>
