<?php get_header(); ?>

<main class="main-area">

  <!-- ーーーパンくずリストーーー -->
  <div class="breadcrumb-area">
    <div class="breadcrumb-area__inner">
      <div id="breadcrumb">
        <?php custom_breadcrumb(); ?>
      </div><!-- #breadcrumb -->
    </div><!-- .breadcrumb-area__inner -->
  </div><!-- .breadcrumb-area -->

  <!-- ーーーコンテンツーーー -->

  <!-- ーーー1.内容 -->
  <section class="page-section-01 page-section">
    <div class="page-section-01__inner page-section__inner">

      <p class="title-j_m title_line">
      ページが見つかりませんでした
      </p><!-- .title-j_m -->

      <p class="text-j_s">お探しのページが見つかりませんでした。URLが間違っている、もしくは削除された可能性がございます。<br>
      お手数ですが、アドレスをご確認の上もう一度お試しいただくか、下記のリンクから該当するページをお探しください。
      </p><!-- .text-j_s -->

      <div class="btn-area">
        <a href="<?php echo esc_url( home_url() ); ?>" class="btn btn-arrow">トップページ</a>
      </div><!-- .btn-area -->

      </div><!-- .btn-area -->

    </div><!-- .page-section-01__inner -->
  </section><!-- .page-section-01 -->

  <?php get_template_part('contact-banner'); ?>

</main><!-- .main-area-->

<?php get_footer(); ?>
