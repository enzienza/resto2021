<?php
/**
 * Template Name: evenements
 *
 * description: The template for displaying for post-type evenements
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */
?>

<?php get_header(); ?>
<section class="hero">
	<?php if(checked(1, get_option('add_image_hero_eventpage'), false)): ?>
		<div class="hero-bg" style="background-image: url(<?php echo get_option('image_hero_eventpage') ?>)">
			<div class="filter">
				<?php if((checked(1, get_option('add_logo_hero_eventpage'), false)) &&  (checked(1, get_option('add_message_hero_eventpage'), false))): ?>
					<div class="row jumb-title">
						<div class="col-lg-3 col-12">
							<img src="<?php echo get_option('img_logo') ?>"
							     class="miniature"
							     alt="<?php bloginfo('name') ?>"
							/>
						</div>
						<div class="col-lg-9 col-12">
							<div class="msg-hero"><?php echo get_option('message_hero_eventpage') ?></div>
						</div>
					</div>
				<?php elseif(checked(1, get_option('add_message_hero_eventpage'), false) ): ?>
					<div class="jumb-message container">
						<?php echo get_option('message_hero_eventpage') ?>
					</div>
				<?php elseif (checked(1, get_option('add_logo_hero_eventpage'), false)): ?>
					<div class="jumb-hero">
						<img src="<?php echo get_option('img_logo')?>"
						     class="logo"
						     alt="<?php bloginfo('title') ?>"
						/>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php else: ?>
		<div class="filter">
			<?php if((checked(1, get_option('add_logo_hero_eventpage'), false)) &&  (checked(1, get_option('add_message_hero_eventpage'), false))): ?>
				<div class="row jumb-title">
					<div class="col-lg-3 col-12">
						<img src="<?php echo get_option('img_logo') ?>"
						     class="miniature"
						     alt="<?php bloginfo('name') ?>"
						/>
					</div>
					<div class="col-lg-9 col-12">
						<div class="msg-hero"><?php echo get_option('message_hero_eventpage') ?></div>
					</div>
				</div>
			<?php elseif(checked(1, get_option('add_message_hero_eventpage'), false) ): ?>
				<div class="jumb-message container">
					<?php echo get_option('message_hero_eventpage') ?>
				</div>
			<?php elseif (checked(1, get_option('add_logo_hero_eventpage'), false)): ?>
				<div class="jumb-hero">
					<img src="<?php echo get_option('img_logo')?>"
					     class="logo"
					     alt="<?php bloginfo('title') ?>"
					/>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</section>

<section class="air title container">
	<div>
		<h1 class="title-section center">
			<?php echo get_option("title_eventpage") ?>
		</h1>
		<p class="flip flip-large">
			<span class="deg1"></span>
			<span class="deg2"></span>
			<span class="deg3"></span>
		</p>
	</div>

	<?php if(checked(1, get_option('add_msg_page_eventpage'), false)): ?>
		<div class="description"><?php echo get_option('msg_page_eventpage') ?></div>
	<?php endif; ?>
</section>

<section class="container">
	<p>Section dédier au la carte</p>
	<?php echo get_option("main_msg_eventpage") ?>
</section>

<?php if(checked(1, get_option('hidden_reservation_eventpage'), false)): else: ?>
	<section class="reservation container">
		<ul class="group-list">
			<?php if(checked(1, get_option('add_icon_reservation_eventpage'), false)): ?>
				<li class="group-item reserve-icon">
					<i class="icons flaticon-telephone"></i>
				</li>
			<?php endif; ?>
			<li class="group-item reserve-info">
				<p class="reserve-message"><?php echo get_option('message_reservation_eventpage') ?></p>
				<?php if(checked(1, get_option('add_phone_reservation_eventpage'), false)): ?>
					<a href="tel:<?php get_option('phone') ?>" class="reserve-phone">
						<?php echo get_option('phone') ?>
					</a>
				<?php endif; ?>
			</li>
		</ul>
	</section>
<?php endif; ?>


<?php get_footer(); ?>