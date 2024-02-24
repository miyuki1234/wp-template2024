<?php get_header(); ?>


<main class="main-area">



  <!-- ーーートップビューーーー -->
  <div class="page-top-view bg-normal">
    <div class="page-top-view__inner">

      <div class="title__outer">
        <h2 class="title-j_l show slide-bottom">
          免責事項
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
<section class="page-section-01 page-section section-black">

    <div class="page-section-01__inner page-section__inner last-section__inner">


      <div class="contents-box">
        <h3 class="title-j_m">サイト利用上の注意事項</h3><!-- .title-j_m -->
        <p class="text-j_s">当サイトを利用される場合は、ここに記載した条件に準拠いただくものとします。当サイトをご利用いただいた時点で、以下利用条件の全てに同意頂いたものとさせて頂きます。</p><!-- .text-j_s -->
        <ul class="list-none">
          <li>１．当サイトに掲載されている情報について、できる限り正確な情報を提供するよう努めておりますが、正確性や安全性を保証するものではありません。</li>
          <li>２．情報の正確性について問題がある場合、告知なしに情報を変更・削除することがあります。また、情報が古くなっていることもあります。</li>
          <li>３．当サイトからのリンクやバナーなどで移動したサイトで提供される情報、サービス等について一切の責任を負いません。</li>
        </ul>
      </div><!-- .contents-box -->



      </div><!-- .section-01__inner -->
</section><!-- .section-01 -->

  <?php get_template_part('blog-banner'); ?>

<?php get_template_part('contact-banner'); ?>

<?php get_template_part('contact-area'); ?>



</main><!-- .main-area-->






      <?php get_footer(); ?>
