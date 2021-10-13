<?php
/**
 * Name file: title
 *
 * Description: loads 'title' section template-part for homepage
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */
?>

<section class="air title container">
	<div>
		<h1 class="title-section center">
			<?php echo get_option("title_homepage") ?>
		</h1>
		<p class="flip flip-large">
			<span class="deg1"></span>
			<span class="deg2"></span>
			<span class="deg3"></span>
		</p>
	</div>

	<?php if(checked(1, get_option('add_msg_page_homepage'), false)): ?>
		<div class="description"><?php echo get_option('msg_page_homepage') ?></div>
	<?php endif; ?>
</section>
