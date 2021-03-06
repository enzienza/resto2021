<?php
/**
 * Template Name: default
 *
 * description: The page template to display all pages
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */
?>

<?php get_header(); ?>
    <section class="default">
        <div class="container">
			<?php if(have_posts()) : while(have_posts()) : the_post();?>
                <div class="row">
                    <div class="col-12"><?php the_content(); ?></div>
                </div><!--//row-->
			<?php endwhile; else: ?>
                <div class="row">
                    <div class="col-12">
                        Désolé, il n'y a pas d'articles
                    </div>
                </div><!--//row-->
			<?php endif; ?>
        </div><!--//container-->
    </section>
<?php get_footer(); ?>