 <?php
/**
* Name file:   header
* Description: The header for our theme
*
* @package WordPress
* @subpackage pekinparis
* @version 1.0
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <!-- ============= META ============= -->
  <meta <?php bloginfo('charset'); ?>>
  <meta name="viewport"
  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- ============= INFORMATIONS  ============= -->
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="author" content="Enza Lombardo">

  <title><?php bloginfo('title'); ?></title>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="header" role="banner">
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
      <div class="container">

        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php bloginfo('name')?>
          <!-- <img src="" alt=""> -->
        </a>

        <!-- Brand and toggle get grouped for better mobile display -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-example" aria-controls="navbar-example" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse justify-content-center" id="navbar-example">
          <?php
          /**
          * [navigation principal]
          */
          wp_nav_menu(array(
              'theme_location' => 'header',
              'depth'          => 2,
              'container'      => false,
              'menu_class'     => 'navbar-nav'
          ));
          ?>
        </div>
      </div>
    </nav>
  </div><!-- /.header -->
