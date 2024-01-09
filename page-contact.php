<?php get_header(); ?>


<main class="main-area">



  <!-- ーーートップビューーーー -->
  <div class="page-top-view bg-normal">
    <div class="page-top-view__inner">

      <div class="title__outer">
        <h2 class="title_theme_l font-en ta-center show slide-bottom">
          お問い合わせ
        </h2><!-- .title_theme_l-ja -->
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
<section class="page-section-01 page-section section-black">

  <div class="page-section-01__inner page-section__inner last-section__inner">


    <div class="contact-form">
      <p class="text_theme_s">インソールと痛みの治療院では、インソールや痛みについてのご質問やご相談、作製依頼等何でもお気軽にお問い合わせいただいております。<br>
下記の問い合わせフォームより必要事項をご入力の上、ご送信をお願いいたします。<br><br>

<span class="red">※営業目的のメールについては一切対応しませんので迷惑行為はおやめください。</span></p><!-- .text_theme_s -->

      <?php echo do_shortcode('[contact-form-7 id="36" title="お問い合わせ"]'); ?>
    </div><!-- .contact-form -->

  </div><!-- .section-01__inner -->
</section><!-- .section-01 -->

  <?php get_template_part('blog-banner'); ?>

<?php get_template_part('contact-banner'); ?>

<?php get_template_part('contact-area'); ?>



</main><!-- .main-area-->






      <?php get_footer(); ?>
