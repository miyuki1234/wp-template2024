<?php get_header(); ?>

<main class="main-area">

  <!-- ーーートップビューーーー -->
  <div class="page-top-view bg-news">
    <div class="page-top-view__inner">

      <div class="title__outer">
        <h2 class="title-e_4l show slide-bottom">
        NEWS<span class="title-j_s">お知らせ</span>
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

  <!-- ーーー1.お知らせーーー -->
  <section class="page-section-01 page-section section-black">
    <div class="page-section-01__inner page-section__inner last-section__inner">

      <?php if (have_posts() ): ?>

        <?php while (have_posts() ): ?>
          <?php the_post(); ?>

          <article class="article-area">

            <div class="category__wrappper">
              <?php $terms = get_the_terms( $post->ID, array( 'news' ) );
              if ( $terms ) {
                foreach ( $terms as $term ) {
                  echo '<span class="faq-type text-j_3s">'.$term->name.'</span>';
                }
              } ?>
            </div><!-- .category__wrappper -->
            

            <h3 class="title-j_m faq">
              <?php the_title(); ?>
            </h3><!-- .title-j_l-sub2-ja -->


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
