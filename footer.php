  <footer class="footer-area">

    <div class="footer-area__inner">

      <div class="footer-column">
        <div class="column__inner">

          <div class="footer-logo">
            <a href="<?php echo esc_url( home_url() ); ?>">
              <img src="<?php bloginfo('template_url'); ?>/images/logo_lighter-02.svg" alt="LIGHTER">
            </a>
          </div><!-- footer-logo -->
          <div class="footer-info">
            <p class="text-j_s">〒000-0000<br>
              東京都千代田区◯◯-◯◯-◯◯◯<br>
              TEL/00-0000-0000</p><!-- text-j_s -->
          </div><!-- footer-info -->
          
        </div><!-- .column__inner -->
        <div class="column__inner">

          <div class="footer-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.8278537074284!2d139.76454987558236!3d35.68124052997387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bfbd89f700b%3A0x277c49ba34ed38!2z5p2x5Lqs6aeF!5e0!3m2!1sja!2sjp!4v1708150412764!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div><!-- footer-map -->

        </div><!-- .column__inner -->
      </div><!-- .column -->

      <?php if ( has_nav_menu( 'footer_global' ) ) : ?>
        <?php wp_nav_menu( array(
          'theme_location' => 'footer_global',
          'menu_class' => 'footer-nav__list',
          'container' => 'nav',
          'container_class' => 'footer-nav',
        ) ); ?>
      <?php endif; ?>

      <p class="copyrights text-e_2s ta-center">© LIGHTER inc.</p><!-- .copyrights -->

    </div><!-- .footer-area__inner -->
  </footer><!-- .footer-area -->

  <?php wp_footer(); ?>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/base.js" type="text/javaScript" charset="utf-8"></script>
</body>

</html>
