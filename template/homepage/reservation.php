<?php
/**
 * Name file: reservation
 *
 * Description: loads 'reservation' section template-part for homepage
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */
?>

<?php if(checked(1, get_option('hidden_reservation_homepage'), false)): else: ?>
    <section class="reservation container">
        <ul class="group-list">
			<?php if(checked(1, get_option('add_icon_reservation_homepage'), false)): ?>
                <li class="group-item reserve-icon">
                    <i class="icons flaticon-telephone"></i>
                </li>
			<?php endif; ?>
            <li class="group-item reserve-info">
                <p class="reserve-message"><?php echo get_option('message_reservation_homepage') ?></p>
				<?php if(checked(1, get_option('add_phone_reservation_homepage'), false)): ?>
                    <a href="tel:<?php get_option('phone') ?>" class="reserve-phone">
						<?php echo get_option('phone') ?>
                    </a>
				<?php endif; ?>
            </li>
        </ul>
    </section>
<?php endif; ?>
