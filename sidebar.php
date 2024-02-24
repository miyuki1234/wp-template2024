<aside class="sidebar">
  <div class="sidebar__inner">

    <section class="sidebar-section">
      <div class="sidebar-section__inner">
        <h3 class="text-j_s title">ブログ内検索</h3><!-- .text-j_2s -->
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
        <h3 class="text-j_s title">カテゴリー</h3><!-- .text-j_2s -->
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
        <h3 class="text-j_s title">人気の記事</h3><!-- .text-j_2s -->

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

                  <span class="mask">
                    <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail('large');
                    }else{ ?>
                      <img src="<?php bloginfo('template_url'); ?>/images/post/img_no-image-01.jpg">
                    <?php } ?>
                  </span>
                  <p class="text-j_2s">
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

  </div><!-- .sidebar__inner -->
</aside><!-- .sidebar -->
