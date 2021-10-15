<?php
/**
 * Name file:   front-page
 * Description: The front page template file
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */
?>

<?php get_header() ?>

    <?php get_template_part('template/homepage/hero'); ?>
    <?php get_template_part('template/homepage/title'); ?>

    <section class="container post" id="buffet">
        <ul class="nav nav-tabs">
		    <?php
                wp_reset_postdata();

                $args = array(
                    'post_type'      => 'buffets',
                    'posts_per_page' => -1,
                    'orderby'        => 'id',
                    'order'          => 'ASC'
                );
                $my_query = new WP_query($args);
                if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
            ?>
			    <?php get_template_part('template-parts/tabs/filter') ?>
		    <?php endwhile; endif;  wp_reset_postdata(); ?>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active">
                <p class="else-display">
				    <?php echo get_option('main_msg_homepage') ?>
                </p>
            </div>
		    <?php
                wp_reset_postdata();

                $args = array(
                    'post_type'      => 'buffets',
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

    <?php get_template_part('template/homepage/reservation'); ?>
<?php get_footer() ?>
