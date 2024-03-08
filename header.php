<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="keywords" content="">
  <meta name="format-detection" content="telephone=no">
  <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&family=Zen+Kaku+Gothic+New:wght@400;700&display=swap" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> ontouchstart="">

  <div class="loading">
    <div class="loading-animation">
      <div class="spinner"></div>
    </div>
  </div>

  <header class="header-area">
    <div class="header-area__inner">

      <h1 class="header-logo-area">
        <a href="<?php echo esc_url( home_url() ); ?>">
        <img src="<?php bloginfo('template_url'); ?>/images/logo_lighter-01.svg" alt="LIGHTER">
        </a>
      </h1><!-- .header-logo-area -->

      <div class="header-nav-area">

        <div class="hamburger-menu">
          <div class="openbtn1">
            <span></span>
            <span></span>
            <span></span></div>
        </div><!-- .hamburger-menu -->

        <?php if ( has_nav_menu( 'global' ) ) : ?>
          <?php wp_nav_menu( array(
            'theme_location' => 'global',
            'menu_class' => 'header-nav__list',
            'container' => 'nav',
            'container_class' => 'header-nav',
          ) ); ?>
        <?php endif; ?>
      </div><!-- .header-nav-area -->

    </div><!-- .header-area__inner -->

    <div class="sp-menu__wrapper">
      <?php if ( has_nav_menu( 'sp_global' ) ) : ?>
        <?php wp_nav_menu( array(
          'theme_location' => 'sp_global',
          'menu_class' => 'header-sp-nav__list',
          'container' => 'nav',
          'container_class' => 'header-sp-nav',
        ) ); ?>
      <?php endif; ?>
    </div><!-- .sp-menu__wrapper -->

  </header><!-- .header-area -->