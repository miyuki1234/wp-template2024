<?php get_header(); ?>

<main class="main-area">

  <!-- ーーートップビューーーー -->
  <div class="page-top-view bg-contact">
    <div class="page-top-view__inner">

      <div class="title__outer">
        <h2 class="title-e_4l show slide-bottom">
        CONTACT<span class="title-j_s">お問い合わせ</span>
        </h2><!-- .title-e_4l -->
      </div><!-- .title__outer -->

    </div><!-- .page-top-view__inner -->
  </div><!-- .page-top-view -->

  <!-- ーーーパンくずリストーーー -->
  <div class="breadcrumb-area">
    <div class="breadcrumb-area__inner">
      <div id="breadcrumb">
        <?php custom_breadcrumb(); ?>
      </div><!-- #breadcrumb -->
    </div><!-- .breadcrumb-area__inner -->
  </div><!-- .breadcrumb-area -->

  <!-- ーーーコンテンツーーー -->
  <section class="page-section-01 page-section last-section">

    <div class="page-section-01__inner page-section__inner">

      <h3 class="title-j_3l ta-center title_twotone">お問い合わせフォーム</h3><!-- .title-j_3l -->

      <div class="contact-form">
        <p class="text-j_s ta-center">まずはお気軽にお問い合わせください。3営業日以内に返信させていただきます。<br>
        営業・宣伝はお断りしております。</p><!-- .text-j_s -->

        <?php echo do_shortcode('[contact-form-7 id="50f722d" title="お問い合わせ"]'); ?>
      </div><!-- .contact-form -->

    </div><!-- .section-01__inner -->
  </section><!-- .section-01 -->

</main><!-- .main-area-->

<?php get_footer(); ?>
