<?php get_header(); ?>


  <main class="main-area">


    <!-- ーーートップビューーーー -->
    <div class="page-top-view bg-normal">
      <div class="page-top-view__inner">

        <div class="title__outer">
          <h2 class="title_theme_l font-en ta-center show slide-bottom">
            お客様の声
          </h2><!-- .title_theme_l-ja -->
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


  <!-- ーーー1.お知らせーーー -->
  <section class="page-section-01 page-section section-black">
    <div class="page-section-01__inner page-section__inner last-section__inner">

      <?php if (have_posts() ): ?>

        <?php while (have_posts() ): ?>
          <?php the_post(); ?>

      <article class="article-area">



          <h3 class="text_theme_2s-middle">
            <?php the_title(); ?>
          </h3><!-- .title_theme_l-sub2-ja -->

          <span class="text_theme_2s">
            <?php the_field('symptoms'); ?>
          </span>

          <div class="column2 r-42-52 tb-break">
            <div class="column2__1">
              <?php
              if ( has_post_thumbnail() ) {
                the_post_thumbnail('');
              }else{ ?>
                <img src="<?php bloginfo('template_url'); ?>/images/img_no-image.jpg">
              <?php } ?>
            </div><!-- .column2__1 -->
            <div class="column2__2">
              <div class="article-contents-area">
                <?php the_content(); ?>

                <div class="column2 profile-box no-break">
                  <div class="column2__1">
                    <img src="<?php bloginfo('template_url'); ?>/images/img_about_profile.jpg" alt="たけ">
                    <p class="text_theme_2s ta-center">たけ</p>
                  </div><!-- .column2__1 -->
                  <div class="column2__2">
                    <p class="text_theme_s">
                      <?php echo nl2br(get_post_meta($post->ID, 'take_comment', true)); ?>
                    </p><!-- .text_theme_s -->
                  </div><!-- .column2__2 -->
                </div><!-- .column2 -->

              </div><!-- .article-contents-area -->


            </div><!-- .column2__2 -->
          </div><!-- .column2 -->










    <?php endwhile; ?>

  <?php endif; ?>




    </article><!-- .article-area -->


    <div class="btn-area">
      <a href="<?php echo home_url('/voice'); ?>" class="btn btn-turquoise">一覧に戻る</a>
    </div><!-- .btn-area -->



    </div><!-- .section-01__inner -->
  </section><!-- .section-01 -->


  <?php get_template_part('blog-banner'); ?>

  <?php get_template_part('contact-banner'); ?>

  <?php get_template_part('contact-area'); ?>


  </main><!-- .main-area-->






      <?php get_footer(); ?>
