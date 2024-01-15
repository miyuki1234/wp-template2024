  <footer class="footer-area">

    <div class="footer-top-slider__wrapper">
      <div class="footer-top-slider">
      </div><!-- .footer-top-slider -->
    </div><!-- .footer-top-slider__wrapper -->


    <div class="footer-area__inner">



      <div class="column2 r-43-43">

        <div class="column2__1">

          <a href="<?php echo esc_url( home_url() ); ?>">
          <img src="<?php bloginfo('template_url'); ?>/images/logo_insole-a-white.svg" alt="インソールと痛みの治療院">
          </a>

          <div class="btn-area">
            <a href="<?php echo home_url('/contact'); ?>" class="btn">お問い合わせ</a>
          </div><!-- .btn-area -->


        </div><!-- .column2__1 -->

        <div class="column2__2">
          <?php if ( has_nav_menu( 'footer_global' ) ) : ?>
            <?php wp_nav_menu( array(
              'theme_location' => 'footer_global',
              'menu_class' => 'footer-nav__list',
              'container' => 'nav',
              'container_class' => 'footer-nav',
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



        </div><!-- .column2__2 -->

      </div><!-- .column2 -->


      <p class="copyrights text_theme_s ta-center">©インソールと痛みの治療院</p><!-- .copyrights -->


    </div><!-- .footer-area__inner -->
  </footer><!-- .footer-area -->

  <?php wp_footer(); ?>



  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/base.js" type="text/javaScript" charset="utf-8"></script>
</body>

</html>
