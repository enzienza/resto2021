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
      Nous n'avons pas pu trouver la page ...
    </h1><!--//text-hightlight-->

    <div class="error-desc">
      <p>
        Désolé, mais la page que vous recherchez est introuvable ou n'existe pas.
        Essayez d'actualiser la page ou cliquez sur le bouton ci-dessous
        pour revenir à la page d'accueil. 
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
