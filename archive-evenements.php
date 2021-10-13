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
<?php get_template_part('template/eventpage/hero'); ?>
<?php get_template_part('template/eventpage/title'); ?>

<section class="container post">
    <div class="row">
        <?php
            wp_reset_postdata();

            $args = array(
                'post_type'      => 'evenements',
                'posts_per_page' => -1,
                'orderby'        => 'id',
                'order'          => 'ASC'
            );
            $my_query = new WP_query($args);
            if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
        ?>
                <!-- Button trigger modal -->
            <div class="col-md-4 col-12 thumbnail" data-toggle="modal" data-target="#eventModal">
	            <?php the_post_thumbnail(); ?>
            </div>

        <!-- Modal -->
        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
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
        </div>

	    <?php endwhile; endif;  wp_reset_postdata(); ?>
    </div>
</section>

<?php get_template_part('template/eventpage/reservation'); ?>

<?php get_footer(); ?>
