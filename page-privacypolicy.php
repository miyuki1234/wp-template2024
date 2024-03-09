<?php get_header(); ?>

<main class="main-area">

  <!-- ーーートップビューーーー -->
  <div class="page-top-view bg-privacy">
    <div class="page-top-view__inner">

      <div class="title__outer">
        <h2 class="title-e_4l show slide-bottom">
          PRIVACY POLICY<span class="title-j_s">プライバシーポリシー</span>
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
  <section class="page-section-01 page-section">

    <div class="page-section-01__inner page-section__inner">

      <h3 class="title-j_3l ta-center title_twotone">個人情報の取扱いについて</h3><!-- .title-j_3l -->

      <div class="contents-box">
        <h4 class="title-j_m title_line">プライバシーポリシー</h4><!-- .title-j_m -->
        <p class="text-j_s">
        当社、[株式会社LIGHTER ※架空]（以下、「当社」と言います）は、人事コンサルティングサービスを提供するにあたり、ウェブサイト訪問者およびサービス利用者のプライバシーを尊重し、個人情報の保護に努めます。
        </p><!-- .text-j_s -->
      </div><!-- .contents-box -->

      <div class="contents-box">
        <h4 class="title-j_m title_line">１. 収集する情報とその目的</h4><!-- .title-j_m -->
        <p class="text-j_s">
        当社のウェブサイトでは、お問い合わせフォームを通じて、以下の個人情報を収集することがあります。
        </p><!-- .text-j_s -->
        <ul class="disc__list">
          <li>お名前</li>
          <li>メールアドレス</li>
          <li>電話番号（任意）</li>
          <li>お問い合わせ内容</li>
        </ul><!-- .disc__list -->
        <p class="text-j_s">
        これらの情報は、お問い合わせに対する回答や必要に応じたサービスの提供を目的として使用されます。
        </p><!-- .text-j_s -->
      </div><!-- .contents-box -->

      <div class="contents-box">
        <h3 class="title-j_m title_line">２. Googleアナリティクスの使用</h3><!-- .title-j_m -->
        <p class="text-j_s">当社ウェブサイトでは、サービス向上およびウェブサイトの利便性向上のため、Googleアナリティクスを利用しています。これにより、匿名のトラフィックデータが収集されますが、個人を特定するものではありません。<br>
        Googleアナリティクスの詳細は「<a href="https://marketingplatform.google.com/about/analytics/terms/jp/">Googleアナリティクス利用規約</a>」をご覧ください。</p><!-- .text-j_s -->
      </div><!-- .contents-box -->

      <div class="contents-box">
        <h3 class="title-j_m title_line">３. reCAPTCHAの使用</h3><!-- .title-j_m -->
        <p class="text-j_s">セキュリティ強化およびスパム対策のため、当社のウェブサイトはGoogleのreCAPTCHAサービスを利用しています。このプロセスでは、ユーザーの行動が分析されますが、これもまた個人を特定するものではありません。</p><!-- .text-j_s -->
      </div><!-- .contents-box -->

      <div class="contents-box">
        <h3 class="title-j_m title_line">４．個人情報の共有と開示</h3><!-- .title-j_m -->
        <p class="text-j_s">当社は、法的要求がある場合や当社の権利や財産を守る必要がある場合を除き、お客様の同意なく第三者に個人情報を共有または開示することはありません。</p><!-- .text-j_s -->
      </div><!-- .contents-box -->

      <div class="contents-box">
        <h3 class="title-j_m title_line">５．プライバシーポリシーの変更</h3><!-- .title-j_m -->
        <p class="text-j_s">当社は、必要に応じてこのプライバシーポリシーを更新する権利を留保します。変更がある場合は、ウェブサイト上で通知します。</p><!-- .text-j_s -->
      </div><!-- .contents-box -->

      <div class="contents-box">
        <h3 class="title-j_m title_line">お問い合わせ</h3><!-- .title-j_m -->
        <p class="text-j_s">当社のプライバシーポリシーに関してご質問がある場合は、<a href="<?php echo home_url('/contact'); ?>">お問い合わせページ</a>ご連絡ください。</p><!-- .text-j_s -->
      </div><!-- .contents-box -->

      </div><!-- .section-01__inner -->
  </section><!-- .section-01 -->

  <?php get_template_part('contact-banner'); ?>

</main><!-- .main-area-->

<?php get_footer(); ?>
