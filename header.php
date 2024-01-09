<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-MQDFGM6');</script>
  <!-- End Google Tag Manager -->
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="keywords" content="インソール、足、脚、痛み、治療院、埼玉">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="https://unpkg.com/scroll-hint@1.1.10/css/scroll-hint.css">
  <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;300;400;600;700&family=Zen+Maru+Gothic:wght@300;400;500;700;900&display=swap" rel="stylesheet">



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> ontouchstart="">
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQDFGM6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



  <div class="loading">
    <div class="loading-animation">
      <div class="spinner"></div>
    </div>
  </div>


  <header class="header-area">
    <div class="header-area__inner">

      <h1 class="header-logo-area">
        <a href="<?php echo esc_url( home_url() ); ?>">
        <img src="<?php bloginfo('template_url'); ?>/images/logo_insole-a-crl1.svg" alt="インソールと痛みの治療院">
        </a>
      </h1><!-- .header-logo-area -->

      <div class="header-nav-area">

        <div class="hamburger-menu">
          <div class="openbtn1"><span></span><span></span><span></span></div>
        </div><!-- .hamburger-menu -->

        <?php if ( has_nav_menu( 'global' ) ) : ?>
          <?php wp_nav_menu( array(
            'theme_location' => 'global',
            'menu_class' => 'header-nav__list',
            'container' => 'nav',
            'container_class' => 'header-nav',
          ) ); ?>
        <?php endif; ?>

        <div class="sp-menu__wrapper">

          <?php if ( has_nav_menu( 'sp_global' ) ) : ?>
            <?php wp_nav_menu( array(
              'theme_location' => 'sp_global',
              'menu_class' => 'header-sp-nav__list',
              'container' => 'nav',
              'container_class' => 'header-sp-nav',
            ) ); ?>
          <?php endif; ?>

          <div class="sns__list">
            <a href="https://www.instagram.com/insole_pain_clinic/">
              <img src="<?php bloginfo('template_url'); ?>/images/icon_instagram_wh.svg" alt="インソールと痛みの治療院 Instagram">
            </a>

            <a href="https://www.youtube.com/@user-xq4vc5lg5v/featured">
              <img src="<?php bloginfo('template_url'); ?>/images/icon_youtube_wh.svg" alt="インソールと痛みの治療院 YouTube">
            </a>
          </div><!-- .sns__list -->

        </div><!-- .sp-menu__wrapper -->



      </div><!-- .header-nav-area -->


    </div><!-- .header-area__inner -->
  </header><!-- .header-area -->
