<?php
/**
 * Name file: hero
 *
 * Description: loads 'hero' section template-part for cartepage
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */
?>


<section class="hero">
	<?php if(checked(1, get_option('add_image_hero_cartepage'), false)): ?>
        <div class="hero-bg" style="background-image: url(<?php echo get_option('image_hero_cartepage') ?>)">
            <div class="filter">
				<?php if((checked(1, get_option('add_logo_hero_cartepage'), false)) &&  (checked(1, get_option('add_message_hero_cartepage'), false))): ?>
                    <div class="row jumb-title">
                        <div class="col-lg-3 col-12">
                            <img src="<?php echo get_option('img_logo') ?>"
                                 class="miniature"
                                 alt="<?php bloginfo('name') ?>"
                            />
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="msg-hero"><?php echo get_option('message_hero_cartepage') ?></div>
                        </div>
                    </div>
				<?php elseif(checked(1, get_option('add_message_hero_cartepage'), false) ): ?>
                    <div class="jumb-message container">
						<?php echo get_option('message_hero_cartepage') ?>
                    </div>
				<?php elseif (checked(1, get_option('add_logo_hero_cartepage'), false)): ?>
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
			<?php if((checked(1, get_option('add_logo_hero_cartepage'), false)) &&  (checked(1, get_option('add_message_hero_cartepage'), false))): ?>
                <div class="row jumb-title">
                    <div class="col-lg-3 col-12">
                        <img src="<?php echo get_option('img_logo') ?>"
                             class="miniature"
                             alt="<?php bloginfo('name') ?>"
                        />
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="msg-hero"><?php echo get_option('message_hero_cartepage') ?></div>
                    </div>
                </div>
			<?php elseif(checked(1, get_option('add_message_hero_cartepage'), false) ): ?>
                <div class="jumb-message container">
					<?php echo get_option('message_hero_cartepage') ?>
                </div>
			<?php elseif (checked(1, get_option('add_logo_hero_cartepage'), false)): ?>
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