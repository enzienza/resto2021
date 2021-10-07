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
          <p class="location">location</p>
          <p class="phone">phone</p>
        </div>
        <ul class="social-list">
          <li class="social-item"><a href=""><span class="icons flaticon-facebook"></span></a></li>
          <li class="social-item"><a href=""><span class="icons flaticon-instagram"></span></a></li>
          <li class="social-item"><a href=""><span class="icons flaticon-twitter"></span></a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-4 col-12 block-logo">
      <img src=""
           alt="<?php bloginfo('title') ?>"
           class="logo"
      />
    </div>
    <div class="col-md-4 col-12 block-horaire"></div>
  </div>
</div>
