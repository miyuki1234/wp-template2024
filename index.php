<?php get_header(); ?>

<main class="main-area">

  <!-- ーーートップビューーーー -->
  <div class="top-view">
    <div class="top-view__inner">

      <div class="title_top-view">
        <p class="title-e_5l title-e_top-view">Ignite Your Business</p><!-- .top-message -->
        <p class="title-j_2l title-j_top-view">信頼と実績に基づく <br class="sp-only">積極的なビジネスサポート</p><!-- .top-message -->
      </div><!-- top-view_title -->

      <div class="frame-top-view">

          <div class="top-slider swiper">

              <div class="swiper-wrapper">

                  <div class="swiper-slide mask">
                    <img src="<?php bloginfo('template_url'); ?>/images/img_to_topview-01.webp" alt="">
                  </div><!-- swiper-slide -->

                  <div class="swiper-slide mask">
                    <img src="<?php bloginfo('template_url'); ?>/images/img_to_topview-02.webp" alt="">
                  </div><!-- swiper-slide -->

                  <div class="swiper-slide mask">
                    <img src="<?php bloginfo('template_url'); ?>/images/img_to_topview-03.webp" alt="">
                  </div><!-- swiper-slide -->

              </div><!-- swiper-wrapper -->

          </div><!-- swiper -->

      </div><!-- frame-top-view -->

    </div><!-- .top-view__inner -->
  </div><!-- .top-view -->

  <!-- ーーー新着情報ーーー -->
  <section class="top-section top-section-01 section-gray-02">
    <div class="top-section-01__inner top-section__inner section__inner-up section-white show">

      <div class="column2 r-30-60 no-pad">
        <div class="column2__1">
          <h2 class="title-e_3l title_twotone">
            NEWS
            <span class="text-j_2s">新着情報</span>
          </h2><!-- .title-j_3l -->
          <div class="btn-area pc-block">
            <a href="<?php echo home_url('/news'); ?>" class="btn btn-arrow">一覧をみる</a>
          </div><!-- .btn-area -->
        </div><!-- .column2__1 -->
        <div class="column2__2">
        <ul class="news-container__list">

          <?php
            $args = array(
              'post_type' => 'news',
              'posts_per_page' => 3,
            );
            $the_query = new WP_Query($args);
            
            if($the_query->have_posts()) : 
              while($the_query->have_posts()) : $the_query->the_post();
              $this_terms = get_the_terms($post->ID,'news_category');
          ?>
            <!-- 記事表示 start -->
            <li><a href="<?php echo get_permalink() ?>">
              <div class="contents-area">
                <time class="news-date text-j_2s" datetime="<?php echo the_time( DATE_W3C ); ?>"><?php echo the_time("Y.m.d"); ?></time>
                <span class="post-category news"><?php echo $this_terms[0]->name ?></span><!-- .post-category -->
              </div>
              <p class="news-title text-j_s"><?php the_title() ?></p>
            </a></li>
            <!-- 記事表示 end -->

            <?php endwhile; ?>
          <?php else : ?>
          <p class="text-j_s">まだ投稿がありません。</p>
          <?php endif; ?>

          </ul><!-- news-container__list -->

        </div><!-- .column2__2 -->
      </div><!-- column -->

      <div class="btn-area sp-block">
        <a href="<?php echo home_url('/news'); ?>" class="btn btn-arrow">一覧をみる</a>
      </div><!-- .btn-area -->

    </div>
  </section><!-- .top-section-01 -->


  <!-- ーーー私たちについてーーー -->
  <section class="top-section-02 top-section section-gray-02">
    <div class="top-section-02__inner top-section__inner section__inner-left-side slide-bottom show">

      <div class="column2 r-40-50 no-pad order-change">
        <div class="column2__1">
          <h2 class="title-e_5l title_twotone top-title">
            ABOUT US
            <span class="text-j_2s">私たちについて</span>
          </h2><!-- .title-e_5l -->
          <p class="title-e_l">ビジネス革新をリードする信頼のパートナー</p>
          <p class="text-j_s">
            私たちは、豊富な実績と信頼による質の高いコンサルティングで、お客様のビジネス展開を積極的にサポートします。専門知識と戦略的な視点を兼ね備えたチームが、あなたの企業成長を実現するための力強い一歩を提供します。未来への道を切り拓く、そんな冒険に私たちは共に歩みます。
          </p><!-- .text-j_s -->
          <div class="btn-area">
            <a href="<?php echo home_url('/about-us'); ?>" class="btn btn-arrow">詳しくみる</a>
          </div><!-- .btn-area -->
        </div><!-- .column2__1 -->
        <div class="column2__2">
          <div class="mask">
            <img src="<?php bloginfo('template_url'); ?>/images/img_top_about-us-01.webp" alt="">
          </div>
        </div><!-- .column2__2 -->
      </div><!-- .column -->

    </div><!-- .top-section-02__inner -->
  </section><!-- .top-section-02 -->


  <!-- ーーー事業内容ーーー -->
  <section class="top-section-03 top-section">
    <div class="top-section-03__inner top-section__inner slide-bottom show">
     
        <h2 class="title-e_5l title_twotone ta-center top-title">
          SERVICE
          <span class="text-j_2s">事業内容</span>
        </h2><!-- .title-e_5l -->

        <p class="text-j_s ta-center">
        私たちは、主に３つのジャンルに特化した<br class="sp-only">コンサルティング事業を行なっております。
        </p><!-- .text-j_s -->

        <div class="column2 no-pad service-boxes">
          <div class="column2__1">
            <div class="mask">
              <img src="<?php bloginfo('template_url'); ?>/images/img_top_service-01.webp" alt="">
            </div>
            <h3 class="title-j_m ta-center">
              人事コンサルティング
            </h3><!-- .text-j_top-view -->
            <p class="text-j_s">
            多角的な分析を通じて「人材マネジメント戦略」を構築し、具体的な人事施策の策定から実行までを全面的にサポート。組織の効率と生産性の向上を実現します。
            </p><!-- .text-j_s -->
          </div><!-- .column2__1 -->
          <div class="column2__2">
            <div class="mask">
              <img src="<?php bloginfo('template_url'); ?>/images/img_top_service-02.webp" alt="">
            </div>
            <h3 class="title-j_m ta-center">
              教育・研修サービス
            </h3><!-- .text-j_top-view -->
            <p class="text-j_s">
            従業員の潜在能力を引き出し、キャリアアップを実現する教育・研修サービス。マーケットの変化に適応し、組織全体の成長を促進するための専門的かつ革新的なカリキュラムを提供します。
            </p><!-- .text-j_s -->
          </div><!-- .column2__2 -->
        </div><!-- .column -->

      <div class="btn-area">
        <a href="<?php echo home_url('/service'); ?>" class="btn btn-arrow">事業内容を詳しくみる</a>
      </div><!-- .btn-area -->

    </div><!-- .top-section-03__inner -->
  </section><!-- .top-section-03 -->


  <!-- ーーーブログーー -->
  <section class="top-section-04 top-section section-blue-03 last-section">
    <div class="top-section-04__inner top-section__inner slide-bottom show">
    
      <h2 class="title-e_5l title_twotone ta-center top-title">
        BLOG
        <span class="text-j_2s">ブログ</span>
      </h2><!-- .title-e_5l -->

      <p class="text-j_s ta-center">
      企業様の抱える人事課題にお応えする<br class="sp-only">ブログを日々発信しております
      </p><!-- .text-j_s -->

      <div class="list-boxes">

        <?php $posts = get_posts('numberposts=3'); ?>
        <?php foreach($posts as $post): ?>
          <div class="list-box">

            <div class="box-container">
              <a href="<?php the_permalink() ?>">
                <div class="mask">
                  <?php
                  if ( has_post_thumbnail() ) {
                    the_post_thumbnail('large');
                  }else{ ?>
                    <img src="<?php bloginfo('template_url'); ?>/images/img_no-image-01.jpg">
                  <?php } ?>
                </div>
                <div class="contents-area">
                  <time class="news-date title-j_2s" datetime="<?php echo the_time( DATE_W3C ); ?>"><?php echo the_time("Y.m.d"); ?></time>
                  <span class="post-category">
                  <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
                  </span><!-- .post-category -->
                  <p class="news-title title-j_m"><?php echo get_the_title($post->ID); ?></p>
                </div><!-- .contents-area -->
              </a>
            </div><!-- .box-container -->

          </div><!-- .list-box -->
        <?php endforeach; ?>

      </div><!-- .list-boxes -->

      <div class="btn-area">
        <a href="<?php echo home_url('/blog'); ?>" class="btn btn-arrow">一覧をみる</a>
      </div><!-- .btn-area -->

    </div><!-- .top-section-04__inner -->
  </section><!-- .top-section-04 -->

<?php get_template_part('contact-banner'); ?>

</main><!-- .main-area-->

<?php get_footer(); ?>