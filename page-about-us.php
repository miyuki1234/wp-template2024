<?php get_header(); ?>

<main class="main-area">

  <!-- ーーートップビューーーー -->
  <div class="page-top-view bg-about-us">
    <div class="page-top-view__inner">

      <div class="title__outer">
        <h2 class="title-e_4l show slide-bottom">
        ABOUT US<span class="title-j_s">私たちについて</span>
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

  <!-- ーーーメッセージーーー -->
  <section class="page-section-01 page-section section-black">

    <div class="page-section-01__inner page-section__inner">
      
      <h3 class="title-j_3l ta-center title_twotone">ミッション</h3><!-- .title-j_3l -->

      <p class="text-j_s">
      私たちのミッションは、人材コンサルティング、アセスメント、教育・研修を通じて、企業の持つ真の潜在能力を解放し、従業員一人ひとりの能力を最大限に引き出すことです。私たちは、企業が直面する様々な人材課題に対し、独自のアプローチで革新的な解決策を提供します。<br><br>
      従業員の個々の才能を理解し、適切な位置に配置することで、彼らが自身のキャリアを充実させ、同時に企業の成長に貢献できる環境を創出します。<br>
      また、私たちの教育・研修サービスは、従業員が新しい技能を習得し、自己実現を果たすための支援を行います。<br><br>
      これらのサービスを通じて、企業は競争力を高め、市場での優位性を確立できるようになります。<br>
      私たちは、企業と従業員が共に成長し、繁栄する未来を創造するために、日々努力を続けています。<br>
      </p><!-- .text-j_s -->

      <div class="bg-message">
      </div><!-- .bg-message -->

    </div><!-- .section-01__inner -->

  </section><!-- .section-01 -->

<!-- ーーー代表あいさつーーー -->
<section class="page-section-02 page-section section-black">

  <div class="page-section-02__inner page-section__inner">

    <h3 class="title-j_3l ta-center title_twotone">代表あいさつ</h3><!-- .title-j_3l -->

    <div class="column2 r-30-60 about-us-boxes">
      <div class="column2__1">
        <div class="mask">
        <img src="<?php bloginfo('template_url'); ?>/images/img_about-us_ceo-01.webp" alt="">
        </div>
      </div><!-- .column2__1 -->
      <div class="column2__2">
        <div class="about-us-txt">
          <p>皆様、弊社ホームページをご覧いただきありがとうございます。<br>
            私たちの会社は、人材コンサルティング、アセスメント、教育・研修を通じて、企業とその従業員が共に成長する環境を創造することを目指しています。<br><br>
            私がこの業界に足を踏み入れたのは、人材が企業の最も貴重な資源であるという信念からです。<br>
            私たちの専門知識と経験を活用して、各企業の固有のニーズに応え、その潜在能力を最大限に引き出す手助けをすることが私たちの使命です。<br><br>
            ビジネスの世界は常に変化していますが、人材の価値は不変です。<br>
            この信念を持って、私たちは企業と従業員の双方が成功し、充実した未来を築くためのパートナーとして日々邁進しています。</p>
        </div><!-- about-us-txt -->
      </div><!-- .column2__2 -->
    </div><!-- .column2 -->

  </div><!-- .section-02__inner -->

  <!-- ーーー会社概要ーーー -->
  <section class="page-section-03 page-section section-black">

    <div class="page-section-03__inner page-section__inner last-section__inner">

      <h3 class="title-j_3l ta-center title_twotone">会社概要</h3><!-- .title-j_3l -->

      <div class="column2 r-30-60 order-change about-us-boxes">
        <div class="column2__1">
          <div class="mask">
            <img src="<?php bloginfo('template_url'); ?>/images/img_about-us_company-01.webp" alt="">
          </div>
        </div><!-- .column2__1 -->
        <div class="column2__2">
          <dl class="company__list">
            <dt class="text-j_s">会社名</dt>
            <dd class="text-j_s">株式会社ライター (※架空)</dd>
            <dt class="text-j_s">設立</dt>
            <dd class="text-j_s">2022年4月1日</dd>
            <dt class="text-j_s">住所</dt>
            <dd class="text-j_s">東京都千代田区〇〇-〇〇-〇〇〇</dd>
            <dt class="text-j_s">代表者</dt>
            <dd class="text-j_s">代表取締役　〇〇 〇〇</dd>
            <dt class="text-j_s">電話番号</dt>
            <dd class="text-j_s">00-0000-0000</dd>
            <dt class="text-j_s">事業内容</dt>
            <dd class="text-j_s">人材コンサルティング事業、人材アセスメント事業、教育・研修サービス事業</dd>
          </dl><!-- company__list -->
        </div><!-- .column2__2 -->
      </div><!-- .column2 -->

    </div><!-- .section-03__inner -->

  </section><!-- .section-02 -->

<?php get_template_part('contact-banner'); ?>

</main><!-- .main-area-->

<?php get_footer(); ?>
