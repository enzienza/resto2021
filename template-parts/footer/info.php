<?php
/**
 * Name file:   info
 * Description: display the template part for information in footer
 *
 * @package WordPress
 * @subpackage pekinparis
 * @version 1.0
 */
?>


<div class="container">
  <div class="row">
    <div class="col-md-4 col-12 block-contact">
      <div>
        <div>
          <p class="title"><?php bloginfo('title') ?></p>

          <?php if(checked(1, get_option('add_location'), false)): ?>
            <p class="location">
              <?php if(checked(1, get_option('icon_location'), false)): ?>
                <i class="icons flaticon-place-localizer"></i>
              <?php endif; ?>
              <?php echo get_option('location') ?>
            </p>
          <?php endif; ?>
          <?php if(checked(1, get_option('add_phone'), false)): ?>
            <p class="phone">
              <?php if(checked(1, get_option('icon_phone'), false)): ?>
                <i class="icons flaticon-telephone"></i>
              <?php endif; ?>
              <?php echo get_option('phone') ?>
            </p>
          <?php endif; ?>
          <?php if(checked(1, get_option('add_mail'), false)): ?>
            <p class="mail">
              <?php if(checked(1, get_option('icon_mail'), false)): ?>
                <i class="icons flaticon-envelope"></i>
              <?php endif; ?>
              <?php echo get_option('mail') ?>
            </p>
          <?php endif; ?>


        </div>
        <ul class="social-list">
          <?php if(checked(1, get_option('add_facebook'), false)): ?>
            <li class="social-item">
              <a href="<?php echo (esc_attr(get_option('url_facebook'))) ?>" target="_blank">
                  <i class="icons flaticon-facebook"></i>
              </a>
            </li>
          <?php endif; ?>

          <?php if(checked(1, get_option('add_instagram'), false)): ?>
            <li class="social-item">
              <a href="<?php echo (esc_attr(get_option('url_instagram'))) ?>" target="_blank">
                  <i class="icons flaticon-instagram"></i>
              </a>
            </li>
          <?php endif; ?>

          <?php if(checked(1, get_option('add_twitter'), false)): ?>
            <li class="social-item">
              <a href="<?php echo (esc_attr(get_option('url_twitter'))) ?>" target="_blank">
                  <i class="icons flaticon-twitter"></i>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
    <div class="col-md-4 col-12 block-logo">
      <img src="<?php echo get_option('img_logo') ?>"
           alt="<?php bloginfo('title') ?>"
           class="logo"
      />
    </div>
    <div class="col-md-4 col-12 block-horaire">
      <?php get_template_part('parts/footer/horaire') ?>
    </div>
  </div>
</div>
