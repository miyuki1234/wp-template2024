<?php get_header(); ?>


    <main class="main-area">



      <!-- ーーートップビューーーー -->
      <div class="page-top-view bg-blog">
        <div class="page-top-view__inner">

          <div class="title__outer">
            <h2 class="title-j_l show slide-bottom">
              ブログ
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
    <!-- ーーーブログ用２カラムーーー -->
    <div class="postpage-box">
      <div class="postpage-box__inner">



      <!-- ーーー1.お知らせーーー -->

      <div class="mainbar">

      <section class="page-section-01 page-section section-black last-section">
        <div class="page-section-01__inner page-section__inner">

          <div class="search-results-box">
            <h3 class="text-j_m">
              <?php the_search_query(); ?>
              <span class="text-j_2s">~ 検索ワード ~</span>
            </h3><!-- .text-j_2s -->
          </div><!-- .search-results-box -->



          <div class="list-boxes">

            <?php if (have_posts() ): ?>

              <?php while (have_posts() ): ?>
                <?php the_post(); ?>



                <div class="list-box">


                  <div class="box-container">

                    <div class="zoomInRotate">
                      <a href="<?php the_permalink() ?>">
                        <span class="mask">
                          <?php
                          if ( has_post_thumbnail() ) {
                            the_post_thumbnail('large');
                          }else{ ?>
                            <img src="<?php bloginfo('template_url'); ?>/images/img_no-image.jpg">
                          <?php } ?>
                        </span>
                      </a>
                    </div>

                    <div class="contents-area">

                      <time class="news-date text-j_2s" datetime="<?php echo the_time( DATE_W3C ); ?>"><?php echo the_time("Y.m.d"); ?></time>

                      <span class="post-categories_no-link text-j_3s">
                        <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
                      </span><!-- .post-category_no-link -->

                      <p class="news-title text-j_2s">
                        <?php echo get_the_title($post->ID); ?>
                      </p>


                    </div><!-- .contents-area -->
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

      <?php get_template_part('contact-area'); ?>

      <?php get_template_part('contact-banner'); ?>



    </main><!-- .main-area-->


      <?php get_footer(); ?>
