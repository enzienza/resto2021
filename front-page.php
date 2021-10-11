<?php

?>

<?php get_header() ?>
<main>

    <section class="hero">
		<?php if(checked(1, get_option('add_image_hero_homepage'), false)): ?>
            <div class="hero-bg" style="background-image: url(<?php echo get_option('image_hero_homepage') ?>)">
                <div class="filter">
					<?php if((checked(1, get_option('add_logo_homepage'), false)) &&  (checked(1, get_option('add_message_hero_homepage'), false))): ?>
                        <div class="row jumb-title">
                            <div class="col-lg-3 col-12">
                                <img src="<?php echo get_option('img_logo') ?>"
                                     class="miniature"
                                     alt="<?php bloginfo('name') ?>"
                                />
                            </div>
                            <div class="col-lg-9 col-12">
                                <div class="msg-hero"><?php echo get_option('message_hero_homepage') ?></div>
                            </div>
                        </div>
					<?php elseif(checked(1, get_option('add_message_hero_homepage'), false) ): ?>
                        <div class="jumb-message container">
							<?php echo get_option('message_hero_homepage') ?>
                        </div>
					<?php elseif (checked(1, get_option('add_logo_homepage'), false)): ?>
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
				<?php if((checked(1, get_option('add_logo_homepage'), false)) &&  (checked(1, get_option('add_message_hero_homepage'), false))): ?>
                    <div class="row jumb-title">
                        <div class="col-lg-3 col-12">
                            <img src="<?php echo get_option('img_logo') ?>"
                                 class="miniature"
                                 alt="<?php bloginfo('name') ?>"
                            />
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="msg-hero"><?php echo get_option('message_hero_homepage') ?></div>
                        </div>
                    </div>
				<?php elseif(checked(1, get_option('add_message_hero_homepage'), false) ): ?>
                    <div class="jumb-message container">
						<?php echo get_option('message_hero_homepage') ?>
                    </div>
				<?php elseif (checked(1, get_option('add_logo_homepage'), false)): ?>
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

    <section class="air container">
		<?php get_template_part("template-parts/posts/buffet") ?>
    </section>

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

</main>
<?php get_footer() ?>
