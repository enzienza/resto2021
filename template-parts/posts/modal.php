<?php
/**
 * Name file:   modal
 * Description: loads 'modal' template-part on eventpage
 *              => each modal is present for page events
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */
?>

<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h2 class="modal-title" id="eventModalLabel">
				<?php the_title() ?>
			</h2>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<?php the_content() ?>
		</div>
	</div>
</div>
