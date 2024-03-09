<?php get_header(); ?>

<main class="main-area">

  <!-- ーーートップビューーーー -->
  <div class="page-top-view bg-news">
    <div class="page-top-view__inner">

      <div class="title__outer">
        <h2 class="title-e_4l show slide-bottom">
        NEWS<span class="title-j_s">新着情報</span>
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

  <!-- ーーー1.新着情報ーーー -->
  <section class="page-section-01 page-section">
    <div class="page-section-01__inner page-section__inner section_inner-small">

      <div class="category-box">
        <ul class="category-box__list">
          <?php
            $terms = get_terms('news_category','hide_empty=0');
            foreach ( $terms as $term ) {
              echo '<li><a href="'.get_term_link($term).'"><span class="post-category">'.$term->name.'</span></a></li>';
            }
          ?>
        </ul><!-- category-box__list -->
      </div><!-- category-box -->

      <div class="contents-box">

          <ul class="news-container__list">

            <?php
              if(have_posts()) : 
                while(have_posts()) : the_post();
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

      </div><!-- .contents-box -->

      <div class="pagination-area">
        <?php
          $args = array(
              'mid_size' => 1,
              'prev_text' => '&lt;',
              'next_text' => '&gt;',
              'screen_reader_text' => ' ',
          );
          the_posts_pagination($args);
        ?>
      </div><!-- pagination-area -->

      <?php wp_reset_postdata(); ?>

    </div><!-- .page-section-01__inner -->
  </section><!-- .page-section-01 -->

  <?php get_template_part('contact-banner'); ?>

</main><!-- .main-area-->

<?php get_footer(); ?>
