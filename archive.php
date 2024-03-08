<?php get_header(); ?>

<main class="main-area">

  <!-- ーーートップビューーーー -->
  <div class="page-top-view bg-blog">
    <div class="page-top-view__inner">

      <div class="title__outer">
        <h2 class="title-e_4l show slide-bottom">
        BLOG<span class="title-j_s">ブログ</span>
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
  <!-- ーーーブログ用２カラムーーー -->
  <div class="postpage-box">
    <div class="postpage-box__inner">

      <!-- ーーー1.ブログーーー -->
      <div class="mainbar">

        <section class="page-section-01 page-section last-section">
          <div class="page-section-01__inner page-section__inner">

            <div class="list-boxes">

              <?php if (have_posts() ): ?>

                <?php while (have_posts() ): ?>
                  <?php the_post(); ?>

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

                <?php endwhile; ?>

              <?php else : ?>
                <p class="text-j_2s">まだ投稿がありません。</p>
              <?php endif; ?>

            </div><!-- .list-boxes -->

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
            </div><!-- .pagination-area -->

          </div><!-- .page-section-01__inner -->
        </section><!-- .page-section-01 -->

      </div><!-- .mainbar -->

      <?php get_template_part('sidebar'); ?>

    </div><!-- .postpage-box__inner -->
</div><!-- .postpage-box -->

<?php get_template_part('contact-banner'); ?>

</main><!-- .main-area-->

<?php get_footer(); ?>
