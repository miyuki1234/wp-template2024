<?php get_header(); ?>

<script>
jQuery(function($){
  $('.toc_toggle a').on('click', function(e) {
    e.preventDefault();
    $(this).parents('.toc-container').slideUp();
  });
});
</script>

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

        <!-- ーーー1.ブログーーー -->
        <section class="page-section-01 page-section last-section">
          <div class="page-section-01__inner page-section__inner">

            <?php if (have_posts() ): ?>
              <?php while (have_posts() ): ?>
                <?php the_post(); ?>

                <article class="article-area">

                  <?php $cat = the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?>
                    
                  <h3 class="title-j_2l">
                    <?php the_title(); ?>
                  </h3><!-- .title-j_l-sub2-ja -->

                  <?php if( get_the_time('Ymd') !== get_the_modified_date('Ymd')){ ?>
                    <span title="更新日" class="modified-day text-j_2s">
                      <i class="fa-solid fa-arrows-rotate"></i><time itemprop="dateModified" datetime="<?php the_modified_date('c');?>"><?php the_modified_date('Y.m.d'); ?></time>
                    </span>
                  <?php } ?>
                  <span title="公開日" class="published-day text-j_2s">
                    <time itemprop="datePublished" datetime="<?php the_time('c');?>"><?php the_time('Y.m.d');?></time>
                  </span>

                  <?php
                  if ( has_post_thumbnail() ) {
                    the_post_thumbnail('');
                  }else{ ?>
                    <img src="<?php bloginfo('template_url'); ?>/images/post/img_no-image-01.jpg">
                  <?php } ?>

                  <div class="article-contents-area">
                    <?php the_content(); ?>
                  </div><!-- .article-contents-area -->

                </article><!-- .article-area -->

              <?php endwhile; ?>
            <?php endif; ?>

            <?php get_template_part( 'sns-area' ); ?>

            <div class="btn-area">
              <a href="<?php echo home_url('/blog'); ?>" class="btn btn-arrow">一覧にもどる</a>
            </div><!-- .btn-area -->

          </div><!-- .section-01 -->
        </section><!-- .section-01 -->

      </div><!-- .mainbar -->

      <?php get_template_part('sidebar'); ?>

    </div><!-- .postpage-box__inner -->
  </div><!-- .postpage-box -->

  <?php get_template_part('contact-banner'); ?>

</main><!-- .main-area-->

<?php get_footer(); ?>
