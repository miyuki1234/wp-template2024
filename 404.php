<?php get_header(); ?>


  <main class="main-area">



    <!-- ーーートップビューーーー -->
    <div class="page-top-view bg-blog">
      <div class="page-top-view__inner">

        <div class="title__outer">
          <h2 class="title-j_l show slide-bottom">
            404 NOT FOUND
          </h2><!-- .title-j_l-ja -->
        </div><!-- .title__outer -->


        <!-- ーーーパンくずリストーーー -->
        <div class="breadcrumb-area">
          <div class="breadcrumb-area__inner">

            <div id="breadcrumb">
              <?php custom_breadcrumb(); ?>
            </div><!-- #breadcrumb -->
          </div><!-- .breadcrumb-area__inner -->
        </div><!-- .breadcrumb-area -->
      </div><!-- .page-top-view__inner -->
    </div><!-- .page-top-view -->



  <!-- ーーーコンテンツーーー -->

  <!-- ーーー1.お知らせーーー -->
  <section class="page-section-01 page-section section-black last-section">
    <div class="page-section-01__inner page-section__inner">

      <p class="text-j_s">お探しのページは存在しません。</p><!-- .text-j_s -->

      <img src="<?php bloginfo('template_url'); ?>/images/img_not-found.png" alt="NOT FOUND">





    </div><!-- .page-section-01__inner -->
  </section><!-- .page-section-01 -->

<?php get_template_part('contact-banner'); ?>

<?php get_template_part('contact-area'); ?>

  </main><!-- .main-area-->


      <?php get_footer(); ?>
