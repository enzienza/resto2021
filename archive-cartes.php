<?php
/**
 * Template Name: cartes
 *
 * description: The template for displaying for post-type cartes
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */
?>

<?php get_header(); ?>
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

<section class="air title container">
    <div>
        <h1 class="title-section center">
            <?php echo get_option("title_cartepage") ?>
        </h1>
        <p class="flip flip-large">
            <span class="deg1"></span>
            <span class="deg2"></span>
            <span class="deg3"></span>
        </p>
    </div>

    <?php if(checked(1, get_option('add_msg_page_cartepage'), false)): ?>
        <div class="description"><?php echo get_option('msg_page_cartepage') ?></div>
    <?php endif; ?>
</section>

<section class="container post">
    <ul class="nav nav-tabs">
        <?php
            wp_reset_postdata();

            $args = array(
                'post_type'      => 'cartes',
                'posts_per_page' => -1,
                'orderby'        => 'id',
                'order'          => 'ASC'
            );
            $my_query = new WP_query($args);
            if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
        ?>
            <?php get_template_part('template-parts/tabs/filter-icons') ?>
        <?php endwhile; endif;  wp_reset_postdata(); ?>
    </ul>


    <div class="tab-content">
        <div class="tab-pane fade show active">
            <p class="else-display">
			    <?php echo get_option('main_msg_cartepage') ?>
            </p>
        </div>
	    <?php
	    wp_reset_postdata();

	    $args = array(
		    'post_type'      => 'cartes',
		    'posts_per_page' => -1,
		    'orderby'        => 'id',
		    'order'          => 'ASC'
	    );
	    $my_query = new WP_query($args);
	    if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
		    ?>
		    <?php get_template_part('template-parts/tabs/tab-content') ?>
	    <?php endwhile; endif;  wp_reset_postdata(); ?>

    </div>

</section>

<?php if(checked(1, get_option('hidden_reservation_cartepage'), false)): else: ?>
	<section class="reservation container">
		<ul class="group-list">
			<?php if(checked(1, get_option('add_icon_reservation_cartepage'), false)): ?>
				<li class="group-item reserve-icon">
					<i class="icons flaticon-telephone"></i>
				</li>
			<?php endif; ?>
			<li class="group-item reserve-info">
				<p class="reserve-message"><?php echo get_option('message_reservation_cartepage') ?></p>
				<?php if(checked(1, get_option('add_phone_reservation_cartepage'), false)): ?>
					<a href="tel:<?php get_option('phone') ?>" class="reserve-phone">
						<?php echo get_option('phone') ?>
					</a>
				<?php endif; ?>
			</li>
		</ul>
	</section>
<?php endif; ?>


<?php get_footer(); ?>