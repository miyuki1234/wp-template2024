<?php get_header(); ?>

<main class="main-area">

  <!-- ーーートップビューーーー -->
  <div class="page-top-view bg-about-us">
    <div class="page-top-view__inner">

      <div class="title__outer">
        <h2 class="title_theme_l show slide-bottom">
          ABOUT US<span>私たちについて</span>
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

  <!-- ーーーメッセージーーー -->
  <section class="page-section-01 page-section section-black last-section">

    <div class="page-section-01__inner page-section__inner">
      
      <h3 class="title_theme_m ta-center">ミッション</h3><!-- .title_theme_m -->

      <p class="text_theme_s">
      私たちのミッションは、人材コンサルティング、アセスメント、教育・研修を通じて、企業の持つ真の潜在能力を解放し、従業員一人ひとりの能力を最大限に引き出すことです。私たちは、企業が直面する様々な人材課題に対し、独自のアプローチで革新的な解決策を提供します。<br><br>
      従業員の個々の才能を理解し、適切な位置に配置することで、彼らが自身のキャリアを充実させ、同時に企業の成長に貢献できる環境を創出します。<br>
      また、私たちの教育・研修サービスは、従業員が新しい技能を習得し、自己実現を果たすための支援を行います。<br><br>
      これらのサービスを通じて、企業は競争力を高め、市場での優位性を確立できるようになります。<br>
      私たちは、企業と従業員が共に成長し、繁栄する未来を創造するために、日々努力を続けています。<br>
      </p><!-- .text_theme_s -->

      <div class="bg-message">
      </div><!-- .bg-message -->

    </div><!-- .section-01__inner -->

  </section><!-- .section-01 -->

  <!-- ーーープロフィールーーー -->
  <section class="page-section-02 page-section section-black">

    <div class="page-section-02__inner page-section__inner last-section__inner">

      <div class="title__outer">
        <h3 class="title_theme_2s title_subpage ta-center">
        PROFILE
        </h2><!-- .title_theme_l-ja -->
      </div><!-- .title__outer -->


      <div class="column2 r-48-48">
        <div class="column2__1">

          <div class="column2 profile-box no-break">
            <div class="column2__1">
              <img src="<?php bloginfo('template_url'); ?>/images/img_about_profile.jpg" alt="たけ">
            </div><!-- .column2__1 -->
            <div class="column2__2">
              <div class="profile-info">
                <h4 class="title_theme_m">たけ</p><!-- .title_theme_m -->
                <ul>
                  <li>生年：1988年</li>
                  <li>性別：男</li>
                </ul>
              </div><!-- .profile-info -->
            </div><!-- .column2__2 -->
          </div><!-- .column2 -->

          <p class="text_theme_s">
            現在は勤務先の職場の都合上、匿名・顔非公表で活動しております。<br>
            現在限られた状況ではありますが、１人でも多くの方のためにインソールを通してお役に立ち、将来独立を目指して頑張っております。<br>
            その際は、実名と顔を出す予定ですので、それまで温かい目で見守っていただければ幸いです。<br><br>
            なお、お問い合わせいただいた際のやり取りは実名を、サービス提供時は顔をお出ししますのでご安心ください。
          </p><!-- .text_theme_s -->

          <div class="link-inline">
            <a href="https://insoletoitami.com/jikosyoukai/">プロフィール詳細</a>
          </div>

        </div><!-- .column2__1 -->

        <div class="column2__2">

          <div class="contents-box line-turquoise">
            <h4 class="title_theme_m ">
              経歴
            </h4><!-- .title_theme_m -->
            <p class="text_theme_s">
              理学療法士として10年以上総合病院に勤務。整形外科、脳神経外科、内科、外科、回復期病棟、クリニックを経験。<br>
              日本理学療法士協会運動器認定理学療法士。<br><br>
              痛みで困っている一人でも多くの方にインソールを届けるために埼玉県所沢市で活動開始。<br>
              股関節・膝関節・足関節・足部・腰部の痛み、歩行の改善が専門。
            </p><!-- .text_theme_s -->
          </div><!-- .contents-box -->

          <div class="contents-box line-turquoise">
            <h4 class="title_theme_m ">
              目標
            </h4><!-- .title_theme_m -->
            <ul>
              <li>より多くの痛みで困っている方々にインソールを届けること</li>
              <li>痛みで困っている方々が問題を解決するために役に立つ情報をブログで発信すること</li>
            </ul>
          </div><!-- .contents-box -->

        </div><!-- .column2__2 -->
      </div><!-- .column2 -->

    </div><!-- .section-02__inner -->

  </section><!-- .section-02 -->

<?php get_template_part('contact-banner'); ?>

</main><!-- .main-area-->

<?php get_footer(); ?>
