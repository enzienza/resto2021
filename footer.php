<?php
/**
* Name file:   footer
* Description: The Template for displaying the footer
*
* @package WordPress
* @subpackage pekinparis
* @version 1.0
*/
?>


<section class="info">
  <?php get_template_part('template-parts/footer/info') ?>
</section>

<?php get_template_part('template-parts/elements/switchMode') ?>
<?php get_template_part('template-parts/elements/scrollTop') ?>

<footer class="footer text-center">
  <div class="container">

    <small class="copyright">
      <div class="float-left">
        <a href="#" class="">Privacy Policy</a>
      </div>

      <div class="float-right">
        © <?php bloginfo('name')?> 2020.
        All Rights Reserved.
        Designed by
        <a href="http://enzalombardo.be/" target="_blank">Enza Lombardo</a>.
      </div>
    </small>

  </div><!--//container-->
</footer><!--//footer-->

<?php wp_footer(); ?>

</body>
</html>
