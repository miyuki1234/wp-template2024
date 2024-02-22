<?php get_header(); ?>

<main class="main-area">

  <!-- ーーートップビューーーー -->
  <div class="page-top-view bg-contact">
    <div class="page-top-view__inner">

      <div class="title__outer">
        <h2 class="title_theme_l show slide-bottom">
        CONTACT<span>お問い合わせ</span>
        </h2><!-- .title_theme_l-ja -->
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
<section class="page-section-01 page-section section-black">

  <div class="page-section-01__inner page-section__inner last-section__inner">

    <h3 class="title_theme_m ta-center">お問い合わせフォーム</h3><!-- .title_theme_m -->

    <div class="contact-form">
      <p class="text_theme_s">まずはお気軽にお問い合わせください。3営業日以内に返信させていただきます。<br>
      営業・宣伝はお断りしております。</p><!-- .text_theme_s -->

      <?php echo do_shortcode('[contact-form-7 id="50f722d" title="お問い合わせ"]'); ?>
    </div><!-- .contact-form -->

  </div><!-- .section-01__inner -->
</section><!-- .section-01 -->

</main><!-- .main-area-->

<?php get_footer(); ?>
