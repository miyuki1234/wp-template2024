<?php get_header(); ?>


  <main class="main-area">


    <!-- ーーートップビューーーー -->
    <div class="page-top-view bg-normal">
      <div class="page-top-view__inner">

        <div class="title__outer">
          <h2 class="title_theme_l font-en ta-center show slide-bottom">
            よくあるご質問
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

        <div class="category__wrappper">
          <?php $terms = get_the_terms( $post->ID, array( 'faq_type' ) );
          if ( $terms ) {
            foreach ( $terms as $term ) {
              echo '<span class="faq-type text_theme_3s">'.$term->name.'</span>';
            }
          } ?>
        </div><!-- .category__wrappper -->

          <h3 class="title_theme_m faq">
            <?php the_title(); ?>
          </h3><!-- .title_theme_l-sub2-ja -->



          <div class="article-contents-area">
            <?php the_content(); ?>

          </div><!-- .article-contents-area -->


    <?php endwhile; ?>

  <?php endif; ?>




    </article><!-- .article-area -->


    <div class="btn-area">
      <a href="<?php echo home_url('/faq'); ?>" class="btn btn-turquoise">ご質問一覧に戻る</a>
    </div><!-- .btn-area -->










    </div><!-- .section-01__inner -->
  </section><!-- .section-01 -->



  <?php get_template_part('blog-banner'); ?>

  <?php get_template_part('contact-banner'); ?>

  <?php get_template_part('contact-area'); ?>


  </main><!-- .main-area-->






      <?php get_footer(); ?>
