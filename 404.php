<?php
/**
 * Name file:   404
 * Description: The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<?php get_header(); ?>
<section class="">
  <div class="error container">
    <div class="error-code">
      404
    </div><!--//error-code-->

    <h1 class="text-hightlight">
	    <?php echo get_option('maintext_error'); ?>
    </h1><!--//text-hightlight-->

    <div class="error-desc">
      <p>
	      <?php echo get_option('message_error'); ?>
      </p>
      <div>
        <a href="<?php echo esc_url( site_url( '/' ) ); ?>">
          Retour à la page d'accueil
        </a>
      </div>
    </div><!--//error-desc-->
  </div><!--//error-->
</section>
<?php get_footer(); ?>
