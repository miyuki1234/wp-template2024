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

      <?php
        $tax_name = 'news';
        $posttype_name = 'news_category';
        $terms = get_terms($tax_name);
        foreach ( $terms as $term ):

        $args = array(
          'post_type' => $posttype_name,
          'tax_query' => array(
            array(
              'taxonomy' => $tax_name,
              'field'    => 'slug',
              'terms'    => $term->slug,
            ),
          ),
        );
        $the_query = new WP_Query( $args );
      ?>

        <?php if ($the_query->have_posts()): ?>

        <ul class="news-container__list">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <!-- 記事表示 start -->
            <li><a href="<?php echo get_permalink() ?>">
              <div class="contents-area">
                <time class="news-date text-j_2s" datetime="2023-08-13T18:23:57+09:00">2023.08.13</time>
                <span class="post-category">カテゴリー</span><!-- .post-category -->
              </div>
              <p class="news-title title-j_s"><?php the_title() ?></p>
            </a></li>
          <!-- 記事表示 end -->
          <?php endwhile; ?>
        </ul><!-- news-container__list -->
      </div><!-- .contents-box -->
      <?php endif; ?>
      <?php endforeach; wp_reset_postdata(); ?>

      <!-- ターム名 start -->
      <h3 class="title-j_m bd-left"><?php echo $term->name ?></h3>
      <!-- ターム名 end -->
      <div class="contents-box">
        <?php if ($the_query->have_posts()): ?>
        <ul class="faq-table">
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <!-- 記事表示 start -->
        <li class="faq-table__list">
          <a href="<?php echo get_permalink() ?>">
            <h4 class="title__wrapper">
              <?php the_title() ?>
            </h4><!-- .title__wrapper -->
          </a>
        </li>
        <!-- 記事表示 end -->
        <?php endwhile; ?>
        </ul>
      </div><!-- .contents-box -->
      <?php endif; ?>


  </div><!-- .page-section-01__inner -->
  </section><!-- .page-section-01 -->


  <?php get_template_part('contact-banner'); ?>

</main><!-- .main-area-->

<?php get_footer(); ?>
