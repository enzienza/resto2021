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
  <?php get_template_part('parts/footer/info') ?>
</section>

<a href="#" class="scrollTop">
    <svg width="18px" height="18px" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
        <path fill="white"
              d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"/>
    </svg>
</a>

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
