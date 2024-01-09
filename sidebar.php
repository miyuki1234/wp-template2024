<aside class="sidebar">
  <div class="sidebar__inner">

    <section class="sidebar-section">
      <div class="sidebar-section__inner">
        <h3 class="text_theme_s title">ブログ内検索</h3><!-- .text_theme_2s -->
        <div class="search-form__wrapper">
          <form action="<?php bloginfo('url'); ?>" method="get" class="search-form">
            <input type="submit" value="">
            <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="キーワード入力" />
          </form>
        </div><!-- .search-form__wrapper -->
      </div><!-- .sidebar-section__inner -->
    </section><!-- .sidebar-section -->

    <section class="sidebar-section">
      <div class="sidebar-section__inner">
        <h3 class="text_theme_s title">カテゴリー</h3><!-- .text_theme_2s -->
        <ul class="category__list">
          <li><a href="<?php echo home_url('/blog'); ?>">すべて</a></li>
            <?php
            $args = array(
                'title_li' => ''
            );
            wp_list_categories($args);
            ?>
        </ul>
      </div><!-- .sidebar-section__inner -->
    </section><!-- .sidebar-section -->

    <section class="sidebar-section">
      <div class="sidebar-section__inner">
        <h3 class="text_theme_s title">人気の記事</h3><!-- .text_theme_2s -->

        <ul class="article__list">

          <?php
          // views post metaで記事のPV情報を取得する
          setPostViews(get_the_ID());

          $args = array(
            'meta_key' => 'post_views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'posts_per_page' => 3 // ← 5件取得
          );

          // WP_Queryによるループ
          $query = new WP_Query($args);
          if ($query->have_posts()) :
            while ($query->have_posts()) :
              $query->the_post();
              ?>

              <!-- サムネイルの表示 タイトルの表示 -->
              <li>
                <a href="<?php the_permalink(); ?>">
                  <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'post-thumbnail'); } ?>
                  <p class="text_theme_2s">
                    <?php the_title(); ?>
                  </p>
                </a>
              </li>

                <?php
              endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </ul><!-- .article__list -->

      </div><!-- .sidebar-section__inner -->
    </section><!-- .sidebar-section -->

    <section class="sidebar-section">
      <div class="sidebar-section__inner no-border">
        <ul class="banner__list">
          <li>
            <a href="https://www.instagram.com/insole_pain_clinic/">
              <img src="<?php bloginfo('template_url'); ?>/images/banner_instagram-insole.jpg" alt="インソールと痛みの治療院 instagram">
            </a>
          </li>
        </ul>
      </div><!-- .sidebar-section__inner -->
    </section><!-- .sidebar-section -->


    <section class="sidebar-section">
      <div class="sidebar-section__inner profile-box">
        <h3 class="text_theme_s title">ブログ執筆者</h3><!-- .text_theme_2s -->
        <div class="contents-box middle">
          <figure class="profile-icon">
            <img src="<?php bloginfo('template_url'); ?>/images/img_about_profile.jpg" alt="たけ">
          </figure>
          <div class="title__outer ta-center">
            <h4 class="text_theme_s">たけ</h4><!-- .text_theme_s -->
            <span class="text_theme_2s turquoise">理学療法士</span>
          </div><!-- .title__outer -->
          <p class="text_theme_2s">理学療法士として埼玉県所沢市を拠点に活動しております。<br>「痛み」や「病院選び」など最前線の理学療法士だからこそ適用できる情報を発信していきます。</p><!-- .text_theme_2s -->
          <div class="link-inline">
            <a href="https://insoletoitami.com/jikosyoukai/">詳しいプロフィールはこちら</a><br>
            <a href="<?php echo home_url('/contact'); ?>">お問い合わせをする</a>
          </div><!-- .inline-link -->
        </div><!-- .contents-box -->

      </div><!-- .sidebar-section__inner -->
    </section><!-- .sidebar-section -->


  </div><!-- .sidebar__inner -->
</aside><!-- .sidebar -->
