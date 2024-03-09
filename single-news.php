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
  <div class="postpage-box">
    <div class="postpage-box__inner">

      <!-- ーーー1.新着情報ーーー -->
      <section class="page-section-01 page-section">
        <div class="page-section-01__inner page-section__inner section_inner-small">

              <?php
                $args = array(
                  'post_type' => 'news',
                );
                if(have_posts()) : 
                  while(have_posts()) : the_post();
                  $this_terms = get_the_terms($post->ID,'news_category');
              ?>

              <article class="article-area">

                <span class="post-category news"><?php echo $this_terms[0]->name ?></span><!-- .post-category -->

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
                } ?>

                <div class="article-contents-area">
                  <?php the_content(); ?>
                </div><!-- .article-contents-area -->

              </article><!-- .article-area -->

            <?php endwhile; ?>
          <?php endif; ?>

          <div class="btn-area">
            <a href="<?php echo home_url('/news'); ?>" class="btn btn-arrow">一覧にもどる</a>
          </div><!-- .btn-area -->

        </div><!-- .page-section-01__inner -->
      </section><!-- .page-section-01 -->

    </div><!-- .postpage-box__inner -->
  </div><!-- .postpage-box -->

  <?php get_template_part('contact-banner'); ?>

</main><!-- .main-area-->

<?php get_footer(); ?>
